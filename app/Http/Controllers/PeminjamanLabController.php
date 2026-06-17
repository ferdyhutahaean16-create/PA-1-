<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanLab;
use App\Models\DetailAlat;
use App\Models\DetailBahan;
use App\Models\Inventory; // 💡 Memanggil model Inventory yang baru
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanLabController extends Controller 
{
    // Fungsi untuk memanggil form gabungan
    public function formPinjam()
    {
        // 1. Ambil data inventaris yang stoknya di atas 0 menggunakan model Inventory
        $inventaris = Inventory::where('quantity', '>', 0)->orderBy('item_name', 'asc')->get();

        // 2. Ambil data sesi pengguna dari hasil login API CIS
        $pu = session('pinjam_user');
        
        // 3. Ekstrak data untuk dilempar ke Form
        $nama = $pu['nama'] ?? 'Mahasiswa IT Del';
        $identitas = $pu['nim'] ?? $pu['username'] ?? ''; 
        $prodi = $pu['prodi'] ?? $pu['unit'] ?? 'Bioteknologi'; 

        // 4. Filter berdasarkan kategori bahasa Inggris
        $alat = $inventaris->where('category', 'Equipment');
        $bahan = $inventaris->where('category', 'Material');
        $instrumen = $inventaris->where('category', 'Instrument');

        return view('laboratorium.pinjam', compact(
            'nama', 'identitas', 'prodi', 'inventaris', 'alat', 'bahan', 'instrumen'
        ));
    }

    public function store(Request $request)
    {
        // 1. Validasi keamanan data
        $request->validate([
            'nama_peminjam' => 'required|string',
            'nim' => 'required|string',
            'ruang_lab' => 'required|string',
            'rencana_pinjam' => 'required|date',
            'rencana_kembali' => 'required|date|after_or_equal:rencana_pinjam',
            'barang_id' => 'required|array', 
            'jumlah_pinjam' => 'required|array'
        ], [
            'barang_id.required' => 'Keranjang peminjaman kosong! Silakan pilih barang terlebih dahulu.'
        ]);

        // 2. Proses simpan dengan Database Transaction
        DB::transaction(function () use ($request) {
            
            // A. Simpan data utama formulir
            $peminjaman = PeminjamanLab::create([
                'tipe_layanan' => $request->tipe_layanan,
                'kategori_peminjaman' => $request->kategori_peminjaman,
                'nama_peminjam' => $request->nama_peminjam,
                'nim' => $request->nim,
                'program_studi' => $request->program_studi,
                'ruang_lab' => $request->ruang_lab,
                'judul_penelitian' => $request->judul_penelitian,
                'rencana_pinjam' => $request->rencana_pinjam,
                'rencana_kembali' => $request->rencana_kembali,
                'status' => 'Pending' 
            ]);

            // B. Looping untuk menyimpan detail barang dan MENGURANGI STOK
            foreach ($request->barang_id as $index => $id_barang) {
                $qty_pinjam = $request->jumlah_pinjam[$index];
                
                // Gunakan model Inventory
                $barang = Inventory::find($id_barang);

                if ($barang) {
                    // Pemisahan ke tabel detail
                    if ($request->kategori_peminjaman === 'Bahan') {
                        DetailBahan::create([
                            'peminjaman_lab_id' => $peminjaman->id,
                            'inventaris_lab_id' => $id_barang,
                            'nama_bahan' => $barang->item_name, // Mengambil kolom item_name
                            'jumlah' => $qty_pinjam
                        ]);
                    } else {
                        DetailAlat::create([
                            'peminjaman_lab_id' => $peminjaman->id,
                            'inventaris_lab_id' => $id_barang,
                            'nama_alat' => $barang->item_name, // Mengambil kolom item_name
                            'jumlah' => $qty_pinjam
                        ]);
                    }

                    // --- LOGIKA PENGURANGAN STOK MATEMATIS SUPER BERSIH ---
                    // Tidak perlu regex lagi! Cukup kurangi angkanya langsung.
                    $barang->quantity -= $qty_pinjam;
                    $barang->save();
                }
            }
        });

        return redirect()->back()->with('success', 'Formulir berhasil dikirim dan stok laboratorium telah disesuaikan otomatis!');
    }

    public function indexAdmin() {
        $peminjamans = PeminjamanLab::with(['detailAlat', 'detailBahan'])->orderBy('created_at', 'desc')->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function cekStatus(Request $request) {
        $nim = $request->query('nim');
        $peminjamans = $nim ? PeminjamanLab::where('nim', $nim)->orderBy('created_at', 'desc')->get() : collect();
        return view('laboratorium.cek_status', compact('peminjamans', 'nim'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Disetujui,Ditolak,Selesai',
            'catatan_admin' => 'nullable|string'
        ]);

        $peminjaman = PeminjamanLab::with(['detailAlat', 'detailBahan'])->findOrFail($id);
        
        // LOGIKA PEMULIHAN STOK OTOMATIS
        if (in_array($request->status, ['Ditolak', 'Selesai']) && !in_array($peminjaman->status, ['Ditolak', 'Selesai'])) {
            
            // 1. Pulihkan Stok Alat
            foreach ($peminjaman->detailAlat as $detail) {
                $barang = Inventory::find($detail->inventaris_lab_id);
                if ($barang) {
                    $barang->quantity += $detail->jumlah; // Penjumlahan sederhana
                    $barang->save();
                }
            }

            // 2. Pulihkan Stok Bahan
            foreach ($peminjaman->detailBahan as $detail) {
                $barang = Inventory::find($detail->inventaris_lab_id);
                if ($barang) {
                    $barang->quantity += $detail->jumlah; // Penjumlahan sederhana
                    $barang->save();
                }
            }
        }

        $peminjaman->status = $request->status;
        $peminjaman->catatan_admin = $request->catatan_admin;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui dan stok disesuaikan!');
    }

    public function cetakBon($id)
    {
        $peminjaman = PeminjamanLab::with(['detailAlat', 'detailBahan'])->findOrFail($id);
        return view('admin.peminjaman.cetak', compact('peminjaman'));
    }
}
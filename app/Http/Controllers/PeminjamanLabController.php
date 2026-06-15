<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanLab;
use App\Models\DetailAlat;
use App\Models\DetailBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanLabController extends Controller 
{
    // Fungsi untuk memanggil form gabungan
    public function formPinjam()
{
    // 1. Ambil data alat & bahan dari database yang stoknya masih ada
    $inventaris = \App\Models\InventarisLab::where('jumlah', '>', 0)->get();

    // 2. Ambil data sesi pengguna dari hasil login API CIS
    // (Jika middleware ExternalApiAuth Anda menyimpan data lengkapnya di session ini)
    $pu = session('pinjam_user');
    
    // 3. Ekstrak data untuk dilempar ke Form (Sesuaikan key array dengan struktur API CIS)
    $nama = $pu['nama'] ?? 'Mahasiswa IT Del';
    $identitas = $pu['nim'] ?? $pu['username'] ?? ''; // Bisa NIM atau NIK
    $prodi = $pu['prodi'] ?? $pu['unit'] ?? 'Bioteknologi'; 

    // CONTOH PENERAPAN DI ROUTE / CONTROLLER PEMINJAMAN ANDA

    // 1. Tarik data inventaris terlebih dahulu
    $inventaris = \App\Models\InventarisLab::orderBy('nama_barang', 'asc')->get();
    $alat = $inventaris->where('kategori', 'Alat');
    $bahan = $inventaris->where('kategori', 'Bahan');
    $instrumen = $inventaris->whereIn('kategori', ['Instrumen', 'Instrumen Aset Lab']);

    // 2. Tambahkan $alat, $bahan, dan $instrumen ke dalam compact()
    return view('laboratorium.pinjam', compact(
            'nama', 
            'identitas', 
            'prodi', 
            'inventaris', 
            'alat', 
            'bahan', 
            'instrumen'
        ));
    }

    public function store(Request $request)
    {
        // 1. Validasi keamanan data
        $request->validate([
            'nama_peminjam' => 'required|string',
            'nim' => 'required|string',
            'ruang_lab' => 'required|string',
            'rencana_pinjam' => 'required|date', // 💡 Wajib isi tanggal
            'rencana_kembali' => 'required|date|after_or_equal:rencana_pinjam',
            'barang_id' => 'required|array', // Memastikan keranjang tidak kosong
            'jumlah_pinjam' => 'required|array'
        ], [
            'barang_id.required' => 'Keranjang peminjaman kosong! Silakan pilih barang terlebih dahulu.'
        ]);

        // 2. Proses simpan dengan Database Transaction (Anti-Data-Korupsi)
        \Illuminate\Support\Facades\DB::transaction(function () use ($request) {
            
            // A. Simpan data utama formulir
            // (Pastikan model Peminjaman Anda sudah memiliki kolom-kolom ini di $fillable)
            $peminjaman = \App\Models\PeminjamanLab::create([
                'tipe_layanan' => $request->tipe_layanan,
                'kategori_peminjaman' => $request->kategori_peminjaman,
                'nama_peminjam' => $request->nama_peminjam,
                'nim' => $request->nim,
                'program_studi' => $request->program_studi,
                'ruang_lab' => $request->ruang_lab,
                'judul_penelitian' => $request->judul_penelitian,
                'rencana_pinjam' => $request->rencana_pinjam,   // 💡 Menangkap input tanggal pinjam
                'rencana_kembali' => $request->rencana_kembali,
                'status' => 'Pending' // Status awal
            ]);

            // B. Looping untuk menyimpan detail barang dan MENGURANGI STOK
            foreach ($request->barang_id as $index => $id_barang) {
                $qty_pinjam = $request->jumlah_pinjam[$index];
                
                $barang = \App\Models\InventarisLab::find($id_barang);

                if ($barang) {
                    
                    // PENYESUAIAN STRUKTUR DATABASE ANDA:
                    // Pisahkan penyimpanan ke Detail Alat atau Detail Bahan berdasarkan kategori form
                    if ($request->kategori_peminjaman === 'Bahan') {
                        // 1. Jika murni Bahan, masukkan ke Detail Bahan
                        \App\Models\DetailBahan::create([
                            'peminjaman_lab_id' => $peminjaman->id,
                            'inventaris_lab_id' => $id_barang,
                            'nama_bahan' => $barang->nama_barang,
                            'jumlah' => $qty_pinjam
                        ]);
                    } else {
                        // 2. Jika Alat, Instrumen, Instrumen Aset Lab, atau ejaan variasi lainnya,
                        // paksa semuanya masuk dengan aman ke keranjang Detail Alat!
                        \App\Models\DetailAlat::create([
                            'peminjaman_lab_id' => $peminjaman->id,
                            'inventaris_lab_id' => $id_barang,
                            'nama_alat' => $barang->nama_barang,
                            'jumlah' => $qty_pinjam
                        ]);
                    }

                    // --- LOGIKA PENGURANGAN STOK MATEMATIS ---
                    preg_match('/^(\d+)\s*(.*)$/', $barang->jumlah, $matches);
                    $stok_lama = isset($matches[1]) ? (int)$matches[1] : 0;
                    $satuan_teks = isset($matches[2]) ? $matches[2] : '';

                    $stok_baru = $stok_lama - $qty_pinjam;
                    $barang->jumlah = trim($stok_baru . ' ' . $satuan_teks);
                    $barang->save();
                }
            }
        });

        // 3. Kembalikan ke halaman awal dengan pesan sukses
        return redirect()->back()->with('success', 'Formulir berhasil dikirim dan stok laboratorium telah disesuaikan otomatis!');
    }

    public function indexAdmin() {
        // Mengambil semua data peminjaman lengkap dengan detailnya
        $peminjamans = PeminjamanLab::with(['detailAlat', 'detailBahan'])->orderBy('created_at', 'desc')->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function cekStatus(Request $request) {
        $nim = $request->query('nim');
        $peminjamans = $nim ? PeminjamanLab::where('nim', $nim)->orderBy('created_at', 'desc')->get() : collect();
        return view('laboratorium.cek_status', compact('peminjamans', 'nim'));
    }

    // Fungsi untuk memperbarui status oleh Admin (Yang sebelumnya memunculkan error)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Disetujui,Ditolak,Selesai',
            'catatan_admin' => 'nullable|string'
        ]);

        $peminjaman = \App\Models\PeminjamanLab::with(['detailAlat', 'detailBahan'])->findOrFail($id);
        
        // LOGIKA PEMULIHAN STOK OTOMATIS
        // Jika status diubah menjadi Ditolak atau Selesai (dan sebelumnya belum berstatus itu)
        if (in_array($request->status, ['Ditolak', 'Selesai']) && !in_array($peminjaman->status, ['Ditolak', 'Selesai'])) {
            
            // 1. Pulihkan Stok Alat
            foreach ($peminjaman->detailAlat as $detail) {
                $barang = \App\Models\InventarisLab::find($detail->inventaris_lab_id);
                if ($barang) {
                    preg_match('/^(\d+)\s*(.*)$/', $barang->jumlah, $matches);
                    $stok_lama = isset($matches[1]) ? (int)$matches[1] : 0;
                    $satuan_teks = isset($matches[2]) ? $matches[2] : '';
                    
                    $stok_baru = $stok_lama + $detail->jumlah;
                    $barang->jumlah = trim($stok_baru . ' ' . $satuan_teks);
                    $barang->save();
                }
            }

            // 2. Pulihkan Stok Bahan
            foreach ($peminjaman->detailBahan as $detail) {
                $barang = \App\Models\InventarisLab::find($detail->inventaris_lab_id);
                if ($barang) {
                    preg_match('/^(\d+)\s*(.*)$/', $barang->jumlah, $matches);
                    $stok_lama = isset($matches[1]) ? (int)$matches[1] : 0;
                    $satuan_teks = isset($matches[2]) ? $matches[2] : '';
                    
                    $stok_baru = $stok_lama + $detail->jumlah;
                    $barang->jumlah = trim($stok_baru . ' ' . $satuan_teks);
                    $barang->save();
                }
            }
        }

        // Simpan perubahan status dan catatan
        $peminjaman->status = $request->status;
        $peminjaman->catatan_admin = $request->catatan_admin;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui dan stok disesuaikan!');
    }

    // Fungsi untuk mencetak Bon Peminjaman menjadi PDF/Print
    public function cetakBon($id)
    {
        // 1. Ambil data peminjaman beserta detail alat & bahan
        $peminjaman = PeminjamanLab::with(['detailAlat', 'detailBahan'])->findOrFail($id);

        // ==========================================================
        // OPSI 1: Jika Anda menggunakan bawaan HTML Print (Ctrl+P)
        // ==========================================================
        return view('admin.peminjaman.cetak', compact('peminjaman'));

        // ==========================================================
        // OPSI 2: Jika Anda menggunakan package PDF (seperti DOMPDF)
        // Hapus komentar pada baris di bawah ini dan hapus Opsi 1 di atas:
        // ==========================================================
        // $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.peminjaman.cetak', compact('peminjaman'));
        // return $pdf->stream('Bon_Peminjaman_'.$peminjaman->nama_peminjam.'.pdf');
    }

    // 1. Fungsi untuk menampilkan halaman form Edit
    public function edit($id)
    {
        $barang = \App\Models\InventarisLab::findOrFail($id);
        return view('admin.inventaris.edit', compact('barang'));
    }

    // 2. Fungsi untuk menyimpan perubahan ke database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|in:Alat,Bahan,Instrumen,Instrumen Aset Lab',
            'jumlah' => 'required|string', // Menerima teks seperti "15 Pcs" atau "20 Wadah"
            'kedaluarsa' => 'nullable|date' 
        ]);

        $barang = \App\Models\InventarisLab::findOrFail($id);
        
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori = $request->kategori;
        
        // Anda dapat langsung mengubah angka stok di sini jika ada barang baru masuk
        $barang->jumlah = $request->jumlah;
        
        // Logika Cerdas: Simpan kedaluarsa hanya jika kategorinya Bahan
        if ($request->kategori === 'Bahan') {
            $barang->kedaluarsa = $request->kedaluarsa; 
        } else {
            $barang->kedaluarsa = null; // Bersihkan data jika kategori diubah menjadi Alat
        }

        $barang->save();

        return redirect()->route('admin.inventaris.index')->with('success', 'Data inventaris berhasil diperbarui dan stok telah disesuaikan!');
    }
}
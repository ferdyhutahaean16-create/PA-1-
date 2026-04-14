<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanLab;
use App\Models\DetailAlat;
use App\Models\DetailBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanLabController extends Controller
{
    // Menampilkan Form Pinjam Alat
    public function formAlat() {
        return view('laboratorium.pinjam_alat');
    }

    // Menampilkan Form Pinjam Bahan
    public function formBahan() {
        return view('laboratorium.pinjam_bahan');
    }

    // Proses Simpan Peminjaman (Handle Alat & Bahan sekaligus)
    public function store(Request $request)
    {
        // 1. Validasi Data Utama
        $request->validate([
            'jenis_form' => 'required',
            'judul_penelitian' => 'required|string|max:255',
            'laboratorium' => 'required',
            'nama_peminjam' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'items' => 'required|array|min:1', // Pastikan minimal ada 1 barang
        ]);

        try {
            DB::beginTransaction();

            // 2. Simpan ke Tabel Induk (PeminjamanLab)
            $peminjaman = PeminjamanLab::create([
                'jenis_form' => $request->jenis_form,
                'judul_penelitian' => $request->judul_penelitian,
                'laboratorium' => $request->laboratorium,
                'nama_peminjam' => $request->nama_peminjam,
                'nim' => $request->nim,
                'prodi' => $request->prodi,
                'status' => 'Pending',
            ]);

            // 3. Simpan Rincian Barang (Looping sesuai jenis)
            foreach ($request->items as $item) {
                if ($request->jenis_form == 'Alat') {
                    DetailAlat::create([
                        'peminjaman_lab_id' => $peminjaman->id,
                        'nama_alat' => $item['nama'],
                        'jumlah' => $item['jumlah'],
                        'ukuran' => $item['ukuran'] ?? null,
                        'ket_sebelum' => $item['ket_sebelum'] ?? null,
                    ]);
                } else {
                    DetailBahan::create([
                        'peminjaman_lab_id' => $peminjaman->id,
                        'nama_bahan' => $item['nama'],
                        'jumlah' => $item['jumlah'],
                        'harga' => $item['harga'] ?? null,
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Permohonan peminjaman berhasil dikirim! Silakan tunggu konfirmasi Admin.');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
        // Menampilkan daftar semua peminjaman di sisi Admin
    public function indexAdmin()
    {
        // Mengambil data peminjaman beserta detail alat dan bahannya
        $peminjamans = PeminjamanLab::with(['detailAlat', 'detailBahan'])
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    // Menangani perubahan status (Approve/Reject)
    public function updateStatus(Request $request, $id)
    {
        $peminjaman = PeminjamanLab::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
            'catatan_admin' => 'nullable|string'
        ]);

        $peminjaman->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin
        ]);

        $pesan = $request->status == 'Disetujui' ? 'Peminjaman telah disetujui.' : 'Peminjaman telah ditolak.';
        return redirect()->back()->with('success', $pesan);
    }

    // Tambahkan fungsi ini untuk mencetak PDF
    public function cetakBon($id)
    {
        $peminjaman = \App\Models\PeminjamanLab::with(['detailAlat', 'detailBahan'])->findOrFail($id);
        
        return view('admin.peminjaman.cetak', compact('peminjaman'));
    }

    // Fungsi untuk mahasiswa mengecek status peminjaman berdasarkan NIM
    public function cekStatus(Request $request)
    {
        $nim = $request->query('nim');
        $peminjamans = collect(); // Kosongkan data secara default

        if ($nim) {
            // Jika ada NIM yang dicari, ambil datanya
            $peminjamans = \App\Models\PeminjamanLab::with(['detailAlat', 'detailBahan'])
                            ->where('nim', $nim)
                            ->orderBy('created_at', 'desc')
                            ->get();
        }

        return view('laboratorium.cek_status', compact('peminjamans', 'nim'));
    }
}
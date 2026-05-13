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
    public function formPinjam() {
        return view('laboratorium.pinjam');
    }

    public function store(Request $request)
    {
        // Menggunakan try-catch dan DB Transaction agar jika ada error di detail alat, 
        // data peminjaman utama akan otomatis dibatalkan (rollback)
        try {
            DB::beginTransaction();

            // 1. Simpan Data Peminjaman Utama
            $peminjaman = PeminjamanLab::create([
                'jenis_form'       => $request->jenis_form,
                'judul_penelitian' => $request->judul_penelitian,
                'laboratorium'     => $request->laboratorium,
                'nama_peminjam'    => $request->nama_peminjam,
                'nim'              => $request->nim,
                'prodi'            => $request->prodi,
                'status'           => 'Pending',
            ]);

            // 2. Simpan Data Detail Alat / Bahan
            // Pastikan form mengirimkan array 'items'
            if ($request->has('items')) {
                foreach ($request->items as $item) {
                    if ($request->jenis_form == 'Alat') {
                        DetailAlat::create([
                            'peminjaman_lab_id' => $peminjaman->id,
                            'nama_alat'         => $item['nama'],
                            'jumlah'            => $item['jumlah'],
                            'ukuran'            => $item['ukuran'] ?? null,
                        ]);
                    } else {
                        DetailBahan::create([
                            'peminjaman_lab_id' => $peminjaman->id,
                            'nama_bahan'        => $item['nama'],
                            'jumlah'            => $item['jumlah'],
                        ]);
                    }
                }
            }

            // 3. Konfirmasi Penyimpanan Berhasil
            DB::commit();
            return redirect()->back()->with('success', 'Permohonan peminjaman beserta detail alat/bahan berhasil dikirim!');

        } catch (\Exception $e) {
            // Jika terjadi error, batalkan semua proses penyimpanan
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
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

        $peminjaman = PeminjamanLab::findOrFail($id);
        
        $peminjaman->status = $request->status;
        $peminjaman->catatan_admin = $request->catatan_admin;
        
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui!');
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
}
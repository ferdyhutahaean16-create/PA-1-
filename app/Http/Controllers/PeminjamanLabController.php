<?php

namespace App\Http\Controllers; // Pastikan namespace ini benar

use App\Models\PeminjamanLab;
use App\Models\DetailAlat;
use App\Models\DetailBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanLabController extends Controller // Nama class harus sama dengan nama file
{
    public function formAlat() {
        return view('laboratorium.pinjam_alat');
    }

    public function formBahan() {
        return view('laboratorium.pinjam_bahan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_form' => 'required',
            'judul_penelitian' => 'required|string',
            'laboratorium' => 'required',
            'nama_peminjam' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'items' => 'required|array|min:1',
        ]);

        try {
            DB::beginTransaction();

            $peminjaman = PeminjamanLab::create([
                'jenis_form' => $request->jenis_form,
                'judul_penelitian' => $request->judul_penelitian,
                'laboratorium' => $request->laboratorium,
                'nama_peminjam' => $request->nama_peminjam,
                'nim' => $request->nim,
                'prodi' => $request->prodi,
                'status' => 'Pending',
            ]);

            foreach ($request->items as $item) {
                if ($request->jenis_form == 'Alat') {
                    DetailAlat::create([
                        'peminjaman_lab_id' => $peminjaman->id,
                        'nama_alat' => $item['nama'],
                        'jumlah' => $item['jumlah'],
                        'ukuran' => $item['ukuran'] ?? null,
                    ]);
                } else {
                    DetailBahan::create([
                        'peminjaman_lab_id' => $peminjaman->id,
                        'nama_bahan' => $item['nama'],
                        'jumlah' => $item['jumlah'],
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Permohonan berhasil dikirim!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
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
}
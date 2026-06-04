<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengajaran; // Pastikan memanggil modelnya

class PengajaranController extends Controller
{
    // Fungsi untuk menambah mata kuliah baru
    public function store(Request $request)
    {
        // 1. Tambahkan validasi untuk semester dan tahun_akademik
        $request->validate([
            'tenaga_pendidik_id' => 'required',
            'mata_kuliah' => 'required|string|max:255',
            'semester' => 'nullable|string|max:50',
            'tahun_akademik' => 'nullable|string|max:50',
        ]);

        // 2. Simpan ke database dengan pengaman ganda
        Pengajaran::create([
            'tenaga_pendidik_id' => $request->tenaga_pendidik_id,
            'mata_kuliah' => $request->mata_kuliah,
            'semester' => $request->semester ?? '-', 
            'tahun_akademik' => $request->tahun_akademik ?? '-', 
        ]);

        return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    // Fungsi untuk menghapus mata kuliah
    public function destroy($id)
    {
        $pengajaran = Pengajaran::findOrFail($id);
        $pengajaran->delete();

        return redirect()->back()->with('success', 'Mata kuliah berhasil dihapus!');
    }
}
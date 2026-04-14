<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RuangKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RuangKelasController extends Controller
{
    public function index()
    {
        $ruang_kelas = RuangKelas::orderBy('nama_ruangan', 'asc')->get();
        return view('admin.ruang_kelas.index', compact('ruang_kelas'));
    }

    public function create()
    {
        return view('admin.ruang_kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan'       => 'required|string|max:255',
            'kapasitas'          => 'nullable|integer|min:1',
            'fasilitas_pendukung'=> 'nullable|string|max:255',
            'deskripsi'          => 'nullable|string',
            'hari_akademik'      => 'nullable|string|max:255',
            'jam_akademik'       => 'nullable|string|max:100',
            'jam_kolaboratif'    => 'nullable|string|max:100',
            'foto'               => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_4'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['foto', 'foto_2', 'foto_3', 'foto_4']);

        // Handle semua foto
        foreach (['foto', 'foto_2', 'foto_3', 'foto_4'] as $fotoKey) {
            if ($request->hasFile($fotoKey)) {
                $file      = $request->file($fotoKey);
                $nama_file = time() . "_" . $fotoKey . "_" . $file->getClientOriginalName();
                $file->move(public_path('uploads/ruang_kelas'), $nama_file);
                $data[$fotoKey] = 'uploads/ruang_kelas/' . $nama_file;
            }
        }

        RuangKelas::create($data);
        return redirect()->route('ruang-kelas.index')->with('success', 'Data ruang kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ruangKelas = RuangKelas::findOrFail($id);
        return view('admin.ruang_kelas.edit', compact('ruangKelas'));
    }

    public function update(Request $request, $id)
    {
        $ruangKelas = RuangKelas::findOrFail($id);

        $request->validate([
            'nama_ruangan'       => 'required|string|max:255',
            'kapasitas'          => 'nullable|integer|min:1',
            'fasilitas_pendukung'=> 'nullable|string|max:255',
            'deskripsi'          => 'nullable|string',
            'hari_akademik'      => 'nullable|string|max:255',
            'jam_akademik'       => 'nullable|string|max:100',
            'jam_kolaboratif'    => 'nullable|string|max:100',
            'foto'               => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_4'             => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['foto', 'foto_2', 'foto_3', 'foto_4']);

        // Handle semua foto
        foreach (['foto', 'foto_2', 'foto_3', 'foto_4'] as $fotoKey) {
            if ($request->hasFile($fotoKey)) {
                // Hapus foto lama
                if ($ruangKelas->$fotoKey && File::exists(public_path($ruangKelas->$fotoKey))) {
                    File::delete(public_path($ruangKelas->$fotoKey));
                }
                $file      = $request->file($fotoKey);
                $nama_file = time() . "_" . $fotoKey . "_" . $file->getClientOriginalName();
                $file->move(public_path('uploads/ruang_kelas'), $nama_file);
                $data[$fotoKey] = 'uploads/ruang_kelas/' . $nama_file;
            }
        }

        $ruangKelas->update($data);
        return redirect()->route('ruang-kelas.index')->with('success', 'Data ruang kelas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ruangKelas = RuangKelas::findOrFail($id);

        // Hapus semua foto
        foreach (['foto', 'foto_2', 'foto_3', 'foto_4'] as $fotoKey) {
            if ($ruangKelas->$fotoKey && File::exists(public_path($ruangKelas->$fotoKey))) {
                File::delete(public_path($ruangKelas->$fotoKey));
            }
        }

        $ruangKelas->delete();
        return redirect()->route('ruang-kelas.index')->with('success', 'Data ruang kelas berhasil dihapus!');
    }

    // Fungsi untuk mencetak Bon Peminjaman
    public function cetakBon($id)
    {
        // Ambil data peminjaman beserta detailnya
        $peminjaman = PeminjamanLab::with(['detailAlat', 'detailBahan'])->findOrFail($id);
        
        return view('admin.peminjaman.cetak', compact('peminjaman'));
    }
}
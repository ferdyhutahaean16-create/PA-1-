<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrestasiController extends Controller
{
    public function index()
    {
        // Mengambil semua data prestasi, diurutkan dari tahun terbaru
        $prestasi = Prestasi::orderBy('tahun', 'desc')->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:Dosen,Mahasiswa',
            'nama_peraih' => 'required|string|max:255',
            'judul_prestasi' => 'required|string|max:255',
            'tingkat' => 'nullable|string|max:100',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Upload Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/prestasi';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        Prestasi::create($data);
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'kategori' => 'required|in:Dosen,Mahasiswa',
            'nama_peraih' => 'required|string|max:255',
            'judul_prestasi' => 'required|string|max:255',
            'tingkat' => 'nullable|string|max:100',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Update Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($prestasi->foto && File::exists(public_path($prestasi->foto))) {
                File::delete(public_path($prestasi->foto));
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/prestasi';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        $prestasi->update($data);
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        // Hapus file foto dari folder
        if ($prestasi->foto && File::exists(public_path($prestasi->foto))) {
            File::delete(public_path($prestasi->foto));
        }

        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KegiatanController extends Controller
{
    public function index()
    {
        // Mengambil semua data kegiatan terbaru
        $kegiatan = Kegiatan::orderBy('created_at', 'desc')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'pelaksana' => 'required|string|max:255',
            'waktu_pelaksanaan' => 'required|string|max:100',
            'tempat' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Upload Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/kegiatan';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        Kegiatan::create($data);
        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'kategori' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'pelaksana' => 'required|string|max:255',
            'waktu_pelaksanaan' => 'required|string|max:100',
            'tempat' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Update Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kegiatan->foto && File::exists(public_path($kegiatan->foto))) {
                File::delete(public_path($kegiatan->foto));
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/kegiatan';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        $kegiatan->update($data);
        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        // Hapus file foto dari folder
        if ($kegiatan->foto && File::exists(public_path($kegiatan->foto))) {
            File::delete(public_path($kegiatan->foto));
        }

        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus!');
    }
}
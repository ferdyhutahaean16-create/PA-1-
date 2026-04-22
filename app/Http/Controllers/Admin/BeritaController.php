<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    public function index()
    {
        // Menampilkan berita dari yang paling baru
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['_token']);
        $data['views'] = rand(10, 100); // Memberi angka view acak untuk awal mula

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . '_berita_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $nama_file);
            $data['foto'] = 'uploads/berita/' . $nama_file;
        }

        Berita::create($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($berita->foto && File::exists(public_path($berita->foto))) {
                File::delete(public_path($berita->foto));
            }
            
            // Upload foto baru
            $file = $request->file('foto');
            $nama_file = time() . '_berita_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $nama_file);
            $data['foto'] = 'uploads/berita/' . $nama_file;
        }

        $berita->update($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus file fisik foto
        if ($berita->foto && File::exists(public_path($berita->foto))) {
            File::delete(public_path($berita->foto));
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
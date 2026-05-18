<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publikasi;
use App\Models\TenagaPendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::orderBy('created_at', 'desc')->get();
        return view('admin.publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        // 1. Ambil semua data tenaga pendidik/dosen dari database
        $tenaga_pendidiks = TenagaPendidik::orderBy('nama', 'asc')->get();
        
        // 2. Kirim variabel $tenaga_pendidiks ke dalam view menggunakan compact
        return view('admin.publikasi.create', compact('tenaga_pendidiks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:Dosen,Mahasiswa',
            'judul' => 'required|string|max:255',
            'tanggal_publikasi' => 'required|string|max:100',
            'tipe_publikasi' => 'nullable|string|max:100',
            'link_download' => 'nullable|url',
            'link_view' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'penulis' => 'required_if:kategori,Mahasiswa',
            'tenaga_pendidik_id' => 'required_if:kategori,Dosen',
        ]);

        $data = $request->all();

        if ($request->kategori == 'Dosen') {
            $dosen = \App\Models\TenagaPendidik::findOrFail($request->tenaga_pendidik_id);
            $data['penulis'] = $dosen->nama; 
        }

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'uploads/publikasi'; 
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $data['gambar'] = $tujuan_upload . '/' . $nama_foto;
        }

        \App\Models\Publikasi::create($data);
        return redirect()->route('publikasi.index')->with('success', 'Data Publikasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $publikasi = Publikasi::findOrFail($id);
        
        // Lakukan hal yang sama untuk form edit
        $tenaga_pendidik = TenagaPendidik::orderBy('nama', 'asc')->get();
        
        return view('admin.publikasi.edit', compact('publikasi', 'tenaga_pendidik'));
    }

    public function update(Request $request, $id)
    {
        $publikasi = Publikasi::findOrFail($id);

        $request->validate([
            'kategori' => 'required|in:Dosen,Mahasiswa',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tanggal_publikasi' => 'required|string|max:100',
            'tipe_publikasi' => 'nullable|string|max:100',
            'link_download' => 'nullable|url',
            'link_view' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($publikasi->gambar && File::exists(public_path($publikasi->gambar))) {
                File::delete(public_path($publikasi->gambar));
            }
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/publikasi';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['gambar'] = $tujuan_upload . '/' . $nama_file;
        }

        $publikasi->update($data);
        return redirect()->route('publikasi.index')->with('success', 'Data publikasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $publikasi = Publikasi::findOrFail($id);
        if ($publikasi->gambar && File::exists(public_path($publikasi->gambar))) {
            File::delete(public_path($publikasi->gambar));
        }
        $publikasi->delete();
        return redirect()->route('publikasi.index')->with('success', 'Data Publikasi berhasil ditambahkan!');
    }
}
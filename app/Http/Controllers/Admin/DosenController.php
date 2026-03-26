<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // Menampilkan daftar Dosen (Read)
    public function index()
    {
        $dosens = Dosen::latest()->get();
        return view('admin.dosen.index', compact('dosens'));
    }

    // Menampilkan form tambah Dosen (Create)
    public function create()
    {
        return view('admin.dosen.create');
    }

    // Menyimpan data Dosen baru ke database (Store)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosens',
            'lulusan' => 'required',
            'jabatan' => 'required',
            'pengampu_matkul' => 'required',
            'email' => 'required|email',
            'ruangan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // PROSES UPLOAD FOTO
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            // Membuat nama file unik (timestamp + nama asli)
            $filename = time() . '_' . $file->getClientOriginalName();
            // Menyimpan file ke folder 'public/images/dosen'
            $file->move(public_path('images/dosen'), $filename);
            // Menyimpan path file ke array data
            $data['foto'] = 'images/dosen/' . $filename;
        }

        Dosen::create($data);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan!');
    }

    // Menampilkan form edit Dosen (Edit)
    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    // Menyimpan update data Dosen (Update)
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            'lulusan' => 'required',
            'jabatan' => 'required',
            'pengampu_matkul' => 'required',
            'email' => 'required|email',
            'ruangan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // PROSES UPLOAD FOTO BARU
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($dosen->foto && file_exists(public_path($dosen->foto))) {
                unlink(public_path($dosen->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/dosen'), $filename);
            $data['foto'] = 'images/dosen/' . $filename;
        } else {
            // Jika tidak upload foto baru, gunakan foto lama
            $data['foto'] = $dosen->foto;
        }

        $dosen->update($data);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil diupdate!');
    }

    // Menghapus data Dosen (Delete)
    public function destroy(Dosen $dosen)
    {
        // Hapus file foto jika ada
        if ($dosen->foto && file_exists(public_path($dosen->foto))) {
            unlink(public_path($dosen->foto));
        }

        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus!');
    }
}
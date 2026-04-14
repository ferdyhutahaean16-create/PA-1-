<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StrukturOrganisasiController extends Controller
{
    // 1. Menampilkan daftar anggota struktur
    public function index()
    {
        // Mengambil data dan diurutkan berdasarkan level (Pimpinan di atas)
        $struktur = StrukturOrganisasi::orderBy('level', 'asc')->get();
        return view('admin.struktur_organisasi.index', compact('struktur'));
    }

    // 2. Form tambah data
    public function create()
    {
        return view('admin.struktur_organisasi.create');
    }

    // 3. Menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'level' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Upload Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/struktur';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        StrukturOrganisasi::create($data);

        return redirect()->route('struktur-organisasi.index')->with('success', 'Anggota struktur berhasil ditambahkan!');
    }

    // 4. Form edit data
    public function edit($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        return view('admin.struktur_organisasi.edit', compact('struktur'));
    }

    // 5. Update data di database
    public function update(Request $request, $id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'level' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Update Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($struktur->foto && File::exists(public_path($struktur->foto))) {
                File::delete(public_path($struktur->foto));
            }

            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/struktur';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['foto'] = $tujuan_upload . '/' . $nama_file;
        }

        $struktur->update($data);

        return redirect()->route('struktur-organisasi.index')->with('success', 'Anggota struktur berhasil diperbarui!');
    }

    // 6. Menghapus data
    public function destroy($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        // Hapus file foto dari folder
        if ($struktur->foto && File::exists(public_path($struktur->foto))) {
            File::delete(public_path($struktur->foto));
        }

        $struktur->delete();

        return redirect()->route('struktur-organisasi.index')->with('success', 'Anggota struktur berhasil dihapus!');
    }
}
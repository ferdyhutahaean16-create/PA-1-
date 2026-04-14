<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TenagaPendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TenagaPendidikController extends Controller
{
    // 1. Menampilkan Tabel Data
    public function index()
    {
        $tenaga_pendidiks = TenagaPendidik::all();
        return view('admin.tenaga_pendidik.index', compact('tenaga_pendidiks'));
    }

    // 2. Menampilkan Form Tambah Data
    public function create()
    {
        return view('admin.tenaga_pendidik.create');
    }

    // 3. Menyimpan Data Baru ke Database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'lulusan' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email',
            'no_telpon' => 'nullable',
            'ruangan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = $request->all();

        // INI DIA SOLUSI ERROR DATABASE-NYA:
        // Kita paksa isi kolom pengampu_matkul dengan tanda strip
        $data['pengampu_matkul'] = '-';

        // Proses Upload Foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'uploads/foto_pendidik'; 
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $data['foto'] = $tujuan_upload . '/' . $nama_foto;
        }

        // Simpan ke database
        TenagaPendidik::create($data);

        return redirect()->route('tenaga-pendidik.index')->with('success', 'Data Tenaga Pendidik berhasil ditambahkan!');
    }

    // 4. Menampilkan Form Edit
    public function edit($id)
    {
        $tenaga_pendidik = TenagaPendidik::findOrFail($id);
        return view('admin.tenaga_pendidik.edit', compact('tenaga_pendidik'));
    }

    // 5. Menyimpan Perubahan Data (Update)
    public function update(Request $request, $id)
    {
        $tenaga_pendidik = TenagaPendidik::findOrFail($id);

        $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'lulusan' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email',
            'no_telpon' => 'nullable',
            'ruangan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // INI DIA SOLUSI ERROR DATABASE-NYA:
        $data['pengampu_matkul'] = '-';

        // Jika user upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($tenaga_pendidik->foto && File::exists(public_path($tenaga_pendidik->foto))) {
                File::delete(public_path($tenaga_pendidik->foto));
            }

            // Upload foto baru
            $foto = $request->file('foto');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'uploads/foto_pendidik';
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $data['foto'] = $tujuan_upload . '/' . $nama_foto;
        }

        $tenaga_pendidik->update($data);

        return redirect()->route('tenaga-pendidik.index')->with('success', 'Data Tenaga Pendidik berhasil diupdate!');
    }

    // 6. Menghapus Data
    public function destroy($id)
    {
        $tenaga_pendidik = TenagaPendidik::findOrFail($id);

        // Hapus file foto dari folder jika ada
        if ($tenaga_pendidik->foto && File::exists(public_path($tenaga_pendidik->foto))) {
            File::delete(public_path($tenaga_pendidik->foto));
        }

        $tenaga_pendidik->delete();

        return redirect()->route('tenaga-pendidik.index')->with('success', 'Data Tenaga Pendidik berhasil dihapus!');
    }
}
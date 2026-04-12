<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        return view('admin.profil.index', compact('profils'));
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
            'prospek_karir' => 'required',
            'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Upload Foto Struktur Organisasi
        if ($request->hasFile('struktur_organisasi')) {
            $foto = $request->file('struktur_organisasi');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'uploads/profil'; 
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $data['struktur_organisasi'] = $tujuan_upload . '/' . $nama_foto;
        }

        Profil::create($data);

        return redirect()->route('profil.index')->with('success', 'Data Profil Institusi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

        $request->validate([
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
            'prospek_karir' => 'required',
            'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Update Foto
        if ($request->hasFile('struktur_organisasi')) {
            // Hapus foto lama
            if ($profil->struktur_organisasi && File::exists(public_path($profil->struktur_organisasi))) {
                File::delete(public_path($profil->struktur_organisasi));
            }

            $foto = $request->file('struktur_organisasi');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'uploads/profil';
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $data['struktur_organisasi'] = $tujuan_upload . '/' . $nama_foto;
        }

        $profil->update($data);

        return redirect()->route('profil.index')->with('success', 'Data Profil Institusi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);

        if ($profil->struktur_organisasi && File::exists(public_path($profil->struktur_organisasi))) {
            File::delete(public_path($profil->struktur_organisasi));
        }

        $profil->delete();

        return redirect()->route('profil.index')->with('success', 'Data Profil berhasil dihapus!');
    }
}
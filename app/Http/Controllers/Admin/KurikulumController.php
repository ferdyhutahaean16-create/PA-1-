<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index()
    {
        $kurikulum = Kurikulum::orderBy('semester', 'asc')->get();
        return view('admin.kurikulum.index', compact('kurikulum'));
    }

    public function create()
    {
        return view('admin.kurikulum.create');
    }

    public function store(Request $request)
{
    // 1. Validasi untuk input berupa Array (tambahkan tanda bintang *)
    $request->validate([
        'semester' => 'required|array',
        'semester.*' => 'required|integer',
        'kode_matkul' => 'required|array',
        'kode_matkul.*' => 'required|string|max:50',
        'nama_matkul' => 'required|array',
        'nama_matkul.*' => 'required|string|max:255',
        'sks' => 'required|array',
        'sks.*' => 'required|integer',
    ]);

    // 2. Lakukan perulangan (Looping) untuk menyimpan setiap baris ke database
    foreach ($request->kode_matkul as $index => $kode) {
        Kurikulum::create([
            'semester' => $request->semester[$index],
            'kode_mk' => $kode,
            'mata_kuliah' => $request->nama_matkul[$index],
            'sks' => $request->sks[$index],
        ]);
    }

    return redirect()->route('kurikulum.index')->with('success', 'Semua Mata Kuliah berhasil ditambahkan!');
}

    public function edit($id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        return view('admin.kurikulum.edit', compact('kurikulum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required|integer',
            'kode_mk' => 'required|string',
            'mata_kuliah' => 'required|string',
            'sks' => 'required|integer',
        ]);

        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum->update($request->all());
        
        return redirect()->route('kurikulum.index')->with('success', 'Data mata kuliah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Kurikulum::findOrFail($id)->delete();
        return redirect()->route('kurikulum.index')->with('success', 'Mata kuliah berhasil dihapus!');
    }
}
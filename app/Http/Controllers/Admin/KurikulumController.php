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
        $request->validate([
            'semester' => 'required|integer',
            'kode_mk' => 'required|string',
            'mata_kuliah' => 'required|string',
            'sks' => 'required|integer',
            // Kategori sudah dihapus dari kewajiban validasi
        ]);

        Kurikulum::create($request->all());
        return redirect()->route('kurikulum.index')->with('success', 'Mata kuliah berhasil ditambahkan!');
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
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LaboratoriumController extends Controller
{
    public function index()
    {
        // 1. Ambil data laboratorium (variabel $labs sesuai dengan yang ada di blade)
        $labs = \App\Models\Laboratorium::all(); 
    
        // 2. Ambil data dokumen RKF (Pastikan variabelnya pakai 's' yaitu $dokumen_rkfs)
        $dokumen_rkfs = \App\Models\DokumenRkf::latest()->get(); 
    
        // 3. Kirim kedua data tersebut ke halaman user
        return view('laboratorium.index', compact('labs', 'dokumen_rkfs'));
    }

    public function create()
    {
        return view('admin.laboratorium.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lab' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // validasi foto lainnya bisa ditambahkan di sini
        ]);

        $data = $request->except(['_token']);

        // Logika cerdas untuk menangani 4 slot foto sekaligus
        $slot_foto = ['foto', 'foto_2', 'foto_3', 'foto_4'];
        
        foreach ($slot_foto as $slot) {
            if ($request->hasFile($slot)) {
                $file = $request->file($slot);
                $nama_file = time() . '_' . $slot . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/laboratorium'), $nama_file);
                $data[$slot] = 'uploads/laboratorium/' . $nama_file;
            }
        }

        Laboratorium::create($data);
        return redirect()->route('laboratorium.index')->with('success', 'Data Laboratorium berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $lab = Laboratorium::findOrFail($id);
        return view('admin.laboratorium.edit', compact('lab'));
    }

    public function update(Request $request, $id)
    {
        $lab = Laboratorium::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        $slot_foto = ['foto', 'foto_2', 'foto_3', 'foto_4'];
        
        foreach ($slot_foto as $slot) {
            if ($request->hasFile($slot)) {
                // Hapus foto lama jika ada
                if ($lab->$slot && File::exists(public_path($lab->$slot))) {
                    File::delete(public_path($lab->$slot));
                }
                
                // Upload foto baru
                $file = $request->file($slot);
                $nama_file = time() . '_' . $slot . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/laboratorium'), $nama_file);
                $data[$slot] = 'uploads/laboratorium/' . $nama_file;
            }
        }

        $lab->update($data);
        return redirect()->route('laboratorium.index')->with('success', 'Data Laboratorium berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $lab = Laboratorium::findOrFail($id);
        
        // Hapus semua 4 file fisik foto saat data dihapus
        $slot_foto = ['foto', 'foto_2', 'foto_3', 'foto_4'];
        foreach ($slot_foto as $slot) {
            if ($lab->$slot && File::exists(public_path($lab->$slot))) {
                File::delete(public_path($lab->$slot));
            }
        }

        $lab->delete();
        return redirect()->route('laboratorium.index')->with('success', 'Data Laboratorium berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // 💡 PENTING: Tambahkan ini untuk menghapus file lama

class FasilitasController extends Controller
{
    public function index()
    {
        $labs = Laboratory::orderBy('created_at', 'desc')->get();
        return view('admin.laboratorium.index', compact('labs'));
    }

    public function create()
    {
        return view('admin.laboratorium.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lab'   => 'required|string|max:255',
            'kepala_lab' => 'nullable|string|max:255',
            'fasilitas'  => 'nullable|string',
            'deskripsi'  => 'nullable|string',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_4'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $lab = new Laboratory(); 
        $lab->name        = $request->nama_lab;
        $lab->head_of_lab = $request->kepala_lab;
        $lab->facilities  = $request->fasilitas;
        $lab->description = $request->deskripsi; // Sudah aktif

        $path = 'uploads/laboratorium';

        // Helper untuk upload file
        if ($request->hasFile('foto')) {
            $lab->image = $this->uploadImage($request->file('foto'), $path, '1');
        }
        if ($request->hasFile('foto_2')) {
            $lab->image_2 = $this->uploadImage($request->file('foto_2'), $path, '2');
        }
        if ($request->hasFile('foto_3')) {
            $lab->image_3 = $this->uploadImage($request->file('foto_3'), $path, '3');
        }
        if ($request->hasFile('foto_4')) {
            $lab->image_4 = $this->uploadImage($request->file('foto_4'), $path, '4');
        }

        $lab->save();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data Laboratorium berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $lab = Laboratory::findOrFail($id);
        return view('admin.laboratorium.edit', compact('lab'));
    }

    public function update(Request $request, $id)
    {
        $lab = Laboratory::findOrFail($id); 

        // Update data teks
        $lab->name        = $request->nama_lab; 
        $lab->head_of_lab = $request->kepala_lab;
        $lab->facilities  = $request->fasilitas;
        $lab->description = $request->deskripsi;

        $path = 'uploads/laboratorium';

        // Update foto: Jika ada foto baru, hapus foto lama
        $fields = ['foto' => 'image', 'foto_2' => 'image_2', 'foto_3' => 'image_3', 'foto_4' => 'image_4'];
        
        foreach ($fields as $inputName => $dbColumn) {
            if ($request->hasFile($inputName)) {
                // Hapus file lama jika ada
                if ($lab->$dbColumn && File::exists(public_path($lab->$dbColumn))) {
                    File::delete(public_path($lab->$dbColumn));
                }
                // Upload file baru
                $lab->$dbColumn = $this->uploadImage($request->file($inputName), $path, str_replace('image', '', $dbColumn) ?: '1');
            }
        }

        $lab->save();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data Laboratorium berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $lab = Laboratory::findOrFail($id);

        // Hapus file fisik dari storage agar tidak menumpuk
        $fields = ['image', 'image_2', 'image_3', 'image_4'];
        foreach ($fields as $field) {
            if ($lab->$field && File::exists(public_path($lab->$field))) {
                File::delete(public_path($lab->$field));
            }
        }

        $lab->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data Laboratorium berhasil dihapus!');
    }

    // Helper method agar kode lebih bersih
    private function uploadImage($file, $path, $suffix)
    {
        $fileName = time() . '_' . $suffix . '.' . $file->extension();
        $file->move(public_path($path), $fileName);
        return $path . '/' . $fileName;
    }
}
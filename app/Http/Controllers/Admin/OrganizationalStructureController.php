<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrganizationalStructureController extends Controller
{
    // 1. Menampilkan daftar anggota struktur
    public function index()
    {
        $structures = OrganizationalStructure::orderBy('level', 'asc')->get();
        // 💡 Pastikan folder view diubah jadi 'organizational_structure'
        return view('admin.organizational_structure.index', compact('structures'));
    }

    // 2. Form tambah data
    public function create()
    {
        return view('admin.organizational_structure.create');
    }

    // 3. Menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'level' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Upload Foto
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $upload_destination = 'uploads/organizational_structure'; // 💡 Folder upload baru
            $file->move(public_path($upload_destination), $file_name);
            $data['photo'] = $upload_destination . '/' . $file_name;
        }

        OrganizationalStructure::create($data);

        return redirect()->route('organizational-structure.index')->with('success', 'Structure member successfully added!');
    }

    // 4. Form edit data
    public function edit($id)
    {
        $structure = OrganizationalStructure::findOrFail($id);
        return view('admin.organizational_structure.edit', compact('structure'));
    }

    // 5. Update data di database
    public function update(Request $request, $id)
    {
        $structure = OrganizationalStructure::findOrFail($id);

        $request->validate([
            'position' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'level' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Update Foto
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($structure->photo && File::exists(public_path($structure->photo))) {
                File::delete(public_path($structure->photo));
            }

            $file = $request->file('photo');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $upload_destination = 'uploads/organizational_structure';
            $file->move(public_path($upload_destination), $file_name);
            $data['photo'] = $upload_destination . '/' . $file_name;
        }

        $structure->update($data);

        return redirect()->route('organizational-structure.index')->with('success', 'Structure member successfully updated!');
    }

    // 6. Menghapus data
    public function destroy($id)
    {
        $structure = OrganizationalStructure::findOrFail($id);

        // Hapus file foto dari folder
        if ($structure->photo && File::exists(public_path($structure->photo))) {
            File::delete(public_path($structure->photo));
        }

        $structure->delete();

        return redirect()->route('organizational-structure.index')->with('success', 'Structure member successfully deleted!');
    }
}
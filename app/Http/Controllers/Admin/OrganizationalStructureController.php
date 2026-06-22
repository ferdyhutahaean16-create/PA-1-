<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrganizationalStructureController extends Controller
{
    public function index()
    {
        $structures = OrganizationalStructure::orderBy('level', 'asc')->get();
        return view('admin.organizational_structure.index', compact('structures'));
    }

    public function create()
    {
        return view('admin.organizational_structure.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'level' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

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

    public function edit($id)
    {
        $structure = OrganizationalStructure::findOrFail($id);
        return view('admin.organizational_structure.edit', compact('structure'));
    }

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

        if ($request->hasFile('photo')) {
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

    public function destroy($id)
    {
        $structure = OrganizationalStructure::findOrFail($id);

        if ($structure->photo && File::exists(public_path($structure->photo))) {
            File::delete(public_path($structure->photo));
        }

        $structure->delete();

        return redirect()->route('organizational-structure.index')->with('success', 'Structure member successfully deleted!');
    }
}
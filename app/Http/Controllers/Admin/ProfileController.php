<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'history' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'goals' => 'nullable', 
            'career_prospects' => 'required',
            'organizational_structure' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Upload Foto
        if ($request->hasFile('organizational_structure')) {
            $photo = $request->file('organizational_structure');
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $upload_destination = 'uploads/profile'; 
            $photo->move(public_path($upload_destination), $photo_name);
            $data['organizational_structure'] = $upload_destination . '/' . $photo_name;
        }

        Profile::create($data);

        return redirect()->route('profile.index')->with('success', 'Institutional Profile data successfully added!');
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'history' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'goals' => 'nullable',
            'career_prospects' => 'required',
            'organizational_structure' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Update Foto
        if ($request->hasFile('organizational_structure')) {
            // Hapus foto lama
            if ($profile->organizational_structure && File::exists(public_path($profile->organizational_structure))) {
                File::delete(public_path($profile->organizational_structure));
            }

            $photo = $request->file('organizational_structure');
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $upload_destination = 'uploads/profile';
            $photo->move(public_path($upload_destination), $photo_name);
            $data['organizational_structure'] = $upload_destination . '/' . $photo_name;
        }

        $profile->update($data);

        return redirect()->route('profile.index')->with('success', 'Institutional Profile data successfully updated!');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);

        if ($profile->organizational_structure && File::exists(public_path($profile->organizational_structure))) {
            File::delete(public_path($profile->organizational_structure));
        }

        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Profile data successfully deleted!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LaboratoryController extends Controller
{
    public function index()
    {
        $laboratories = Laboratory::orderBy('name', 'asc')->get();
        return view('admin.laboratory.index', compact('laboratories'));
    }

    public function create()
    {
        return view('admin.laboratory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'head_of_lab' => 'nullable|string|max:255',
            'facilities'  => 'nullable|string',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_2'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_3'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_4'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except(['image', 'image_2', 'image_3', 'image_4']);
        $upload_path = 'uploads/laboratories';

        foreach (['image', 'image_2', 'image_3', 'image_4'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $file = $request->file($imgField);
                $filename = time() . "_" . $imgField . "_" . $file->getClientOriginalName();
                $file->move(public_path($upload_path), $filename);
                $data[$imgField] = $upload_path . '/' . $filename;
            }
        }

        Laboratory::create($data);
        return redirect()->route('laboratory.index')->with('success', 'Laboratory data successfully added!');
    }

    public function edit($id)
    {
        $laboratory = Laboratory::findOrFail($id);
        return view('admin.laboratory.edit', compact('laboratory'));
    }

    public function update(Request $request, $id)
    {
        $laboratory = Laboratory::findOrFail($id);
        $data = $request->except(['image', 'image_2', 'image_3', 'image_4']);
        $upload_path = 'uploads/laboratories';

        foreach (['image', 'image_2', 'image_3', 'image_4'] as $imgField) {
            if ($request->hasFile($imgField)) {
                if ($laboratory->$imgField && File::exists(public_path($laboratory->$imgField))) {
                    File::delete(public_path($laboratory->$imgField));
                }
                $file = $request->file($imgField);
                $filename = time() . "_" . $imgField . "_" . $file->getClientOriginalName();
                $file->move(public_path($upload_path), $filename);
                $data[$imgField] = $upload_path . '/' . $filename;
            }
        }

        $laboratory->update($data);
        return redirect()->route('laboratory.index')->with('success', 'Laboratory data successfully updated!');
    }

    public function destroy($id)
    {
        $laboratory = Laboratory::findOrFail($id);
        foreach (['image', 'image_2', 'image_3', 'image_4'] as $imgField) {
            if ($laboratory->$imgField && File::exists(public_path($laboratory->$imgField))) {
                File::delete(public_path($laboratory->$imgField));
            }
        }
        $laboratory->delete();
        return redirect()->route('laboratory.index')->with('success', 'Laboratory data successfully deleted!');
    }
}
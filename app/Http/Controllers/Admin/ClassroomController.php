<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::orderBy('name', 'asc')->get();
        return view('admin.classroom.index', compact('classrooms'));
    }

    public function create()
    {
        return view('admin.classroom.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'academic_days' => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/classrooms';
            $file->move(public_path($upload_path), $filename);
            
            $data['image'] = $upload_path . '/' . $filename;
        }

        Classroom::create($data);

        return redirect()->route('classroom.index')->with('success', 'Classroom data successfully added!');
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('admin.classroom.edit', compact('classroom'));
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'academic_days' => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($classroom->image && File::exists(public_path($classroom->image))) {
                File::delete(public_path($classroom->image));
            }

            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/classrooms';
            $file->move(public_path($upload_path), $filename);
            
            $data['image'] = $upload_path . '/' . $filename;
        }

        $classroom->update($data);

        return redirect()->route('classroom.index')->with('success', 'Classroom data successfully updated!');
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);

        if ($classroom->image && File::exists(public_path($classroom->image))) {
            File::delete(public_path($classroom->image));
        }

        $classroom->delete();

        return redirect()->route('classroom.index')->with('success', 'Classroom data successfully deleted!');
    }
}
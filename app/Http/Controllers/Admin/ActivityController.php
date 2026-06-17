<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with('lecturer')->orderBy('execution_time', 'desc')->get();
        return view('admin.activity.index', compact('activities'));
    }

    public function create()
    {
        $lecturers = Lecturer::orderBy('name', 'asc')->get();
        return view('admin.activity.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lecturer_id'    => 'required|exists:lecturers,id',
            'category'       => 'required|string|max:255',
            'title'          => 'required|string|max:255',
            'executor'       => 'required|string|max:255',
            'execution_time' => 'required|string|max:255',
            'location'       => 'nullable|string|max:255',
            'description'    => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/activities';
            $file->move(public_path($upload_path), $filename);
            
            $data['image'] = $upload_path . '/' . $filename;
        }

        Activity::create($data);

        return redirect()->route('activity.index')->with('success', 'Activity data successfully added!');
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        $lecturers = Lecturer::orderBy('name', 'asc')->get();
        return view('admin.activity.edit', compact('activity', 'lecturers'));
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $request->validate([
            'lecturer_id'    => 'required|exists:lecturers,id',
            'category'       => 'required|string|max:255',
            'title'          => 'required|string|max:255',
            'executor'       => 'required|string|max:255',
            'execution_time' => 'required|string|max:255',
            'location'       => 'nullable|string|max:255',
            'description'    => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($activity->image && File::exists(public_path($activity->image))) {
                File::delete(public_path($activity->image));
            }

            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/activities';
            $file->move(public_path($upload_path), $filename);
            
            $data['image'] = $upload_path . '/' . $filename;
        }

        $activity->update($data);

        return redirect()->route('activity.index')->with('success', 'Activity data successfully updated!');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->image && File::exists(public_path($activity->image))) {
            File::delete(public_path($activity->image));
        }

        $activity->delete();

        return redirect()->route('activity.index')->with('success', 'Activity data successfully deleted!');
    }
}
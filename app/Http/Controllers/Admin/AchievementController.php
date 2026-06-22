<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::with('lecturer')->orderBy('date_earned', 'desc')->get();
        return view('admin.achievement.index', compact('achievements'));
    }

    public function create()
    {
        $lecturers = Lecturer::orderBy('name', 'asc')->get();
        return view('admin.achievement.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category'          => 'required|in:Dosen,Mahasiswa',
            'lecturer_id'       => 'required_if:category,Dosen|nullable|exists:lecturers,id',
            'achiever_name'     => 'required_if:category,Mahasiswa|nullable|string|max:255',
            'achievement_name'  => 'required|string|max:255',
            'level'             => 'required|in:Local,Regional,National,International',
            'date_earned'       => 'required|date',
            'organizer'         => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'certificate_file'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['category', 'achievement_name', 'level', 'date_earned', 'organizer', 'description']);

        // Peraih Berdasarkan Kategori
        if ($request->category == 'Dosen') {
            $lecturer = Lecturer::findOrFail($request->lecturer_id);
            $data['achiever_name'] = $lecturer->name;
            $data['lecturer_id']   = $request->lecturer_id;
        } else {
            $data['achiever_name'] = $request->achiever_name;
            $data['lecturer_id']   = null;
        }

        // Proses Unggah File Sertifikat / Foto Bukti
        if ($request->hasFile('certificate_file')) {
            $file = $request->file('certificate_file');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/achievements';
            $file->move(public_path($upload_path), $filename);
            
            $data['certificate_file'] = $upload_path . '/' . $filename;
        }

        // Eksekusi penyimpanan data
        Achievement::create($data);

        return redirect()->route('achievement.index')->with('success', 'Achievement data successfully added!');
    }

    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        $lecturers = Lecturer::orderBy('name', 'asc')->get();
        return view('admin.achievement.edit', compact('achievement', 'lecturers'));
    }

    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);

        $request->validate([
            'category'          => 'required|in:Dosen,Mahasiswa',
            'lecturer_id'       => 'required_if:category,Dosen|nullable|exists:lecturers,id',
            'achiever_name'     => 'required_if:category,Mahasiswa|nullable|string|max:255',
            'achievement_name'  => 'required|string|max:255',
            'level'             => 'required|in:Local,Regional,National,International',
            'date_earned'       => 'required|date',
            'organizer'         => 'nullable|string|max:255',
            'description'       => 'nullable|string',
            'certificate_file'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['category', 'achievement_name', 'level', 'date_earned', 'organizer', 'description']);

        if ($request->category == 'Dosen') {
            $lecturer = Lecturer::findOrFail($request->lecturer_id);
            $data['achiever_name'] = $lecturer->name;
            $data['lecturer_id']   = $request->lecturer_id;
        } else {
            $data['achiever_name'] = $request->achiever_name;
            $data['lecturer_id']   = null;
        }

        //  Dokumen/Foto
        if ($request->hasFile('certificate_file')) {
            if ($achievement->certificate_file && File::exists(public_path($achievement->certificate_file))) {
                File::delete(public_path($achievement->certificate_file));
            }

            $file = $request->file('certificate_file');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/achievements';
            $file->move(public_path($upload_path), $filename);
            
            $data['certificate_file'] = $upload_path . '/' . $filename;
        }

        $achievement->update($data);
        return redirect()->route('achievement.index')->with('success', 'Achievement data successfully updated!');
    }

    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);

        if ($achievement->certificate_file && File::exists(public_path($achievement->certificate_file))) {
            File::delete(public_path($achievement->certificate_file));
        }

        $achievement->delete();
        return redirect()->route('achievement.index')->with('success', 'Achievement data successfully deleted!');
    }
}
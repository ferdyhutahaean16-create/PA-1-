<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum; 
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::orderBy('semester', 'asc')
                                 ->orderBy('course_code', 'asc')
                                 ->get()
                                 ->groupBy('semester');
                                 
        return view('admin.curriculum.index', compact('curriculums'));
    }

    public function create()
    {
        return view('admin.curriculum.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi untuk input berupa Array menggunakan penamaan Inggris baru
        $request->validate([
            'semester' => 'required|array',
            'semester.*' => 'required|integer',
            'course_code' => 'required|array',
            'course_code.*' => 'required|string|max:50',
            'course_name' => 'required|array',
            'course_name.*' => 'required|string|max:255',
            'credits' => 'required|array',
            'credits.*' => 'required|integer',
            'category' => 'required|array',
            'category.*' => 'required|string|in:Mandatory,Elective',
        ]);

        // 2. Looping cerdas untuk menyimpan setiap baris data massal ke database
        foreach ($request->course_code as $index => $code) {
            Curriculum::create([
                'semester' => $request->semester[$index],
                'course_code' => $code,
                'course_name' => $request->course_name[$index],
                'credits' => $request->credits[$index],
                'category' => $request->category[$index] ?? 'Mandatory',
            ]);
        }

        return redirect()->route('curriculum.index')->with('success', 'All courses successfully added!');
    }

    public function edit($id)
    {
        $curriculum = Curriculum::findOrFail($id);
        return view('admin.curriculum.edit', compact('curriculum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required|integer',
            'course_code' => 'required|string|max:50',
            'course_name' => 'required|string|max:255',
            'credits' => 'required|integer',
            'category' => 'required|string|in:Mandatory,Elective',
        ]);

        $curriculum = Curriculum::findOrFail($id);
        $curriculum->update($request->all());
        
        return redirect()->route('curriculum.index')->with('success', 'Course data successfully updated!');
    }

    public function destroy($id)
    {
        Curriculum::findOrFail($id)->delete();
        return redirect()->route('curriculum.index')->with('success', 'Course successfully deleted!');
    }
}
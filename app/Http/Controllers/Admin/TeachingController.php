<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teaching;

class TeachingController extends Controller
{
    // Fungsi untuk menambah mata kuliah baru
    public function store(Request $request)
    {
        // 1. Validasi input dengan nama atribut bahasa Inggris
        $request->validate([
            'lecturer_id'   => 'required',
            'course_name'   => 'required|string|max:255',
            'semester'      => 'nullable|string|max:50',
            'academic_year' => 'nullable|string|max:50',
        ]);

        // 2. Simpan ke database
        Teaching::create([
            'lecturer_id'   => $request->lecturer_id,
            'course_name'   => $request->course_name,
            'semester'      => $request->semester ?? '-', 
            'academic_year' => $request->academic_year ?? '-', 
        ]);

        return redirect()->back()->with('success', 'Teaching data successfully added!');
    }

    // Fungsi untuk menghapus mata kuliah
    public function destroy($id)
    {
        $teaching = Teaching::findOrFail($id);
        $teaching->delete();

        return redirect()->back()->with('success', 'Teaching data successfully deleted!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ResearchController extends Controller
{
    public function index()
    {
        $researches = Research::with('lecturer')->orderBy('year', 'desc')->get();
        return view('admin.research.index', compact('researches'));
    }

    public function create()
    {
        $lecturers = Lecturer::orderBy('name', 'asc')->get();
        return view('admin.research.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lecturer_id'  => 'required|exists:lecturers,id',
            'title'        => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'year'         => 'required|digits:4',
            'author'       => 'required|string|max:255',
            'description'  => 'nullable|string',
            'pdf_file'     => 'nullable|mimes:pdf|max:5120', // Maksimal 5MB
            'journal_link' => 'nullable|url',
        ]);

        $data = $request->except('pdf_file');

        // upload file PDF penelitian
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/research';
            $file->move(public_path($upload_path), $filename);
            
            $data['pdf_file'] = $upload_path . '/' . $filename;
        }

        Research::create($data);

        return redirect()->route('research.index')->with('success', 'Research data successfully added!');
    }

    public function edit($id)
    {
        $research = Research::findOrFail($id);
        $lecturers = Lecturer::orderBy('name', 'asc')->get();
        return view('admin.research.edit', compact('research', 'lecturers'));
    }

    public function update(Request $request, $id)
    {
        $research = Research::findOrFail($id);

        $request->validate([
            'lecturer_id'  => 'required|exists:lecturers,id',
            'title'        => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'year'         => 'required|digits:4',
            'author'       => 'required|string|max:255',
            'description'  => 'nullable|string',
            'pdf_file'     => 'nullable|mimes:pdf|max:5120',
            'journal_link' => 'nullable|url',
        ]);

        $data = $request->except('pdf_file');

        if ($request->hasFile('pdf_file')) {
            if ($research->pdf_file && File::exists(public_path($research->pdf_file))) {
                File::delete(public_path($research->pdf_file));
            }

            $file = $request->file('pdf_file');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/research';
            $file->move(public_path($upload_path), $filename);
            
            $data['pdf_file'] = $upload_path . '/' . $filename;
        }

        $research->update($data);

        return redirect()->route('research.index')->with('success', 'Research data successfully updated!');
    }

    public function destroy($id)
    {
        $research = Research::findOrFail($id);

        if ($research->pdf_file && File::exists(public_path($research->pdf_file))) {
            File::delete(public_path($research->pdf_file));
        }

        $research->delete();

        return redirect()->route('research.index')->with('success', 'Research data successfully deleted!');
    }
}
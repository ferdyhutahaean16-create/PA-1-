<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::with('lecturer')->orderBy('publication_date', 'desc')->get();
        return view('admin.publication.index', compact('publications'));
    }

    public function create()
    {
        $lecturers = Lecturer::orderBy('name', 'asc')->get();
        return view('admin.publication.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lecturer_id'      => 'required|exists:lecturers,id',
            'category'         => 'required|in:Dosen,Mahasiswa',
            'title'            => 'required|string|max:255',
            'author'           => 'required|string|max:255',
            'publication_date' => 'required|string|max:100',
            'publication_type' => 'nullable|string|max:100',
            'download_link'    => 'nullable|url',
            'view_link'        => 'nullable|url',
            'description'      => 'nullable|string',
            'cover_image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('cover_image');

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/publications';
            $file->move(public_path($upload_path), $filename);
            
            $data['cover_image'] = $upload_path . '/' . $filename;
        }

        Publication::create($data);

        return redirect()->route('publication.index')->with('success', 'Publication data successfully added!');
    }

    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        $lecturers = Lecturer::orderBy('name', 'asc')->get();
        return view('admin.publication.edit', compact('publication', 'lecturers'));
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        $request->validate([
            'lecturer_id'      => 'required|exists:lecturers,id',
            'category'         => 'required|in:Dosen,Mahasiswa',
            'title'            => 'required|string|max:255',
            'author'           => 'required|string|max:255',
            'publication_date' => 'required|string|max:100',
            'publication_type' => 'nullable|string|max:100',
            'download_link'    => 'nullable|url',
            'view_link'        => 'nullable|url',
            'description'      => 'nullable|string',
            'cover_image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('cover_image');

        if ($request->hasFile('cover_image')) {
            if ($publication->cover_image && File::exists(public_path($publication->cover_image))) {
                File::delete(public_path($publication->cover_image));
            }

            $file = $request->file('cover_image');
            $filename = time() . "_" . $file->getClientOriginalName();
            $upload_path = 'uploads/publications';
            $file->move(public_path($upload_path), $filename);
            
            $data['cover_image'] = $upload_path . '/' . $filename;
        }

        $publication->update($data);

        return redirect()->route('publication.index')->with('success', 'Publication data successfully updated!');
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);

        if ($publication->cover_image && File::exists(public_path($publication->cover_image))) {
            File::delete(public_path($publication->cover_image));
        }

        $publication->delete();

        return redirect()->route('publication.index')->with('success', 'Publication data successfully deleted!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::orderBy('created_at', 'desc')->get();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            // Membatasi tipe file hanya PDF, Word, dan Excel dengan maksimal ukuran 10MB
            'file_path'   => 'required|mimes:pdf,doc,docx,xls,xlsx|max:10240', 
        ]);

        $data = $request->except(['_token']);

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            // Membersihkan spasi pada nama asli file agar link tidak rusak
            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
            $fileName = time() . '_doc_' . $originalName;
            
            $file->move(public_path('uploads/documents'), $fileName);
            $data['file_path'] = 'uploads/documents/' . $fileName;
        }

        Document::create($data);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diunggah!');
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path'   => 'nullable|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('file_path')) {
            // Hapus dokumen lama sebelum menimpa dengan yang baru
            if ($document->file_path && File::exists(public_path($document->file_path))) {
                File::delete(public_path($document->file_path));
            }

            $file = $request->file('file_path');
            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
            $fileName = time() . '_doc_' . $originalName;
            
            $file->move(public_path('uploads/documents'), $fileName);
            $data['file_path'] = 'uploads/documents/' . $fileName;
        }

        $document->update($data);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        // Hapus file fisik dari server
        if ($document->file_path && File::exists(public_path($document->file_path))) {
            File::delete(public_path($document->file_path));
        }

        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus!');
    }

    public function lihat($id)
    {
        // Ambil data dokumen berdasarkan ID
        $document = \App\Models\Document::findOrFail($id);
        
        // Return ke sebuah halaman View HTML khusus, BUKAN langsung return file
        return view('lihat_dokumen', compact('document'));
    }
}
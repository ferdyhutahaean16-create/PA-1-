<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cooperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CooperationController extends Controller
{
    public function index()
    {
        $cooperations = Cooperation::orderBy('start_date', 'desc')->get();
        return view('admin.cooperation.index', compact('cooperations'));
    }

    public function create()
    {
        return view('admin.cooperation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'partner_name' => 'required|string|max:255',
            'type' => 'required|in:Industri,Pendidikan,Pemerintah',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'document_file' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:5120', // Maks 5MB
        ]);

        $data = $request->except(['_token']);

        // Logika Upload Dokumen
        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $nama_file = time() . '_MoU_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/cooperation'), $nama_file);
            $data['document_file'] = 'uploads/cooperation/' . $nama_file;
        }

        Cooperation::create($data);
        return redirect()->route('cooperation.index')->with('success', 'Data Mitra Kerja Sama berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $cooperation = Cooperation::findOrFail($id);
        return view('admin.cooperation.edit', compact('cooperation'));
    }

    public function update(Request $request, $id)
    {
        $cooperation = Cooperation::findOrFail($id);
        
        $request->validate([
            'partner_name' => 'required|string|max:255',
            'type' => 'required|in:Industri,Pendidikan,Pemerintah',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'document_file' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:5120',
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('document_file')) {
            // Hapus file lama jika ada
            if ($cooperation->document_file && File::exists(public_path($cooperation->document_file))) {
                File::delete(public_path($cooperation->document_file));
            }
            
            // Upload file baru
            $file = $request->file('document_file');
            $nama_file = time() . '_MoU_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/cooperation'), $nama_file);
            $data['document_file'] = 'uploads/cooperation/' . $nama_file;
        }

        $cooperation->update($data);
        return redirect()->route('cooperation.index')->with('success', 'Data Mitra berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $cooperation = Cooperation::findOrFail($id);
        
        // Hapus file fisik
        if ($cooperation->document_file && File::exists(public_path($cooperation->document_file))) {
            File::delete(public_path($cooperation->document_file));
        }

        $cooperation->delete();
        return redirect()->route('cooperation.index')->with('success', 'Data Mitra berhasil dihapus!');
    }
}
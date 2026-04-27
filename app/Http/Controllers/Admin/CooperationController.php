<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cooperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CooperationController extends Controller
{
    // Menampilkan daftar mitra
    public function index()
    {
        $cooperations = Cooperation::orderBy('start_date', 'desc')->get();
        return view('admin.cooperation.index', compact('cooperations'));
    }

    // Menampilkan form tambah mitra
    public function create()
    {
        return view('admin.cooperation.create');
    }

    // Menyimpan data mitra baru
    public function store(Request $request)
    {
        $request->validate([
            'partner_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // Validasi foto logo
            'type' => 'required|in:Industri,Pendidikan,Pemerintah',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'document_file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->except(['_token']);

        // Logika Upload Logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $nama_logo = time() . '_logo_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/cooperation/logo'), $nama_logo);
            $data['logo'] = 'uploads/cooperation/logo/' . $nama_logo;
        }

        // Logika Upload Dokumen MoU
        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $nama_file = time() . '_MoU_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/cooperation/dokumen'), $nama_file);
            $data['document_file'] = 'uploads/cooperation/dokumen/' . $nama_file;
        }

        Cooperation::create($data);
        return redirect()->route('cooperation.index')->with('success', 'Data Mitra berhasil ditambahkan!');
    }

    // Menampilkan form edit mitra (INI FUNGSI YANG HILANG TADI)
    public function edit($id)
    {
        $cooperation = Cooperation::findOrFail($id);
        return view('admin.cooperation.edit', compact('cooperation'));
    }

    // Memperbarui data mitra
    public function update(Request $request, $id)
    {
        $cooperation = Cooperation::findOrFail($id);
        
        $request->validate([
            'partner_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'type' => 'required|in:Industri,Pendidikan,Pemerintah',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'document_file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->except(['_token', '_method']);

        // Update Logo
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($cooperation->logo && File::exists(public_path($cooperation->logo))) {
                File::delete(public_path($cooperation->logo));
            }
            $file = $request->file('logo');
            $nama_logo = time() . '_logo_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/cooperation/logo'), $nama_logo);
            $data['logo'] = 'uploads/cooperation/logo/' . $nama_logo;
        }

        // Update Dokumen
        if ($request->hasFile('document_file')) {
            // Hapus dokumen lama jika ada
            if ($cooperation->document_file && File::exists(public_path($cooperation->document_file))) {
                File::delete(public_path($cooperation->document_file));
            }
            $file = $request->file('document_file');
            $nama_file = time() . '_MoU_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/cooperation/dokumen'), $nama_file);
            $data['document_file'] = 'uploads/cooperation/dokumen/' . $nama_file;
        }

        $cooperation->update($data);
        return redirect()->route('cooperation.index')->with('success', 'Data Mitra berhasil diperbarui!');
    }

    // Menghapus data mitra
    public function destroy($id)
    {
        $cooperation = Cooperation::findOrFail($id);
        
        // Hapus file fisik logo
        if ($cooperation->logo && File::exists(public_path($cooperation->logo))) {
            File::delete(public_path($cooperation->logo));
        }

        // Hapus file fisik dokumen
        if ($cooperation->document_file && File::exists(public_path($cooperation->document_file))) {
            File::delete(public_path($cooperation->document_file));
        }

        $cooperation->delete();
        return redirect()->route('cooperation.index')->with('success', 'Data Mitra berhasil dihapus!');
    }
}
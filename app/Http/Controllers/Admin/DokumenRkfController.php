<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenRkf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DokumenRkfController extends Controller
{
    public function index()
    {
        $dokumens = DokumenRkf::orderBy('created_at', 'desc')->get();
        // Asumsi Anda akan membuat view admin/dokumen_rkf/index.blade.php
        return view('admin.dokumen_rkf.index', compact('dokumens')); 
    }

    public function create()
    {
        return view('admin.dokumen_rkf.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            // Batasi format file (PDF, Word, Excel) maksimal 5MB
            'file_dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120', 
        ]);

        $data = $request->all();

        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            // Bersihkan nama file dari spasi agar URL download tidak rusak
            $nama_file = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
            $tujuan_upload = 'uploads/dokumen_rkf'; 
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['file_dokumen'] = $tujuan_upload . '/' . $nama_file;
        }

        DokumenRkf::create($data);

        return redirect()->route('dokumen-rkf.index')->with('success', 'Dokumen RKF berhasil diunggah!');
    }

    // Fungsi Update dan Edit (Mirip dengan publikasi)
    public function destroy($id)
    {
        $dokumen = DokumenRkf::findOrFail($id);

        // Hapus file fisik dari folder saat data dihapus
        if ($dokumen->file_dokumen && File::exists(public_path($dokumen->file_dokumen))) {
            File::delete(public_path($dokumen->file_dokumen));
        }

        $dokumen->delete();
        return redirect()->route('dokumen-rkf.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
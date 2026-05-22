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
        return view('admin.dokumen_rkf.index', compact('dokumens')); 
    }

    public function create()
    {
        return view('admin.dokumen_rkf.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Keamanan
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120', // Maksimal 5MB
            'deskripsi' => 'nullable|string',
        ]);

        // 2. Ambil Semua Data Inputan
        $data = $request->except(['_token']);

        // 3. Proses Pemindahan File
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/dokumen_rkf';
            
            $file->move(public_path($tujuan_upload), $nama_file);
            
            // KEMBALIKAN NAMA VARIABEL KE 'file_dokumen' SESUAI DATABASE
            $data['file_dokumen'] = $tujuan_upload . '/' . $nama_file;
            
            // Hapus key 'file' bawaan inputan form agar MySQL tidak bingung
            unset($data['file']);
        }

        // 4. Eksekusi Simpan ke Database
        DokumenRkf::create($data);

        return redirect()->route('dokumen-rkf.index')->with('success', 'Dokumen RKF berhasil diunggah dan disimpan!');
    }

    // Fungsi Update dan Edit (Jika Anda menambahkannya nanti, pastikan variabelnya juga pakai 'file')

    public function destroy($id)
    {
        $dokumen = DokumenRkf::findOrFail($id);

        // hapus fisik file
        if ($dokumen->file && File::exists(public_path($dokumen->file_dokumen))) {
            File::delete(public_path($dokumen->file));
        }

        $dokumen->delete();
        return redirect()->route('dokumen-rkf.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
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
    // 1. Validasi Keamanan (Pastikan file yang diunggah benar-benar dokumen)
    $request->validate([
        'judul' => 'required|string|max:255',
        'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        'deskripsi' => 'nullable|string',
    ]);

    // 2. Ambil Semua Data Inputan
    $data = $request->all();

    // 3. Proses Pemindahan File
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        
        // Buat nama file unik agar tidak tertimpa jika ada nama file yang sama
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'uploads/dokumen_rkf';
        
        // Pindahkan file dari memori sementara ke folder public/uploads/dokumen_rkf
        $file->move(public_path($tujuan_upload), $nama_file);
        
        // Masukkan alamat file ke dalam laci variabel 'file_dokumen' untuk database
        $data['file_dokumen'] = $tujuan_upload . '/' . $nama_file;
        
        // Hapus jejak nama 'file' bawaan HTML agar database tidak kebingungan
        unset($data['file']);
    }

    // 4. Eksekusi Simpan ke Database MySQL
    \App\Models\DokumenRkf::create($data);

    // 5. Kembali ke halaman daftar dengan pesan sukses
    // (Pastikan nama route 'dokumen-rkf.index' sesuai dengan yang ada di web.php kamu ya)
    return redirect()->route('dokumen-rkf.index')->with('success', 'Dokumen RKF berhasil diunggah dan disimpan!');
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
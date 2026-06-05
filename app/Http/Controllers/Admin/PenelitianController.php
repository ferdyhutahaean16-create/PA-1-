<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use App\Models\TenagaPendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PenelitianController extends Controller
{
    public function index()
    {
        // Mengambil semua data penelitian beserta data dosennya (Eager Loading)
        $penelitians = Penelitian::with('dosen')->orderBy('tahun', 'desc')->get();
        return view('admin.penelitian.index', compact('penelitians'));
    }

    public function create()
    {
        // Mengambil data dosen untuk dimasukkan ke dropdown pilihan
        $dosens = TenagaPendidik::orderBy('nama', 'asc')->get();
        return view('admin.penelitian.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenaga_pendidik_id' => 'required|exists:tenaga_pendidiks,id',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tahun' => 'required|string|max:4',
            'penulis' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_pdf' => 'nullable|mimes:pdf|max:5120', // Maksimal 5MB
            'link_jurnal' => 'nullable|url'
        ]);

        $data = $request->except(['_token']);

        // Proses unggah file PDF jika ada
        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $nama_file = time() . "_riset_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/penelitian';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['file_pdf'] = $tujuan_upload . '/' . $nama_file;
        }

        Penelitian::create($data);
        return redirect()->route('admin.penelitian.index')->with('success', 'Data Penelitian/Riset berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // 1. Mengambil 1 data spesifik yang akan dimasukkan ke dalam Form Edit
        $penelitian = \App\Models\Penelitian::findOrFail($id);

        // 2. Mengambil SEMUA data rombongan untuk menggambar Tabel di halaman yang sama
        $penelitians = \App\Models\Penelitian::orderBy('tahun', 'desc')->get();

        // 3. Mengirim KEDUA paket data tersebut ke halaman tampilan secara bersamaan
        return view('admin.penelitian.edit', compact('penelitian', 'penelitians'));
    }

    public function update(Request $request, $id)
    {
        $penelitian = Penelitian::findOrFail($id);

        $request->validate([
            'tenaga_pendidik_id' => 'required|exists:tenaga_pendidiks,id',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tahun' => 'required|string|max:4',
            'penulis' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_pdf' => 'nullable|mimes:pdf|max:5120',
            'link_jurnal' => 'nullable|url'
        ]);

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('file_pdf')) {
            // Hapus PDF lama jika ada
            if ($penelitian->file_pdf && File::exists(public_path($penelitian->file_pdf))) {
                File::delete(public_path($penelitian->file_pdf));
            }

            // Unggah PDF baru
            $file = $request->file('file_pdf');
            $nama_file = time() . "_riset_" . $file->getClientOriginalName();
            $tujuan_upload = 'uploads/penelitian';
            $file->move(public_path($tujuan_upload), $nama_file);
            $data['file_pdf'] = $tujuan_upload . '/' . $nama_file;
        }

        $penelitian->update($data);
        return redirect()->route('admin.penelitian.index')->with('success', 'Data Penelitian/Riset berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penelitian = Penelitian::findOrFail($id);

        // Hapus file fisik PDF jika data dihapus
        if ($penelitian->file_pdf && File::exists(public_path($penelitian->file_pdf))) {
            File::delete(public_path($penelitian->file_pdf));
        }

        $penelitian->delete();
        return redirect()->route('admin.penelitian.index')->with('success', 'Data Penelitian berhasil dihapus!');
    }
}
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
            // Tambahkan unique:nama_tabel,kolom
            'partner_name' => 'required|string|max:255|unique:cooperations,partner_name',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // Validasi foto logo
            'type' => 'required|in:Industri,Pendidikan,Pemerintah',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'document_file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ], [
            // Pesan error kustom jika nama mitra sudah ada
            'partner_name.unique' => 'Nama mitra ini sudah terdaftar. Silakan masukkan mitra yang lain.'
        ]);

        $data = $request->except(['_token']);

        //  Upload Logo
        // 1. Bagian Upload Logo (Gunakan ini di fungsi store & update)
        if ($request->hasFile('logo')) {
            // (Khusus di fungsi update, biarkan kode Hapus logo lama tetap ada di atas ini)
            $file = $request->file('logo');
            // Ganti nama file menjadi kebal karakter aneh
            $nama_logo = time() . '_logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/cooperation/logo'), $nama_logo);
            $data['logo'] = 'uploads/cooperation/logo/' . $nama_logo;
        }

        // 2. Bagian Upload Dokumen MoU (Gunakan ini di fungsi store & update)
        if ($request->hasFile('document_file')) {
            // (Khusus di fungsi update, biarkan kode Hapus dokumen lama tetap ada di atas ini)
            $file = $request->file('document_file');
            // Ganti nama file menjadi kebal karakter aneh
            $nama_file = time() . '_MoU_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/cooperation/dokumen'), $nama_file);
            $data['document_file'] = 'uploads/cooperation/dokumen/' . $nama_file;
        }

        Cooperation::create($data);
        return redirect()->route('cooperation.index')->with('success', 'Data Mitra berhasil ditambahkan!');
    }

    // Menampilkan form edit mitra
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
            // Tambahkan unique:nama_tabel,kolom,id_pengecualian agar tidak error dengan namanya sendiri saat diedit
            'partner_name' => 'required|string|max:255|unique:cooperations,partner_name,' . $id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'type' => 'required|in:Industri,Pendidikan,Pemerintah',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'document_file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ], [
            // Pesan error kustom
            'partner_name.unique' => 'Nama mitra ini sudah digunakan oleh instansi lain.'
        ]);

        $data = $request->except(['_token', '_method']);

        // Update Logo
        // 1. Bagian Upload Logo (Gunakan ini di fungsi store & update)
        if ($request->hasFile('logo')) {
            // (Khusus di fungsi update, biarkan kode Hapus logo lama tetap ada di atas ini)
            $file = $request->file('logo');
            // Ganti nama file menjadi kebal karakter aneh
            $nama_logo = time() . '_logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/cooperation/logo'), $nama_logo);
            $data['logo'] = 'uploads/cooperation/logo/' . $nama_logo;
        }

        // 2. Bagian Upload Dokumen MoU (Gunakan ini di fungsi store & update)
        if ($request->hasFile('document_file')) {
            // (Khusus di fungsi update, biarkan kode Hapus dokumen lama tetap ada di atas ini)
            $file = $request->file('document_file');
            // Ganti nama file menjadi kebal karakter aneh
            $nama_file = time() . '_MoU_' . uniqid() . '.' . $file->getClientOriginalExtension();
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
        
        // Hapus logo
        if ($cooperation->logo && File::exists(public_path($cooperation->logo))) {
            File::delete(public_path($cooperation->logo));
        }

        // Hapus dokumen
        if ($cooperation->document_file && File::exists(public_path($cooperation->document_file))) {
            File::delete(public_path($cooperation->document_file));
        }

        $cooperation->delete();
        return redirect()->route('cooperation.index')->with('success', 'Data Mitra berhasil dihapus!');
    }
}
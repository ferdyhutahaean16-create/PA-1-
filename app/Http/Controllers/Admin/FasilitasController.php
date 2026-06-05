<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laboratorium; // 🚨 Memanggil model Anda yang sudah sangat rapi

class FasilitasController extends Controller
{
    /**
     * Menampilkan daftar fasilitas laboratorium khusus di panel Admin.
     */
    public function index()
    {
        // 1. Ubah nama variabel penampung menjadi $labs
        $labs = Laboratorium::orderBy('created_at', 'desc')->get();
        
        // 2. Sesuaikan nama yang dikirim di dalam compact() menjadi 'labs'
        return view('admin.laboratorium.index', compact('labs'));
    }

    public function create()
    {
        // 🚨 UBAH DI SINI: Arahkan ke folder 'laboratorium' milik Anda
        return view('admin.laboratorium.create');
    }

    /**
     * Menyimpan data laboratorium baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi keamanan data (Satpam Pintu Masuk)
        $request->validate([
            'nama_lab' => 'required|string|max:255',
            'kepala_lab' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            // Validasi file gambar (Maksimal 2MB per foto)
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Siapkan keranjang kosong untuk data baru
        $lab = new Laboratorium();
        $lab->nama_lab = $request->nama_lab;
        $lab->kepala_lab = $request->kepala_lab;
        $lab->fasilitas = $request->fasilitas;
        $lab->deskripsi = $request->deskripsi;

        // 3. Logika Cerdas Upload Foto (Anti-Gagal)
        // Kita menggunakan public_path agar foto langsung masuk ke folder public/uploads/laboratorium
        $destinationPath = public_path('uploads/laboratorium');

        if ($request->hasFile('foto')) {
            $fileName = time() . '_1.' . $request->foto->extension();
            $request->foto->move($destinationPath, $fileName);
            $lab->foto = 'uploads/laboratorium/' . $fileName;
        }
        if ($request->hasFile('foto_2')) {
            $fileName = time() . '_2.' . $request->foto_2->extension();
            $request->foto_2->move($destinationPath, $fileName);
            $lab->foto_2 = 'uploads/laboratorium/' . $fileName;
        }
        if ($request->hasFile('foto_3')) {
            $fileName = time() . '_3.' . $request->foto_3->extension();
            $request->foto_3->move($destinationPath, $fileName);
            $lab->foto_3 = 'uploads/laboratorium/' . $fileName;
        }
        if ($request->hasFile('foto_4')) {
            $fileName = time() . '_4.' . $request->foto_4->extension();
            $request->foto_4->move($destinationPath, $fileName);
            $lab->foto_4 = 'uploads/laboratorium/' . $fileName;
        }

        // 4. Simpan ke database
        $lab->save();

        // 5. Kembalikan ke halaman daftar dengan pesan sukses
        return redirect()->route('admin.fasilitas.index')->with('success', 'Data Laboratorium berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $lab = Laboratorium::findOrFail($id);
        // Memanggil file edit.blade.php di dalam folder laboratorium Anda
        return view('admin.laboratorium.edit', compact('lab'));
    }

    /**
     * Menyimpan perubahan data laboratorium.
     */
    public function update(Request $request, $id)
    {
        // Ruangan ini sudah siap, Anda bisa mengisi logika updatenya nanti
        // mirip dengan logika store() yang sudah kita buat.
    }

    /**
     * Menghapus data laboratorium dari database.
     */
    public function destroy($id)
    {
        $lab = Laboratorium::findOrFail($id);
        $lab->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Data Laboratorium berhasil dihapus!');
    }
}
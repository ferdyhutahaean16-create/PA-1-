<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventarisLab;
use Illuminate\Http\Request;

class InventarisLabController extends Controller
{
    public function index()
    {
        $inventaris = InventarisLab::orderBy('created_at', 'desc')->get();
        return view('admin.inventaris_lab.index', compact('inventaris'));
    }

    public function create()
    {
        return view('admin.inventaris_lab.create');
    }

    public function store(Request $request)
    {
        // Validasi yang sangat simpel karena tidak ada kerumitan upload file
        $request->validate([
            'kategori' => 'required|in:Alat,Bahan,Instrumen Aset Lab',
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'nullable|string|max:255',
            'letak_lab' => 'nullable|string|max:255',
        ]);

        InventarisLab::create($request->all());

        return redirect()->route('inventaris-lab.index')->with('success', 'Data inventaris lab berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        // 1. Cari data inventaris berdasarkan ID yang dikirim oleh tombol hapus
        $inventaris = \App\Models\InventarisLab::findOrFail($id);
        
        // 2. Eksekusi perintah hapus
        $inventaris->delete();

        // 3. Kembalikan user ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data inventaris berhasil dihapus dari sistem!');
    }

    // 1. Fungsi untuk menampilkan halaman form Edit
    public function edit($id)
    {
        $barang = \App\Models\InventarisLab::findOrFail($id);
        
        // Memanggil file edit.blade.php yang baru saja kita buat
        // (Pastikan struktur foldernya sesuai, misalnya resources/views/admin/inventaris/edit.blade.php)
        return view('admin.inventaris_lab.edit', compact('barang'));
    }

    // 2. Fungsi untuk menyimpan perubahan ke database
    public function update(\Illuminate\Http\Request $request, $id)
    {
        // Validasi keamanan input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|in:Alat,Bahan,Instrumen,Instrumen Aset Lab',
            'jumlah' => 'required|string', 
            'kedaluarsa' => 'nullable|date' 
        ]);

        $barang = \App\Models\InventarisLab::findOrFail($id);
        
        // Proses pembaruan data
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori = $request->kategori;
        $barang->jumlah = $request->jumlah; // Update stok baru
        
        // Logika Cerdas: Simpan kedaluarsa hanya jika kategorinya Bahan
        if ($request->kategori === 'Bahan') {
            $barang->kedaluarsa = $request->kedaluarsa; 
        } else {
            $barang->kedaluarsa = null; // Bersihkan data jika diubah menjadi Alat
        }

        $barang->save();

        // Mengembalikan ke halaman daftar dengan pesan sukses
        return redirect()->route('inventaris-lab.index')->with('success', 'Data inventaris dan masa kedaluarsa berhasil diperbarui!');
    }
}
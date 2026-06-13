<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kegiatan; // 💡 TAMBAHAN: Panggil model Kegiatan agar datanya bisa ditarik
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    // =====================================================================
    // BAGIAN 1: FUNGSI UNTUK HALAMAN PUBLIK (PENGUNJUNG WEBSITE)
    // =====================================================================
    
    public function indexPublik()
    {
        // 1. Ambil semua data berita (urutkan dari yang terbaru)
        $berita = Berita::orderBy('tanggal', 'desc')->get();
        
        // 2. Ambil semua data kegiatan (urutkan dari yang terbaru)
        // Catatan: Pastikan nama kolom 'waktu_pelaksanaan' sesuai dengan yang ada di tabel Anda
        $kegiatan = Kegiatan::orderBy('waktu_pelaksanaan', 'desc')->get();

        // 3. Kirim kedua data tersebut ke tampilan halaman publik
        // Pastikan Anda menaruh file blade yang saya berikan sebelumnya di resources/views/berita/index.blade.php
        return view('berita.index', compact('berita', 'kegiatan'));
    }

    // =====================================================================
    // FUNGSI UNTUK MEMBACA DETAIL BERITA
    // =====================================================================
    public function bacaPublik($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->increment('views');

        $berita_terbaru = Berita::where('id', '!=', $id)
                                ->orderBy('tanggal', 'desc')
                                ->take(5)
                                ->get();

        // Masuk ke halaman detail utama
        return view('berita.detail', compact('berita', 'berita_terbaru'));
    }

    // =====================================================================
    // FUNGSI UNTUK MEMBACA DETAIL KEGIATAN (DISATUKAN KE DETAIL UTAMA)
    // =====================================================================
    public function bacaKegiatan($id)
    {
        // 1. Ambil data kegiatan aslinya
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        
        // 2. Trik Bungkus Ulang (Mapping) agar sesuai dengan variabel di detail.blade.php
        $berita = new \stdClass();
        $berita->judul = $kegiatan->judul;
        $berita->views = $kegiatan->views ?? 0;
        $berita->tanggal = $kegiatan->waktu_pelaksanaan; // Kolom waktu_pelaksanaan dipetakan ke tanggal
        $berita->foto = $kegiatan->foto;
        
        // Gabungkan info pelaksana dan tempat langsung ke dalam konten teks secara rapi
        $infoTambahan = '';
        if (!empty($kegiatan->pelaksana)) {
            $infoTambahan .= '<p class="text-xs font-bold text-amber-600 uppercase tracking-wider mb-1">Pelaksana: ' . $kegiatan->pelaksana . '</p>';
        }
        if (!empty($kegiatan->tempat)) {
            $infoTambahan .= '<p class="text-xs font-medium text-gray-500 mb-4">Lokasi: ' . $kegiatan->tempat . '</p>';
        }
        
        $berita->konten = $infoTambahan . ($kegiatan->deskripsi ?? $kegiatan->konten ?? '');

        // 3. Ambil rujukan berita terbaru untuk sidebar kiri
        $berita_terbaru = Berita::orderBy('tanggal', 'desc')->take(5)->get();

        // 4. Kirim ke file view 'detail.blade.php' yang SAMA dengan berita!
        return view('berita.detail', compact('berita', 'berita_terbaru'));
    }


    // =====================================================================
    // BAGIAN 2: FUNGSI UNTUK DASHBOARD ADMIN (CRUD)
    // =====================================================================

    public function index()
    {
        // Menampilkan berita dari yang paling baru
        $beritas = Berita::orderBy('tanggal', 'desc')->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = $request->except(['_token']);
        $data['views'] = rand(10, 100);
    
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . '_berita_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $nama_file);
            $data['foto'] = 'uploads/berita/' . $nama_file;
        }
    
        Berita::create($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($berita->foto && File::exists(public_path($berita->foto))) {
                File::delete(public_path($berita->foto));
            }
            
            // Upload foto baru
            $file = $request->file('foto');
            $nama_file = time() . '_berita_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $nama_file);
            $data['foto'] = 'uploads/berita/' . $nama_file;
        }

        $berita->update($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus file fisik foto
        if ($berita->foto && File::exists(public_path($berita->foto))) {
            File::delete(public_path($berita->foto));
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
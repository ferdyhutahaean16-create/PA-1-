<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil berita terbaru dengan pagination (9 per halaman)
        $beritas = Berita::orderBy('tanggal', 'desc')->paginate(9);
        return view('berita.index', compact('beritas'));
    }

    public function bacaBerita($id)
    {
        // 1. Ambil data berita berdasarkan ID yang diklik user
        $berita = Berita::findOrFail($id);

        // 2. Naikkan jumlah tayangan/views secara otomatis
        $berita->increment('views');

        // 3. Ambil 5 berita terbaru untuk dipasang di sidebar kiri (Gambar 2)
        // Kita urutkan berdasarkan tanggal terbaru
        $berita_terbaru = Berita::orderBy('tanggal', 'desc')
                                ->take(5)
                                ->get();

        // 4. Lemparkan ke file view 'show.blade.php' yang ada di folder berita
        return view('berita.show', compact('berita', 'berita_terbaru'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->paginate(9);
        return view('berita.index', compact('beritas'));
    }

    public function bacaBerita($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->increment('views');

        $berita_terbaru = Berita::orderBy('tanggal', 'desc')
                                ->take(5)
                                ->get();

        return view('berita.show', compact('berita', 'berita_terbaru'));
    }
}
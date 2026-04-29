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
}
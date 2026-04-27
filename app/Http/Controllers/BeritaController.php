<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil semua berita dengan pagination (9 berita per halaman)
        $berita = Berita::latest()->limit(3)->get(); // Default menggunakan 'created_at'
        return view('berita.index', compact('beritas'));
    }
}
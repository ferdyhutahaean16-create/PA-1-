<?php

namespace App\Http\Controllers;

use App\Models\Berita; // <-- WAJIB ini

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('berita', compact('beritas'));
    }
}
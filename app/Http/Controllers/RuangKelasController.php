<?php

namespace App\Http\Controllers;

use App\Models\RuangKelas;

class RuangKelasController extends Controller
{
    public function index()
    {
        $ruang_kelas = RuangKelas::orderBy('nama_ruangan', 'asc')->get();
        return view('fasilitas.ruang_kelas', compact('ruang_kelas'));
    }
}
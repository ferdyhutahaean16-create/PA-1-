<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LaboratoriumController;

// HOME
Route::get('/', function () {
    return view('home');
});

// PROFIL
Route::get('/profil', function () {
    return view('profil');
});

// 🔥 BERITA (PAKAI CONTROLLER)
Route::get('/berita', [BeritaController::class, 'index']);

// TENAGA
Route::get('/tenaga', function () {
    return view('tenaga');
});

// PRESTASI
Route::prefix('prestasi')->group(function () {
    Route::get('/dosen', function () {
        return view('prestasi.dosen');
    });
    Route::get('/mahasiswa', function () {
        return view('prestasi.mahasiswa');
    });
});

// KEGIATAN
Route::prefix('kegiatan')->group(function () {
    Route::get('/dosen', function () {
        return view('kegiatan.dosen');
    });
    Route::get('/mahasiswa', function () {
        return view('kegiatan.mahasiswa');
    });
    Route::get('/penelitian', function () {
        return view('kegiatan.penelitian');
    });
});

// FASILITAS
// FASILITAS
Route::prefix('fasilitas')->group(function () {
    Route::get('/ruang-kelas', function () {
        return view('fasilitas.ruang-kelas');
    });

    Route::get('/laboratorium', function () {
        return view('fasilitas.laboratorium');
    });

    // UBAH BAGIAN INI: Arahkan ke Controller, jangan ke function()
    Route::get('/peminjaman', [LaboratoriumController::class, 'peminjaman']);
});
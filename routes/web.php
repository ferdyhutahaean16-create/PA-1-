<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); // Pastikan ini mengarah ke 'home'
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/struktur', function () {
    return view('struktur');
});

Route::get('/dosen', function () {
    return view('dosen');
});

// Route untuk Prestasi
Route::prefix('prestasi')->group(function () {
    Route::get('/dosen', function () {
        return view('prestasi.dosen');
    });
    Route::get('/mahasiswa', function () {
        return view('prestasi.mahasiswa');
    });
});

// Route untuk Menu Kegiatan
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

Route::get('/fasilitas', function () {
    return view('fasilitas');
});

use App\Http\Controllers\LaboratoriumController;

// Route Halaman Laboratorium
Route::get('/laboratorium', [LaboratoriumController::class, 'index']);
Route::get('/laboratorium/{slug}', [LaboratoriumController::class, 'show'])->name('lab.show');
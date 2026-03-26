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

use App\Models\Dosen; // Tambahkan ini di bagian paling atas file jika belum ada

// ROUTE HALAMAN PUBLIK (DOSEN)
Route::get('/dosen', function () {
    // Ambil semua data dosen dari database
    $dosens = Dosen::all(); 
    
    // Kirim data tersebut ke file view dosen.blade.php
    return view('dosen', compact('dosens'));
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

use App\Http\Controllers\Admin\DosenController;

// ROUTE KHUSUS ADMIN PANEL
Route::prefix('admin')->group(function () {
    // Halaman Dashboard Admin
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    // Route CRUD Dosen (Otomatis membuat route index, create, store, edit, update, destroy)
    Route::resource('dosen', DosenController::class);
});
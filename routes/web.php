<?php

use Illuminate\Support\Facades\Route;
use App\Models\Dosen; // Wajib dipanggil untuk mengambil data dari database
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\Admin\DosenController;

Route::get('/', function () {
    return view('home'); 
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/struktur', function () {
    return view('struktur');
});

// =========================================================================
// INI ADALAH KODE YANG BENAR UNTUK MENAMPILKAN TENAGA PENDIDIK KE PENGUNJUNG
// =========================================================================
Route::get('/dosen', function () {
    // 1. Ambil semua data tenaga pendidik dari database
    $dosens = Dosen::all(); 

    // 2. Kirim data tersebut ke halaman depan (view)
    return view('dosen', compact('dosens')); 
});
// =========================================================================

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

// Route Halaman Laboratorium
Route::get('/laboratorium', [LaboratoriumController::class, 'index']);
Route::get('/laboratorium/{slug}', [LaboratoriumController::class, 'show'])->name('lab.show');

// ROUTE KHUSUS ADMIN PANEL
Route::prefix('admin')->group(function () {
    // Halaman Dashboard Admin
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    // Route CRUD Dosen (Otomatis membuat route index, create, store, edit, update, destroy)
    Route::resource('dosen', DosenController::class);
});
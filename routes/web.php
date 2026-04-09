<?php

use Illuminate\Support\Facades\Route;
use App\Models\TenagaPendidik; // Wajib dipanggil agar sistem mengenali data Tenaga Pendidik
use App\Http\Controllers\Admin\TenagaPendidikController;
use App\Http\Controllers\LaboratoriumController;

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
Route::get('/tenaga-pendidik', function () {
    // 1. Ambil semua data menggunakan Model yang baru
    $tenaga_pendidiks = TenagaPendidik::all(); 

    // 2. Kirim data tersebut ke halaman depan (view tenaga_pendidik.blade.php)
    return view('tenaga_pendidik', compact('tenaga_pendidiks')); 
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
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    // Rute CRUD Admin Tenaga Pendidik
    Route::resource('tenaga-pendidik', TenagaPendidikController::class);
});
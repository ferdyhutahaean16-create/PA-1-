<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\KurikulumController;
use App\Models\TenagaPendidik;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\PublikasiController;
use App\Http\Controllers\Admin\TenagaPendidikController;
use App\Http\Controllers\LaboratoriumController;

Route::get('/', function () {
    return view('home'); 
});

Route::get('/profil', function () {
    // 1. Mengambil data profil dari database
    $profil = \App\Models\Profil::first(); 
    
    // 2. Mengirimkan variabel $profil ke halaman view menggunakan compact()
    return view('profil', compact('profil')); 
});

Route::get('/struktur', function () {
    // 1. Mengambil data profil
    $profil = \App\Models\Profil::first(); 
    
    // 2. Mengambil data struktur organisasi dari database
    $struktur = \App\Models\StrukturOrganisasi::orderBy('level', 'asc')->get();
    
    // 3. Mengirim KEDUA data tersebut ke halaman view
    return view('struktur', compact('profil', 'struktur')); 
});

Route::get('/kurikulum', function () {
    // 1. Ambil semua data kurikulum dari database, urutkan dari semester terkecil
    $kurikulum = \App\Models\Kurikulum::orderBy('semester', 'asc')
                                      ->orderBy('mata_kuliah', 'asc')
                                      ->get();
    
    // 2. Trik Cerdas: Kelompokkan data tersebut secara otomatis berdasarkan 'semester'
    $kurikulum_per_semester = $kurikulum->groupBy('semester');

    // 3. Kirim data yang sudah dikelompokkan ke halaman tampilan
    return view('kurikulum', compact('kurikulum_per_semester'));
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
        // Ambil prestasi khusus Dosen
        $prestasi = \App\Models\Prestasi::where('kategori', 'Dosen')->orderBy('tahun', 'desc')->get();
        // Ambil publikasi khusus Dosen
        $publikasi = \App\Models\Publikasi::where('kategori', 'Dosen')->orderBy('created_at', 'desc')->get();
        
        return view('prestasi_dosen', compact('prestasi', 'publikasi'));
    });
    
    Route::get('/mahasiswa', function () {
        $prestasi = \App\Models\Prestasi::where('kategori', 'Mahasiswa')
                                        ->orderBy('tahun', 'desc')
                                        ->get();

        $publikasi = \App\Models\Publikasi::where('kategori', 'Mahasiswa')->orderBy('created_at', 'desc')->get();
    
        return view('prestasi_mahasiswa', compact('prestasi', 'publikasi'));
        
        return view('prestasi_mahasiswa', compact('prestasi'));
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

    // Rute CRUD Admin Profil Institusi
    Route::resource('profil', ProfilController::class);

    Route::resource('struktur-organisasi', StrukturOrganisasiController::class);

    Route::resource('kurikulum', KurikulumController::class);

    Route::resource('prestasi', PrestasiController::class);

    Route::resource('publikasi', PublikasiController::class);
});
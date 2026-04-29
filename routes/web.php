<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Berita;
use App\Models\Cooperation;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\KurikulumController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\PublikasiController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\RuangKelasController as AdminRuangKelasController;
use App\Http\Controllers\Admin\LaboratoriumController as AdminLaboratoriumController;
use App\Http\Controllers\PeminjamanLabController;
use App\Http\Controllers\Admin\TenagaPendidikController;
use App\Http\Controllers\RuangKelasController;       // Controller publik
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\Admin\CooperationController as AdminCooperationController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\CooperationController;
use App\Models\Testimonial;
use App\Http\Controllers\TestimonialController;
use App\Models\TenagaPendidik;


// ==========================================
// RUTE LOGIN & LOGOUT
// ==========================================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =====================
// HALAMAN PUBLIK
// =====================

Route::get('/', function () {
    // 1. Ambil 3 berita terbaru
    $beritas = Berita::orderBy('tanggal', 'desc')->take(3)->get();
    
    // 2. Ambil 6 mitra terbaru
    $mitras = Cooperation::orderBy('start_date', 'desc')->take(6)->get();

    // 3. Ambil 3 testimoni terbaru
    $testimonials = Testimonial::orderBy('created_at', 'desc')->take(3)->get();
    
    // Kirim semua data ke halaman home
    return view('home', compact('beritas', 'mitras', 'testimonials')); 
});

// Rute untuk melihat semua berita
Route::get('/berita-lengkap', [BeritaController::class, 'index'])->name('berita.lengkap');

// Alias used by the nav: `/berita` -> `/berita-lengkap`
Route::get('/berita', function () {
    return redirect('/berita-lengkap');
});

Route::get('/profil', function () {
    $profil = \App\Models\Profil::first();
    return view('profil', compact('profil'));
});

Route::get('/mitra', [CooperationController::class, 'index'])->name('mitra.index');

Route::get('/kisah-alumni', [App\Http\Controllers\TestimonialController::class, 'index'])->name('publik.testimoni');

Route::get('/struktur', function () {
    $profil   = \App\Models\Profil::first();
    $struktur = \App\Models\StrukturOrganisasi::orderBy('level', 'asc')->get();
    return view('struktur', compact('profil', 'struktur'));
});

Route::get('/kurikulum', function () {
    $kurikulum = \App\Models\Kurikulum::orderBy('semester', 'asc')
                                      ->orderBy('mata_kuliah', 'asc')
                                      ->get();
    $kurikulum_per_semester = $kurikulum->groupBy('semester');
    return view('kurikulum', compact('kurikulum_per_semester'));
});

Route::get('/tenaga-pendidik', function () {
    $tenaga_pendidiks = TenagaPendidik::all();
    return view('tenaga_pendidik', compact('tenaga_pendidiks'));
});

// Alias route used by the nav: keep backwards-compatible `/tenaga`
Route::get('/tenaga', function () {
    return redirect('/tenaga-pendidik');
});

// =====================
// PRESTASI
// =====================
Route::prefix('prestasi')->group(function () {
    Route::get('/dosen', function () {
        $prestasi  = \App\Models\Prestasi::where('kategori', 'Dosen')->orderBy('tahun', 'desc')->get();
        $publikasi = \App\Models\Publikasi::where('kategori', 'Dosen')->orderBy('created_at', 'desc')->get();
        return view('prestasi_dosen', compact('prestasi', 'publikasi'));
    });

    Route::get('/mahasiswa', function () {
        $prestasi  = \App\Models\Prestasi::where('kategori', 'Mahasiswa')->orderBy('tahun', 'desc')->get();
        $publikasi = \App\Models\Publikasi::where('kategori', 'Mahasiswa')->orderBy('created_at', 'desc')->get();
        return view('prestasi_mahasiswa', compact('prestasi', 'publikasi'));
    });
});

// =====================
// KEGIATAN
// =====================
Route::prefix('kegiatan')->group(function () {
    Route::get('/dosen', function () {
        $kegiatan = \App\Models\Kegiatan::where('kategori', 'Pengabdian Dosen')->orderBy('created_at', 'desc')->get();
        return view('kegiatan.dosen', compact('kegiatan'));
    });

    Route::get('/mahasiswa', function () {
        $pkm        = \App\Models\Kegiatan::where('kategori', 'PkM Mahasiswa')->orderBy('created_at', 'desc')->get();
        $himpunan   = \App\Models\Kegiatan::where('kategori', 'Himpunan')->orderBy('created_at', 'desc')->get();
        $kaderisasi = \App\Models\Kegiatan::where('kategori', 'Kaderisasi')->orderBy('created_at', 'desc')->get();
        return view('kegiatan.mahasiswa', compact('pkm', 'himpunan', 'kaderisasi'));
    });

    Route::get('/penelitian', function () {
        $penelitian = \App\Models\Kegiatan::where('kategori', 'Penelitian')->orderBy('created_at', 'desc')->get();
        return view('kegiatan.penelitian', compact('penelitian'));
    });
});

// =====================
// FASILITAS (PUBLIK)
// =====================
Route::get('/fasilitas', function () {
    // Ambil data ruang kelas untuk ditampilkan--
    $ruang_kelas = \App\Models\RuangKelas::orderBy('nama_ruangan', 'asc')->get();
    return view('fasilitas', compact('ruang_kelas'));
});

Route::get('/fasilitas/ruang-kelas', [RuangKelasController::class, 'index'])->name('fasilitas.ruang-kelas');
Route::prefix('laboratorium')->group(function () {
    
    // INI DIA PINTU UTAMANYA YANG TERTINGGAL:
    Route::get('/', function () {
        $labs = \App\Models\Laboratorium::orderBy('nama_lab', 'asc')->get();
        return view('laboratorium.index', compact('labs'));
    })->name('lab.index');
    Route::get('/cek-status', [PeminjamanLabController::class, 'cekStatus'])->name('lab.cek-status');
    Route::get('/peminjaman/{id}/cetak', [PeminjamanLabController::class, 'cetakBon'])->name('lab.peminjaman.cetak');

    // Rute form alat & bahan:
    Route::get('/pinjam-alat', [PeminjamanLabController::class, 'formAlat'])->name('lab.pinjam-alat');
    Route::get('/pinjam-bahan', [PeminjamanLabController::class, 'formBahan'])->name('lab.pinjam-bahan');
    Route::post('/pinjam/store', [PeminjamanLabController::class, 'store'])->name('lab.pinjam.store');
});

// =====================
// ADMIN PANEL
// =====================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::resource('tenaga-pendidik', TenagaPendidikController::class);
    Route::resource('profil', ProfilController::class);
    Route::resource('struktur-organisasi', StrukturOrganisasiController::class);
    Route::resource('kurikulum', KurikulumController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('publikasi', PublikasiController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('ruang-kelas', AdminRuangKelasController::class); // pakai alias Admin
    Route::get('/peminjaman', [PeminjamanLabController::class, 'indexAdmin'])->name('admin.peminjaman.index');
    Route::post('/peminjaman/{id}/update', [PeminjamanLabController::class, 'updateStatus'])->name('admin.peminjaman.update');
    // ... (rute admin peminjaman sebelumnya)
    Route::get('/peminjaman/{id}/cetak', [PeminjamanLabController::class, 'cetakBon'])->name('admin.peminjaman.cetak');
    Route::resource('laboratorium', AdminLaboratoriumController::class);
    Route::resource('testimoni', App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('cooperation', AdminCooperationController::class);
    Route::resource('berita', AdminBeritaController::class);
});
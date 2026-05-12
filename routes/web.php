<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Berita;
use App\Models\Cooperation;
use App\Models\Testimonial;
use App\Models\TenagaPendidik;
use App\Models\Profil;
use App\Models\StrukturOrganisasi;
use App\Models\Kurikulum;
use App\Models\Prestasi;
use App\Models\Publikasi;
use App\Models\Kegiatan;
use App\Models\RuangKelas;
use App\Models\Laboratorium;

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\PeminjamanLabController;

// Controller Admin
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\KurikulumController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\PublikasiController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\RuangKelasController as AdminRuangKelasController;
use App\Http\Controllers\Admin\LaboratoriumController as AdminLaboratoriumController;
use App\Http\Controllers\Admin\TenagaPendidikController;
use App\Http\Controllers\Admin\CooperationController as AdminCooperationController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;

// ==========================================
// RUTE LOGIN & LOGOUT
// ==========================================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// HALAMAN PUBLIK (Akses Pengunjung)
// ==========================================

Route::get('/', function () {
    $beritas = Berita::orderBy('tanggal', 'desc')->take(3)->get();
    $mitras = Cooperation::orderBy('start_date', 'desc')->take(6)->get();
    $testimonials = Testimonial::orderBy('created_at', 'desc')->take(3)->get();
    return view('home', compact('beritas', 'mitras', 'testimonials'));
})->name('home');

// Profil & Struktur
Route::get('/profil', function () {
    $profil = Profil::first(); // Mengatasi "Undefined variable $profil"
    return view('profil', compact('profil'));
})->name('profil.publik');

Route::get('/struktur', function () {
    $profil   = Profil::first();
    $struktur = StrukturOrganisasi::orderBy('level', 'asc')->get();
    return view('struktur', compact('profil', 'struktur'));
})->name('struktur.publik');

// Kurikulum
Route::get('/kurikulum', function () {
    $kurikulum = Kurikulum::orderBy('semester', 'asc')
                            ->orderBy('mata_kuliah', 'asc')
                            ->get();
    $kurikulum_per_semester = $kurikulum->groupBy('semester');
    return view('kurikulum', compact('kurikulum_per_semester'));
})->name('kurikulum.publik');

// Tenaga Pendidik
Route::get('/tenaga-pendidik', function () {
    $tenaga_pendidiks = TenagaPendidik::all();
    return view('tenaga_pendidik', compact('tenaga_pendidiks'));
})->name('dosen.publik');

Route::get('/tenaga', function () { return redirect('/tenaga-pendidik'); });

// Berita, Mitra, Testimoni
Route::get('/berita-lengkap', [BeritaController::class, 'index'])->name('berita.lengkap');
Route::get('/berita', function () { return redirect('/berita-lengkap'); });
Route::get('/mitra', [CooperationController::class, 'index'])->name('mitra.index');
Route::get('/kisah-alumni', [TestimonialController::class, 'index'])->name('publik.testimoni');

// Prestasi
Route::prefix('prestasi')->group(function () {
    Route::get('/dosen', function () {
        $prestasi  = Prestasi::where('kategori', 'Dosen')->orderBy('tahun', 'desc')->get();
        $publikasi = Publikasi::where('kategori', 'Dosen')->orderBy('created_at', 'desc')->get();
        return view('prestasi_dosen', compact('prestasi', 'publikasi'));
    })->name('prestasi.dosen');

    Route::get('/mahasiswa', function () {
        $prestasi  = Prestasi::where('kategori', 'Mahasiswa')->orderBy('tahun', 'desc')->get();
        $publikasi = Publikasi::where('kategori', 'Mahasiswa')->orderBy('created_at', 'desc')->get();
        return view('prestasi_mahasiswa', compact('prestasi', 'publikasi'));
    })->name('prestasi.mahasiswa');
});

// Kegiatan
Route::prefix('kegiatan')->group(function () {
    Route::get('/dosen', function () {
        $kegiatan = Kegiatan::where('kategori', 'Pengabdian Dosen')->orderBy('created_at', 'desc')->get();
        return view('kegiatan.dosen', compact('kegiatan'));
    })->name('kegiatan.dosen');

    Route::get('/mahasiswa', function () {
        $pkm        = Kegiatan::where('kategori', 'PkM Mahasiswa')->orderBy('created_at', 'desc')->get();
        $himpunan   = Kegiatan::where('kategori', 'Himpunan')->orderBy('created_at', 'desc')->get();
        $kaderisasi = Kegiatan::where('kategori', 'Kaderisasi')->orderBy('created_at', 'desc')->get();
        return view('kegiatan.mahasiswa', compact('pkm', 'himpunan', 'kaderisasi'));
    })->name('kegiatan.mahasiswa');

    Route::get('/penelitian', function () {
        $penelitian = Kegiatan::where('kategori', 'Penelitian')->orderBy('created_at', 'desc')->get();
        return view('kegiatan.penelitian', compact('penelitian'));
    })->name('kegiatan.penelitian');
});

// Fasilitas & Lab
Route::get('/fasilitas', function () {
    $ruang_kelas = RuangKelas::orderBy('nama_ruangan', 'asc')->get();
    return view('fasilitas', compact('ruang_kelas'));
})->name('fasilitas.index');

Route::get('/fasilitas/ruang-kelas', [RuangKelasController::class, 'index'])->name('fasilitas.ruang-kelas');

// Hapus atau ganti rute /form-alat dan /form-bahan sebelumnya menjadi ini:
Route::prefix('laboratorium')->group(function () {
    // 1 Pintu masuk untuk form gabungan
    Route::get('/pinjam', [PeminjamanLabController::class, 'formPinjam']);
    
    Route::post('/store', [PeminjamanLabController::class, 'store'])->name('laboratorium.store');
    Route::get('/cek-status', [PeminjamanLabController::class, 'cekStatus']);
});

// ==========================================
// ADMIN PANEL (RBAC - Role Based Access Control)
// ==========================================
Route::middleware(['auth'])->prefix('admin')->group(function () {
   
    // 1. DASHBOARD & AKSES BERSAMA (Super Admin & Admin Lab)
    Route::get('/', function () {
        return view('admin.dashboard', [
            'totalDosen' => TenagaPendidik::count(),
            'totalPrestasi' => Prestasi::count(),
            'peminjamanPending' => \DB::table('peminjaman_labs')->where('status', 'pending')->count(),
        ]);
    })->name('admin.dashboard');
   
    Route::get('/peminjaman', [PeminjamanLabController::class, 'indexAdmin'])->name('admin.peminjaman.index');
    Route::post('/peminjaman/{id}/update', [PeminjamanLabController::class, 'updateStatus'])->name('admin.peminjaman.update');
    Route::get('/peminjaman/{id}/cetak', [PeminjamanLabController::class, 'cetakBon'])->name('admin.peminjaman.cetak');
    Route::resource('laboratorium', AdminLaboratoriumController::class);

    // 2. KHUSUS SUPER ADMIN
    Route::middleware(['role:super_admin'])->group(function () {
        Route::resource('tenaga-pendidik', TenagaPendidikController::class);
        Route::resource('profil', ProfilController::class);
        Route::resource('struktur-organisasi', StrukturOrganisasiController::class);
        Route::resource('kurikulum', KurikulumController::class);
        Route::resource('prestasi', PrestasiController::class);
        Route::resource('publikasi', PublikasiController::class);
        Route::resource('kegiatan', KegiatanController::class);
        Route::resource('ruang-kelas', AdminRuangKelasController::class);
        Route::resource('testimoni', AdminTestimonialController::class);
        Route::resource('cooperation', AdminCooperationController::class);
        Route::resource('berita', AdminBeritaController::class);
    });
});
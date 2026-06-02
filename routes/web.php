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
use App\Models\DokumenRkf;

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\PeminjamanLabController;
use App\Http\Controllers\PinjamAuthController;

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
use App\Http\Controllers\Admin\DokumenRkfController;
use App\Http\Controllers\Admin\PengajaranController;
use App\Http\Controllers\LaboratoriumController as PublikLabController;
use App\Http\Controllers\Admin\LaboratoriumController as AdminLabController;

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
    $profil = \App\Models\Profil::first();
    return view('welcome', compact('profil'));
    // Rute untuk halaman publik detail berita
    Route::get('/berita/baca/{id}', [BeritaController::class, 'bacaBerita'])->name('publik.berita.baca');
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
    $tenaga_pendidiks = TenagaPendidik::with(['pengajarans', 'publikasis'])->get();

    return view('tenaga_pendidik', compact('tenaga_pendidiks'));
})->name('dosen.publik');

Route::get('/tenaga', function () {
    return redirect('/tenaga-pendidik');
});

// Berita, Mitra, Testimoni
Route::get('/berita-lengkap', [BeritaController::class, 'index'])->name('berita.lengkap');
Route::get('/berita', function () {
    return redirect('/berita-lengkap');
});
Route::get('/mitra', [CooperationController::class, 'index'])->name('mitra.index');
Route::get('/kisah-alumni', [TestimonialController::class, 'index'])->name('publik.testimoni');
// Rute untuk halaman publik detail berita
Route::get('/berita/baca/{id}', [BeritaController::class, 'bacaBerita'])->name('publik.berita.baca');

// Prestasi
Route::prefix('prestasi')->group(function () {

    // 1. Rute Prestasi Dosen
    Route::get('/dosen', function () {
        $prestasi = Prestasi::orderBy('tanggal_perolehan', 'desc')->get();
        $publikasi = Publikasi::where('kategori', 'Dosen')->orderBy('created_at', 'desc')->get();
        return view('prestasi_dosen', compact('prestasi', 'publikasi'));
    })->name('prestasi.dosen');

    // 2. Rute Prestasi Mahasiswa
    Route::get('/mahasiswa', function () {
        $prestasi = Prestasi::orderBy('tanggal_perolehan', 'desc')->get();
        $publikasi = Publikasi::where('kategori', 'Mahasiswa')->orderBy('created_at', 'desc')->get();
        return view('prestasi_mahasiswa', compact('prestasi', 'publikasi'));
    })->name('prestasi.mahasiswa');

    // 3. Rute BARU: Penelitian
    Route::get('/penelitian', function () {
        // 1. Ambil data dari database
        $penelitians = \App\Models\Penelitian::orderBy('tahun', 'desc')->get();

        // 2. Kirim ke halaman view
        return view('prestasi_penelitian', compact('penelitians'));
    })->name('publik.penelitian');
});

// Kegiatan
Route::get('/kegiatan/dosen', function () {
    // Tarik data yang kategorinya KHUSUS 'Pengabdian Masyarakat (PKM) Dosen'
    $kegiatan = Kegiatan::where('kategori', 'Pengabdian Masyarakat (PKM) Dosen')
        ->orderBy('waktu_pelaksanaan', 'desc')
        ->get();

    return view('kegiatan.dosen', compact('kegiatan'));
})->name('publik.kegiatan.dosen');


// 2. Rute untuk Kegiatan Mahasiswa
Route::get('/kegiatan/mahasiswa', function () {

    // A. Tarik data untuk seksi HIMABIO (Kategori: Kegiatan Mahasiswa)
    $himpunan = Kegiatan::where('kategori', 'Kegiatan Mahasiswa')
        ->orderBy('waktu_pelaksanaan', 'desc')
        ->get();

    // B. Tarik data untuk seksi Pengabdian Masyarakat Mahasiswa
    // (Meskipun kategori ini belum ada di form tambah admin Anda, kita siapkan variabelnya
    //  agar halamannya tidak eror dan bisa menampilkan teks "Data pengabdian belum tersedia")
    $pkm = Kegiatan::where('kategori', 'Pengabdian Masyarakat (PKM) Mahasiswa')
        ->orderBy('waktu_pelaksanaan', 'desc')
        ->get();

    // C. Kirim KEDUA variabel tersebut ke view secara bersamaan
    return view('kegiatan.mahasiswa', compact('himpunan', 'pkm'));
})->name('publik.kegiatan.mahasiswa');

// Fasilitas & Lab
Route::get('/fasilitas', function () {
    $ruang_kelas = RuangKelas::orderBy('nama_ruangan', 'asc')->get();
    return view('fasilitas', compact('ruang_kelas'));
})->name('fasilitas.index');

Route::get('/fasilitas/ruang-kelas', [RuangKelasController::class, 'index'])->name('fasilitas.ruang-kelas');

Route::get('/laboratorium', function () {
    $labs = \App\Models\Laboratorium::all();
    $dokumen_rkfs = \App\Models\DokumenRkf::latest()->get();
    return view('laboratorium.index', compact('labs', 'dokumen_rkfs'));
})->name('laboratorium.index');

Route::get('/dokumen-rkf', function () {
    $dokumen_rkfs = \App\Models\DokumenRkf::latest()->get();
    return view('dokumen_rkf.index', compact('dokumen_rkfs'));
})->name('publik.dokumen_rkf.index');

Route::get('/dokumen-rkf/unduh/{id}', function ($id) {
    $dokumen = \App\Models\DokumenRkf::findOrFail($id);
    $path = public_path($dokumen->file_dokumen);

    // Cek apakah file fisik benar-benar ada di dalam folder
    if (file_exists($path)) {
        // Jika ada, paksa browser untuk mendownload file aslinya
        return response()->download($path);
    } else {
        // Jika file hilang dari folder, hentikan dan beri peringatan
        return abort(404, 'Maaf, file fisik tidak ditemukan di server.');
    }
})->name('publik.dokumen_rkf.unduh');

// Routes  peminjaman
Route::get('/pinjam/login', [PinjamAuthController::class, 'showLogin'])->name('pinjam.login');
Route::post('/pinjam/login', [PinjamAuthController::class, 'login'])->name('pinjam.login.post');
Route::post('/pinjam/logout', [PinjamAuthController::class, 'logout'])->name('pinjam.logout');

Route::get('/pinjam', [PeminjamanLabController::class, 'formPinjam'])
    ->middleware(\App\Http\Middleware\ExternalApiAuth::class)
    ->name('laboratorium.pinjam');

Route::post('/store', [PeminjamanLabController::class, 'store'])->name('laboratorium.store');
Route::get('/cek-status', [PeminjamanLabController::class, 'cekStatus'])->name('lab.cek-status');
Route::get('/laboratorium/peminjaman/cetak/{id}', [PeminjamanLabController::class, 'cetakBon'])->name('lab.peminjaman.cetak');

// DEBUG ROUTE: Tampilkan apa yang tersimpan di session('pinjam_user') setelah login
Route::get('/debug/pinjam-user', function () {
    return response()->json(session('pinjam_user'));
});

// DEBUG RESOLVE: coba panggil library-api/mahasiswa dan /pegawai untuk username di session
Route::get('/debug/pinjam-resolve', function () {
    $pu = session('pinjam_user');
    $username = null;
    if ($pu) {
        if (is_array($pu)) {
            $username = $pu['username'] ?? null;
        } elseif (is_string($pu)) {
            $username = $pu;
        }
    }

    $token = session('pinjam_token');
    $base = rtrim(env('EXTERNAL_API_URL', 'https://cis.del.ac.id'), '/');

    $results = [];
    if (!$username) {
        return response()->json(['error' => 'no username in session', 'session' => $pu]);
    }

    try {
        $client = \Illuminate\Support\Facades\Http::class;
        if ($token) {
            $resp = \Illuminate\Support\Facades\Http::withToken($token)->get($base . '/library-api/mahasiswa', ['username' => $username, 'status' => 'Aktif']);
        } else {
            $resp = \Illuminate\Support\Facades\Http::get($base . '/library-api/mahasiswa', ['username' => $username, 'status' => 'Aktif']);
        }
        $results['mahasiswa'] = $resp && $resp->successful() ? $resp->json() : ['status' => $resp ? $resp->status() : 'no-response', 'body' => $resp ? $resp->body() : null];
    } catch (\Exception $e) {
        $results['mahasiswa_error'] = $e->getMessage();
    }

    try {
        if ($token) {
            $resp2 = \Illuminate\Support\Facades\Http::withToken($token)->get($base . '/library-api/pegawai', ['username' => $username]);
        } else {
            $resp2 = \Illuminate\Support\Facades\Http::get($base . '/library-api/pegawai', ['username' => $username]);
        }
        $results['pegawai'] = $resp2 && $resp2->successful() ? $resp2->json() : ['status' => $resp2 ? $resp2->status() : 'no-response', 'body' => $resp2 ? $resp2->body() : null];
    } catch (\Exception $e) {
        $results['pegawai_error'] = $e->getMessage();
    }

    return response()->json(['username' => $username, 'token_present' => (bool)$token, 'base' => $base, 'results' => $results]);
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
    // 3. RUTE ADMIN PANEL (Pastikan terpisah dan memiliki prefix 'admin')
    Route::prefix('admin')->name('admin.')->group(function () {

        // Menggunakan Class yang sudah di-import di atas (Sangat Aman)
        Route::resource('laboratorium', AdminLabController::class);
    });

    // 2. KHUSUS SUPER ADMIN
    Route::middleware(['role:super_admin'])->group(function () {
        Route::resource('tenaga-pendidik', TenagaPendidikController::class);
        Route::post('/admin/pengajaran', [PengajaranController::class, 'store'])->name('pengajaran.store');
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
        Route::resource('admin/dokumen-rkf', DokumenRkfController::class);
        Route::resource('penelitian', \App\Http\Controllers\Admin\PenelitianController::class)->names('admin.penelitian');
    });
});

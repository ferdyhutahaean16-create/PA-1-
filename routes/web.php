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
use App\Models\InventarisLab;

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

// ==========================================
// RUTE HALAMAN BERANDA (HOME)
// ==========================================
Route::get('/', function () {
    // 1. Ambil data pendukung (Mitra, Testimoni, Profil)
    $mitras = \App\Models\Cooperation::orderBy('start_date', 'desc')->take(6)->get();
    $testimonials = \App\Models\Testimonial::orderBy('created_at', 'desc')->take(3)->get();
    $profil = \App\Models\Profil::first();

    // 2. Logika Cerdas: Menggabungkan Berita & Kegiatan
    $berita = \App\Models\Berita::latest('tanggal')->get()->map(function($item) {
        return (object) [
            'id' => $item->id,
            'judul' => $item->judul,
            'tanggal' => $item->tanggal,
            'foto' => $item->foto,
            'konten' => $item->konten,
            'label' => 'BERITA',
            'link' => route('publik.berita.baca', $item->id)
        ];
    });

    $kegiatan = \App\Models\Kegiatan::latest('waktu_pelaksanaan')->get()->map(function($item) {
        return (object) [
            'id' => $item->id,
            'judul' => $item->judul,
            'tanggal' => $item->waktu_pelaksanaan,
            'foto' => $item->foto,
            'konten' => $item->deskripsi ?? $item->konten ?? '',
            'label' => 'KEGIATAN',
            'link' => route('publik.kegiatan.baca', $item->id)
        ];
    });

    // Gabungkan, urutkan dari yang paling baru, dan ambil 3 teratas
    $berita_utama = $berita->concat($kegiatan)->sortByDesc('tanggal')->take(3);

    // 3. Kirim SEMUA data ke satu tampilan saja (pilih 'home' atau 'welcome' sesuai desain Anda)
    return view('home', compact('berita_utama', 'mitras', 'testimonials', 'profil'));
})->name('home');


// ==========================================
// RUTE DETAIL BERITA
// ==========================================
// Rute ini harus diletakkan di LUAR rute beranda agar peta situs Anda rapi
// (Catatan: Jika di baris atas file web.php Anda sudah ada rute ini, Anda boleh menghapus salah satunya agar tidak ganda).
Route::get('/berita/baca/{id}', [\App\Http\Controllers\Admin\BeritaController::class, 'bacaPublik'])->name('publik.berita.baca');

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
    // Memanggil SEMUA relasi agar tidak ada tab yang kosong di halaman publik
    $tenaga_pendidiks = \App\Models\TenagaPendidik::with([
        'pengajarans', 
        'publikasis', 
        'prestasis', 
        'penelitians', 
        'kegiatans'
    ])->get();

    return view('tenaga_pendidik', compact('tenaga_pendidiks'));
})->name('dosen.publik');

Route::get('/tenaga', function () {
    return redirect('/tenaga-pendidik');
});

// Berita, Mitra, Testimoni
// ==========================================
// RUTE HALAMAN PUBLIK (BERITA & KEGIATAN)
// ==========================================

// 1. Rute Halaman Utama Arsip Berita (Ini yang membuat halaman Home Anda error tadi)
Route::get('/berita-lengkap', [\App\Http\Controllers\Admin\BeritaController::class, 'indexPublik'])->name('berita.lengkap');

// 2. Rute Membaca Detail Berita
Route::get('/berita/{id}/baca', [\App\Http\Controllers\Admin\BeritaController::class, 'bacaPublik'])->name('publik.berita.baca');

// 3. Rute Membaca Detail Kegiatan
Route::get('/kegiatan/{id}/baca', [\App\Http\Controllers\Admin\BeritaController::class, 'bacaKegiatan'])->name('publik.kegiatan.baca');
Route::get('/mitra', [CooperationController::class, 'index'])->name('mitra.index');
Route::get('/kisah-alumni', [TestimonialController::class, 'index'])->name('publik.testimoni');
// Rute untuk halaman publik detail berita
Route::get('/berita/baca/{id}', [BeritaController::class, 'bacaBerita'])->name('publik.berita.baca');

// Prestasi
Route::prefix('prestasi')->group(function () {

    // 1. Rute Prestasi Dosen
    Route::get('/dosen', function () {
        // PERBAIKAN: Menambahkan saringan kategori 'Dosen'
        $prestasi = Prestasi::where('kategori', 'Dosen')->orderBy('tanggal_perolehan', 'desc')->get();
        $publikasi = Publikasi::where('kategori', 'Dosen')->orderBy('created_at', 'desc')->get();
        
        return view('prestasi_dosen', compact('prestasi', 'publikasi'));
    })->name('prestasi.dosen');

    // 2. Rute Prestasi Mahasiswa
    Route::get('/mahasiswa', function () {
        // PERBAIKAN: Menambahkan saringan kategori 'Mahasiswa'
        $prestasi = Prestasi::where('kategori', 'Mahasiswa')->orderBy('tanggal_perolehan', 'desc')->get();
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

Route::get('/dokumen-rkf/lihat/{id}', function ($id) {
    $dokumen = \App\Models\DokumenRkf::findOrFail($id);
    $path = public_path($dokumen->file_dokumen);

    // Cek apakah file fisik ada di server
    if (!file_exists($path)) {
        abort(404, 'File dokumen tidak ditemukan.');
    }

    // Gunakan response()->file() untuk melihat, bukan ->download()
    return response()->file($path, [
        'Content-Type' => 'application/pdf', // Pastikan browser tahu ini PDF
        'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
    ]);
})->name('dokumen-rkf.lihat');

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

// Rute untuk Katalog Inventaris Lab Publik
Route::get('/fasilitas/laboratorium/katalog', function () {
    // Menarik semua data inventaris, diurutkan sesuai abjad
    $inventaris = \App\Models\InventarisLab::orderBy('nama_barang', 'asc')->get();
    
    // Memisahkan data berdasarkan kategorinya masing-masing
    $alat = $inventaris->where('kategori', 'Alat');
    $bahan = $inventaris->where('kategori', 'Bahan');
    $instrumen = $inventaris->whereIn('kategori', ['Instrumen', 'Instrumen Aset Lab']);

    // Mengirim data ke halaman view
    return view('laboratorium.katalog', compact('alat', 'bahan', 'instrumen'));
})->name('lab.katalog');

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
        Route::resource('inventaris-lab', \App\Http\Controllers\Admin\InventarisLabController::class);
        // Route untuk Kelola Mata Kuliah Dosen
        Route::post('/pengajaran', [\App\Http\Controllers\Admin\PengajaranController::class, 'store'])->name('pengajaran.store');
        Route::delete('/pengajaran/{id}', [\App\Http\Controllers\Admin\PengajaranController::class, 'destroy'])->name('pengajaran.destroy');
        // Rute untuk mengeksekusi pengembalian barang & pemulihan stok
        Route::post('/admin/peminjaman/{id}/kembali', [\App\Http\Controllers\Admin\AdminPeminjamanController::class, 'validasiKembali'])
            ->name('admin.peminjaman.kembali');
        Route::post('/admin/peminjaman/{id}/status', [\App\Http\Controllers\PeminjamanLabController::class, 'updateStatus'])->name('admin.peminjaman.update');
        Route::get('/admin/inventaris/{id}/edit', [\App\Http\Controllers\InventarisLabController::class, 'edit'])->name('admin.inventaris.edit');
        Route::put('/admin/inventaris/{id}', [\App\Http\Controllers\InventarisLabController::class, 'update'])->name('admin.inventaris.update');
        // Pastikan ini berada di dalam grup Route::prefix('admin') Anda
        Route::get('/fasilitas', [\App\Http\Controllers\Admin\FasilitasController::class, 'index'])->name('admin.fasilitas.index');
        Route::get('/fasilitas/create', [\App\Http\Controllers\Admin\FasilitasController::class, 'create'])->name('admin.fasilitas.create');
        Route::post('/fasilitas', [\App\Http\Controllers\Admin\FasilitasController::class, 'store'])->name('admin.fasilitas.store');
        Route::get('/fasilitas/{id}/edit', [\App\Http\Controllers\Admin\FasilitasController::class, 'edit'])->name('admin.fasilitas.edit');
        Route::put('/fasilitas/{id}', [\App\Http\Controllers\Admin\FasilitasController::class, 'update'])->name('admin.fasilitas.update');
        Route::delete('/fasilitas/{id}', [\App\Http\Controllers\Admin\FasilitasController::class, 'destroy'])->name('admin.fasilitas.destroy');
    });
});

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

use App\Http\Controllers\CooperationController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\RuangKelasController;
use App\Http\Controllers\PeminjamanLabController;
use App\Http\Controllers\PinjamAuthController;


// Controller Admin
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\OrganizationalStructureController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\LaboratoryController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\CooperationController as AdminCooperationController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\PengajaranController;
use App\Http\Controllers\LaboratoriumController as PublikLabController;
use App\Http\Controllers\Admin\LaboratoriumController as AdminLabController;
use App\Http\Controllers\Admin\InventoryController;

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
    $profile = \App\Models\Profile::first();

    // 2. Logika Cerdas: Menggabungkan Berita & Kegiatan
    $berita = \App\Models\News::latest('published_date')->get()->map(function($item) {
    return (object) [
        'id'      => $item->id,
        'judul'   => $item->title,           // Dipetakan agar kompatibel dengan view
        'tanggal' => $item->published_date, // Dipetakan agar kompatibel dengan view
        'foto'    => $item->image,          // Dipetakan agar kompatibel dengan view
        'konten'  => $item->content,        // Dipetakan agar kompatibel dengan view
        'label'   => 'BERITA',
        'link'    => route('publik.berita.baca', $item->id)
    ];
});

    $kegiatan = \App\Models\Activity::latest('execution_time')->get()->map(function($item) {
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
    return view('home', compact('berita_utama', 'mitras', 'testimonials', 'profile'));
})->name('home');


// ==========================================
// RUTE DETAIL BERITA
// ==========================================
// Rute ini harus diletakkan di LUAR rute beranda agar peta situs Anda rapi
// (Catatan: Jika di baris atas file web.php Anda sudah ada rute ini, Anda boleh menghapus salah satunya agar tidak ganda).
Route::get('/berita/baca/{id}', [NewsController::class, 'bacaPublik'])->name('publik.berita.baca');

// Profil & Struktur
Route::get('/profil', function () {
    // Gunakan \App\Models\Profile agar langsung mengarah ke model yang baru
    $profile = \App\Models\Profile::first(); 
    
    // Kirim variabel dengan nama baru ($profile) ke tampilan
    return view('profil', compact('profile')); 
});

Route::get('/struktur', function () {
    $profile = \App\Models\Profile::first(); 
    $structures = \App\Models\OrganizationalStructure::orderBy('level', 'asc')->get();

    return view('struktur', compact('profile', 'structures')); 
})->name('struktur.publik');

// Kurikulum (Boleh tetap pakai URL /kurikulum untuk pengunjung lokal)
Route::get('/kurikulum', function () {
    $curriculums = \App\Models\Curriculum::orderBy('semester', 'asc')
                ->orderBy('course_name', 'asc')
                ->get();
    
    // Kelompokkan data berdasarkan semester
    $curriculums_per_semester = $curriculums->groupBy('semester');
    
    return view('kurikulum', compact('curriculums_per_semester'));
})->name('kurikulum.publik');

// Tenaga Pendidik
Route::get('/tenaga-pendidik', function () {
    // Memanggil SEMUA relasi agar tidak ada tab yang kosong di halaman publik
    $lecturers = \App\Models\Lecturer::with([
        'teachings', 
        'publications', 
        'achievements', 
        'researches', 
        'activities'
    ])->get();

    return view('tenaga_pendidik', compact('lecturers'));
})->name('dosen.publik');

Route::get('/tenaga', function () {
    return redirect('/tenaga-pendidik');
});

// Berita, Mitra, Testimoni
// ==========================================
// RUTE HALAMAN PUBLIK (BERITA & KEGIATAN)
// ==========================================

// 1. Rute Halaman Utama Arsip Berita (Ini yang membuat halaman Home Anda error tadi)
Route::get('/berita-lengkap', [NewsController::class, 'indexPublik'])->name('berita.lengkap');

// 2. Rute Membaca Detail Berita
Route::get('/berita/baca/{id}', [NewsController::class, 'bacaPublik'])->name('publik.berita.baca');

// 3. Rute Membaca Detail Kegiatan
Route::get('/kegiatan/{id}/baca', [\App\Http\Controllers\Admin\NewsController::class, 'bacaKegiatan'])->name('publik.kegiatan.baca');
Route::get('/mitra', [CooperationController::class, 'index'])->name('mitra.index');
Route::get('/kisah-alumni', [TestimonialController::class, 'index'])->name('publik.testimoni');
// Rute untuk halaman publik detail berita
Route::get('/berita/baca/{id}', [NewsController::class, 'bacaPublik'])->name('publik.berita.baca');

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
    // 3. Rute BARU: Penelitian
        Route::get('/penelitian', function () {
            // 1. Ambil data dari database menggunakan Model dan Kolom Baru
            $researches = \App\Models\Research::orderBy('year', 'desc')->get();

            // 2. Kirim ke halaman view publik yang baru
            return view('prestasi_penelitian', compact('researches'));
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
            // 1. Ambil data ruangan dari database menggunakan Model dan Kolom Baru
            $classrooms = \App\Models\Classroom::orderBy('name', 'asc')->get();

            // 2. Kirim ke halaman view publik fasilitas dengan variabel baru
            return view('fasilitas', compact('classrooms'));
        })->name('fasilitas.index');

Route::get('/fasilitas/ruang-kelas', [RuangKelasController::class, 'index'])->name('fasilitas.ruang-kelas');

// ==========================================
// RUTE PUBLIK: LABORATORIUM & DOKUMEN
// ==========================================

Route::get('/laboratorium', function () {
    $labs = \App\Models\Laboratory::all(); 
    $documents = \App\Models\Document::latest()->get();
    return view('laboratorium.index', compact('labs', 'documents'));
})->name('laboratorium.index');

// 1. Halaman Daftar Arsip Dokumen (Publik)
Route::get('/arsip-dokumen', function () {
    $documents = \App\Models\Document::latest()->get();
    return view('documents.index', compact('documents'));
})->name('publik.dokumen.index');

// 2. Fitur Lihat / Unduh File
Route::get('/arsip-dokumen/lihat/{id}', function ($id) {
    // Memanggil model Document
    $document = \App\Models\Document::findOrFail($id);
    
    // Menggunakan kolom file_path yang baru
    $path = public_path($document->file_path);

    if (!file_exists($path)) {
        abort(404, 'File dokumen fisik tidak ditemukan di server.');
    }

    // Cek ekstensi file (PDF vs Word/Excel)
    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    // Jika file berupa PDF, buka langsung di dalam browser
    if ($extension === 'pdf') {
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
        ]);
    }

    // Jika file berupa Word/Excel, paksa browser untuk langsung men-downloadnya
    return response()->download($path);
})->name('dokumen.lihat');

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
            'totalDosen' => \App\Models\Lecturer::count(),
            'totalPrestasi' => 0,//Prestasi::count(),
            'peminjamanPending' => 0, // \DB::table('peminjaman_labs')->where('status', 'pending')->count(),
        ]);
    })->name('admin.dashboard');

    Route::get('/peminjaman', [PeminjamanLabController::class, 'indexAdmin'])->name('admin.peminjaman.index');
    Route::post('/peminjaman/{id}/update', [PeminjamanLabController::class, 'updateStatus'])->name('admin.peminjaman.update');
    Route::get('/peminjaman/{id}/cetak', [PeminjamanLabController::class, 'cetakBon'])->name('admin.peminjaman.cetak');
    // 3. RUTE ADMIN PANEL (Pastikan terpisah dan memiliki prefix 'admin')
    Route::prefix('admin')->name('admin.')->group(function () {

        // Menggunakan Class yang sudah di-import di atas (Sangat Aman)
        Route::resource('laboratory', LaboratoryController::class);
    });

    // 2. KHUSUS SUPER ADMIN
    Route::middleware(['role:super_admin'])->group(function () {
        Route::resource('lecturer', LecturerController::class);
        Route::post('/admin/pengajaran', [PengajaranController::class, 'store'])->name('pengajaran.store');
        Route::resource('profile', ProfileController::class);
        Route::resource('organizational-structure', OrganizationalStructureController::class);
        Route::resource('curriculum', CurriculumController::class);
        Route::resource('achievement', AchievementController::class);
        Route::resource('publication', PublicationController::class);
        Route::resource('activity', ActivityController::class);
        Route::resource('classroom', ClassroomController::class);
        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
        Route::resource('cooperation', AdminCooperationController::class);
        Route::resource('news', NewsController::class);
        Route::resource('documents', DocumentController::class);
        Route::resource('research', ResearchController::class);
        Route::resource('inventories', InventoryController::class);
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

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

// LOGIN & LOGOUT
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// HALAMAN GUEST
// HALAMAN BERANDA (HOME)
Route::get('/', function () {
    // 1. Ambil data pendukung (Mitra, Testimoni, Profil)
    $mitras = \App\Models\Cooperation::orderBy('start_date', 'desc')->take(6)->get();
    $testimonials = \App\Models\Testimonial::orderBy('created_at', 'desc')->take(3)->get();
    $profile = \App\Models\Profile::first();

    // 2. Logika Cerdas: Menggabungkan Berita & Kegiatan
    $berita = \App\Models\News::latest('published_date')->get()->map(function($item) {
        return (object) [
            'id'      => $item->id,
            'judul'   => $item->title,           
            'tanggal' => $item->published_date, 
            'foto'    => $item->image,          
            'konten'  => $item->content,        
            'label'   => 'BERITA',
            'link'    => route('publik.berita.baca', $item->id)
        ];
    });

    $kegiatan = \App\Models\Activity::latest('execution_time')->get()->map(function($item) {
        return (object) [
            'id'      => $item->id,
            'judul'   => $item->title,            // PERBAIKAN: Sebelumnya $item->judul
            'tanggal' => $item->execution_time,   // PERBAIKAN: Sebelumnya $item->waktu_pelaksanaan
            'foto'    => $item->image,            // PERBAIKAN: Sebelumnya $item->foto
            'konten'  => $item->description,      // PERBAIKAN: Sebelumnya $item->deskripsi
            'label'   => 'KEGIATAN',
            'link'    => route('publik.kegiatan.baca', $item->id)
        ];
    });

    $berita_utama = $berita->concat($kegiatan)->sortByDesc('tanggal')->take(3);

    return view('home', compact('berita_utama', 'mitras', 'testimonials', 'profile'));
})->name('home');


// DETAIL BERITA
Route::get('/berita/baca/{id}', [NewsController::class, 'bacaPublik'])->name('publik.berita.baca');

// Profil & Struktur
Route::get('/profil', function () {
    $profile = \App\Models\Profile::first(); 
    
    return view('profil', compact('profile')); 
});

Route::get('/struktur', function () {
    $profile = \App\Models\Profile::first(); 
    $structures = \App\Models\OrganizationalStructure::orderBy('level', 'asc')->get();

    return view('struktur', compact('profile', 'structures')); 
})->name('struktur.publik');

// Kurikulum
Route::get('/kurikulum', function () {
    $curriculums = \App\Models\Curriculum::orderBy('semester', 'asc')
                ->orderBy('course_name', 'asc')
                ->get();
    
    $curriculums_per_semester = $curriculums->groupBy('semester');
    
    return view('kurikulum', compact('curriculums_per_semester'));
})->name('kurikulum.publik');

// Tenaga Pendidik
Route::get('/tenaga-pendidik', function () {
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

// (BERITA & KEGIATAN)
Route::get('/berita-lengkap', [NewsController::class, 'indexPublik'])->name('berita.lengkap');

Route::get('/berita/baca/{id}', [NewsController::class, 'bacaPublik'])->name('publik.berita.baca');

// Membaca Detail Kegiatan
Route::get('/kegiatan/{id}/baca', [\App\Http\Controllers\Admin\NewsController::class, 'bacaKegiatan'])->name('publik.kegiatan.baca');
Route::get('/mitra', [CooperationController::class, 'index'])->name('mitra.index');
Route::get('/kisah-alumni', [TestimonialController::class, 'index'])->name('publik.testimoni');
Route::get('/berita/baca/{id}', [NewsController::class, 'bacaPublik'])->name('publik.berita.baca');

// Prestasi
Route::prefix('prestasi')->group(function () {

    // Prestasi Dosen
    Route::get('/dosen', function () {
        $prestasi = \App\Models\Achievement::where('category', 'Dosen')->orderBy('date_earned', 'desc')->get();
        $publikasi = \App\Models\Publication::where('category', 'Dosen')->orderBy('publication_date', 'desc')->get();
        
        return view('prestasi_dosen', compact('prestasi', 'publikasi'));
    })->name('prestasi.dosen');

    // Prestasi Mahasiswa
    Route::get('/mahasiswa', function () {
        $prestasi = \App\Models\Achievement::where('category', 'Mahasiswa')->orderBy('date_earned', 'desc')->get();
        $publikasi = \App\Models\Publication::where('category', 'Mahasiswa')->orderBy('publication_date', 'desc')->get();
        
        return view('prestasi_mahasiswa', compact('prestasi', 'publikasi'));
    })->name('prestasi.mahasiswa');

    // Penelitian
        Route::get('/penelitian', function () {
            $researches = \App\Models\Research::orderBy('year', 'desc')->get();

            return view('prestasi_penelitian', compact('researches'));
        })->name('publik.penelitian');
});

// Kegiatan
Route::get('/kegiatan/dosen', function () {
    $kegiatan = Kegiatan::where('kategori', 'Pengabdian Masyarakat (PKM) Dosen')
        ->orderBy('waktu_pelaksanaan', 'desc')
        ->get();

    return view('kegiatan.dosen', compact('kegiatan'));
})->name('publik.kegiatan.dosen');


// Kegiatan Mahasiswa
Route::get('/kegiatan/mahasiswa', function () {

    $himpunan = Kegiatan::where('kategori', 'Kegiatan Mahasiswa')
        ->orderBy('waktu_pelaksanaan', 'desc')
        ->get();

    $pkm = Kegiatan::where('kategori', 'Pengabdian Masyarakat (PKM) Mahasiswa')
        ->orderBy('waktu_pelaksanaan', 'desc')
        ->get();

    return view('kegiatan.mahasiswa', compact('himpunan', 'pkm'));
})->name('publik.kegiatan.mahasiswa');

// Fasilitas & Lab
Route::get('/fasilitas', function () {
            $classrooms = \App\Models\Classroom::orderBy('name', 'asc')->get();

            return view('fasilitas', compact('classrooms'));
        })->name('fasilitas.index');

Route::get('/fasilitas/ruang-kelas', [RuangKelasController::class, 'index'])->name('fasilitas.ruang-kelas');

// RUTE PUBLIK: LABORATORIUM & DOKUMEN
Route::get('/laboratorium', function () {
    $labs = \App\Models\Laboratory::all(); 
    $documents = \App\Models\Document::latest()->get();
    return view('laboratorium.index', compact('labs', 'documents'));
})->name('laboratorium.index');

// Arsip Dokumen
Route::get('/arsip-dokumen', function () {
    $documents = \App\Models\Document::latest()->get();
    return view('documents.index', compact('documents'));
})->name('publik.dokumen.index');

Route::get('/arsip-dokumen/baca/{id}', function ($id) {
    $document = \App\Models\Document::findOrFail($id);
    $path = public_path($document->file_path);

    if (!file_exists($path)) {
        abort(404, 'File dokumen fisik tidak ditemukan di server.');
    }

    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    if ($extension === 'pdf') {
        return view('documents.lihat_dokumen', compact('document'));
    }

    return response()->download($path);
    
})->name('dokumen.lihat');

Route::get('/arsip-dokumen/lihat/{id}', [\App\Http\Controllers\Admin\DocumentController::class, 'lihat'])->name('dokumen.lihat');

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

// Katalog Inventaris Lab Publik
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


// ADMIN PANEL
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // DASHBOARD
    Route::get('/', function () {
    return view('admin.dashboard', [
        // Menghitung total data dosen
        'totalDosen' => \App\Models\Lecturer::count(),
        
        // Menghitung total data prestasi 
        'totalPrestasi' => \App\Models\Achievement::count(),
        
        // Menghitung total peminjaman
        'peminjamanPending' => \App\Models\LabLoan::where('status', 'Pending')->count(),
    ]);
})->name('admin.dashboard');

    Route::get('/peminjaman', [PeminjamanLabController::class, 'indexAdmin'])->name('admin.peminjaman.index');
    Route::post('/peminjaman/{id}/update', [PeminjamanLabController::class, 'updateStatus'])->name('admin.peminjaman.update');
    Route::get('/peminjaman/{id}/cetak', [PeminjamanLabController::class, 'cetakBon'])->name('admin.peminjaman.cetak');
    // RUTE ADMIN
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
        Route::post('/pengajaran', [\App\Http\Controllers\Admin\PengajaranController::class, 'store'])->name('pengajaran.store');
        Route::delete('/pengajaran/{id}', [\App\Http\Controllers\Admin\PengajaranController::class, 'destroy'])->name('pengajaran.destroy');
        Route::post('/admin/peminjaman/{id}/kembali', [\App\Http\Controllers\Admin\AdminPeminjamanController::class, 'validasiKembali'])
            ->name('admin.peminjaman.kembali');
        Route::post('/admin/peminjaman/{id}/status', [\App\Http\Controllers\PeminjamanLabController::class, 'updateStatus'])->name('admin.peminjaman.update');
        Route::get('/admin/inventaris/{id}/edit', [\App\Http\Controllers\InventarisLabController::class, 'edit'])->name('admin.inventaris.edit');
        Route::put('/admin/inventaris/{id}', [\App\Http\Controllers\InventarisLabController::class, 'update'])->name('admin.inventaris.update');
        Route::get('/fasilitas', [\App\Http\Controllers\Admin\FasilitasController::class, 'index'])->name('admin.fasilitas.index');
        Route::get('/fasilitas/create', [\App\Http\Controllers\Admin\FasilitasController::class, 'create'])->name('admin.fasilitas.create');
        Route::post('/fasilitas', [\App\Http\Controllers\Admin\FasilitasController::class, 'store'])->name('admin.fasilitas.store');
        Route::get('/fasilitas/{id}/edit', [\App\Http\Controllers\Admin\FasilitasController::class, 'edit'])->name('admin.fasilitas.edit');
        Route::put('/fasilitas/{id}', [\App\Http\Controllers\Admin\FasilitasController::class, 'update'])->name('admin.fasilitas.update');
        Route::delete('/fasilitas/{id}', [\App\Http\Controllers\Admin\FasilitasController::class, 'destroy'])->name('admin.fasilitas.destroy');
    });
});

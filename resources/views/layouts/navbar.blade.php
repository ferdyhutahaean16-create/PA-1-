<style>
    /* Konfigurasi Variabel Warna Navbar */
    #main-nav {
        /* STATE 1: DEFAULT (Posisi Paling Atas) */
        --nav-bg: #064e3b; /* Hijau Gelap Solid */
        --nav-text: #ffffff; /* Teks menu putih saat di atas */
        --nav-hover: #facc15; /* Kuning terang saat disentuh */
        --nav-active: #facc15; /* Kuning saat aktif */
        --nav-indicator: #facc15; /* Garis bawah kuning */
        --logo-text: #ffffff; /* Teks logo putih saat di atas */
        
        background-color: var(--nav-bg);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent;
        backdrop-filter: none; 
        -webkit-backdrop-filter: none;
    }
    
    /* STATE 2: SCROLLED (Saat Mengambang) */
    #main-nav.scrolled {
        /* Efek Kaca Putih Transparan (Aesthetic Glassmorphism) */
        --nav-bg: rgba(255, 255, 255, 0.15); 
        
        /* === TULISAN BERUBAH JADI HITAM DI SINI === */
        --nav-text: #000000; /* Teks menu jadi hitam */
        --logo-text: #000000; /* Teks logo juga jadi hitam biar kelihatan */
        
        /* Warna saat diarah kursor (hover) dan aktif tetap kuning */
        --nav-hover: #facc15; 
        --nav-active: #facc15; 
        --nav-indicator: #facc15; 
        
        background-color: var(--nav-bg);
        
        /* Efek blur kaca diperbesar (Glassmorphism) */
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px); 
        
        margin-top: 12px; 
        border-radius: 9999px; 
        width: 95%; 
        left: 50%;
        transform: translateX(-50%);
        
        /* Border putih agak ditebalkan sedikit untuk efek tepi kaca */
        border: 1px solid rgba(255, 255, 255, 0.3); 
        
        /* Bayangan gelap yang lebih lembut di bawah navbar */
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); 
    }

    /* Utilitas Kelas CSS */
    .nav-item {
        color: var(--nav-text);
        transition: color 0.3s ease;
    }
    .nav-item:hover {
        color: var(--nav-hover);
    }
    
    .logo-text-adaptive {
        color: var(--logo-text);
        transition: color 0.3s ease;
    }

    .nav-active {
        color: var(--nav-active);
        font-weight: 800;
        position: relative;
    }
    
    .nav-active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: var(--nav-indicator);
        transition: background-color 0.4s;
    }
</style>

<nav id="main-nav" class="fixed w-full top-0 z-50 shadow-md">
    <div class="container mx-auto px-4 xl:px-6 h-16 flex justify-between items-center relative">
        
        <a href="/" class="flex items-center gap-2 xl:gap-3 flex-shrink-0 mr-auto lg:mr-4 xl:mr-8">
            <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" alt="Logo IT Del" class="h-8 xl:h-10 w-auto">
            <div class="whitespace-nowrap logo-text-adaptive">
                <p class="text-[8px] md:text-[10px] font-bold tracking-widest uppercase mb-0.5 opacity-80">Institut Teknologi Del</p>
                <h1 class="text-xs md:text-sm xl:text-base font-bold leading-none uppercase">Prodi Bioteknologi</h1>
            </div>
        </a>

        <div class="hidden lg:flex items-center gap-4 xl:gap-6 font-bold text-[12px] xl:text-sm uppercase tracking-wide">
            
            <a href="/" class="py-5 relative {{ request()->is('/') ? 'nav-active' : 'nav-item' }}">BERANDA</a>

            <div class="group relative py-5">
                <button class="flex items-center gap-1 whitespace-nowrap {{ request()->is('profil*') ? 'nav-active' : 'nav-item' }}">
                    PROFIL <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-[#064e3b] min-w-[220px] top-[calc(100%-4px)] left-0 z-50 rounded-b-md overflow-hidden">
                    <a href="/profil" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-[#064e3b] border-b border-gray-100 text-sm font-bold transition">Profil</a>
                    <a href="/struktur" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-[#064e3b] border-b border-gray-100 text-sm font-bold transition">Struktur Organisasi</a>
                    <a href="{{ url('/kurikulum') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-[#064e3b] text-sm font-bold transition">KURIKULUM</a>
                </div>
            </div>

            <a href="/tenaga" class="py-5 relative whitespace-nowrap {{ request()->is('tenaga*') ? 'nav-active' : 'nav-item' }}">
                TENAGA Pendidik
            </a>
            
            <div class="group relative py-5">
                <button class="flex items-center gap-1 whitespace-nowrap {{ request()->is('prestasi*') ? 'nav-active' : 'nav-item' }}">
                    PRESTASI <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-[#064e3b] min-w-[220px] top-[calc(100%-4px)] left-0 z-50 rounded-b-md overflow-hidden">
                    <a href="/prestasi/dosen" class="block px-6 py-3 hover:bg-green-50 text-gray-700 hover:text-[#064e3b] border-b border-gray-100 text-sm font-bold transition">Prestasi Dosen</a>
                    <a href="{{ url('/prestasi/mahasiswa') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-700 hover:text-[#064e3b] border-b border-gray-100 text-sm font-bold transition">PRESTASI MAHASISWA</a>
                    <a href="{{ url('/prestasi/penelitian') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-700 hover:text-[#064e3b] text-sm font-bold transition">Penelitian (Riset)</a>
                </div>
            </div>

            <div class="group relative py-5">
                <button class="flex items-center gap-1 whitespace-nowrap {{ request()->is('kegiatan*') ? 'nav-active' : 'nav-item' }}">
                    KEGIATAN <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-[#064e3b] min-w-[240px] top-[calc(100%-4px)] left-0 z-50 rounded-b-md overflow-hidden">
                    <a href="{{ url('/kegiatan/dosen') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-700 hover:text-[#064e3b] border-b border-gray-100 text-sm font-bold transition">KEGIATAN DOSEN</a>
                    <a href="{{ url('/kegiatan/mahasiswa') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-700 hover:text-[#064e3b] text-sm font-bold transition">KEGIATAN MAHASISWA</a>
                    </div>
            </div>

            <div class="group relative py-5">
                <button class="flex items-center gap-1 whitespace-nowrap {{ request()->is('fasilitas*') || request()->is('laboratorium*') ? 'nav-active' : 'nav-item' }}">
                    FASILITAS <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute left-0 top-[calc(100%-4px)] w-56 bg-white rounded-b-md shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-[#064e3b] overflow-hidden">
                    <a href="{{ url('/fasilitas') }}" class="block px-5 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-[#064e3b] font-bold border-b border-gray-100 transition-colors uppercase">
                        RUANG KELAS
                    </a>
                    <a href="{{ url('/laboratorium') }}" class="block px-5 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-[#064e3b] font-bold transition-colors uppercase">
                        RUANG LABORATORIUM
                    </a>
                </div>
            </div>

            <div class="group relative py-5">
                <button class="flex items-center gap-1 whitespace-nowrap {{ request()->is('berita*') || request()->is('mitra*') || request()->is('testimoni*') ? 'nav-active' : 'nav-item' }}">
                    BERITA <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-[#064e3b] min-w-[220px] top-[calc(100%-4px)] left-0 z-50 rounded-b-md overflow-hidden">
                    <a href="{{ route('berita.lengkap') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-[#064e3b] border-b border-gray-100 text-sm font-bold transition">Berita Utama</a>
                    <a href="{{ url('/mitra') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-[#064e3b] border-b border-gray-100 text-sm font-bold transition">Mitra Kerja Sama</a>
                    <a href="{{ route('publik.testimoni') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-[#064e3b] text-sm font-bold transition">Testimoni Alumni</a>
                </div>
            </div>

        </div>

        <div class="hidden lg:flex items-center gap-3 xl:gap-4 flex-shrink-0">
            <button class="nav-item transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </div>

        <div class="lg:hidden flex-shrink-0">
            <button id="burger-btn" class="nav-item focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <div id="mobile-dropdown" class="hidden absolute top-full left-0 w-full mt-2 bg-white rounded-xl shadow-xl border border-gray-100 flex-col overflow-hidden max-h-[80vh] overflow-y-auto">
            <div class="flex flex-col text-sm font-bold text-gray-800">
                
                <a href="/" class="px-6 py-4 border-b border-gray-100 hover:bg-green-50 text-[#064e3b]">BERANDA</a>
                
                <div class="px-6 py-4 border-b border-gray-100">
                    <span class="text-[#064e3b] block mb-2 uppercase">Profil</span>
                    <div class="flex flex-col gap-3 pl-4 text-xs font-normal text-gray-600">
                        <a href="/profil" class="hover:text-[#064e3b] transition-colors">Tentang Program Studi</a>
                        <a href="/struktur" class="hover:text-[#064e3b] transition-colors">Struktur Organisasi</a>
                        <a href="{{ url('/kurikulum') }}" class="hover:text-[#064e3b] transition-colors">Kurikulum</a>
                    </div>
                </div>

                <a href="/tenaga" class="px-6 py-4 border-b border-gray-100 hover:bg-green-50 text-[#064e3b]">TENAGA PENGAJAR</a>
                
                <div class="px-6 py-4 border-b border-gray-100">
                    <span class="text-[#064e3b] block mb-2 uppercase">Prestasi</span>
                    <div class="flex flex-col gap-3 pl-4 text-xs font-normal text-gray-600">
                        <a href="/prestasi/dosen" class="hover:text-[#064e3b] transition-colors">Prestasi Dosen</a>
                        <a href="{{ url('/prestasi/mahasiswa') }}" class="hover:text-[#064e3b] transition-colors">Prestasi Mahasiswa</a>
                        <a href="{{ url('/kegiatan/penelitian') }}" class="hover:text-[#064e3b] transition-colors">Penelitian (Riset)</a>
                    </div>
                </div>

                <div class="px-6 py-4 border-b border-gray-100">
                    <span class="text-[#064e3b] block mb-2 uppercase">Kegiatan</span>
                    <div class="flex flex-col gap-3 pl-4 text-xs font-normal text-gray-600">
                        <a href="{{ url('/kegiatan/dosen') }}" class="hover:text-[#064e3b] transition-colors">Pengabdian Dosen (PKM)</a>
                        <a href="{{ url('/kegiatan/mahasiswa') }}" class="hover:text-[#064e3b] transition-colors">Kegiatan Mahasiswa</a>
                    </div>
                </div>

                <div class="px-6 py-4 border-b border-gray-100">
                    <span class="text-[#064e3b] block mb-2 uppercase">Fasilitas</span>
                    <div class="flex flex-col gap-3 pl-4 text-xs font-normal text-gray-600">
                        <a href="{{ url('/fasilitas') }}" class="hover:text-[#064e3b] transition-colors">Ruang Kelas</a>
                        <a href="{{ url('/laboratorium') }}" class="hover:text-[#064e3b] transition-colors">Laboratorium</a>
                    </div>
                </div>

                <div class="px-6 py-4 border-b border-gray-100">
                    <span class="text-[#064e3b] block mb-2 uppercase">Berita & Info</span>
                    <div class="flex flex-col gap-3 pl-4 text-xs font-normal text-gray-600">
                        <a href="{{ route('berita.lengkap') }}" class="hover:text-[#064e3b] transition-colors">Berita Utama</a>
                        <a href="{{ url('/mitra') }}" class="hover:text-[#064e3b] transition-colors">Mitra Kerja Sama</a>
                        <a href="{{ route('publik.testimoni') }}" class="hover:text-[#064e3b] transition-colors">Testimoni Alumni</a>
                    </div>
                </div>
                
                <div class="px-6 py-4 bg-gray-50 flex gap-6 justify-center mt-2">
                    <button class="text-gray-600 hover:text-[#064e3b] flex items-center gap-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <span>Cari</span>
                    </button>
                    <div class="w-px bg-gray-300"></div>
                    <a href="/admin" class="text-gray-600 hover:text-[#064e3b] flex items-center gap-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <span>Admin</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</nav>

<div class="h-16 w-full opacity-0 pointer-events-none"></div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Logika Navbar Scroll
        const navbar = document.getElementById("main-nav");
        window.addEventListener("scroll", function() {
            if (window.scrollY > 20) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });

        // Logika Toggle Menu Burger
        const burgerBtn = document.getElementById('burger-btn');
        const mobileDropdown = document.getElementById('mobile-dropdown');

        burgerBtn.addEventListener('click', () => {
            mobileDropdown.classList.toggle('hidden');
            mobileDropdown.classList.toggle('flex');
        });
    });
</script>
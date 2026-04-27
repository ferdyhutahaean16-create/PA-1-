<nav class="bg-green-900 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 h-20 flex justify-between items-center">
        
        <a href="/" class="flex items-center gap-3">
            <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" alt="Logo" class="h-12 w-auto">
            <div class="hidden md:block">
                <p class="text-xs font-bold text-gray-500 tracking-widest uppercase mb-0.5">Institut Teknologi Del</p>
                <h1 class="text-lg font-bold text-emerald-700 leading-none uppercase">Prodi Bioteknologi</h1>
            </div>
        </a>

        <div class="hidden lg:flex items-center gap-6 font-bold text-emerald-900 text-sm uppercase tracking-wide">
            
            <a href="/" class="hover:text-yellow-400 transition">BERANDA</a>

            <div class="group relative py-6">
                <button class="flex items-center gap-1 transition {{ request()->is('profil*') ? 'text-emerald-700 font-extrabold border-b-2 border-emerald-700' : 'hover:text-emerald-600' }}">
                    PROFIL 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-yellow-400 min-w-[220px] top-full left-0 z-50 rounded-b-md overflow-hidden">
                    <a href="/profil" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-green-800 border-b border-gray-100 text-sm font-bold transition">Tentang Program Studi</a>
                    <a href="/struktur" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-green-800 text-sm font-bold transition">Struktur Organisasi</a>
                    <a href="{{ url('/kurikulum') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-green-800 text-sm font-bold transition">KURIKULUM</a>
                </div>
            </div>

            <a href="/berita" class="transition py-6 {{ request()->is('berita*') ? 'text-emerald-700 font-extrabold border-b-2 border-emerald-700' : 'hover:text-emerald-600' }}">
                BERITA
            </a>

            <a href="/tenaga" class="transition py-6 {{ request()->is('tenaga*') ? 'text-emerald-700 font-extrabold border-b-2 border-emerald-700' : 'hover:text-emerald-600' }}">
                TENAGA PENGAJAR
            </a>
            
            <div class="group relative py-6">
                <button class="flex items-center gap-1 transition {{ request()->is('prestasi*') ? 'text-emerald-700 font-extrabold border-b-2 border-emerald-700' : 'hover:text-emerald-600' }}">
                    PRESTASI 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-yellow-400 min-w-[200px] top-full left-0 z-50">
                    <a href="/prestasi/dosen" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm transition">Prestasi Dosen</a>
                    <a href="{{ url('/prestasi/mahasiswa') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm transition">PRESTASI MAHASISWA</a>
                </div>
            </div>

            <div class="group relative py-6">
                <button class="flex items-center gap-1 transition {{ request()->is('kegiatan*') ? 'text-emerald-700 font-extrabold border-b-2 border-emerald-700' : 'hover:text-emerald-600' }}">
                    KEGIATAN 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-yellow-400 min-w-[240px] top-full left-0 z-50">
                    <a href="{{ url('/kegiatan/dosen') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm transition">PENGABDIAN DOSEN (PKM)</a>
                    <a href="{{ url('/kegiatan/mahasiswa') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm transition">Kegiatan Mahasiswa</a>
                    <a href="{{ url('/kegiatan/penelitian') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-700 text-sm transition">Penelitian (Riset)</a>
                </div>
            </div>

            <div class="relative group">
                <button class="flex items-center gap-1 text-white hover:text-yellow-400 font-bold uppercase tracking-wider py-2 transition-colors">
                    FASILITAS
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <div class="absolute left-0 mt-2 w-56 bg-white rounded-md shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border border-gray-100 overflow-hidden">
                    <a href="{{ url('/fasilitas') }}" class="block px-5 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#1a4a38] font-bold border-b border-gray-100 transition-colors uppercase">
                        RUANG KELAS
                    </a>
                    <a href="{{ url('/laboratorium') }}" class="block px-5 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#1a4a38] font-bold transition-colors uppercase">
                        LABORATORIUM
                    </a>
                </div>
            </div>

            <div class="group relative py-6">
                <button class="flex items-center gap-1 hover:text-yellow-400 transition uppercase font-bold tracking-wide text-sm {{ request()->is('berita*') || request()->is('mitra*') || request()->is('testimoni*') ? 'text-yellow-400' : '' }}">
                    BERITA 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-yellow-400 min-w-[220px] top-full left-0 z-50 rounded-b-md overflow-hidden">
                    
                    <a href="{{ route('berita.lengkap') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-green-800 border-b border-gray-100 text-sm font-bold transition">
                        Berita Utama
                    </a>
                    
                    <a href="{{ url('/mitra') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-green-800 border-b border-gray-100 text-sm font-bold transition">
                        Mitra Kerja Sama
                    </a>
                    
                    <a href="{{ route('publik.testimoni') }}" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-green-800 text-sm font-bold transition">
                        Testimoni Alumni
                    </a>
            
                </div>
            </div>

        </div>

            <button class="text-gray-400 hover:text-emerald-700 ml-4 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>

            <div class="h-6 w-px bg-white/40"></div>

            <a href="/admin" class="text-white hover:text-yellow-400 transition transform hover:scale-110" title="Login Admin">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </a>
        </div>

        <div class="lg:hidden">
            <button class="text-emerald-700">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

    </div>
</nav>
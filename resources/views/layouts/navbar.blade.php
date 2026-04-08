<nav class="bg-green-900 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 h-20 flex justify-between items-center">
        
        <a href="/" class="flex items-center gap-3">
            <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" alt="Logo" class="h-12 w-auto">
            <div class="hidden md:block">
                <p class="text-xs font-bold text-gray-300 tracking-widest uppercase mb-0.5">Institut Teknologi Del</p>
                <h1 class="text-lg font-bold text-white hover:text-yellow-400 transition">PRODI BIOTEKNOLOGI</h1>
            </div>
        </a>

        <div class="hidden lg:flex items-center gap-6 font-bold text-white text-sm uppercase tracking-wide">
            
            <a href="/" class="hover:text-yellow-400 transition">BERANDA</a>

            <div class="group relative py-6">
                <button class="flex items-center gap-1 hover:text-yellow-400 transition uppercase font-bold tracking-wide text-sm">
                    PROFIL 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-yellow-400 min-w-[220px] top-full left-0 z-50 rounded-b-md overflow-hidden">
                    <a href="/profil" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-green-800 border-b border-gray-100 text-sm font-bold transition">Tentang Program Studi</a>
                    <a href="/struktur" class="block px-6 py-3 hover:bg-green-50 text-gray-800 hover:text-green-800 text-sm font-bold transition">Struktur Organisasi</a>
                </div>
            </div>

            <a href="/dosen" class="hover:text-yellow-400 transition">TENAGA PENDIDIK</a>
            
            <div class="group relative py-6">
                <button class="flex items-center gap-1 hover:text-yellow-400 transition uppercase font-bold tracking-wide text-sm">
                    PRESTASI <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-yellow-400 min-w-[200px] top-full left-0 z-50">
                    <a href="/prestasi/dosen" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm transition">Prestasi Dosen</a>
                    <a href="/prestasi/mahasiswa" class="block px-6 py-3 hover:bg-green-50 text-gray-700 text-sm transition">Prestasi Mahasiswa</a>
                </div>
            </div>

            <div class="group relative py-6">
                <button class="flex items-center gap-1 hover:text-yellow-400 transition uppercase font-bold tracking-wide text-sm">
                    KEGIATAN <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-yellow-400 min-w-[240px] top-full left-0 z-50">
                    <a href="/kegiatan/dosen" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm transition">Pengabdian Dosen (PkM)</a>
                    <a href="/kegiatan/mahasiswa" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm transition">Kegiatan Mahasiswa</a>
                    <a href="/kegiatan/penelitian" class="block px-6 py-3 hover:bg-green-50 text-gray-700 text-sm transition">Penelitian (Riset)</a>
                </div>
            </div>

            <a href="/fasilitas" class="hover:text-yellow-400 transition">FASILITAS</a>
            <a href="/laboratorium" class="hover:text-yellow-400 transition">LABORATORIUM</a>
        </div>

        <div class="hidden lg:flex items-center gap-4">
            
            <button class="text-white hover:text-yellow-400 transition transform hover:scale-110">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>

            <div class="h-6 w-px bg-white/40"></div>

            <a href="/admin" class="text-white hover:text-yellow-400 transition transform hover:scale-110" title="Login Admin">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </a>
        </div>

        <div class="lg:hidden">
            <button class="text-white hover:text-yellow-400 transition">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

    </div>
</nav>
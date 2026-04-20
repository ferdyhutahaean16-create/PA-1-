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
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-emerald-700 min-w-[200px] top-full left-0 z-50">
                    <a href="/profil" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 border-b text-sm transition">Tentang Prodi</a>
                    <a href="/profil#visi-misi" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 border-b text-sm transition">Visi & Misi</a>
                    <a href="/profil#sejarah" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 border-b text-sm transition">Sejarah</a>
                    <a href="/profil#prospek" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 text-sm transition">Prospek Karir</a>
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
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-emerald-700 min-w-[200px] top-full left-0 z-50">
                    <a href="/prestasi/dosen" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 border-b text-sm">Prestasi Dosen</a>
                    <a href="/prestasi/mahasiswa" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 text-sm">Prestasi Mahasiswa</a>
                </div>
            </div>

            <div class="group relative py-6">
                <button class="flex items-center gap-1 transition {{ request()->is('kegiatan*') ? 'text-emerald-700 font-extrabold border-b-2 border-emerald-700' : 'hover:text-emerald-600' }}">
                    KEGIATAN 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-emerald-700 min-w-[240px] top-full left-0 z-50">
                    <a href="/kegiatan/dosen" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 border-b text-sm">Pengabdian Dosen (PkM)</a>
                    <a href="/kegiatan/mahasiswa" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 border-b text-sm">Kegiatan Mahasiswa</a>
                    <a href="/kegiatan/penelitian" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 text-sm">Penelitian (Riset)</a>
                </div>
            </div>

            <div class="group relative py-6">
                <button class="flex items-center gap-1 transition {{ request()->is('fasilitas*') ? 'text-emerald-700 font-extrabold border-b-2 border-emerald-700' : 'hover:text-emerald-600' }}">
                    FASILITAS 
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-emerald-700 min-w-[240px] top-full left-0 z-50">
                    <a href="/fasilitas/ruang-kelas" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 border-b text-sm transition">Ruang Kelas</a>
                    <a href="/fasilitas/laboratorium" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 border-b text-sm transition">Ruang Laboratorium</a>
                    <a href="/fasilitas/peminjaman" class="block px-6 py-3 hover:bg-emerald-50 text-gray-700 text-sm transition">Peminjaman Alat & Bahan</a>
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
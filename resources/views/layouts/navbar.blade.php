<div class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 h-20 flex justify-between items-center">
        <a href="/" class="flex items-center gap-3">
            <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" alt="Logo" class="h-12 w-auto">
            <div class="hidden md:block">
                <p class="text-xs font-bold text-gray-500 tracking-widest uppercase mb-0.5">Institut Teknologi Del</p>
                <h1 class="text-lg font-bold text-biotech-primary leading-none">PRODI BIOTEKNOLOGI</h1>
            </div>
        </a>

        <div class="hidden lg:flex items-center gap-6 font-bold text-biotech-primary text-sm uppercase tracking-wide">
            
            <div class="group relative py-6">
                <button class="flex items-center gap-1 hover:text-biotech-secondary transition">
                    PROFIL <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-biotech-primary min-w-[200px] top-full left-0 z-50">
                    <a href="/profil" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm">Tentang Prodi</a>
                    <a href="/profil#visi-misi" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm">Visi & Misi</a>
                    <a href="/profil#sejarah" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm">Sejarah</a>
                    <a href="/profil#prospek" class="block px-6 py-3 hover:bg-green-50 text-gray-700 text-sm">Prospek Karir</a>
                </div>
            </div>

            <a href="/struktur" class="hover:text-biotech-secondary transition">STRUKTUR ORGANISASI</a>

            <a href="/dosen" class="hover:text-biotech-secondary transition">DOSEN</a>
            
            <div class="group relative py-6">
                <button class="flex items-center gap-1 hover:text-biotech-secondary transition uppercase font-bold tracking-wide text-sm">
                    PRESTASI <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-biotech-primary min-w-[200px] top-full left-0 z-50">
                    <a href="/prestasi/dosen" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm">Prestasi Dosen</a>
                    <a href="/prestasi/mahasiswa" class="block px-6 py-3 hover:bg-green-50 text-gray-700 text-sm">Prestasi Mahasiswa</a>
                </div>
            </div>

            <div class="group relative py-6">
                <button class="flex items-center gap-1 hover:text-biotech-secondary transition uppercase font-bold tracking-wide text-sm">
                    KEGIATAN <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block bg-white shadow-xl border-t-4 border-biotech-primary min-w-[240px] top-full left-0 z-50">
                    <a href="/kegiatan/dosen" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm">Pengabdian Dosen (PkM)</a>
                    <a href="/kegiatan/mahasiswa" class="block px-6 py-3 hover:bg-green-50 text-gray-700 border-b border-gray-100 text-sm">Kegiatan Mahasiswa</a>
                    <a href="/kegiatan/penelitian" class="block px-6 py-3 hover:bg-green-50 text-gray-700 text-sm">Penelitian (Riset)</a>
                </div>
            </div>

            <a href="/fasilitas" class="hover:text-biotech-secondary transition">FASILITAS</a>

            <a href="/laboratorium" class="hover:text-biotech-secondary transition">LABORATORIUM</a>

            <a href="https://cis.del.ac.id" target="_blank" class="flex items-center gap-2 bg-gray-800 text-white px-5 py-2.5 rounded hover:bg-gray-700 transition shadow-lg transform hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                
                <span>CIS IT Del</span>
                
                <svg class="w-4 h-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
            
            <button class="text-gray-400 hover:text-biotech-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </div>

        <div class="lg:hidden">
            <button class="text-biotech-primary">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </div>
</div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Jost:wght@400;500;600;700&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --gold: #c6a54a;
}

.nav-glass {
    background: rgba(12, 36, 28, 0.95); /* Forest Dark dengan transparansi */
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(198, 165, 74, 0.2);
}

.font-serif-nav { font-family: 'Cormorant Garamond', serif; }
.font-sans-nav { font-family: 'Jost', sans-serif; }

.nav-link {
    position: relative;
    transition: all 0.3s ease;
    letter-spacing: 0.05em;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--gold);
    transition: width 0.3s ease;
}

.nav-link:hover::after {
    width: 100%;
}

.dropdown-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    border-top: 3px solid var(--gold);
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.group:hover .dropdown-card {
    transform: translateY(0);
}
</style>

<nav class="nav-glass shadow-lg sticky top-0 z-[100] font-sans-nav">
    <div class="container mx-auto px-6 h-24 flex justify-between items-center">
        
        <!-- BRANDING -->
        <a href="/" class="flex items-center gap-4 group">
            <div class="relative">
                <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" alt="Logo" class="h-14 w-auto transition-transform duration-500 group-hover:scale-110">
                <div class="absolute -inset-1 bg-[var(--gold)] opacity-0 group-hover:opacity-20 rounded-full blur transition-opacity"></div>
            </div>
            <div class="hidden md:block border-l border-white/20 pl-4">
                <p class="text-[10px] font-bold text-[var(--gold)] tracking-[0.4em] uppercase mb-0.5">Institut Teknologi Del</p>
                <h1 class="text-xl font-serif-nav font-bold text-white tracking-wide">PRODI BIOTEKNOLOGI</h1>
            </div>
        </a>

        <!-- MAIN LINKS -->
        <div class="hidden lg:flex items-center gap-8 font-bold text-white text-[11px] tracking-[0.15em]">
            
            <a href="/" class="nav-link hover:text-[var(--gold)] transition">BERANDA</a>

            <!-- DROPDOWN: PROFIL -->
            <div class="group relative py-8">
                <button class="flex items-center gap-1.5 hover:text-[var(--gold)] transition uppercase">
                    PROFIL 
                    <svg class="w-3 h-3 text-[var(--gold)] transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block dropdown-card min-w-[260px] top-full left-0 z-50 overflow-hidden">
                    <a href="/profil" class="block px-8 py-4 hover:bg-gray-50 text-[var(--forest-dark)] border-b border-gray-100 transition flex items-center justify-between group/item">
                        <span>Tentang Program Studi</span>
                        <span class="opacity-0 group-hover/item:opacity-100 transition-opacity text-[var(--gold)]">→</span>
                    </a>
                    <a href="/struktur" class="block px-8 py-4 hover:bg-gray-50 text-[var(--forest-dark)] transition flex items-center justify-between group/item">
                        <span>Struktur Organisasi</span>
                        <span class="opacity-0 group-hover/item:opacity-100 transition-opacity text-[var(--gold)]">→</span>
                    </a>
                </div>
            </div>

            <a href="/tenaga-pendidik" class="nav-link hover:text-[var(--gold)] transition">TENAGA PENDIDIK</a>
            
            <!-- DROPDOWN: PRESTASI -->
            <div class="group relative py-8">
                <button class="flex items-center gap-1.5 hover:text-[var(--gold)] transition uppercase">
                    PRESTASI 
                    <svg class="w-3 h-3 text-[var(--gold)] transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block dropdown-card min-w-[240px] top-full left-0 z-50 overflow-hidden">
                    <a href="/prestasi/dosen" class="block px-8 py-4 hover:bg-gray-50 text-[var(--forest-dark)] border-b border-gray-100 transition">Prestasi Dosen</a>
                    <a href="/prestasi/mahasiswa" class="block px-8 py-4 hover:bg-gray-50 text-[var(--forest-dark)] transition">Prestasi Mahasiswa</a>
                    <a href="/prestasi/penelitian" class="block px-8 py-4 hover:bg-gray-50 text-[var(--forest-dark)] transition">Penelitian (Riset)</a>
                </div>
            </div>

            <!-- DROPDOWN: KEGIATAN -->
            <div class="group relative py-8">
                <button class="flex items-center gap-1.5 hover:text-[var(--gold)] transition uppercase">
                    KEGIATAN 
                    <svg class="w-3 h-3 text-[var(--gold)] transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute hidden group-hover:block dropdown-card min-w-[280px] top-full left-0 z-50 overflow-hidden">
                    <a href="/kegiatan/dosen" class="block px-8 py-4 hover:bg-gray-50 text-[var(--forest-dark)] border-b border-gray-100 transition">Pengabdian Masyarakat</a>
                    <a href="/kegiatan/mahasiswa" class="block px-8 py-4 hover:bg-gray-50 text-[var(--forest-dark)] border-b border-gray-100 transition">Kegiatan Mahasiswa</a>
                </div>
            </div>

            <a href="/fasilitas" class="nav-link hover:text-[var(--gold)] transition">FASILITAS</a>
        </div>

        <!-- RIGHT ACTIONS -->
        <div class="hidden lg:flex items-center gap-6">
            <button class="text-white hover:text-[var(--gold)] transition transform hover:scale-110">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>

            <div class="h-8 w-[1px] bg-white/10"></div>

            <a href="/admin" class="flex items-center gap-2 px-5 py-2.5 bg-[var(--gold)] text-[var(--forest-dark)] rounded-full font-bold text-[10px] uppercase tracking-widest hover:bg-white transition-all shadow-lg shadow-[var(--gold)]/20" title="Portal Admin">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Portal
            </a>
        </div>

        <!-- MOBILE MENU BUTTON -->
        <div class="lg:hidden">
            <button class="text-[var(--gold)] p-2 hover:bg-white/10 rounded-lg transition">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

    </div>
</nav>
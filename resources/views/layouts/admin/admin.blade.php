<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Bioteknologi IT Del')</title>
    
    <!-- Link CSS & JS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        /* Desain scrollbar sidebar agar lebih minimalis */
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #475569; }
    </style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden text-gray-800 font-sans">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#0f172a] text-gray-300 h-screen flex flex-col border-r border-gray-800 shrink-0 shadow-xl z-20">
        
        <!-- Header Sidebar -->
        <div class="h-20 flex flex-col items-center justify-center border-b border-gray-800 bg-[#0b1320]">
            <h2 class="text-2xl font-bold text-[#22c55e] tracking-wide">Admin Panel</h2>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1">Bioteknologi IT Del</p>
        </div>

        <!-- Menu Navigasi -->
        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">
            
            <!-- Dashboard (Bisa diakses semua) -->
            <a href="{{ url('/admin') }}" class="block px-4 py-2.5 text-sm font-medium text-white hover:bg-gray-800 rounded-lg transition-colors">
                Dashboard
            </a>

            <!-- SECTION: KHUSUS SUPER ADMIN -->
            @if(Auth::user()->role == 'super_admin')
                
                <!-- 1. Profil Institusi -->
                <div class="mt-8 mb-3 px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                    Profil Institusi
                </div>
                <a href="{{ route('profil.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Visi & Misi (Umum)
                </a>
                <a href="{{ route('struktur-organisasi.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Struktur Organisasi
                </a>
                <a href="{{ route('cooperation.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Mitra Kerja Sama
                </a>

                <!-- 2. Akademik & SDM -->
                <div class="mt-8 mb-3 px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                    Akademik & SDM
                </div>
                <a href="{{ route('tenaga-pendidik.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Tenaga Pendidik
                </a>
                <a href="{{ route('kurikulum.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Data Kurikulum
                </a>
                <a href="{{ route('prestasi.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Manajemen Prestasi
                </a>
                <a href="{{ route('publikasi.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Data Publikasi
                </a>
                <a href="{{ route('kegiatan.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Data Kegiatan
                </a>

                <!-- 3. Konten Website -->
                <div class="mt-8 mb-3 px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                    Konten Website
                </div>
                <a href="{{ route('berita.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Kelola Berita Utama
                </a>
                <a href="{{ route('ruang-kelas.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Fasilitas Ruang Kelas
                </a>
                <a href="{{ route('testimoni.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    Testimoni Alumni
                </a>

            @endif

            <!-- SECTION: MANAJEMEN LABORATORIUM (Dilihat Keduanya) -->
            <div class="mt-8 mb-3 px-4 text-[10px] font-bold text-[#22c55e] uppercase tracking-widest">
                Manajemen Laboratorium
            </div>
            <a href="{{ route('admin.peminjaman.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                Manajemen Peminjaman
            </a>
            <a href="{{ route('laboratorium.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                Data Inventaris Lab
            </a>

        </div>

        <!-- Bagian Footer Sidebar (Info Akun & Logout) -->
        <div class="p-4 border-t border-gray-800 bg-[#0b1320] flex flex-col gap-3">
            @auth
            <div class="px-2 pb-2 border-b border-gray-800">
                <p class="text-[10px] text-gray-500 uppercase tracking-widest">Logged in as</p>
                <p class="text-sm font-bold text-[#22c55e] truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-gray-400 mt-0.5 italic">
                    Role: {{ Auth::user()->role == 'super_admin' ? 'Super Administrator' : 'Admin Laboratorium' }}
                </p>
            </div>
            @endauth

            <!-- Tombol Lihat Web -->
            <a href="{{ url('/') }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-2 px-4 bg-gray-800 hover:bg-gray-700 text-gray-300 text-center text-sm font-bold rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                Lihat Web
            </a>

            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="flex items-center justify-center gap-2 w-full py-2 px-4 bg-red-600 hover:bg-red-700 text-white text-center text-sm font-bold rounded-lg shadow-md transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>

    </aside>

    <!-- AREA KONTEN UTAMA -->
    <main class="flex-1 h-screen overflow-y-auto bg-gray-50 relative">
        @yield('content')
    </main>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Bioteknologi IT Del')</title>
    
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

    <aside class="w-64 bg-[#0f172a] text-gray-300 h-screen flex flex-col border-r border-gray-800 shrink-0 shadow-xl z-20">
        
        <div class="h-20 flex flex-col items-center justify-center border-b border-gray-800 bg-[#0b1320]">
            <h2 class="text-2xl font-bold text-[#22c55e] tracking-wide">Admin Panel</h2>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1">Bioteknologi IT Del</p>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-6 custom-scrollbar">
            
            <div class="space-y-1">
                <a href="{{ url('/admin') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold rounded-lg transition-all {{ request()->is('admin') ? 'bg-gray-800 text-white border-l-4 border-[#22c55e]' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                    Dashboard
                </a>
            </div>

            @if(Auth::user()->email === 'admin@del.ac.id')
                
                <div class="space-y-1">
                    <div class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">
                        Profil Institusi
                    </div>
                    <a href="{{ route('profil.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/profil*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Visi & Misi (Umum)
                    </a>
                    <a href="{{ route('struktur-organisasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/struktur-organisasi*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Struktur Organisasi
                    </a>
                    <a href="{{ route('kurikulum.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/kurikulum*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Data Kurikulum
                    </a>
                </div>

                <div class="space-y-1">
                    <div class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">
                        SDM & Akademik
                    </div>
                    <a href="{{ route('tenaga-pendidik.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/tenaga-pendidik*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Tenaga Pendidik
                    </a>
                </div>

                <div class="space-y-1">
                    <div class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">
                        Prestasi & Riset
                    </div>
                    <a href="{{ route('prestasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/prestasi*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Data Prestasi
                    </a>
                    <a href="{{ route('publikasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/publikasi*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Penelitian (Riset)
                    </a>
                </div>

                <div class="space-y-1">
                    <div class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">
                        Manajemen Kegiatan
                    </div>
                    <a href="{{ route('kegiatan.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/kegiatan*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Data Kegiatan
                    </a>
                </div>

            @endif

            <div class="space-y-1">
                <div class="px-4 text-[10px] font-bold text-[#22c55e] uppercase tracking-widest mb-2">
                    Fasilitas
                </div>
                
                @if(Auth::user()->email === 'admin@del.ac.id')
                    <a href="{{ route('ruang-kelas.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/ruang-kelas*') ? 'bg-gray-800 text-white border-l-2 border-[#22c55e]' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        Ruang Kelas Teori
                    </a>
                @endif
                
                <a href="{{ route('laboratorium.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/laboratorium*') ? 'bg-gray-800 text-white border-l-2 border-[#22c55e]' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    Fasilitas Laboratorium
                </a>
                <a href="{{ route('dokumen-rkf.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/dokumen-rkf*') ? 'bg-gray-800 text-white border-l-2 border-[#22c55e]' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Dokumen RKF Lab
                </a>
                <a href="{{ route('admin.peminjaman.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/peminjaman*') ? 'bg-gray-800 text-white border-l-2 border-[#22c55e]' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Manajemen Peminjaman
                </a>
            </div>

            @if(Auth::user()->email === 'admin@del.ac.id')
                <div class="space-y-1">
                    <div class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">
                        Berita & Info
                    </div>
                    <a href="{{ route('berita.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/berita*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Kelola Berita Utama
                    </a>
                    <a href="{{ route('cooperation.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/cooperation*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Mitra Kerja Sama
                    </a>
                    <a href="{{ route('testimoni.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->is('admin/testimoni*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        Testimoni Alumni
                    </a>
                </div>
            @endif
            
        </div>

        <div class="p-4 border-t border-gray-800 bg-[#0b1320] flex flex-col gap-3">
            @auth
            <div class="px-2 pb-2 border-b border-gray-800">
                <p class="text-[10px] text-gray-500 uppercase tracking-widest">Logged in as</p>
                <p class="text-sm font-bold text-[#22c55e] truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-gray-400 mt-0.5 italic">
                    Role: {{ Auth::user()->email === 'admin@del.ac.id' ? 'Super Administrator' : 'Admin Laboratorium' }}
                </p>
            </div>
            @endauth

            <a href="{{ url('/') }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-gray-800 hover:bg-gray-700 text-gray-300 text-center text-sm font-bold rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                Lihat Web
            </a>

            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-red-600 hover:bg-red-700 text-white text-center text-sm font-bold rounded-lg shadow-md transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>

    </aside>

    <main class="flex-1 h-screen overflow-y-auto bg-gray-50 relative">
        @yield('content')
    </main>

</body>
</html>
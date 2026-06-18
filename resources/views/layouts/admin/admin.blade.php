<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Bioteknologi IT Del')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        /* Desain scrollbar sidebar agar lebih cerah dan minimalis */
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-[#f8fafc] flex h-screen overflow-hidden text-gray-800 font-sans">

    <aside class="w-64 bg-white h-screen flex flex-col border-r border-gray-200 shrink-0 shadow-lg z-20 transition-all duration-300">
        
        <div class="h-20 flex flex-col items-center justify-center border-b border-gray-100 bg-white">
            <h2 class="text-2xl font-extrabold text-[#1a4a38] tracking-tight">Admin Panel</h2>
            <p class="text-[10px] text-emerald-600 font-semibold uppercase tracking-widest mt-0.5">Bioteknologi IT Del</p>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-6 custom-scrollbar">
            
            <div class="space-y-1">
                <a href="{{ url('/admin') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 {{ request()->is('admin') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-500 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                    Dashboard
                </a>
            </div>

            @if(Auth::user()->email === 'admin@del.ac.id')
                <div class="space-y-1.5">
                    <div class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Profil Institusi</div>
                    <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/profil*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Profil Umum
                    </a>
                    <a href="{{ route('organizational-structure.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/organizational-structure*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Struktur Organisasi
                    </a>
                    <a href="{{ route('curriculum.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/curriculum*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Kurikulum
                    </a>
                </div>

                <div class="space-y-1.5">
                    <div class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">SDM & Akademik</div>
                    <a href="{{ route('lecturer.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/lecturer*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Tenaga Pendidik
                    </a>
                </div>

                <div class="space-y-1.5">
                    <div class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Prestasi & Riset</div>
                    <a href="{{ route('achievement.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/prestasi*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Data Prestasi
                    </a>
                    <a href="{{ route('research.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/penelitian*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Penelitian
                    </a>
                    <a href="{{ route('publication.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/publikasi*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Publikasi
                    </a>
                </div>

                <div class="space-y-1.5">
                    <div class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Kegiatan</div>
                    <a href="{{ route('activity.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/kegiatan*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Kegiatan
                    </a>
                </div>
            @endif

            <div class="space-y-1.5">
                <div class="px-4 text-[10px] font-bold text-emerald-500 uppercase tracking-wider mb-2">Fasilitas</div>
                
                @if(Auth::user()->email === 'admin@del.ac.id')
                    <a href="{{ route('classroom.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/ruang-kelas*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        Ruang Kelas
                    </a>
                @endif
                
                <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/laboratorium*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    Ruang Laboratorium
                </a>
                <a href="{{ route('documents.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/dokumen-rkf*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Arsip Dokumen
                </a>
                <a href="{{ route('admin.peminjaman.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/peminjaman*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Peminjaman
                </a>
                <a href="{{ route('inventories.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/inventories*') ? 'bg-amber-50 text-amber-700 shadow-sm' : 'text-gray-500 hover:bg-amber-50 hover:text-amber-600' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Inventaris
                </a>
            </div>

            @if(Auth::user()->email === 'admin@del.ac.id')
                <div class="space-y-1.5">
                    <div class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Berita</div>
                    <a href="{{ route('news.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/berita*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Berita Utama
                    </a>
                    <a href="{{ route('cooperation.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/cooperation*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Mitra Kerja Sama
                    </a>
                    <a href="{{ route('testimonials.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('admin/testimoni*') ? 'bg-emerald-50 text-emerald-700 shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-emerald-600' }}">
                        Testimoni 
                    </a>
                </div>
            @endif
            
        </div>

        <div class="p-5 border-t border-gray-100 bg-gray-50 flex flex-col gap-3">
            @auth
            <div class="px-2 pb-3 border-b border-gray-200">
                <p class="text-[9px] text-gray-400 uppercase font-bold tracking-widest">Logged in as</p>
                <p class="text-sm font-bold text-gray-800 truncate mt-0.5">{{ Auth::user()->name }}</p>
                <p class="text-[10px] font-medium text-emerald-600 mt-1 bg-emerald-100 px-2 py-0.5 rounded-full inline-block">
                    {{ Auth::user()->email === 'admin@del.ac.id' ? 'Super Admin' : 'Admin Lab' }}
                </p>
            </div>
            @endauth

            <div class="flex gap-2 mt-1">
                <a href="{{ url('/') }}" target="_blank" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-white border border-gray-200 hover:border-emerald-500 hover:text-emerald-600 text-gray-600 text-xs font-bold rounded-lg transition-all duration-200 shadow-sm hover:shadow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    Web
                </a>

                <form action="{{ route('logout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-1.5 py-2 bg-red-50 text-red-600 hover:bg-red-500 hover:text-white text-xs font-bold rounded-lg transition-all duration-200 shadow-sm hover:shadow">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <main class="flex-1 h-screen overflow-y-auto bg-[#f8fafc] relative custom-scrollbar">
        @yield('content')
    </main>

</body>
</html>
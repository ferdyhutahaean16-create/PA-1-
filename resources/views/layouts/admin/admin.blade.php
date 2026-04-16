<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Bioteknologi IT Del')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Desain scrollbar agar sidebar terlihat elegan */
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

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">
            
            <a href="{{ url('/admin') }}" class="block px-4 py-2.5 text-sm font-medium text-white hover:bg-gray-800 rounded-lg transition-colors">
                Dashboard
            </a>

            <div class="mt-8 mb-3 px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                Profil Institusi
            </div>
            <a href="{{ route('profil.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                Informasi Umum (Visi Misi)
            </a>
            <a href="{{ route('struktur-organisasi.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                Struktur Organisasi (Dinamis)
            </a>

            <div class="mt-8 mb-3 px-4 text-sm font-bold text-[#22c55e]">
                Akademik & SDM
            </div>
            <a href="{{ route('tenaga-pendidik.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                Tenaga Pendidik
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

            <div class="mt-8 mb-3 px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                Fasilitas & Layanan
            </div>
            <a href="{{ route('ruang-kelas.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                Ruang Kelas
            </a>
            <a href="{{ route('admin.peminjaman.index') }}" class="block px-4 py-2.5 text-sm hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                Manajemen Peminjaman
            </a>
            <a href="{{ route('laboratorium.index') }}" class="block px-4 py-2.5 text-sm font-bold text-white bg-gray-800 rounded-lg transition-colors shadow-inner">
                Kelola Laboratorium
            </a>

        </div>

        <div class="p-4 border-t border-gray-800 bg-[#0f172a]">
            <a href="{{ url('/') }}" class="block w-full py-2.5 px-4 bg-red-600 hover:bg-red-700 text-white text-center text-sm font-bold rounded-lg shadow-md transition-colors">
                Kembali ke Web
            </a>
        </div>

    </aside>

    <main class="flex-1 h-screen overflow-y-auto bg-gray-50 relative">
        @yield('content')
    </main>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Bioteknologi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex">

    <aside class="w-64 bg-gray-900 text-white min-h-screen flex flex-col shadow-2xl">
        <div class="p-6 border-b border-gray-800 text-center">
            <h2 class="text-2xl font-bold text-green-400">Admin Panel</h2>
            <p class="text-xs text-gray-400 mt-1">Bioteknologi IT Del</p>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="/admin" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition">Dashboard</a>
            <div class="px-4 py-2 mt-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                Profil Institusi
            </div>

            <a href="{{ route('profil.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('profil.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:text-green-500 hover:bg-gray-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Informasi Umum (Visi Misi)
            </a>

            <a href="{{ route('struktur-organisasi.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('struktur-organisasi.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:text-green-500 hover:bg-gray-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Struktur Organisasi (Dinamis)
            </a>
            <a href="/admin/dosen" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition text-green-400 font-bold">Tenaga Pendidik</a>
            <a href="{{ route('prestasi.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('prestasi.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:text-green-500 hover:bg-gray-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                Manajemen Prestasi
            </a>
            <a href="{{ route('publikasi.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('publikasi.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:text-green-500 hover:bg-gray-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Data Publikasi
            </a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition">Data Prestasi</a>
            <a href="{{ route('kegiatan.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('kegiatan.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:text-green-500 hover:bg-gray-800' }}">
                <svg ...>...</svg>
                Data Kegiatan
            </a>
            <a href="{{ route('ruang-kelas.index') }}" class="flex items-center gap-3 px-4 py-3 mt-2 text-sm font-semibold rounded-lg transition-colors {{ request()->routeIs('ruang-kelas.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:text-green-500 hover:bg-gray-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Ruang Kelas
            </a>
            <a href="{{ route('admin.peminjaman.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded text-white">
                Manajemen Peminjaman
            </a>
            <a href="{{ route('laboratorium.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded text-white font-bold">
                Kelola Laboratorium
            </a>
        </nav>
        <div class="p-4 border-t border-gray-800">
            <a href="/" class="block py-2 px-4 bg-red-600 text-center rounded hover:bg-red-700 transition text-sm font-bold">Kembali ke Web</a>
        </div>
    </aside>

    <main class="flex-1 p-8">
        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
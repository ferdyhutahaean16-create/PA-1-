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
            <a href="/admin/dosen" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition text-green-400 font-bold">Data Dosen</a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition">Data Prestasi</a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition">Data Kegiatan</a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition">Data Lab & Alat</a>
            <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition">Peminjaman Lab</a>
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
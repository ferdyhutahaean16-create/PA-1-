@extends('layouts.main')

@section('title', 'Beranda - Prodi Bioteknologi IT Del')

@section('content')

<!-- HERO -->
<div class="relative w-full h-[90vh] flex items-center justify-center overflow-hidden bg-gray-900">
    
    <!-- VIDEO -->
    <div class="absolute inset-0 z-0">
        <video autoplay loop muted playsinline 
        class="w-full h-full object-cover">
            <source src="/tes.mp4" type="video/mp4">
        </video>

        <!-- overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80"></div>

        <!-- efek biotech -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(0,255,150,0.2),transparent_40%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_70%,rgba(255,255,0,0.15),transparent_40%)]"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto flex flex-col items-center">

        <div class="flex items-center gap-3 mb-6">
            <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" class="h-12 brightness-0 invert">
            <div class="border-l-2 border-yellow-400 pl-3 text-left">
                <p class="text-yellow-400 font-bold text-xs uppercase">Official Website</p>
                <p class="text-white text-xs">Institut Teknologi Del</p>
            </div>
        </div>

        <h2 class="text-2xl md:text-3xl text-white mb-2">
            Selamat Datang di Program Studi
        </h2>

        <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 animate-[floatText_4s_ease-in-out_infinite]">
            Sarjana <span class="text-yellow-400">Bioteknologi</span>
        </h1>

        <p class="text-lg text-gray-200 mb-10 max-w-3xl">
            Menghasilkan lulusan unggul yang mampu memanfaatkan teknologi hayati 
            untuk kesejahteraan masyarakat dan kemajuan bangsa.
        </p>

        <!-- BUTTON -->
        <div class="flex flex-col sm:flex-row gap-4">

            <a href="https://spmb.del.ac.id" target="_blank"
            class="relative overflow-hidden bg-yellow-400 text-green-900 font-bold px-8 py-4 rounded-full transition group">
                <span class="relative z-10">Daftar PMB Sekarang →</span>
                <span class="absolute inset-0 bg-white/30 opacity-0 group-hover:opacity-100 transition"></span>
            </a>

            <a href="#"
            class="bg-white/20 hover:bg-white/30 text-white border px-8 py-4 rounded-full transition">
                ▶ Tonton Video Profil
            </a>

        </div>

        <!-- FIX TEKS -->
        <p class="mt-12 text-sm text-white bg-black/40 px-4 py-2 rounded-full backdrop-blur-sm">
            Gelombang Pendaftaran: 
            <span class="text-yellow-400 font-bold">26 Jan - 27 Feb 2026</span>
        </p>

    </div>
</div>

<!-- STATS -->
<div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 mb-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-xl shadow-xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transition duration-300 hover:-translate-y-2 hover:scale-105">
            <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-green-800">✔</div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase">Akreditasi</p>
                <h3 class="text-2xl font-extrabold text-green-900">Baik Sekali</h3>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transition duration-300 hover:-translate-y-2 hover:scale-105">
            <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-green-800">💼</div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase">Serapan</p>
                <h3 class="text-2xl font-extrabold text-green-900">95% Bekerja</h3>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transition duration-300 hover:-translate-y-2 hover:scale-105">
            <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-green-800">👨‍🏫</div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase">Staf</p>
                <h3 class="text-2xl font-extrabold text-green-900">S2 & S3</h3>
            </div>
        </div>

    </div>
</div>

<!-- BERITA -->
<section class="py-16 bg-gradient-to-b from-white to-green-50">
    <div class="container mx-auto px-6">

        <div class="flex justify-between mb-10">
            <h2 class="text-3xl font-bold">Berita Terbaru</h2>
            <a href="#" class="text-green-800 font-bold hover:underline">Lihat Semua →</a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="group">
                <img src="{{ asset('images/berita/berita1.jpg') }}"
                onerror="this.src='https://source.unsplash.com/400x300/?biology'"
                class="w-full h-48 object-cover rounded-lg mb-3 transition group-hover:scale-105">
                <h3 class="font-bold">Prestasi Mahasiswa</h3>
            </div>

            <div class="group">
                <img src="{{ asset('images/berita/berita2.jpg') }}"
                onerror="this.src='https://source.unsplash.com/400x300/?lab'"
                class="w-full h-48 object-cover rounded-lg mb-3 transition group-hover:scale-105">
                <h3 class="font-bold">Kuliah Umum</h3>
            </div>

            <div class="group">
                <img src="{{ asset('images/berita/berita3.jpg') }}"
                onerror="this.src='https://source.unsplash.com/400x300/?research'"
                class="w-full h-48 object-cover rounded-lg mb-3 transition group-hover:scale-105">
                <h3 class="font-bold">Kerjasama BRIN</h3>
            </div>

        </div>
    </div>
</section>

<!-- MITRA -->
<section class="py-16 bg-gray-50 text-center">
    <h2 class="text-2xl font-bold text-green-900 mb-6">Mitra Kerjasama</h2>

    <div class="flex flex-wrap justify-center gap-10 opacity-70">

        <img src="{{ asset('images/mitra/google.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/microsoft.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/brin.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/5/55/BRIN_logo.png'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/itb.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/id/9/95/Logo_Institut_Teknologi_Bandung.png'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/netflix.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/amazon.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'" class="h-10 hover:scale-110 transition">

    </div>
</section>

@endsection
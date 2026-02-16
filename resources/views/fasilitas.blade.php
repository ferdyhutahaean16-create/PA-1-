@extends('layouts.main')

@section('title', 'Fasilitas - Ruang Kelas')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-biotech-primary mb-2">Fasilitas Akademik</h1>
        <p class="text-gray-500">Sarana dan Prasarana Penunjang Pembelajaran</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">

    <div class="mb-16">
        <div class="flex items-center gap-4 mb-8">
            <div class="bg-biotech-primary p-3 rounded-lg text-white">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Ruang Kelas Perkuliahan</h2>
                <p class="text-gray-500 text-sm">Nyaman, Modern, dan Terintegrasi Teknologi</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div>
                <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                    Program Studi Bioteknologi menyediakan ruang kelas yang dirancang untuk mendukung pembelajaran interaktif. Setiap ruang kelas memiliki pencahayaan alami yang cukup, sirkulasi udara yang baik, dan tata letak yang fleksibel untuk diskusi kelompok.
                </p>

                <h3 class="font-bold text-biotech-primary mb-4 border-b border-gray-200 pb-2">Kelengkapan Fasilitas:</h3>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Full AC (Air Conditioner)
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        LCD Proyektor & Layar
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Koneksi Wi-Fi High Speed
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Papan Tulis Glassboard
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Audio System
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Kapasitas 40-60 Mahasiswa
                    </li>
                </ul>
            </div>

            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-biotech-primary to-biotech-secondary rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                <img src="https://via.placeholder.com/600x400" alt="Suasana Kelas Besar" class="relative rounded-lg shadow-xl w-full object-cover border-4 border-white">
                <div class="absolute bottom-4 left-4 bg-black/60 text-white px-3 py-1 rounded text-sm">
                    Gedung Kuliah Umum (GKU) Lt. 2
                </div>
            </div>
        </div>

        <div class="mt-12">
            <h3 class="font-bold text-xl text-gray-800 mb-6 border-l-4 border-biotech-accent pl-4">Galeri Dokumentasi Ruang Kelas</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-2 rounded-lg shadow hover:shadow-lg transition">
                    <div class="h-48 overflow-hidden rounded">
                        <img src="https://via.placeholder.com/400x300" alt="Kelas Diskusi" class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    </div>
                    <p class="text-center text-sm text-gray-600 mt-2 font-semibold">Ruang Kelas Diskusi</p>
                </div>

                <div class="bg-white p-2 rounded-lg shadow hover:shadow-lg transition">
                    <div class="h-48 overflow-hidden rounded">
                        <img src="https://via.placeholder.com/400x300" alt="Kelas Teori" class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    </div>
                    <p class="text-center text-sm text-gray-600 mt-2 font-semibold">Ruang Teori & Presentasi</p>
                </div>

                <div class="bg-white p-2 rounded-lg shadow hover:shadow-lg transition">
                    <div class="h-48 overflow-hidden rounded">
                        <img src="https://via.placeholder.com/400x300" alt="Smart Classroom" class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    </div>
                    <p class="text-center text-sm text-gray-600 mt-2 font-semibold">Smart Classroom</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
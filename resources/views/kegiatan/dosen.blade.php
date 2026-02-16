@extends('layouts.main')

@section('title', 'Kegiatan PkM Dosen')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-biotech-primary mb-2">Pengabdian Kepada Masyarakat (PkM)</h1>
        <p class="text-gray-500">Kontribusi Dosen Bioteknologi untuk Masyarakat</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="space-y-8">
        <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
            <div class="md:w-1/3">
                <img src="https://via.placeholder.com/400x250" class="w-full h-full object-cover" alt="Dokumentasi PkM">
            </div>
            <div class="p-6 md:w-2/3 flex flex-col justify-center">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-biotech-secondary text-white text-xs font-bold px-2 py-1 rounded">2024</span>
                    <span class="text-gray-500 text-xs uppercase font-bold">Desa Sitoluama</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Pelatihan Pembuatan Kompos Organik bagi Petani Lokal</h3>
                <p class="text-gray-600 mb-4">
                    Kegiatan ini bertujuan untuk mengedukasi petani mengenai pemanfaatan limbah pertanian menjadi pupuk kompos yang bernilai ekonomis.
                </p>
                <div class="border-t pt-4">
                    <p class="text-sm font-bold text-biotech-primary">Ketua Pelaksana: Nama Dosen, M.Si.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
            <div class="md:w-1/3">
                <img src="https://via.placeholder.com/400x250" class="w-full h-full object-cover" alt="Dokumentasi PkM">
            </div>
            <div class="p-6 md:w-2/3 flex flex-col justify-center">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-biotech-secondary text-white text-xs font-bold px-2 py-1 rounded">2023</span>
                    <span class="text-gray-500 text-xs uppercase font-bold">Balige</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Sosialisasi Pangan Sehat Bebas Pengawet</h3>
                <p class="text-gray-600 mb-4">
                    Memberikan pemahaman kepada ibu-ibu PKK mengenai bahaya pengawet makanan dan alternatif pengawet alami.
                </p>
                <div class="border-t pt-4">
                    <p class="text-sm font-bold text-biotech-primary">Ketua Pelaksana: Nama Dosen B, Ph.D.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
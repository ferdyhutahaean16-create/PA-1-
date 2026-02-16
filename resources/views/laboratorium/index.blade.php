@extends('layouts.main')

@section('title', 'Daftar Laboratorium')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-biotech-primary mb-2">Fasilitas Laboratorium</h1>
        <p class="text-gray-500">Dukungan praktikum dan riset dengan peralatan modern</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($labs as $slug => $lab)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 group">
            <div class="relative h-56 overflow-hidden">
                <img src="{{ $lab['image'] }}" alt="{{ $lab['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-xl font-bold">{{ $lab['name'] }}</h3>
                    <p class="text-xs text-gray-200 opacity-90">{{ $lab['course'] }}</p>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 mb-4 text-gray-600 text-sm">
                    <svg class="w-5 h-5 text-biotech-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $lab['room'] }}
                </div>
                <a href="{{ route('lab.show', $slug) }}" class="block w-full text-center bg-biotech-primary text-white font-bold py-3 rounded-lg hover:bg-biotech-secondary transition">
                    Lihat Alat & Pinjam Bahan
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
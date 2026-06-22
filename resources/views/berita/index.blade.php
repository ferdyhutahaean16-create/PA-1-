@extends('layouts.main')

@section('title', 'Arsip Berita & Kegiatan - Bioteknologi IT Del')

@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --gold: #c6a54a;
    --soft-bg: #f5f7f6;
}

.font-serif { font-family: 'Cormorant Garamond', serif; }
.font-sans { font-family: 'Jost', sans-serif; }

.news-card {
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    background: white;
}
.news-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px -12px rgba(26, 74, 56, 0.15);
}

.filter-btn {
    transition: all 0.3s ease;
}
.filter-btn.active {
    background: var(--forest);
    color: white;
    box-shadow: 0 10px 20px -5px rgba(26, 74, 56, 0.3);
    border-color: var(--forest);
}
</style>
@endpush

@section('content')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ filter: 'Semua' }" class="bg-[var(--soft-bg)] min-h-screen py-16 font-sans">
    
    <div class="container mx-auto px-6 text-center mb-16">
        <span class="inline-block text-[var(--gold)] tracking-[0.3em] uppercase text-[10px] font-bold mb-4">
            LATEST UPDATES
        </span>
        <h1 class="font-serif text-4xl md:text-5xl text-[var(--forest-dark)] mb-6">
            Arsip Berita & Informasi
        </h1>
        <div class="w-20 h-[1px] bg-[var(--gold)]/50 mx-auto mb-10"></div>

        <div class="flex flex-wrap justify-center gap-4">
            <template x-for="cat in ['Semua', 'Berita Dosen', 'Berita Mahasiswa']">
                <button 
                    @click="filter = cat"
                    :class="filter === cat 
                        ? 'bg-[#1a4a38] text-white border-[#1a4a38] shadow-lg transform -translate-y-1' 
                        : 'bg-white text-gray-500 border-gray-200 hover:border-[#1a4a38]/50 hover:bg-gray-50'"
                    class="transition-all duration-300 px-8 py-3 rounded-full text-xs font-bold uppercase tracking-widest border">
                    <span x-text="cat"></span>
                </button>
            </template>
        </div>
    </div>

    <div class="container mx-auto px-6 max-w-7xl">
        <div class="flex flex-col gap-8">
            
            {{-- 1. LOOPING DATA BERITA (News) --}}
            @foreach($newsList as $item)
            @php 
                $title = strtolower($item->title);
                if (str_contains($title, 'mahasiswa') || str_contains($title, 'himatif')) {
                    $category = 'Berita Mahasiswa';
                } elseif (str_contains($title, 'dosen') || str_contains($title, 'pendidik')) {
                    $category = 'Berita Dosen';
                } else {
                    $category = 'Umum'; 
                }
            @endphp
            
            <div x-show="filter === 'Semua' || filter === '{{ $category }}'"
                 x-transition:enter="transition ease-out duration-500"
                 class="news-card rounded-[2rem] overflow-hidden border border-gray-100 flex flex-col md:flex-row">
                
                <div class="relative w-full md:w-5/12 h-64 md:h-auto shrink-0 bg-gray-100">
                    @if($item->image)
                        <img src="{{ asset($item->image) }}" class="absolute inset-0 w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400 italic">No Image</div>
                    @endif
                    <div class="absolute top-6 left-6 bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest text-[var(--forest)] shadow-sm">
                        {{ $category == 'Umum' ? 'Berita Utama' : $category }}
                    </div>
                </div>

                <div class="p-8 md:p-10 flex-1 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="text-xs font-bold tracking-widest text-[var(--gold)] uppercase">
                            {{ \Carbon\Carbon::parse($item->published_date)->format('d M Y') }}
                        </span>
                        <div class="w-8 h-[1px] bg-gray-200"></div>
                    </div>
                    
                    <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-4 leading-tight hover:text-[var(--gold)] transition-colors">
                        {{ $item->title }}
                    </h3>
                    
                    <p class="text-gray-500 text-sm leading-relaxed mb-8 line-clamp-3">
                        {{ strip_tags($item->content) }}
                    </p>

                    <div class="mt-auto pt-6 border-t border-gray-50">
                        <a href="{{ route('publik.berita.baca', $item->id) }}" class="group flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-[var(--forest)]">
                            <span class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center group-hover:bg-[var(--forest)] group-hover:text-white transition">
                                &rarr;
                            </span>
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- 2. LOOPING DATA KEGIATAN (Activity) --}}
            @foreach($activities as $item)
            @php 
                $kat = strtolower($item->category ?? '');
                $exec = strtolower($item->executor ?? '');
                $judul = strtolower($item->title ?? '');
                
                // Cek berbagai kata kunci mahasiswa
                if (
                    str_contains($kat, 'mahasiswa') || str_contains($exec, 'mahasiswa') || str_contains($judul, 'mahasiswa') ||
                    str_contains($kat, 'himatif') || str_contains($exec, 'himalogy') || str_contains($judul, 'himatif') ||
                    str_contains($kat, 'student')
                ) {
                    $category = 'Berita Mahasiswa';
                } 
                // Cek kata kunci dosen
                elseif (
                    str_contains($kat, 'dosen') || str_contains($exec, 'dosen') || 
                    str_contains($exec, 'dr.') || str_contains($exec, 'prof') || 
                    str_contains($kat, 'lecturer') || str_contains($judul, 'dosen')
                ) {
                    $category = 'Berita Dosen';
                } else {
                    $category = 'Umum';
                }
            @endphp
            
            <div x-show="filter === 'Semua' || filter === '{{ $category }}'"
                 x-transition:enter="transition ease-out duration-500"
                 class="news-card rounded-[2rem] overflow-hidden border border-gray-100 flex flex-col md:flex-row">
                
                <div class="relative w-full md:w-5/12 h-64 md:h-auto shrink-0 bg-gray-100">
                    @if($item->image)
                        <img src="{{ asset($item->image) }}" class="absolute inset-0 w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400 italic">No Image</div>
                    @endif
                    <div class="absolute top-6 left-6 bg-[var(--forest)]/90 backdrop-blur px-4 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest text-white shadow-sm">
                        Agenda Kegiatan
                    </div>
                </div>

                <div class="p-8 md:p-10 flex-1 flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="text-xs font-bold tracking-widest text-[var(--forest)] uppercase">
                            {{ \Carbon\Carbon::parse($item->execution_time)->format('d M Y') }}
                        </span>
                        <div class="w-8 h-[1px] bg-gray-200"></div>
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">{{ $item->location ?? 'IT Del' }}</span>
                    </div>

                    <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-4 leading-tight hover:text-[var(--gold)] transition-colors">
                        {{ $item->title }}
                    </h3>
                    
                    <p class="text-sm text-gray-500 mb-6 italic">
                        Pelaksana: <span class="font-semibold text-gray-700">{{ $item->executor }}</span>
                    </p>

                    <div class="mt-auto pt-6 border-t border-gray-50">
                        <a href="{{ route('publik.kegiatan.baca', $item->id) }}" class="group flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-[var(--gold)] hover:text-[var(--forest)] transition-colors">
                            <span class="w-8 h-8 rounded-full border border-[var(--gold)]/30 flex items-center justify-center group-hover:bg-[var(--forest)] group-hover:border-[var(--forest)] group-hover:text-white transition">
                                &rarr;
                            </span>
                            Lihat Detail Kegiatan
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
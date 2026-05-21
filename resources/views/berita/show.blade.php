@extends('layouts.main')

@section('title', $berita->judul)

@section('content')
<div class="container mx-auto px-6 py-24 mt-10 max-w-7xl">
    {{-- Grid Layout: Mobile menumpuk (flex-col), Desktop berdampingan (lg:flex-row) --}}
    <div class="flex flex-col lg:flex-row gap-10 items-start">
        
        {{-- 1. SIDEBAR KIRI: Berita Terbaru / Pengumuman --}}
        <div class="lg:w-1/3 w-full lg:sticky lg:top-24 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
            <h3 class="text-sm font-bold text-[#1a4a38] uppercase tracking-wider border-b border-gray-100 pb-3 mb-4">
                Berita Terbaru
            </h3>
            
            <div class="flex flex-col gap-4">
                @foreach($berita_terbaru as $terbaru)
                <a href="{{ route('publik.berita.baca', $terbaru->id) }}" class="group flex gap-3 items-center p-2 rounded-xl hover:bg-gray-50 transition">
                    @if($terbaru->foto)
                        <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0 border border-gray-100">
                            <img src="{{ asset($terbaru->foto) }}" alt="{{ $terbaru->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-all">
                        </div>
                    @endif
                    <div class="min-w-0">
                        <h4 class="font-bold text-gray-800 text-xs line-clamp-2 group-hover:text-[#1a4a38] transition-colors leading-snug">
                            {{ $terbaru->judul }}
                        </h4>
                        <p class="text-[10px] text-gray-400 mt-1">
                            {{ \Carbon\Carbon::parse($terbaru->tanggal)->translatedFormat('d M Y') }}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        {{-- 2. KONTEN KANAN: Detail Berita Utama --}}
        <div class="lg:w-2/3 w-full bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100">
            
            {{-- Label / Tanggal --}}
            <div class="flex items-center gap-2 text-xs text-amber-600 font-semibold uppercase tracking-wider mb-3">
                <span>Berita Kegiatan</span>
                <span class="text-gray-300">•</span>
                <span class="text-gray-500 font-medium lowercase">{{ $berita->views }} kali dilihat</span>
            </div>

            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $berita->judul }}
            </h1>
            
            <p class="text-xs text-gray-400 mb-6 font-medium">
                Diterbitkan pada: {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y') }}
            </p>

            {{-- Foto Utama Besar --}}
            @if($berita->foto)
                <div class="w-full rounded-2xl overflow-hidden mb-8 border border-gray-100">
                    <img src="{{ asset($berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-auto max-h-[450px] object-cover">
                </div>
            @endif

            {{-- Isi Berita Khusus Rich Text (CKEditor) --}}
            <div class="text-gray-700 leading-relaxed text-sm space-y-4 font-normal text-justify">
                {!! $berita->konten !!}
            </div>

        </div>

    </div>
</div>
@endsection
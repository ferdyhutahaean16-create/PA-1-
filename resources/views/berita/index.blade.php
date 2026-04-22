@extends('layouts.main')

@section('title', 'Semua Berita - Prodi Bioteknologi')

@section('content')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="bg-gray-50 py-16 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-extrabold text-[#1a4a38] mb-4 uppercase tracking-tight">Arsip Berita & Informasi</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">Kumpulan seluruh kegiatan dan pengumuman terbaru dari Program Studi Bioteknologi IT Del.</p>
    </div>
</div>

<div class="container mx-auto px-6 py-16 max-w-6xl min-h-screen">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($beritas as $berita)
        <div x-data="{ openModal: false }" class="bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-lg transition-all overflow-hidden flex flex-col group">
            
            <div class="overflow-hidden h-48 cursor-pointer" @click="openModal = true">
                @if($berita->foto)
                    <img src="{{ asset($berita->foto) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                @endif
            </div>

            <div class="p-6 flex-1 flex flex-col">
                <div class="flex items-center text-xs text-gray-400 mb-3">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-[#1a4a38]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                    </span>
                </div>
                
                <h3 @click="openModal = true" class="text-lg font-bold text-gray-800 mb-3 cursor-pointer group-hover:text-[#1a4a38] transition-colors">{{ $berita->judul }}</h3>
                <p class="text-sm text-gray-500 mb-6 flex-1 line-clamp-3">{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                <button @click="openModal = true" class="text-[#1a4a38] text-sm font-bold flex items-center gap-2 hover:underline">Baca selengkapnya →</button>
            </div>

            <div x-show="openModal" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
                <div @click.away="openModal = false" class="relative w-full max-w-3xl bg-white rounded-2xl shadow-2xl flex flex-col max-h-[90vh] overflow-hidden">
                    <button @click="openModal = false" class="absolute top-4 right-4 z-10 bg-black/50 text-white rounded-full p-2 hover:bg-black transition">✕</button>
                    <div class="overflow-y-auto w-full">
                        @if($berita->foto) <img src="{{ asset($berita->foto) }}" class="w-full h-80 object-cover"> @endif
                        <div class="p-8">
                            <p class="text-sm font-bold text-[#1a4a38] mb-2 uppercase">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}</p>
                            <h2 class="text-3xl font-extrabold text-gray-900 mb-6">{{ $berita->judul }}</h2>
                            <div class="text-gray-700 leading-relaxed text-justify space-y-4">{!! nl2br(e($berita->konten)) !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="col-span-3 text-center py-20 bg-white rounded-xl border border-dashed border-gray-300">
                <p class="text-gray-500 italic">Belum ada berita yang tersedia.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $beritas->links() }}
    </div>
</div>
@endsection
@extends('layouts.main') 

@section('title', 'Penelitian & Riset')

@section('content')
<div class="bg-gray-900 py-16 border-b border-gray-800 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/microbes.png')]"></div>
    
    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4 tracking-wide uppercase">Penelitian & Riset</h1>
        <p class="text-gray-400 max-w-2xl mx-auto text-lg">Inovasi dan penemuan terkini dari sivitas akademika Program Studi Bioteknologi.</p>
    </div>
</div>

<div class="container mx-auto px-6 py-16 max-w-5xl font-sans min-h-screen">
    
    <div class="mb-10 border-b-2 border-gray-200 pb-4 flex justify-between items-end">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-wider">Katalog Riset</h2>
            <div class="h-1 w-20 bg-blue-600 mt-2 rounded"></div>
        </div>
    </div>

    @if($penelitian->isEmpty())
        <div class="bg-gray-50 border border-dashed border-gray-300 rounded-xl p-12 text-center">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            <h3 class="text-lg font-bold text-gray-500">Belum Ada Data Penelitian</h3>
            <p class="text-gray-400 mt-1">Data riset dosen dan mahasiswa akan segera diperbarui.</p>
        </div>
    @else
        <div class="space-y-8">
            @foreach($penelitian as $item)
            <div class="flex flex-col md:flex-row bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300 group">
                
                <div class="w-full md:w-1/3 lg:w-1/4 relative bg-gray-100 flex-shrink-0">
                    @if($item->foto)
                        <img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-48 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-48 md:h-full flex flex-col items-center justify-center text-gray-400 bg-blue-50/50">
                            <svg class="w-12 h-12 mb-2 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            <span class="text-xs font-semibold uppercase tracking-wider text-blue-300">Riset Biotek</span>
                        </div>
                    @endif
                </div>

                <div class="w-full md:w-2/3 lg:w-3/4 p-6 md:p-8 flex flex-col justify-center">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-blue-700 transition-colors">
                        {{ $item->judul }}
                    </h3>
                    
                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-gray-600 mb-5 font-medium border-b border-gray-100 pb-4">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <span class="text-gray-900">Tim Peneliti: <span class="text-blue-700">{{ $item->pelaksana }}</span></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ $item->waktu_pelaksanaan }}</span>
                        </div>
                        @if($item->tempat)
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>{{ $item->tempat }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="text-gray-600 text-sm md:text-base leading-relaxed text-justify">
                        <span class="font-bold text-gray-800 text-xs uppercase tracking-widest block mb-2">Abstrak / Ringkasan Riset:</span>
                        {{ $item->deskripsi ?? 'Detail abstrak penelitian tidak dicantumkan.' }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
@extends('layouts.main')

@section('title', 'Penelitian')

@section('content')
<div class="container mx-auto py-20 mt-10 min-h-screen px-6 max-w-5xl">
    
    <div class="mb-12 text-center">
        <h1 class="text-4xl font-bold text-[#1a4a38] mb-4">Data Penelitian</h1>
        <p class="text-gray-500">Daftar penelitian yang dilakukan oleh sivitas akademika Program Studi Bioteknologi.</p>
    </div>

    <div class="mt-4">
        @if(isset($penelitians) && $penelitians->isEmpty())
            
            {{-- Tampilan jika data benar-benar masih kosong --}}
            <div class="flex flex-col items-center justify-center py-16 px-4 border-2 border-dashed border-gray-200 rounded-3xl bg-gray-50">
                <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                <p class="text-gray-500 italic text-sm">Belum ada data penelitian yang tersedia saat ini.</p>
            </div>

        @else

            {{-- Tampilan Grid Kartu Penelitian jika data ada --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($penelitians as $item)
                    <div class="bg-white border border-gray-100 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
                        
                        <div class="flex items-center gap-3 mb-5">
                            <span class="bg-[#1a4a38]/10 text-[#1a4a38] text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">
                                {{ $item->kategori }}
                            </span>
                            <span class="text-gray-300">•</span>
                            <span class="text-gray-500 text-xs font-bold">{{ $item->tahun }}</span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-800 mb-3 leading-snug group-hover:text-[#1a4a38] transition-colors">
                            {{ $item->judul }}
                        </h3>

                        <p class="text-xs text-gray-400 mb-5 uppercase tracking-wide border-b border-gray-50 pb-4">
                            Penulis: <span class="text-gray-700 font-bold">{{ $item->penulis }}</span>
                        </p>

                        @if($item->deskripsi)
                        <p class="text-sm text-gray-600 line-clamp-3 mb-6 leading-relaxed">
                            {{ $item->deskripsi }}
                        </p>
                        @endif

                        {{-- Tombol Aksi --}}
                        <div class="flex flex-wrap gap-3 mt-auto pt-2">
                            @if($item->file_pdf)
                                <a href="{{ asset($item->file_pdf) }}" target="_blank" class="inline-flex items-center gap-2 bg-[#1a4a38] text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-[#0f2e22] transition-all shadow-sm hover:shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    UNDUH PDF
                                </a>
                            @endif

                            @if($item->link_jurnal)
                                <a href="{{ $item->link_jurnal }}" target="_blank" class="inline-flex items-center gap-2 border-2 border-gray-100 text-gray-600 px-5 py-2.5 rounded-xl text-xs font-bold hover:border-gray-200 hover:bg-gray-50 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    SUMBER JURNAL
                                </a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

        @endif
    </div>

</div> @endsection


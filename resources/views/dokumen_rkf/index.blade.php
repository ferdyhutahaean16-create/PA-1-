@extends('layouts.main')

@section('title', 'Arsip Dokumen')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-24 max-w-6xl min-h-screen">
    
    {{-- 1. BAGIAN HEADER --}}
    <div class="mb-14">
        <div class="flex items-center gap-4 mb-3">
            <span class="text-4xl md:text-5xl font-serif text-[#1a4a38]/20 font-bold">01</span>
            <div class="w-16 h-px bg-[#1a4a38]/30"></div>
            <span class="text-[#1a4a38] text-xs font-bold tracking-[0.2em] uppercase">Unduhan Resmi</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-serif text-gray-900 mb-4">Arsip Dokumen</h1>
        <p class="text-gray-500 max-w-2xl text-sm leading-relaxed">
            Akses dan unduh berbagai dokumen resmi, peraturan, dan panduan praktikum terkait fasilitas Laboratorium Program Studi Bioteknologi IT Del.
        </p>
    </div>

    {{-- 2. BAGIAN KARTU DOKUMEN --}}
    @if($dokumen_rkfs->isEmpty())
        <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-3xl p-16 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            <p class="text-gray-500 italic font-medium">Belum ada dokumen yang tersedia saat ini.</p>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach($dokumen_rkfs as $doc)
            <div class="bg-white border border-gray-100 hover:border-[#1a4a38]/30 rounded-3xl p-6 md:p-8 flex flex-col sm:flex-row items-start gap-6 transition-all duration-300 shadow-sm hover:shadow-xl group">
                
                {{-- Ikon Dokumen --}}
                <div class="w-16 h-16 rounded-2xl bg-gray-50 border border-gray-100 flex items-center justify-center shrink-0 group-hover:bg-[#1a4a38]/5 transition-colors">
                    <svg class="w-8 h-8 text-[#1a4a38]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>

                <div class="flex-1 w-full">
                    <h3 class="text-lg font-bold text-gray-800 mb-2 uppercase leading-snug group-hover:text-[#1a4a38] transition-colors">
                        {{ $doc->judul }}
                    </h3>
                    
                    <p class="text-sm text-gray-500 mb-6 line-clamp-3 leading-relaxed">
                        {{ $doc->deskripsi ?? 'Tidak ada deskripsi untuk dokumen ini.' }}
                    </p>
                    
                    {{-- PENGECEKAN FILE KETAT --}}
                    @if(!empty($doc->file_dokumen))
                        {{-- Jika file ADA di database, tombol hijau muncul --}}
                        <a href="{{ route('dokumen-rkf.lihat', $doc->id) }}" target="_blank" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Lihat Dokumen
                        </a>
                    @else
                        {{-- Jika file KOSONG di database, tombol jadi abu-abu --}}
                        <span class="inline-flex items-center gap-2 bg-gray-100 text-gray-400 px-5 py-2.5 rounded-xl text-xs font-bold w-full sm:w-auto justify-center cursor-not-allowed">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            FILE KOSONG / GAGAL UPLOAD
                        </span>
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
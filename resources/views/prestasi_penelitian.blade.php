@extends('layouts.main')

@section('title', 'Penelitian')

@section('content')
<div class="container mx-auto py-20 mt-10 min-h-screen px-6 max-w-5xl">
    <div class="mb-12 text-center">
        <h1 class="text-4xl font-bold text-[#1a4a38] mb-4">Data Penelitian</h1>
        <p class="text-gray-500">Daftar penelitian yang dilakukan oleh sivitas akademika Program Studi Bioteknologi.</p>
    </div>

    {{-- Mengecek apakah data penelitian kosong --}}
    @if($penelitian->isEmpty())
        <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-12 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            <p class="text-gray-500 italic font-medium">Belum ada data penelitian yang tersedia saat ini.</p>
        </div>
    @else
        {{-- Jika ada data, tampilkan dalam bentuk grid (kotak-kotak) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($penelitian as $item)
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#7aab90] transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-50 p-3 rounded-lg text-[#1a4a38] mt-1 border border-emerald-100 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            {{-- ⚠️ PENTING: Ganti kata 'judul', 'nama_peneliti', dan 'tahun' di bawah ini dengan NAMA KOLOM yang ada di database Anda --}}
                            
                            <h3 class="font-bold text-lg text-gray-800 mb-2 leading-tight">
                                {{ $item->judul }} 
                            </h3>
                            
                            <p class="text-sm text-gray-600 mb-1">
                                <span class="font-semibold text-gray-700">Peneliti:</span> {{ $item->nama_peneliti ?? $item->dosen ?? 'Nama belum diisi' }}
                            </p>
                            
                            <p class="text-sm text-gray-600 mb-1">
                                <span class="font-semibold text-gray-700">Tahun:</span> {{ $item->tahun ?? $item->tahun_pelaksanaan ?? '-' }}
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
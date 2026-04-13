@extends('layouts.main') 

@section('title', 'Pengabdian Masyarakat (PKM) Dosen')

@section('content')
<div class="bg-[#1a4a38] py-16 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4 tracking-wide uppercase">Pengabdian Masyarakat</h1>
        <p class="text-green-100 max-w-2xl mx-auto">Kontribusi nyata dosen Program Studi Bioteknologi dalam menerapkan ilmu pengetahuan dan teknologi di tengah masyarakat.</p>
    </div>
</div>

<div class="container mx-auto px-6 py-16 max-w-6xl font-sans min-h-screen">
    
    <div class="mb-10 border-b-2 border-gray-200 pb-4 flex justify-between items-end">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 uppercase tracking-wider">Daftar Kegiatan PKM</h2>
            <div class="h-1 w-16 bg-yellow-500 mt-2 rounded"></div>
        </div>
    </div>

    @if($kegiatan->isEmpty())
        <div class="bg-gray-50 border border-dashed border-gray-300 rounded-xl p-12 text-center">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            <h3 class="text-lg font-bold text-gray-500">Belum Ada Data Kegiatan</h3>
            <p class="text-gray-400 mt-1">Data pengabdian dosen akan segera diperbarui.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($kegiatan as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300 group flex flex-col">
                
                <div class="relative h-56 overflow-hidden bg-gray-100">
                    @if($item->foto)
                        <img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <span class="italic text-sm">Tidak ada dokumentasi</span>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-[#1a4a38] text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                        {{ $item->waktu_pelaksanaan }}
                    </div>
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-green-700 transition-colors">
                        {{ $item->judul }}
                    </h3>
                    
                    <div class="space-y-2 mb-4 text-sm text-gray-600">
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="font-semibold text-gray-800">{{ $item->pelaksana }}</span>
                        </div>
                        @if($item->tempat)
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>{{ $item->tempat }}</span>
                        </div>
                        @endif
                    </div>

                    <p class="text-gray-600 text-sm line-clamp-3 mt-auto pt-4 border-t border-gray-100">
                        {{ $item->deskripsi ?? 'Detail kegiatan tidak dicantumkan.' }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
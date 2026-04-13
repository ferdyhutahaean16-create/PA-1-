@extends('layouts.main') @section('title', 'Mahasiswa Berprestasi')

@section('content')
<div class="bg-gray-50 py-12 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl font-bold text-[#1a4a38] mb-3">Mahasiswa Berprestasi</h1>
        <p class="text-gray-600">Pencapaian kompetisi, publikasi, dan tugas akhir mahasiswa</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12 max-w-6xl">
    
    <div class="flex justify-center gap-4 mb-16 overflow-x-auto pb-4">
        <button class="bg-[#1a4a38] text-white px-6 py-2.5 rounded-full font-semibold text-sm shadow-md whitespace-nowrap">
            Prestasi & Lomba
        </button>
        <button class="bg-white text-gray-700 border border-gray-300 px-6 py-2.5 rounded-full font-semibold text-sm hover:bg-gray-50 transition whitespace-nowrap">
            Publikasi
        </button>
        <button class="bg-white text-gray-700 border border-gray-300 px-6 py-2.5 rounded-full font-semibold text-sm hover:bg-gray-50 transition whitespace-nowrap">
            Hasil Tugas Akhir
        </button>
    </div>

    <div class="mb-8 border-b border-[#1a4a38] pb-3">
        <h2 class="text-2xl font-bold text-[#1a4a38]">Prestasi Kompetisi</h2>
    </div>

    @if($prestasi->isEmpty())
        <div class="text-gray-500 italic p-6 bg-gray-50 rounded-lg border border-gray-100">
            Belum ada data prestasi kompetisi mahasiswa.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @foreach($prestasi as $item)
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden relative flex flex-col transition-transform hover:-translate-y-1 hover:shadow-lg">
                <div class="h-2 w-full bg-yellow-500 absolute top-0 left-0"></div>

                <div class="p-6 pt-8 flex-1 flex flex-col">
                    <div class="flex justify-between items-center mb-4">
                        <span class="bg-yellow-100 text-yellow-800 text-[10px] font-bold px-2.5 py-1 rounded tracking-wider uppercase">
                            {{ $item->tingkat ?? 'PRESTASI' }}
                        </span>
                        <span class="text-sm text-gray-400 font-medium">{{ $item->tahun }}</span>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug">
                        {{ $item->judul_prestasi }}
                    </h3>

                    <p class="text-sm text-gray-600 mb-6 line-clamp-2 flex-1">
                        {{ $item->deskripsi ?? 'Detail prestasi tidak disebutkan.' }}
                    </p>

                    <div class="border-t border-gray-200 pt-4 flex items-center gap-3 mt-auto">
                        @if($item->foto)
                            <img src="{{ asset($item->foto) }}" alt="{{ $item->nama_peraih }}" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                        @else
                            <div class="w-10 h-10 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-500 font-bold text-xs uppercase">
                                {{ substr($item->nama_peraih, 0, 2) }}
                            </div>
                        @endif
                        
                        <div>
                            <p class="text-sm font-bold text-gray-900">{{ $item->nama_peraih }}</p>
                            <p class="text-[11px] text-gray-500 uppercase tracking-wide">Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    @endif

</div>
@endsection
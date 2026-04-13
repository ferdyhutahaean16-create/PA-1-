@extends('layouts.main') 

@section('title', 'Prestasi & Publikasi Dosen')

@section('content')
<div class="bg-gray-50 py-12 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl font-bold text-[#1a4a38] mb-3">Dosen Berprestasi</h1>
        <p class="text-gray-600">Pencapaian, penghargaan, dan publikasi ilmiah tenaga pendidik</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12 max-w-6xl font-sans">
    
    <div class="flex justify-center gap-4 mb-16 overflow-x-auto pb-4">
        <button onclick="switchTab('tab-prestasi')" id="btn-prestasi" class="tab-btn active bg-[#1a4a38] text-white px-6 py-2.5 rounded-full font-semibold text-sm shadow-md transition whitespace-nowrap border border-transparent">
            Penghargaan & Prestasi
        </button>
        <button onclick="switchTab('tab-publikasi')" id="btn-publikasi" class="tab-btn bg-white text-[#1a4a38] border border-gray-300 px-6 py-2.5 rounded-full font-semibold text-sm hover:bg-gray-50 transition whitespace-nowrap">
            Publikasi Ilmiah
        </button>
    </div>

    <div id="tab-prestasi" class="tab-content block">
        <div class="mb-8 border-b border-[#1a4a38] pb-3">
            <h2 class="text-2xl font-bold text-[#1a4a38]">Penghargaan & Prestasi</h2>
        </div>

        @if($prestasi->isEmpty())
            <div class="text-gray-500 italic p-6 bg-gray-50 rounded-lg border border-gray-100">Belum ada data penghargaan dosen.</div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($prestasi as $item)
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden relative flex flex-col hover:-translate-y-1 transition-transform">
                    <div class="h-2 w-full bg-blue-500 absolute top-0 left-0"></div>
                    <div class="p-6 pt-8 flex-1 flex flex-col">
                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-blue-100 text-blue-800 text-[10px] font-bold px-2.5 py-1 rounded tracking-wider uppercase">{{ $item->tingkat ?? 'PENGHARGAAN' }}</span>
                            <span class="text-sm text-gray-400 font-medium">{{ $item->tahun }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $item->judul_prestasi }}</h3>
                        <p class="text-sm text-gray-600 mb-6 line-clamp-2 flex-1">{{ $item->deskripsi }}</p>
                        <div class="border-t border-gray-200 pt-4 flex items-center gap-3 mt-auto">
                            @if($item->foto)
                                <img src="{{ asset($item->foto) }}" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                            @else
                                <div class="w-10 h-10 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-500 font-bold text-xs">{{ substr($item->nama_peraih, 0, 2) }}</div>
                            @endif
                            <div>
                                <p class="text-sm font-bold text-gray-900">{{ $item->nama_peraih }}</p>
                                <p class="text-[11px] text-gray-500 uppercase tracking-wide">Dosen Pembimbing/Peneliti</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <div id="tab-publikasi" class="tab-content hidden">
        <div class="mb-10 flex justify-center">
            <h2 class="text-2xl font-bold text-gray-900 uppercase tracking-wide">Publikasi Ilmiah</h2>
        </div>

        @if($publikasi->isEmpty())
            <div class="text-gray-500 italic p-6 bg-gray-50 rounded-lg border border-gray-100 text-center">Belum ada data publikasi dosen.</div>
        @else
            <div class="space-y-8">
                @foreach($publikasi as $pub)
                <div class="flex flex-col md:flex-row bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    
                    <div class="w-full md:w-[35%] lg:w-[30%] p-6 flex items-center justify-center border-b md:border-b-0 md:border-r border-gray-200 bg-white">
                        @if($pub->gambar)
                            <img src="{{ asset($pub->gambar) }}" alt="Cover Jurnal" class="max-h-48 w-auto object-contain">
                        @else
                            <div class="h-32 w-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm italic rounded">Sampul Belum Tersedia</div>
                        @endif
                    </div>

                    <div class="w-full md:w-[65%] lg:w-[70%] p-6 md:p-8 flex flex-col justify-center">
                        <h3 class="text-xl md:text-2xl font-bold text-[#0056b3] mb-4 leading-snug uppercase">
                            {{ $pub->judul }}
                        </h3>
                        
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-gray-900 font-bold mb-6">
                            <p>By: <span class="font-normal text-gray-600">{{ $pub->penulis }}</span></p>
                            <p>Date: <span class="font-normal text-gray-600">{{ $pub->tanggal_publikasi }}</span></p>
                            <p>Type: <span class="font-normal text-gray-600">{{ $pub->tipe_publikasi ?? 'Jurnal Ilmiah' }}</span></p>
                            
                            <div class="flex items-center gap-4 ml-auto text-[#0056b3] font-normal">
                                @if($pub->link_download)
                                <a href="{{ $pub->link_download }}" target="_blank" class="flex items-center gap-1 hover:underline">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download
                                </a>
                                @endif
                                @if($pub->link_view)
                                <a href="{{ $pub->link_view }}" target="_blank" class="flex items-center gap-1 hover:underline">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    View
                                </a>
                                @endif
                            </div>
                        </div>

                        <p class="text-gray-700 text-sm md:text-base leading-relaxed text-justify">
                            {{ $pub->deskripsi }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

<script>
    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('bg-[#1a4a38]', 'text-white', 'shadow-md', 'active');
            el.classList.add('bg-white', 'text-[#1a4a38]');
        });

        document.getElementById(tabId).classList.remove('hidden');
        
        let activeBtnId = tabId.replace('tab-', 'btn-');
        let activeBtn = document.getElementById(activeBtnId);
        activeBtn.classList.remove('bg-white', 'text-[#1a4a38]');
        activeBtn.classList.add('bg-[#1a4a38]', 'text-white', 'shadow-md', 'active');
    }
</script>
@endsection
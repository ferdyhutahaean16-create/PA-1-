@extends('layouts.main') 

@section('title', 'Kegiatan Kemahasiswaan')

@section('content')
<div class="bg-white py-12 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-[#1a4a38] mb-3">Kegiatan Kemahasiswaan</h1>
        <p class="text-gray-500">Himpunan, Kaderisasi, dan Pengabdian Mahasiswa</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12 max-w-6xl font-sans min-h-screen">
    
    <div class="flex justify-center gap-4 mb-16 overflow-x-auto pb-4">
        <button onclick="switchTab('tab-himpunan')" id="btn-himpunan" class="tab-btn active border border-[#1a4a38] text-[#1a4a38] font-semibold px-6 py-2 rounded-full hover:bg-gray-50 transition whitespace-nowrap">
            Himpunan
        </button>
        <button onclick="switchTab('tab-pkm')" id="btn-pkm" class="tab-btn border border-gray-300 text-gray-600 font-semibold px-6 py-2 rounded-full hover:bg-gray-50 transition whitespace-nowrap">
            PkM Mahasiswa
        </button>
        <button onclick="switchTab('tab-kaderisasi')" id="btn-kaderisasi" class="tab-btn border border-gray-300 text-gray-600 font-semibold px-6 py-2 rounded-full hover:bg-gray-50 transition whitespace-nowrap">
            Kaderisasi
        </button>
    </div>

    <div id="tab-himpunan" class="tab-content block">
        <div class="flex items-center gap-3 mb-8">
            <div class="h-8 w-1.5 bg-yellow-500 rounded-full"></div>
            <h2 class="text-2xl font-bold text-[#1a4a38]">Kegiatan Himpunan (HIMABIO)</h2>
        </div>

        @if($himpunan->isEmpty())
            <div class="text-gray-500 italic p-6 bg-gray-50 rounded-lg border border-gray-100">Belum ada data kegiatan himpunan mahasiswa.</div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($himpunan as $item)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                    <div class="relative h-64 overflow-hidden bg-gray-100">
                        @if($item->foto)
                            <img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm italic">Tanpa Gambar</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a4a38] mb-2">{{ $item->judul }}</h3>
                        <p class="text-sm text-gray-500 mb-2 font-semibold">{{ $item->pelaksana }} | {{ $item->waktu_pelaksanaan }}</p>
                        <p class="text-gray-600 text-sm line-clamp-2">{{ $item->deskripsi }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <div id="tab-pkm" class="tab-content hidden">
        <div class="flex items-center gap-3 mb-8">
            <div class="h-8 w-1.5 bg-yellow-500 rounded-full"></div>
            <h2 class="text-2xl font-bold text-[#1a4a38]">Pengabdian Masyarakat (PkM) Mahasiswa</h2>
        </div>

        @if($pkm->isEmpty())
            <div class="text-gray-500 italic p-6 bg-gray-50 rounded-lg border border-gray-100">Belum ada data pengabdian mahasiswa.</div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($pkm as $item)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                    <div class="relative h-64 overflow-hidden bg-gray-100">
                        @if($item->foto)
                            <img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm italic">Tanpa Gambar</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a4a38] mb-2">{{ $item->judul }}</h3>
                        <p class="text-sm text-gray-500 mb-2 font-semibold">{{ $item->pelaksana }} | {{ $item->waktu_pelaksanaan }}</p>
                        <p class="text-gray-600 text-sm line-clamp-2">{{ $item->deskripsi }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <div id="tab-kaderisasi" class="tab-content hidden">
        <div class="flex items-center gap-3 mb-8">
            <div class="h-8 w-1.5 bg-yellow-500 rounded-full"></div>
            <h2 class="text-2xl font-bold text-[#1a4a38]">Kegiatan Kaderisasi</h2>
        </div>
        
        @if($kaderisasi->isEmpty())
            <div class="text-gray-500 italic p-6 bg-gray-50 rounded-lg border border-gray-100">Belum ada data kegiatan kaderisasi.</div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($kaderisasi as $item)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                    <div class="relative h-64 overflow-hidden bg-gray-100">
                        @if($item->foto)
                            <img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm italic">Tanpa Gambar</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a4a38] mb-2">{{ $item->judul }}</h3>
                        <p class="text-sm text-gray-500 mb-2 font-semibold">{{ $item->pelaksana }} | {{ $item->waktu_pelaksanaan }}</p>
                        <p class="text-gray-600 text-sm line-clamp-2">{{ $item->deskripsi }}</p>
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
            el.classList.remove('border-[#1a4a38]', 'text-[#1a4a38]', 'active');
            el.classList.add('border-gray-300', 'text-gray-600');
        });

        document.getElementById(tabId).classList.remove('hidden');
        
        let activeBtnId = tabId.replace('tab-', 'btn-');
        let activeBtn = document.getElementById(activeBtnId);
        activeBtn.classList.remove('border-gray-300', 'text-gray-600');
        activeBtn.classList.add('border-[#1a4a38]', 'text-[#1a4a38]', 'active');
    }
</script>
@endsection
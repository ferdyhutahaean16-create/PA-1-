@extends('layouts.main')

@section('title', 'Mitra Kerja Sama - Prodi Bioteknologi IT Del')

@section('content')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="bg-white min-h-screen" x-data="{ filter: 'Semua' }">
    <div class="bg-[#1a4a38] py-20 px-6">
        <div class="container mx-auto max-w-6xl text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 uppercase tracking-tight">Mitra Kerja Sama</h1>
            <p class="text-green-100 text-lg max-w-3xl mx-auto leading-relaxed">
                Prodi Bioteknologi IT Del menjalin kolaborasi strategis dengan berbagai instansi di tingkat nasional maupun internasional untuk meningkatkan kualitas pendidikan, riset, dan pengabdian masyarakat.
            </p>
        </div>
    </div>

    <div class="sticky top-20 z-40 bg-white border-b border-gray-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 max-w-6xl flex flex-wrap justify-center gap-4">
            <template x-for="category in ['Semua', 'Industri', 'Pendidikan', 'Pemerintah']">
                <button 
                    @click="filter = category"
                    :class="filter === category ? 'bg-[#1a4a38] text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                    class="px-6 py-2 rounded-full text-sm font-bold transition-all duration-300"
                    x-text="category">
                </button>
            </template>
        </div>
    </div>

    <div class="container mx-auto px-6 py-16 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($cooperations as $mitra)
            <div 
                x-show="filter === 'Semua' || filter === '{{ $mitra->type }}'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col items-center text-center group">
                
                <div class="w-24 h-24 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center justify-center mb-6 overflow-hidden p-3 group-hover:scale-110 transition-transform duration-300">
                    @if($mitra->logo)
                        <img src="{{ asset($mitra->logo) }}" alt="Logo {{ $mitra->partner_name }}" class="w-full h-full object-contain">
                    @else
                        @if($mitra->type == 'Industri')
                            <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        @elseif($mitra->type == 'Pendidikan')
                            <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        @else
                            <svg class="w-10 h-10 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                        @endif
                    @endif
                </div>

                <span class="text-[10px] font-bold uppercase tracking-[0.2em] mb-2 px-3 py-1 rounded-full 
                    {{ $mitra->type == 'Industri' ? 'bg-blue-50 text-blue-600' : '' }}
                    {{ $mitra->type == 'Pendidikan' ? 'bg-emerald-50 text-emerald-600' : '' }}
                    {{ $mitra->type == 'Pemerintah' ? 'bg-purple-50 text-purple-600' : '' }}">
                    {{ $mitra->type }}
                </span>

                <h3 class="text-xl font-extrabold text-gray-800 mb-4">{{ $mitra->partner_name }}</h3>
                
                <p class="text-sm text-gray-500 leading-relaxed mb-6 flex-1">
                    {{ $mitra->description ?? 'Menjalin kolaborasi dalam pengembangan riset bioteknologi dan program magang mahasiswa.' }}
                </p>

                <div class="pt-6 border-t border-gray-50 w-full">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Sejak {{ \Carbon\Carbon::parse($mitra->start_date)->format('Y') }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                <p class="text-gray-400 italic">Belum ada data mitra yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
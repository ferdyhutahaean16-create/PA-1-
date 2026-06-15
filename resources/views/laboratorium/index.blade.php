@extends('layouts.main')

@section('title', 'Laboratorium Terpadu')

@section('content')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="relative w-full bg-gradient-to-b from-gray-50 to-gray-100 py-16 md:py-20 overflow-hidden border-b border-gray-200">
    <div class="absolute inset-0 z-0" style="background-image: radial-gradient(#94a3b8 1px, transparent 1px); background-size: 24px 24px; opacity: 0.3;"></div>
    
    <div class="relative z-10 text-center px-6 container mx-auto">
        <span class="inline-block text-yellow-600 tracking-[0.3em] uppercase text-[10px] md:text-xs font-bold mb-3">
            Fasilitas Riset Terpadu
        </span>
        <h1 class="font-serif text-4xl md:text-5xl text-[#0d2a1f] font-bold tracking-tight mb-4">
            Laboratorium Bioteknologi
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto font-sans font-light leading-relaxed text-sm md:text-base mb-6">
            Pusat inovasi dan penelitian sivitas akademika Program Studi Bioteknologi IT Del, dilengkapi dengan instrumen mutakhir berstandar industri.
        </p>
        <div class="w-16 h-[2px] bg-yellow-500 mx-auto"></div>
    </div>
</div>

<div class="bg-white py-16">
    <div class="container mx-auto px-6 max-w-5xl">
        
        @if(isset($labs) && $labs->isEmpty())
            <div class="py-20 text-center border-2 border-dashed border-gray-200 rounded-2xl bg-gray-50">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-1">Belum Ada Data Laboratorium</h3>
                <p class="text-sm text-gray-500">Administrator belum menambahkan fasilitas laboratorium ke dalam sistem.</p>
            </div>
        @elseif(isset($labs))
            <div class="flex flex-col gap-4">
                @foreach($labs as $i => $lab)
                <div x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }" 
                     class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                    
                    <button @click="open = !open" class="w-full px-6 py-5 flex items-center justify-between bg-white hover:bg-gray-50 transition-colors duration-200 text-left">
                        <div class="flex items-center gap-6">
                            <span class="font-serif text-3xl font-bold text-gray-200 w-10">
                                {{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            
                            <div>
                                <h3 class="font-serif text-xl md:text-2xl font-bold text-[#0d2a1f] mb-1">
                                    {{ $lab->nama_lab }}
                                </h3>
                                @if($lab->kepala_lab)
                                    <p class="text-xs text-gray-500 tracking-wide uppercase font-semibold">
                                        Koordinator: <span class="text-gray-700">{{ $lab->kepala_lab }}</span>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <span class="hidden md:flex items-center gap-1.5 px-3 py-1 bg-green-50 border border-green-100 text-green-700 text-xs font-semibold rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Aktif
                            </span>
                            
                            <div class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center bg-white transition-transform duration-300"
                                 :class="{'rotate-180 bg-[#0d2a1f] border-[#0d2a1f] text-white': open, 'text-gray-400': !open}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </button>

                    <div x-show="open" x-collapse class="border-t border-gray-100 bg-gray-50/50">
                        <div class="p-6 md:p-8 grid md:grid-cols-12 gap-8 lg:gap-12">
                            
                            <div class="md:col-span-7">
                                <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">Tentang Laboratorium</h4>
                                <div class="text-gray-600 text-sm leading-relaxed mb-6 text-justify">
                                    {!! $lab->deskripsi ?? 'Informasi deskripsi belum tersedia untuk laboratorium ini.' !!}
                                </div>

                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="grid grid-cols-3 border-b border-gray-100">
                                        <div class="col-span-1 bg-gray-50 px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center">Kepala Lab</div>
                                        <div class="col-span-2 px-4 py-3 text-sm text-gray-800 font-medium">{{ $lab->kepala_lab ?? '—' }}</div>
                                    </div>
                                    <div class="grid grid-cols-3">
                                        <div class="col-span-1 bg-gray-50 px-4 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center">Fasilitas Utama</div>
                                        <div class="col-span-2 px-4 py-3 text-sm text-gray-800">{{ $lab->fasilitas ?? '—' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-5">
                                <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">Dokumentasi</h4>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach(['foto', 'foto_2', 'foto_3', 'foto_4'] as $f)
                                        @if($lab->$f)
                                            <img src="{{ asset($lab->$f) }}" class="w-full aspect-[4/3] object-cover rounded-md border border-gray-200 shadow-sm hover:opacity-90 transition-opacity" alt="Dokumentasi {{ $lab->nama_lab }}">
                                        @else
                                            <div class="w-full aspect-[4/3] bg-gray-100 border border-dashed border-gray-300 rounded-md flex items-center justify-center text-gray-400">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        
    </div>
</div>
@endsection
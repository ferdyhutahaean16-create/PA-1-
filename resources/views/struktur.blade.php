@extends('layouts.main') @section('title', 'Struktur Organisasi')

@section('content')
<div class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-green-800 mb-4">Struktur Organisasi</h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Struktur organisasi kami dirancang untuk memastikan tata kelola yang transparan, efisien, dan kolaboratif demi mendukung visi menjadi program studi unggulan.
            </p>
        </div>

        <div class="flex flex-col items-center space-y-12 overflow-x-auto pb-10">

            @if($struktur->isEmpty())
                <div class="bg-yellow-50 text-yellow-800 p-6 rounded-lg border border-yellow-200">
                    <p class="text-center font-semibold">Bagan belum tersedia. Admin belum memasukkan data struktur organisasi.</p>
                </div>
            @else
                
                @for($i = 1; $i <= 4; $i++)
                    @php 
                        // Menyaring data hanya untuk level yang sedang di-looping
                        $levelItems = $struktur->where('level', $i); 
                    @endphp

                    @if($levelItems->count() > 0)
                        <div class="flex flex-wrap justify-center gap-8 relative w-full max-w-6xl">
                            
                            @foreach($levelItems as $item)
                                <div class="bg-[#0070c0] text-white rounded-xl shadow-xl w-64 flex flex-col items-center p-6 text-center z-10 transition-transform duration-300 hover:-translate-y-2 border-b-4 border-green-600">
                                    
                                    @if($item->foto)
                                        <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-md mb-5 bg-white">
                                    @else
                                        <div class="w-28 h-28 rounded-full bg-blue-400 border-4 border-white flex items-center justify-center mb-5 shadow-md">
                                            <svg class="w-12 h-12 text-white/70" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                        </div>
                                    @endif

                                    <h3 class="font-bold text-sm uppercase tracking-wide mb-2 min-h-[40px] flex items-center justify-center leading-snug">
                                        {{ $item->jabatan }}
                                    </h3>
                                    
                                    <div class="w-12 h-1 bg-yellow-400 mb-4 rounded-full"></div>
                                    
                                    <p class="text-sm font-medium tracking-wide">
                                        {{ $item->nama }}
                                    </p>
                                </div>
                            @endforeach

                        </div>

                        @if($i < $struktur->max('level'))
                            <div class="w-1 h-8 bg-gray-300 rounded-full my-[-24px] z-0"></div>
                        @endif

                    @endif
                @endfor
            @endif

        </div>
    </div>
</div>
@endsection
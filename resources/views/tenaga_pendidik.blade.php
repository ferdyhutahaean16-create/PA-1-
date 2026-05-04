@extends('layouts.main')
@section('title', 'Tenaga Pendidik - Prodi Bioteknologi IT Del')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --gold: #c6a54a;
    --soft-bg: #f5f7f6;
}

.font-serif { font-family: 'Cormorant Garamond', serif; }
.font-sans { font-family: 'Jost', sans-serif; }

/* Faculty Card Design */
.faculty-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2.5rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.faculty-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px -12px rgba(26, 74, 56, 0.15);
}

.photo-frame {
    position: relative;
    display: inline-block;
}

.photo-frame::after {
    content: '';
    position: absolute;
    top: 10px;
    right: -10px;
    width: 100%;
    height: 100%;
    border: 2px solid var(--gold);
    border-radius: 1.5rem;
    z-index: -1;
}

.info-label {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: var(--gold);
    font-weight: 700;
}
</style>

<!-- HEADER -->
<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
    <div class="relative z-10 py-24 text-center px-6">
        <span class="inline-block text-[var(--gold)] tracking-[0.5em] uppercase text-[10px] font-bold mb-4">Academic Excellence</span>
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight">Tenaga Pendidik</h1>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-8 opacity-60"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-20 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <div class="grid grid-cols-1 gap-12">
            @forelse($tenaga_pendidiks as $tenaga_pendidik)
            <div class="faculty-card overflow-hidden shadow-sm flex flex-col md:flex-row">
                
                <!-- PHOTO SECTION -->
                <div class="w-full md:w-5/12 lg:w-4/12 p-10 flex items-center justify-center bg-white/30">
                    <div class="photo-frame">
                        @if($tenaga_pendidik->foto)
                            <img src="{{ asset($tenaga_pendidik->foto) }}" alt="{{ $tenaga_pendidik->nama }}" 
                                 class="w-64 h-80 rounded-2xl object-cover shadow-xl bg-white border-4 border-white">
                        @else
                            <div class="w-64 h-80 rounded-2xl bg-gray-200 flex items-center justify-center border-4 border-white shadow-xl text-gray-400">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- INFO SECTION -->
                <div class="w-full md:w-7/12 lg:w-8/12 p-10 md:p-14 flex flex-col justify-center">
                    <div class="mb-6">
                        <span class="inline-block px-4 py-1 rounded-full bg-[var(--forest)] text-[var(--gold)] text-[10px] font-bold uppercase tracking-widest mb-4">
                            Faculty Member
                        </span>
                        <h2 class="font-serif text-3xl md:text-4xl text-[var(--forest-dark)] leading-tight">{{ $tenaga_pendidik->nama }}</h2>
                        <p class="text-[var(--gold)] font-medium mt-1 tracking-wide">{{ $tenaga_pendidik->jabatan }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm text-gray-700">
                        <!-- NIDN -->
                        <div>
                            <p class="info-label mb-1">NIDN</p>
                            <p class="font-semibold text-[var(--forest-dark)]">{{ $tenaga_pendidik->nidn }}</p>
                        </div>
                        <!-- Email -->
                        <div>
                            <p class="info-label mb-1">Email Official</p>
                            <a href="mailto:{{ $tenaga_pendidik->email }}" class="font-semibold text-blue-700 hover:underline break-words">
                                {{ $tenaga_pendidik->email }}
                            </a>
                        </div>
                        <!-- Ruangan -->
                        <div>
                            <p class="info-label mb-1">Ruang Kerja</p>
                            <p class="font-semibold text-[var(--forest-dark)]">{{ $tenaga_pendidik->ruangan }}</p>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-gray-100">
                        <p class="info-label mb-4 text-[var(--gold)]">Latar Belakang Pendidikan</p>
                        <ul class="space-y-3">
                            @foreach(explode(',', $tenaga_pendidik->lulusan) as $pendidikan)
                                @if(trim($pendidikan) != '')
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[var(--forest)] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                                    <span class="text-gray-600 leading-snug">{{ trim($pendidikan) }}</span>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <div class="faculty-card p-20 text-center border-dashed border-2 border-gray-300">
                <p class="text-gray-400 font-serif text-2xl italic">Data dosen sedang diperbarui.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
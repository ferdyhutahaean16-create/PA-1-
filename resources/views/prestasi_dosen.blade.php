@extends('layouts.main')

@section('title', 'Prestasi Dosen - Bioteknologi IT Del')

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

/* Glass Cards */
.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2.5rem;
}

.award-card {
    transition: all 0.3s ease;
    border-top: 4px solid transparent;
}
.award-card:hover {
    border-top: 4px solid var(--gold);
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.05);
}
</style>

<div class="relative w-[100vw] left-[50%] right-[50%] -ml-[50vw] -mr-[50vw] bg-gray-50 py-10 md:py-12 overflow-hidden border-b border-gray-100"> 
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('Adminlte/dist/img/BGH.jpg') }}"
             alt="Chemistry Background" 
             class="w-full h-full object-cover opacity-30 mix-blend-overlay">
    </div>

    <div class="absolute inset-0 bg-gradient-to-r from-[#1a4a38]/80 to-transparent z-0"></div>

    <div class="relative z-10 container mx-auto px-6 text-center flex flex-col items-center justify-center">
        <p class="text-yellow-500 text-[10px] md:text-xs font-bold tracking-[0.35em] uppercase mb-3">
        </p>
        
        <h1 class="text-3xl md:text-4xl font-serif text-white mb-4">
            Dosen Berprestasi
        </h1>
        
        <div class="w-16 h-px bg-yellow-500/50"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-16 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">

        <div class="mb-16 text-center">
            <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-4">Rekognisi & Penghargaan</h2>
            <p class="text-gray-500 italic">Apresiasi atas dedikasi pengajaran dan kontribusi inovatif tenaga pendidik.</p>
        </div>

        @if($prestasi->isEmpty())
            <div class="glass-card p-20 text-center italic text-gray-400">Belum ada data penghargaan dosen yang tercatat.</div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($prestasi as $item)
                <div class="glass-card p-8 award-card flex flex-col">
                    
                    {{-- Tingkat & Tahun --}}
                    <div class="flex justify-between items-start mb-6">
                        <span class="bg-[var(--forest)] text-[var(--gold)] text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-tighter">
                            {{ $item->level ?? 'Nasional' }}
                        </span>
                        <span class="font-serif text-2xl text-[var(--gold)]/40 font-bold tracking-tighter">
                            {{ \Carbon\Carbon::parse($item->date_earned)->format('Y') }}
                        </span>
                    </div>
                    
                    {{-- Judul Prestasi --}}
                    <h3 class="font-serif text-2xl text-[var(--forest-dark)] mb-3 leading-snug">
                        {{ $item->achievement_name }}
                    </h3>

                    {{-- Penyelenggara --}}
                    @if($item->organizer)
                        <p class="text-[10px] uppercase tracking-widest font-bold text-gray-400 mb-4">
                            Penyelenggara: <span class="text-[var(--forest)]">{{ $item->organizer }}</span>
                        </p>
                    @endif

                    {{-- Deskripsi (Hanya muncul jika ada isinya) --}}
                    @if($item->description)
                        <p class="text-gray-600 text-sm leading-relaxed mb-8 flex-1 italic">
                            {!! $item->description !!}
                        </p>
                    @else
                        {{-- Ruang kosong agar posisi footer tetap sejajar ke bawah --}}
                        <div class="mb-8 flex-1"></div>
                    @endif
                    
                    {{-- Footer Kartu (Foto & Nama) --}}
                    <div class="flex items-center gap-4 pt-6 border-t border-gray-100 mt-auto">
                        
                        @if($item->certificate_file)
                            <img src="{{ asset($item->certificate_file) }}" class="w-12 h-12 rounded-xl object-cover border-2 border-white shadow-sm">
                        @else
                            <div class="w-12 h-12 rounded-xl bg-[var(--forest-dark)] flex items-center justify-center text-[var(--gold)] font-bold text-xs uppercase">
                                {{ substr($item->achiever_name, 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <p class="text-sm font-bold text-[var(--forest-dark)]">{{ $item->achiever_name }}</p>
                            <p class="text-[10px] uppercase text-[var(--gold)] font-bold tracking-widest">Faculty Member</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection
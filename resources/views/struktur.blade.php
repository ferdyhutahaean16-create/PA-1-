@extends('layouts.main')
@section('title', 'Struktur Organisasi')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --forest-light: #2f7a5a;
    --gold: #c6a54a;
    --soft-bg: #f5f7f6;
}

.font-serif { font-family: 'Cormorant Garamond', serif; }
.font-sans { font-family: 'Jost', sans-serif; }

.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.org-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.org-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(26, 74, 56, 0.1);
}

/* Garis penghubung antar level */
.connector-line {
    width: 2px;
    height: 40px;
    background: linear-gradient(to bottom, var(--gold), transparent);
}
</style>

<div class="py-20 bg-[var(--soft-bg)] min-h-screen font-sans">
    <div class="container mx-auto px-6">
        
        <!-- HEADER -->
        <div class="text-center mb-20">
            <span class="text-[var(--gold)] tracking-[0.4em] uppercase text-xs font-bold mb-4 block">Tata Kelola Prodi</span>
            <h1 class="text-5xl font-serif text-[var(--forest-dark)] mb-6">Struktur Organisasi</h1>
            <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg leading-relaxed">
                Struktur organisasi kami dirancang untuk memastikan tata kelola yang transparan, efisien, dan kolaboratif demi mendukung visi menjadi program studi unggulan.
            </p>
        </div>

        <div class="flex flex-col items-center space-y-0">

            @if($struktur->isEmpty())
                <div class="glass-card text-[var(--forest)] p-10 rounded-3xl border border-[var(--forest)]/20 shadow-sm">
                    <p class="text-center font-medium italic">Data struktur organisasi belum tersedia saat ini.</p>
                </div>
            @else
                
                @for($i = 1; $i <= 4; $i++)
                    @php 
                        $levelItems = $struktur->where('level', $i); 
                    @endphp

                    @if($levelItems->count() > 0)
                        <div class="flex flex-wrap justify-center gap-10 relative w-full max-w-7xl py-8">
                            
                            @foreach($levelItems as $item)
                                <div class="org-card glass-card rounded-[2.5rem] w-72 flex flex-col items-center p-8 text-center z-10 shadow-sm border-b-4 border-[var(--gold)]">
                                    
                                    <!-- Foto Frame -->
                                    <div class="relative mb-6">
                                        @if($item->foto)
                                            <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" 
                                                 class="w-32 h-32 rounded-2xl object-cover border-4 border-white shadow-lg bg-white">
                                        @else
                                            <div class="w-32 h-32 rounded-2xl bg-gray-100 border-4 border-white flex items-center justify-center shadow-lg text-gray-300">
                                                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                            </div>
                                        @endif
                                        <!-- Badge Level (Optional) -->
                                        <div class="absolute -bottom-2 -right-2 bg-[var(--forest)] text-[var(--gold)] text-[10px] font-bold px-3 py-1 rounded-full shadow-sm uppercase tracking-tighter">
                                            Level {{ $i }}
                                        </div>
                                    </div>

                                    <h3 class="font-serif text-[var(--forest)] text-base font-bold uppercase tracking-wider mb-2 min-h-[40px] flex items-center justify-center leading-tight">
                                        {{ $item->jabatan }}
                                    </h3>
                                    
                                    <div class="w-10 h-[1px] bg-[var(--gold)]/50 mb-4"></div>
                                    
                                    <p class="text-[var(--forest-dark)] text-sm font-semibold tracking-wide">
                                        {{ $item->nama }}
                                    </p>
                                </div>
                            @endforeach

                        </div>

                        <!-- Garis Penghubung antar Level -->
                        @if($i < $struktur->max('level') && $struktur->where('level', $i+1)->count() > 0)
                            <div class="connector-line"></div>
                        @endif

                    @endif
                @endfor
            @endif

        </div>
    </div>
</div>
@endsection
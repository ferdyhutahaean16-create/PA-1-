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
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.6);
}

.org-card {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.org-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px -12px rgba(26, 74, 56, 0.15);
}

/* Garis penghubung antar level */
.connector-line {
    width: 2px;
    height: 50px;
    background: linear-gradient(to bottom, var(--gold), transparent);
}
</style>

<div class="relative w-full bg-gray-50 py-10 md:py-12 overflow-hidden border-b border-gray-100">
    
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=2070&auto=format&fit=crop" 
             alt="Chemistry Background" 
             class="w-full h-full object-cover opacity-10 mix-blend-multiply">
    </div>

    <div class="relative z-10 text-center px-6 container mx-auto">
        
        <h1 class="font-serif text-3xl md:text-4xl text-[#0d2a1f] font-bold tracking-tight mb-3">
            Struktur Organisasi
        </h1>
        
        <p class="text-gray-600 max-w-2xl mx-auto font-sans font-light leading-relaxed text-sm md:text-base">
            Struktur organisasi kami dirancang untuk memastikan tata kelola yang transparan, efisien, dan kolaboratif demi mendukung visi menjadi program studi unggulan.
        </p>
        
        <div class="w-16 h-[1px] bg-yellow-600/40 mx-auto mt-6"></div>
    </div>
</div>

<div class="container mx-auto px-6 py-16">
    <div class="flex flex-col items-center space-y-0">

        @if($struktur->isEmpty())
            <div class="glass-card text-[var(--forest)] p-12 rounded-3xl border border-[var(--forest)]/20 shadow-sm w-full max-w-2xl text-center">
                    <div class="w-16 h-16 mx-auto bg-[var(--forest)]/10 rounded-full flex items-center justify-center mb-4 text-[var(--forest)]">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <p class="font-medium italic text-lg">Data struktur organisasi belum tersedia saat ini.</p>
                </div>
            @else
                
                @for($i = 1; $i <= 4; $i++)
                    @php 
                        $levelItems = $struktur->where('level', $i); 
                    @endphp

                    @if($levelItems->count() > 0)
                        <div class="flex flex-wrap justify-center gap-12 relative w-full max-w-7xl py-6">
                            
                            @foreach($levelItems as $item)
                                <div class="org-card group glass-card rounded-[2.5rem] w-80 flex flex-col items-center p-8 text-center z-10 shadow-sm border-b-4 border-[var(--gold)] relative overflow-hidden">
                                    
                                    <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-[var(--forest)]/5 to-transparent pointer-events-none"></div>
                                    
                                    <div class="relative mb-8 mt-2 w-full flex justify-center z-10">
                                        <div class="absolute w-40 h-44 md:w-44 md:h-48 rounded-[1.8rem] bg-gradient-to-br from-[var(--gold)] to-yellow-600 transform translate-x-3 translate-y-3 opacity-70 group-hover:translate-x-4 group-hover:translate-y-4 group-hover:opacity-100 transition-all duration-500"></div>

                                        <div class="relative w-40 h-44 md:w-44 md:h-48 rounded-[1.8rem] bg-white border-[6px] border-white shadow-xl overflow-hidden transform group-hover:-translate-y-1 transition-all duration-500">
                                            @if($item->foto)
                                                <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" 
                                                     class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                                            @else
                                                <div class="w-full h-full bg-gray-50 flex items-center justify-center text-gray-300">
                                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <h3 class="font-serif text-[var(--forest-dark)] text-base md:text-lg font-bold uppercase tracking-widest mb-3 min-h-[48px] flex items-center justify-center leading-snug z-10">
                                        {{ $item->jabatan }}
                                    </h3>
                                    
                                    <div class="w-12 h-[2px] bg-[var(--gold)]/60 mb-4 transition-all duration-500 group-hover:w-24 group-hover:bg-[var(--gold)] z-10"></div>
                                    
                                    <p class="text-gray-800 text-[15px] font-bold tracking-wide z-10">
                                        {{ $item->nama }}
                                    </p>
                                </div>
                            @endforeach

                        </div>

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
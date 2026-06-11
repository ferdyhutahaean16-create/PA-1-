@extends('layouts.main')

@section('title', 'Mitra Kerja Sama - Prodi Bioteknologi IT Del')

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

/* Glassmorphism */
.glass-nav {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(15px);
    border-bottom: 1px solid rgba(26, 74, 56, 0.1);
}

/* Partnership Card */
.partner-card {
    background: white;
    border-radius: 2rem;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    border: 1px solid rgba(0,0,0,0.03);
    display: flex;
    flex-direction: column;
}

.partner-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 30px 60px -12px rgba(26, 74, 56, 0.12);
    border-color: var(--gold);
}

.logo-wrapper {
    position: relative;
    transition: all 0.4s ease;
}

.logo-wrapper::after {
    content: '';
    position: absolute;
    inset: -4px;
    border: 1px solid var(--gold);
    border-radius: 1.5rem;
    opacity: 0;
    transition: 0.4s;
}

.partner-card:hover .logo-wrapper::after {
    opacity: 1;
    inset: -8px;
}

/* Type Badges */
.badge-industri { background: #f0fdf4; color: #166534; }
.badge-pendidikan { background: #eff6ff; color: #1e40af; }
.badge-pemerintah { background: #faf5ff; color: #6b21a8; }

.filter-btn {
    transition: all 0.3s ease;
    border: 1px solid transparent;
}
.filter-btn.active {
    background: var(--forest);
    color: var(--gold);
    box-shadow: 0 10px 20px -5px rgba(26, 74, 56, 0.3);
}
</style>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="bg-[var(--soft-bg)] min-h-screen font-sans" x-data="{ filter: 'Semua' }">
    
    <!-- PREMIUM HERO SECTION -->
<div class="relative w-full bg-[#0d2a1f] py-10 overflow-hidden border-b border-[#1a4a38]">
    
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=2070&auto=format&fit=crop" 
             alt="Chemistry Background" 
             class="w-full h-full object-cover opacity-20">
    </div>

    <div class="relative z-10 text-center px-6 container mx-auto">
        
        <span class="inline-block text-yellow-500 tracking-[0.4em] uppercase text-[9px] md:text-[10px] font-bold mb-3">
            Strategic Alliances
        </span>
        
        <h1 class="font-serif text-3xl md:text-4xl text-white font-bold tracking-tight mb-3">
            Mitra Kerja Sama
        </h1>
        
        <p class="text-green-100/80 max-w-2xl mx-auto font-sans font-light leading-relaxed text-sm md:text-base mb-5">
            Membangun ekosistem inovasi melalui kolaborasi strategis dengan institusi global untuk memajukan pendidikan dan riset bioteknologi.
        </p>
        
        <div class="w-16 h-[1px] bg-yellow-500/50 mx-auto"></div>
        
    </div>
</div>

    <!-- STICKY FILTER BAR -->
    <div class="sticky top-0 z-40 glass-nav shadow-sm">
        <div class="container mx-auto px-6 py-5 max-w-6xl flex flex-wrap justify-center gap-3">
            <template x-for="category in ['Semua', 'Industri', 'Pendidikan', 'Pemerintah']">
                <button 
                    @click="filter = category"
                    :class="filter === category ? 'active' : 'bg-white text-gray-400 border-gray-100'"
                    class="filter-btn px-8 py-3 rounded-full text-[10px] font-bold uppercase tracking-widest transition-all">
                    <span x-text="category"></span>
                </button>
            </template>
        </div>
    </div>

    <!-- PARTNERS GRID -->
    <div class="container mx-auto px-6 py-20 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($cooperations as $mitra)
            <div 
                x-show="filter === 'Semua' || filter === '{{ $mitra->type }}'"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-8"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="partner-card p-10 group">
                
                <!-- Logo Container -->
                <div class="logo-wrapper w-28 h-28 bg-white rounded-2xl flex items-center justify-center mb-8 mx-auto shadow-sm p-4">
                    @if($mitra->logo)
                        <img src="{{ asset($mitra->logo) }}" alt="{{ $mitra->partner_name }}" class="w-full h-full object-contain">
                    @else
                        <div class="text-[var(--gold)]">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="text-center flex-1 flex flex-col">
                    <span class="inline-block text-[9px] font-extrabold uppercase tracking-[0.2em] mb-4 px-4 py-1.5 rounded-full mx-auto
                        {{ $mitra->type == 'Industri' ? 'badge-industri' : '' }}
                        {{ $mitra->type == 'Pendidikan' ? 'badge-pendidikan' : '' }}
                        {{ $mitra->type == 'Pemerintah' ? 'badge-pemerintah' : '' }}">
                        {{ $mitra->type }}
                    </span>

                    <h3 class="font-serif text-2xl text-[var(--forest-dark)] mb-4 leading-tight group-hover:text-[var(--gold)] transition-colors">
                        {{ $mitra->partner_name }}
                    </h3>
                    
                    <div class="text-gray-500 text-sm leading-relaxed mb-8 flex-1 italic">
                        {!! $mitra->description ?? 'Berkolaborasi dalam penguatan kurikulum berbasis industri dan riset terapan untuk solusi masa depan.' !!}
                    </div>

                    <div class="pt-6 border-t border-gray-50 mt-auto">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-3 h-3 text-[var(--gold)]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Partner Since {{ \Carbon\Carbon::parse($mitra->start_date)->format('Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 text-center">
                <div class="glass-card rounded-[3rem] p-16 inline-block border-dashed border-2 border-gray-200">
                    <p class="text-gray-400 font-serif text-xl italic">Database mitra sedang diperbarui.</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- FOOTER QUOTE -->
        <div class="mt-32 text-center">
            <div class="inline-block p-[1px] bg-gradient-to-r from-transparent via-[var(--gold)] to-transparent w-full max-w-lg mb-12"></div>
            <h4 class="font-serif text-3xl text-[var(--forest-dark)] mb-6">Bersinergi Menuju Inovasi Global</h4>
            <div class="flex justify-center gap-2">
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)] opacity-50"></div>
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)] opacity-20"></div>
            </div>
        </div>
    </div>
</div>
@endsection
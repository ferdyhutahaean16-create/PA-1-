@extends('layouts.main')
@section('title', 'Fasilitas - Ruang Kelas')

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

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

.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.accordion-btn {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.accordion-btn.active {
    background-color: var(--forest);
    color: white;
}

.photo-glow {
    transition: all 0.5s ease;
    filter: grayscale(20%);
}

.photo-glow:hover {
    filter: grayscale(0%);
    transform: scale(1.02);
    box-shadow: 0 20px 40px rgba(26, 74, 56, 0.15);
}

.info-pill {
    background: rgba(198, 165, 74, 0.1);
    border-left: 3px solid var(--gold);
    padding: 0.5rem 1rem;
    border-radius: 0 1rem 1rem 0;
}
</style>

<div class="relative w-full bg-gray-50 py-10 md:py-12 overflow-hidden border-b border-gray-100">
    
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop" 
             alt="Infrastructure Background" 
             class="w-full h-full object-cover opacity-[0.08] mix-blend-multiply">
    </div>

    <div class="relative z-10 text-center px-6 container mx-auto">
        <h1 class="font-serif text-3xl md:text-4xl text-[#0d2a1f] font-bold tracking-tight mb-4">
            Fasilitas Ruang Kelas
        </h1>
        <div class="w-16 h-[1px] bg-yellow-600/40 mx-auto mt-4"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-20 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-5xl">
        
        @if($classrooms->isEmpty())
            <div class="glass-card rounded-[2.5rem] p-16 text-center shadow-sm">
                <p class="text-gray-400 font-serif text-2xl italic">Data ruang kelas sedang dalam proses pemutakhiran.</p>
            </div>
        @else
            <div class="space-y-6">
                @foreach($classrooms as $index => $kelas)
                <div x-data="{ expanded: {{ $index === 0 ? 'true' : 'false' }} }" 
                     class="glass-card rounded-[2rem] overflow-hidden shadow-sm border border-white/60">
                    
                    <button @click="expanded = ! expanded" 
                            :class="{ 'active': expanded }"
                            class="accordion-btn w-full px-8 py-6 flex justify-between items-center group focus:outline-none">
                        <div class="flex items-center gap-4">
                            <span class="font-serif text-2xl" :class="expanded ? 'text-[var(--gold)]' : 'text-[var(--forest)]'">{{ sprintf('%02d', $index + 1) }}</span>
                            <span class="font-semibold text-xl tracking-tight">{{ $kelas->name }}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span x-show="!expanded" class="hidden md:block text-[10px] uppercase tracking-widest opacity-40">Klik untuk Detail</span>
                            <svg class="w-6 h-6 transform transition-transform duration-500" 
                                 :class="{ 'rotate-180 text-[var(--gold)]': expanded, 'text-gray-400': !expanded }" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>

                    <div x-show="expanded" x-collapse>
                        <div class="px-8 pb-12 pt-4">
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                                
                                <div class="lg:col-span-5 space-y-8">
                                    <div>
                                        <h3 class="font-serif text-2xl text-[var(--forest)] mb-4">Deskripsi Ruang</h3>
                                        <p class="text-gray-600 leading-relaxed text-justify italic">
                                            {!! $kelas->description ?? 'Informasi detail mengenai ruang kelas ini belum tersedia.' !!}
                                        </p>
                                    </div>

                                    <div class="space-y-4">
                                        <h4 class="text-[10px] font-bold text-[var(--gold)] uppercase tracking-[0.2em]">Spesifikasi Akademik</h4>
                                        <div class="grid grid-cols-1 gap-3">
                                            <div class="info-pill flex justify-between items-center">
                                                <span class="text-xs font-bold text-[var(--forest-dark)]">Hari Akademik</span>
                                                <span class="text-sm text-[var(--forest)] font-semibold">{{ $kelas->academic_days ?? 'Senin - Jumat' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="lg:col-span-7">
                                    <div class="overflow-hidden rounded-2xl aspect-video relative group">
                                        @if($kelas->image)
                                            <img src="{{ asset($kelas->image) }}" class="photo-glow w-full h-full object-cover rounded-2xl cursor-zoom-in">
                                        @else
                                            <div class="w-full h-full bg-gray-100 rounded-2xl flex flex-col items-center justify-center text-gray-400">
                                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <span class="text-[10px] uppercase tracking-widest">Visual sedang disiapkan</span>
                                            </div>
                                        @endif
                                    </div>
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
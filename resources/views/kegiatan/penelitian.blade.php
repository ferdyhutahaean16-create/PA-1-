@extends('layouts.main')
@section('title', 'Penelitian & Riset - Bioteknologi IT Del')

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

/* Background Pattern */
.bg-dna {
    background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.41L1.41 0h1.42L0 2.83V1.41zm38.59 0L40 0v1.41l-1.41 1.42L37.17 0h1.42zM40 38.59v1.41h-1.41l-2.83-2.83 1.41-1.41L40 38.59zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z" fill="%231a4a38" fill-opacity="0.03" fill-rule="evenodd"/%3E%3C/svg%3E');
}

/* Research Card Zig-Zag */
.research-card {
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}

.research-card:hover .research-img {
    transform: scale(1.05);
}

.glass-research {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.number-accent {
    font-size: 8rem;
    line-height: 1;
    color: var(--forest);
    opacity: 0.05;
    position: absolute;
    top: -20px;
    left: -10px;
    z-index: 0;
}

/* Animations */
.fade-up {
    animation: fadeUp 0.8s ease-out forwards;
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- HEADER SECTION -->
<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/microbes.png')]"></div>
    <div class="relative z-10 py-28 text-center px-6">
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight">Penelitian & Riset</h1>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-8 opacity-60"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] bg-dna py-20 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <!-- SECTION INTRO -->
        <div class="max-w-2xl mb-24 fade-up">
            <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-6">Menjelajahi Batas Sains</h2>
            <p class="text-gray-600 leading-relaxed italic border-l-4 border-[var(--gold)] pl-6">
                "Penelitian kami berfokus pada hilirisasi teknologi hayati untuk memecahkan masalah lokal dan global, mulai dari biodiversitas Toba hingga inovasi biomedis mutakhir."
            </p>
        </div>

        @if($penelitian->isEmpty())
            <div class="glass-research rounded-[3rem] p-24 text-center">
                <p class="text-gray-400 font-serif text-2xl italic">Katalog riset sedang dalam tahap pemutakhiran.</p>
            </div>
        @else
            <div class="space-y-32">
                @foreach($penelitian as $item)
                <div class="research-card flex flex-col {{ $loop->iteration % 2 == 0 ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center gap-12 fade-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    
                    <!-- Image Side -->
                    <div class="w-full md:w-1/2 relative">
                        <div class="relative z-10 overflow-hidden rounded-[2.5rem] shadow-2xl aspect-[4/3]">
                            @if($item->foto)
                                <img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" class="research-img w-full h-full object-cover transition-transform duration-1000">
                            @else
                                <div class="w-full h-full bg-[var(--forest-dark)] flex items-center justify-center text-green-100/20 italic tracking-widest text-[10px] uppercase">
                                    Documenting Innovation
                                </div>
                            @endif
                        </div>
                        <!-- Gold Accent Box behind image -->
                        <div class="absolute -bottom-6 {{ $loop->iteration % 2 == 0 ? '-left-6' : '-right-6' }} w-48 h-48 border-2 border-[var(--gold)] rounded-[2.5rem] -z-0"></div>
                    </div>

                    <!-- Text Side -->
                    <div class="w-full md:w-1/2 relative">
                        <span class="number-accent font-serif">{{ sprintf('%02d', $loop->iteration) }}</span>
                        
                        <div class="relative z-10">
                            <span class="text-[var(--gold)] text-[10px] font-bold uppercase tracking-[0.3em] mb-4 block">
                                {{ $item->waktu_pelaksanaan }} | {{ $item->tempat ?? 'Lab Biotek' }}
                            </span>
                            
                            <h3 class="font-serif text-3xl md:text-4xl text-[var(--forest-dark)] mb-6 leading-tight">
                                {{ $item->judul }}
                            </h3>
                            
                            <div class="flex items-center gap-3 mb-8">
                                <div class="w-10 h-[1px] bg-[var(--forest)]"></div>
                                <p class="text-sm font-semibold text-[var(--forest)] uppercase tracking-widest">
                                    Principal: {{ $item->pelaksana }}
                                </p>
                            </div>

                            <div class="prose prose-sm text-gray-600 leading-relaxed text-justify bg-white/40 p-8 rounded-3xl border border-white/60">
                                <p>{{ $item->deskripsi ?? 'Detail abstrak penelitian ini sedang dalam proses review publikasi untuk memastikan akurasi data ilmiah yang disajikan.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        <!-- FOOTER QUOTE -->
        <div class="mt-40 text-center fade-up">
            <div class="inline-block p-[1px] bg-gradient-to-r from-transparent via-[var(--gold)] to-transparent w-full max-w-lg mb-12"></div>
            <p class="font-serif text-2xl text-[var(--forest-dark)] italic max-w-xl mx-auto">
                "Menciptakan masa depan melalui rekayasa kehidupan."
            </p>
            <div class="mt-12 flex justify-center gap-4">
                <div class="w-2 h-2 rounded-full bg-[var(--gold)]"></div>
                <div class="w-2 h-2 rounded-full bg-[var(--gold)] opacity-50"></div>
                <div class="w-2 h-2 rounded-full bg-[var(--gold)] opacity-20"></div>
            </div>
        </div>
    </div>
</div>
@endsection
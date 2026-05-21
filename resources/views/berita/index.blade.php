@extends('layouts.main')

@section('title', 'Arsip Berita - Prodi Bioteknologi')

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

/* News Card Styling */
.news-card {
    background: white;
    border-radius: 2rem;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    border: 1px solid rgba(0,0,0,0.03);
}

.news-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 30px 60px -15px rgba(26, 74, 56, 0.15);
}

.date-pill {
    background: rgba(26, 74, 56, 0.05);
    color: var(--forest);
    border: 1px solid rgba(26, 74, 56, 0.1);
}

/* Modal Glassmorphism */
.modal-glass {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

/* Custom Scrollbar for Modal */
.custom-scrollbar::-webkit-scrollbar { width: 5px; }
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: var(--gold);
    border-radius: 10px;
}

/* Animation */
.fade-up {
    animation: fadeUp 0.8s ease-out forwards;
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- HEADER SECTION -->
<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/microbes.png');"></div>
    <div class="relative z-10 py-24 text-center px-6">
        <span class="inline-block text-[var(--gold)] tracking-[0.5em] uppercase text-[10px] font-bold mb-4">Latest Updates</span>
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight">Arsip Berita & Informasi</h1>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-8 opacity-60"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-20 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($beritas as $berita)
            <div x-data="{ openModal: false }" 
                 class="news-card group overflow-hidden flex flex-col fade-up"
                 style="animation-delay: {{ $loop->index * 0.1 }}s">
                
                <!-- IMAGE SECTION -->
                <div class="overflow-hidden h-64 relative cursor-pointer" @click="openModal = true">
                    @if($berita->foto)
                        <img src="{{ asset($berita->foto) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 italic">No Image Available</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-[var(--forest-dark)]/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>

                <!-- CONTENT SECTION -->
                <div class="p-8 flex-1 flex flex-col">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="date-pill px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest">
                            {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                        </span>
                    </div>
                    
                    <h3 @click="openModal = true" class="font-serif text-2xl text-[var(--forest-dark)] mb-4 cursor-pointer group-hover:text-[var(--gold)] transition-colors leading-tight">
                        {{ $berita->judul }}
                    </h3>

                    <p class="text-gray-500 text-sm leading-relaxed mb-8 flex-1 line-clamp-3">
                        {{ Str::limit(strip_tags($berita->konten), 130) }}
                    </p>

                    <a href="{{ route('publik.berita.baca', $berita->id) }}" class="text-[#1a4a38] font-bold text-xs tracking-wider hover:underline">
                        SELENGKAPNYA ➝
                    </a>
                </div>

                <!-- ENHANCED MODAL -->
                <div x-show="openModal" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     style="display: none;" 
                     class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-[var(--forest-dark)]/80 backdrop-blur-md">
                    
                    <div @click.away="openModal = false" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="relative w-full max-w-4xl bg-white rounded-[2.5rem] shadow-2xl flex flex-col max-h-[90vh] overflow-hidden">
                        
                        <button @click="openModal = false" class="absolute top-6 right-6 z-20 w-10 h-10 bg-white/20 hover:bg-red-500 backdrop-blur-md text-white rounded-full flex items-center justify-center transition-all duration-300 text-xl font-light">✕</button>
                        
                        <div class="overflow-y-auto w-full custom-scrollbar">
                            @if($berita->foto) 
                                <div class="h-[400px] w-full relative">
                                    <img src="{{ asset($berita->foto) }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent"></div>
                                </div>
                            @endif
                            
                            <div class="p-10 md:p-16 -mt-20 relative z-10">
                                <div class="bg-white p-8 md:p-12 rounded-[2rem] shadow-sm border border-gray-50">
                                    <span class="text-[var(--gold)] font-bold text-[10px] uppercase tracking-[0.3em] mb-4 block">
                                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                                    </span>
                                    <h2 class="font-serif text-4xl md:text-5xl text-[var(--forest-dark)] mb-10 leading-tight">
                                        {{ $berita->judul }}
                                    </h2>
                                    <div class="text-gray-600 leading-relaxed text-lg space-y-6 text-justify font-sans">
                                        {!! nl2br(e($berita->konten)) !!}
                                    </div>
                                    
                                    <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center">
                                        <p class="text-[10px] text-gray-400 uppercase tracking-widest">© Prodi Bioteknologi IT Del</p>
                                        <button @click="openModal = false" class="px-8 py-3 bg-[var(--forest)] text-[var(--gold)] rounded-full font-bold text-[10px] uppercase tracking-widest hover:bg-[var(--forest-dark)] transition-all">Tutup Berita</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 text-center">
                <div class="inline-block p-12 bg-white rounded-[2rem] shadow-sm border-dashed border-2 border-gray-200">
                    <p class="text-gray-400 font-serif text-2xl italic">Belum ada kabar terbaru dari laboratorium kami.</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- PAGINATION SECTION -->
        <div class="mt-20 flex justify-center">
            <div class="glass-card px-6 py-4 rounded-full shadow-sm">
                {{ $beritas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
<style>
/* Pastikan font sudah ter-import di layouts.main */
.breadcrumb-glass {
    background: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(26, 74, 56, 0.1);
}

.text-gold-gradient {
    color: #c6a54a; /* var(--gold) */
}

.font-serif { font-family: 'Cormorant Garamond', serif; }
.font-sans { font-family: 'Jost', sans-serif; }
</style>

<div class="px-8 py-8 breadcrumb-glass sticky top-0 z-[40]">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        
        {{-- LEFT SIDE: NAVIGATION & TITLE --}}
        <div class="fade-in">
            <nav class="flex items-center text-[10px] font-bold uppercase tracking-[0.3em] text-[var(--gold)] mb-3 font-sans">
                <a href="/" class="hover:text-[var(--forest)] transition-colors duration-300">Home</a>
                <span class="mx-3 text-gray-300">/</span>
                <span class="text-gray-400">@yield('title')</span>
            </nav>
            
            <h1 class="font-serif text-4xl text-[var(--forest-dark)] leading-tight tracking-tight">
                @yield('subtitle', 'Program Studi Bioteknologi')
            </h1>
        </div>
        
        {{-- RIGHT SIDE: CAMPUS INFO --}}
        <div class="flex items-center gap-4 bg-white/40 p-3 pr-6 rounded-2xl border border-white/60 shadow-sm">
            <div class="h-12 w-12 rounded-xl bg-[var(--forest)] flex items-center justify-center text-[var(--gold)] shadow-inner transform rotate-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="font-sans">
                <p class="text-[10px] font-bold text-[var(--gold)] uppercase tracking-widest leading-none mb-1">Update Terakhir</p>
                <p class="font-bold text-[var(--forest-dark)] leading-none">{{ now()->format('d F Y') }}</p>
                <p class="text-[10px] text-gray-400 mt-1 font-medium tracking-tighter">Institut Teknologi Del</p>
            </div>
        </div>

    </div>
</div>
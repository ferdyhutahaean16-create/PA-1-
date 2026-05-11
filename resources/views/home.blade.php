@extends('layouts.main')

@section('title', 'Home')

@section('content')

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest:  #1a4a38;
    --forest2: #153d2e;
    --forest3: #0f2d22;
    --sage:    #2d6b52;
    --gold:    #b8963e;
    --ink:     #0c1118;
    --cream:   #f6f3ee;
    --warm:    #ede9e1;
    --mist:    #ddd8cf;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Jost', sans-serif; color: var(--ink); background: #fff; }
.serif { font-family: 'Cormorant Garamond', serif; }

/* ── Scroll progress ── */
#pgbar {
    position: fixed; top: 0; left: 0; height: 2px; z-index: 9999;
    background: linear-gradient(90deg, var(--forest), var(--gold));
    width: 0; transition: width .1s linear;
    pointer-events: none;
}

/* ══════════════════════════════════════
   HERO  — centred, compact, cinematic
══════════════════════════════════════ */
.hero {
    position: relative;
    height: 88vh; min-height: 540px; max-height: 860px;
    overflow: hidden;
    display: flex; align-items: center; justify-content: center;
}
.hero video {
    position: absolute; inset: 0;
    width: 100%; height: 100%; object-fit: cover;
}
/* multi-layer overlay: dark vignette + green tint at bottom */
.hero-overlay {
    position: absolute; inset: 0; z-index: 1;
    background:
        radial-gradient(ellipse 80% 60% at 50% 0%, rgba(12,17,24,0.45) 0%, transparent 70%),
        radial-gradient(ellipse 100% 60% at 50% 100%, rgba(12,17,24,0.72) 0%, transparent 80%),
        linear-gradient(180deg, rgba(12,17,24,0.62) 0%, rgba(12,17,24,0.38) 45%, rgba(15,45,34,0.55) 100%);
}
/* fine noise grain */
.hero-grain {
    position: absolute; inset: 0; z-index: 2; pointer-events: none;
    opacity: .04;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='250' height='250'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='250' height='250' filter='url(%23n)'/%3E%3C/svg%3E");
}
/* corner marks */
.hero-corner {
    position: absolute; z-index: 3; width: 32px; height: 32px;
}
.hc-tl { top: 28px; left: 28px;
    border-top: 1px solid rgba(255,255,255,.25);
    border-left: 1px solid rgba(255,255,255,.25); }
.hc-tr { top: 28px; right: 28px;
    border-top: 1px solid rgba(255,255,255,.25);
    border-right: 1px solid rgba(255,255,255,.25); }
.hc-bl { bottom: 28px; left: 28px;
    border-bottom: 1px solid rgba(255,255,255,.25);
    border-left: 1px solid rgba(255,255,255,.25); }
.hc-br { bottom: 28px; right: 28px;
    border-bottom: 1px solid rgba(255,255,255,.25);
    border-right: 1px solid rgba(255,255,255,.25); }

/* stagger reveal animation */
.rv { opacity: 0; transform: translateY(22px); }
.rv.go { animation: fadeUp .85s cubic-bezier(.22,1,.36,1) forwards; }
@keyframes fadeUp { to { opacity:1; transform:translateY(0); } }

/* ── Modern Mouse Scroll Animation ── */
.scroll-wrapper {
    position: absolute; 
    bottom: 40px; 
    left: 50%;
    transform: translateX(-50%); 
    z-index: 10;
    display: flex; 
    flex-direction: column; 
    align-items: center; 
    gap: 12px;
    opacity: 0;
    animation: fadeInScroll 1s ease 1.5s forwards;
}
@keyframes fadeInScroll { to { opacity: 1; } }

.mouse-icon {
    width: 26px; 
    height: 40px;
    border: 2px solid rgba(255,255,255,0.6);
    border-radius: 15px;
    position: relative;
}
.mouse-wheel {
    width: 4px; 
    height: 8px;
    background: #fff;
    border-radius: 2px;
    position: absolute; 
    top: 6px; 
    left: 50%;
    transform: translateX(-50%);
    animation: scrollWheel 1.5s infinite;
}
@keyframes scrollWheel {
    0% { top: 6px; opacity: 1; }
    100% { top: 20px; opacity: 0; }
}

/* ══════════════════════════════════════
   ABOUT & WHY CHOOSE STYLES
══════════════════════════════════════ */
.about-parallax {
    position: relative;
    /* PENTING: Ganti dengan gambar kampus/gedung IT Del yang bagus */
    background-image: url('{{ asset("images/kampus_it_del.jpg") }}'); 
    background-attachment: fixed; 
    background-position: center;
    background-size: cover;
    padding: 120px 0; 
}
.about-overlay {
    position: absolute; 
    inset: 0;
    background: rgba(17, 24, 39, 0.75); /* Warna navy/hitam transparan 75% */
    z-index: 1;
}
.why-img-wrapper {
    position: relative;
    border-radius: 2rem;
    overflow: hidden;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
}

/* ══════════════════════════════════════
   CTA CARDS
══════════════════════════════════════ */
.cta-card {
    background: var(--cream);
    border: 1px solid var(--mist);
    transition: transform .4s cubic-bezier(.22,1,.36,1), box-shadow .4s;
    overflow: hidden; position: relative;
}
.cta-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 24px 60px -18px rgba(12,17,24,.18);
}
.cta-fill {
    position: absolute; inset: 0; z-index: 0;
    opacity: 0; transition: opacity .45s ease;
}
.cta-card:hover .cta-fill { opacity: 1; }
.cta-inner { position: relative; z-index: 1; }
.cta-arrow { transition: transform .28s ease; }
.cta-card:hover .cta-arrow { transform: translateX(5px); }

/* ══════════════════════════════════════
   NEWS CARDS
══════════════════════════════════════ */
.news-card {
    transition: transform .4s cubic-bezier(.22,1,.36,1), box-shadow .4s;
}
.news-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 22px 56px -16px rgba(12,17,24,.14);
}
.news-thumb img { transition: transform .65s cubic-bezier(.22,1,.36,1); }
.news-card:hover .news-thumb img { transform: scale(1.07); }

/* ══════════════════════════════════════
   TESTIMONIAL
══════════════════════════════════════ */
.testi-card {
    background: rgba(255,255,255,.032);
    border: 1px solid rgba(255,255,255,.07);
    transition: transform .4s cubic-bezier(.22,1,.36,1), box-shadow .4s;
}
.testi-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 24px 60px -18px rgba(26,74,56,.55);
}

/* ══════════════════════════════════════
   PARTNER TILES
══════════════════════════════════════ */
.partner-tile {
    filter: grayscale(1) opacity(.5);
    transition: filter .35s, transform .35s;
}
.partner-tile:hover { filter: grayscale(0) opacity(1); transform: translateY(-3px); }

/* ══════════════════════════════════════
   SCROLL FADE-IN SECTIONS
══════════════════════════════════════ */
.fs {
    opacity: 0; transform: translateY(28px);
    transition: opacity .72s ease, transform .72s ease;
}
.fs.vis { opacity: 1; transform: translateY(0); }

/* ══════════════════════════════════════
   BUTTONS
══════════════════════════════════════ */
.btn-forest {
    position: relative; overflow: hidden; display: inline-flex;
    align-items: center; gap: .5rem;
    border: 1.5px solid var(--forest); color: var(--forest);
    padding: .72rem 2.2rem; border-radius: 2rem;
    font-size: .8rem; font-weight: 500; letter-spacing: .06em;
    text-transform: uppercase;
    transition: color .35s;
}
.btn-forest::before {
    content: ''; position: absolute; inset: 0;
    background: var(--forest);
    transform: translateX(-101%);
    transition: transform .42s cubic-bezier(.22,1,.36,1); z-index: 0;
}
.btn-forest:hover { color: #fff; }
.btn-forest:hover::before { transform: translateX(0); }
.btn-forest > * { position: relative; z-index: 1; }

.btn-white {
    position: relative; overflow: hidden; display: inline-flex;
    align-items: center; gap: .5rem;
    border: 1.5px solid rgba(255,255,255,.4); color: #fff;
    padding: .72rem 2.2rem; border-radius: 2rem;
    font-size: .8rem; font-weight: 500; letter-spacing: .06em;
    text-transform: uppercase;
    transition: color .35s, border-color .35s;
}
.btn-white::before {
    content: ''; position: absolute; inset: 0;
    background: #fff;
    transform: translateX(-101%);
    transition: transform .42s cubic-bezier(.22,1,.36,1); z-index: 0;
}
.btn-white:hover { color: var(--ink); border-color: #fff; }
.btn-white:hover::before { transform: translateX(0); }
.btn-white > * { position: relative; z-index: 1; }

.parallax { background-attachment: fixed; }
</style>

<div id="pgbar"></div>

{{-- ══════════════════════════════════════
     HERO SECTION - REDESIGN AESTHETIC
══════════════════════════════════════ --}}
<section class="hero relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
    
    {{-- Video Background --}}
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover scale-105">
        <source src="{{ asset('videos/profil.mp4') }}" type="video/mp4">
    </video>
    
    {{-- Overlay: Kombinasi multiply gradient dan solid black untuk kontras teks yang cinematic --}}
    <div class="absolute inset-0 bg-gradient-to-b from-[#0c1118]/80 via-[#0c1118]/40 to-[var(--forest3)]/90 z-[1] mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-black/30 z-[1]"></div>
    
    {{-- Main Content --}}
    <div class="relative z-[3] flex flex-col items-center text-center px-6 w-full max-w-5xl mx-auto transform -translate-y-4">
        
        {{-- Logo IT Del --}}
        <div class="rv" style="animation-delay:.08s">
            <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" alt="Logo IT Del" class="h-16 md:h-20 drop-shadow-[0_0_15px_rgba(255,255,255,0.2)] mx-auto mb-6">
        </div>

        {{-- Eyebrow dengan aksen garis --}}
        <div class="rv flex items-center gap-4 mb-5" style="animation-delay:.22s">
            <div class="h-[1px] w-8 md:w-16 bg-green-400/40"></div>
            <p class="text-[10px] md:text-xs tracking-[0.4em] uppercase text-green-300 font-semibold drop-shadow-md">
                Selamat Datang Di
            </p>
            <div class="h-[1px] w-8 md:w-16 bg-green-400/40"></div>
        </div>

        {{-- Title --}}
        <h1 class="rv serif text-5xl md:text-7xl lg:text-8xl font-light text-white leading-[1.1] tracking-wide drop-shadow-2xl mb-2" style="animation-delay:.38s">
            Prodi Bioteknologi
        </h1>
        <h2 class="rv text-xs md:text-sm font-medium tracking-[0.3em] uppercase text-gray-300 drop-shadow-md mb-8" style="animation-delay:.5s">
            Institut Teknologi Del
        </h2>

        {{-- Tagline --}}
        <p class="rv serif italic text-xl md:text-2xl text-white/90 font-light drop-shadow-lg mb-14" style="animation-delay:.6s">
            "Shaping the World Through Biotechnology"
        </p>

        {{-- ✦ BADGES AKREDITASI — MODERN PILL DESIGN ✦ --}}
        <div class="rv flex flex-col sm:flex-row gap-5 justify-center" style="animation-delay:.75s">

            {{-- Badge 1: Diktisaintek --}}
            <div class="group relative flex items-center gap-4 px-6 py-3 rounded-full overflow-hidden cursor-default transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_10px_40px_-10px_rgba(34,197,94,0.3)] border border-white/10 bg-white/5 backdrop-blur-md">
                {{-- Shine Effect Hover --}}
                <div class="absolute inset-0 bg-gradient-to-r from-green-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                {{-- Icon Circle --}}
                <div class="relative z-10 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-green-500/20 border border-green-400/30 text-green-400 group-hover:bg-green-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div class="relative z-10 text-left">
                    <p class="text-[9px] font-semibold tracking-[0.2em] uppercase text-green-300/80 mb-0.5">Program Unggulan</p>
                    <p class="text-[13px] font-bold tracking-[0.05em] uppercase text-white">Diktisaintek</p>
                </div>
            </div>

            {{-- Badge 2: Akreditasi --}}
            <div class="group relative flex items-center gap-4 px-6 py-3 rounded-full overflow-hidden cursor-default transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_10px_40px_-10px_rgba(234,179,8,0.3)] border border-white/10 bg-white/5 backdrop-blur-md">
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-yellow-500/20 border border-yellow-400/30 text-yellow-400 group-hover:bg-yellow-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <div class="relative z-10 text-left">
                    <p class="text-[9px] font-semibold tracking-[0.2em] uppercase text-yellow-300/80 mb-0.5">Status Resmi</p>
                    <p class="text-[13px] font-bold tracking-[0.05em] uppercase text-white">Akreditasi Baik</p>
                </div>
            </div>

        </div>
        {{-- END BADGES --}}

    </div>
    
</section>

{{-- ══════════════════════════════════════
     WHY CHOOSE — Layout Foto Kiri & List Kanan (Gaya Foto 1)
══════════════════════════════════════ --}}
<section class="py-32 bg-slate-50 relative overflow-hidden">
    {{-- Decorative background blobs --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-[var(--forest)] opacity-[0.03] blur-[100px]"></div>
        <div class="absolute top-[40%] -right-[10%] w-[40%] h-[40%] rounded-full bg-[var(--gold)] opacity-[0.03] blur-[100px]"></div>
    </div>

    <div class="container mx-auto px-6 max-w-7xl relative z-10">
        <div class="flex flex-col lg:flex-row gap-16 lg:gap-24 items-center">
            
            {{-- 1. Image Block (Kiri) --}}
            <div class="w-full lg:w-5/12 relative group">
                {{-- Aksen bingkai offset di belakang gambar --}}
                <div class="absolute -inset-4 border border-[var(--forest)]/20 rounded-[2.5rem] transform translate-x-3 translate-y-3 transition-transform duration-500 group-hover:translate-x-1 group-hover:translate-y-1 z-0"></div>

                {{-- PERBAIKAN: Menggunakan aspect-[4/3] agar foto melebar dan tidak nge-zoom --}}
                <div class="relative z-10 rounded-[2rem] overflow-hidden aspect-[4/3] shadow-2xl transition-transform duration-500 group-hover:-translate-y-2 bg-white">
                    
                    {{-- PERBAIKAN: Menambahkan object-center agar fokus foto tepat di tengah --}}
                    <img src="{{ asset('Adminlte/dist/img/kenapa_memilih.jpeg') }}" alt="Fasilitas IT Del" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
                    
                    {{-- Gradient overlay agar teks floating terbaca jelas --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                    {{-- Floating label dengan animasi --}}
                    <div class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md px-5 py-3.5 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-white/40 transform translate-y-0 transition-transform duration-500 group-hover:-translate-y-2">
                        <div class="flex items-center gap-3 mb-1">
                            <span class="relative flex h-2.5 w-2.5 shrink-0">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                            </span>
                            <p class="text-[10px] font-bold text-[var(--forest)] uppercase tracking-[0.2em] truncate">Fasilitas Standar Industri</p>
                        </div>
                        <p class="text-sm font-semibold text-gray-800 ml-5">Laboratorium Terkini</p>
                    </div>
                </div>
            </div>

            {{-- 2. Content & Cards Block (Kanan) --}}
            <div class="w-full lg:w-7/12">
                {{-- Heading Section --}}
                <div class="mb-12">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="h-px w-10 bg-[var(--forest)]/40"></div>
                        <p class="text-[11px] font-bold tracking-[0.3em] text-[var(--forest)] uppercase">Keunggulan Program</p>
                    </div>
                    <h2 class="serif text-4xl md:text-5xl lg:text-6xl font-light text-gray-900 leading-[1.15]">
                        Mengapa Memilih <br>
                        <span class="font-bold text-[var(--forest)]">Bioteknologi IT Del?</span>
                    </h2>
                </div>

                {{-- Feature Cards --}}
                <div class="space-y-4">
                    @foreach([
                        [
                            'href'  => url('/fasilitas'),
                            'title' => 'Fasilitas Laboratorium',
                            'desc'  => 'Laboratorium mutakhir berstandar industri yang menunjang aktivitas riset intensif bagi seluruh civitas akademika.',
                            'icon'  => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                        ],
                        [
                            'href'  => route('fasilitas.ruang-kelas'),
                            'title' => 'Ruang Kelas Modern',
                            'desc'  => 'Ruang kelas nyaman dan modern, dilengkapi fasilitas multimedia interaktif untuk pengalaman belajar yang optimal.',
                            'icon'  => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z',
                        ],
                        [
                            'href'  => url('/prestasi/mahasiswa'),
                            'title' => 'Prestasi Membanggakan',
                            'desc'  => 'Telah meraih berbagai prestasi riset dan kompetisi inovasi mahasiswa di tingkat nasional maupun internasional.',
                            'icon'  => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                        ],
                    ] as $item)
                    <a href="{{ $item['href'] }}" class="group block bg-white rounded-[1.5rem] p-6 border border-gray-100 shadow-sm hover:border-[var(--forest)]/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                            
                            {{-- Ikon Box --}}
                            <div class="shrink-0 w-16 h-16 rounded-2xl bg-green-50 text-[var(--forest)] group-hover:bg-[var(--forest)] group-hover:text-white flex items-center justify-center transition-colors duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $item['icon'] }}"/>
                                </svg>
                            </div>
                            
                            {{-- Text Content --}}
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-[var(--forest)] transition-colors">{{ $item['title'] }}</h3>
                                    {{-- Tanda Panah yang muncul saat di hover --}}
                                    <svg class="w-5 h-5 text-gray-300 group-hover:text-[var(--forest)] transform -translate-x-2 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </div>
                                <p class="text-sm text-gray-500 leading-relaxed">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════
     PMB & BEASISWA
══════════════════════════════════════ --}}
<section class="py-28 bg-white relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none"
         style="background: radial-gradient(ellipse 55% 50% at 85% 15%, rgba(26,74,56,.04), transparent),
                            radial-gradient(ellipse 50% 45% at 15% 85%, rgba(184,150,62,.05), transparent);">
    </div>

    <div class="container mx-auto max-w-4xl px-6 relative z-10">
        <div class="text-center mb-14 fs">
            <p class="text-[10px] tracking-[.35em] uppercase text-gray-400 font-medium mb-3">Informasi</p>
            <h2 class="serif text-4xl md:text-5xl font-light text-[var(--ink)]">
                Langkah Menuju <em class="text-[var(--forest)] not-italic">Masa Depan</em>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-7">

            {{-- PMB --}}
            <a href="https://semat.del.ac.id/admisi" target="_blank" class="cta-card rounded-2xl p-10 block">
                <div class="cta-fill bg-gradient-to-br from-[var(--forest)] to-[var(--forest3)]"></div>
                <div class="cta-inner">
                    <div class="w-12 h-12 bg-white border border-gray-100 shadow-sm rounded-xl
                                flex items-center justify-center mb-7
                                group-hover:bg-white/15 group-hover:border-white/15 transition-all">
                        <svg class="w-6 h-6 text-[var(--forest)] group-[.cta-card:hover]_&:text-white transition-colors"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <h3 class="serif text-2xl font-light text-[var(--ink)] mb-2.5 pmb-title transition-colors">
                        Penerimaan Mahasiswa Baru
                    </h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-7 pmb-desc transition-colors">
                        Informasi lengkap jalur pendaftaran, syarat, panduan, dan biaya pendidikan Bioteknologi IT Del.
                    </p>
                    <span class="inline-flex items-center gap-2 text-[11px] font-semibold uppercase tracking-widest
                                 text-[var(--forest)] pmb-link transition-colors">
                        Lihat Detail
                        <svg class="cta-arrow w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </span>
                </div>
            </a>

            {{-- Beasiswa --}}
            <a href="https://semat.del.ac.id/beasiswa" target="_blank" class="cta-card rounded-2xl p-10 block">
                <div class="cta-fill bg-gradient-to-br from-[#1e3a6e] to-[#0f2550]"></div>
                <div class="cta-inner">
                    <div class="w-12 h-12 bg-white border border-gray-100 shadow-sm rounded-xl
                                flex items-center justify-center mb-7 transition-all">
                        <svg class="w-6 h-6 text-blue-600 transition-colors"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="serif text-2xl font-light text-[var(--ink)] mb-2.5 bsw-title transition-colors">
                        Informasi Beasiswa
                    </h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-7 bsw-desc transition-colors">
                        Jelajahi peluang beasiswa internal maupun eksternal untuk mendukung perjalanan akademik Anda.
                    </p>
                    <span class="inline-flex items-center gap-2 text-[11px] font-semibold uppercase tracking-widest
                                 text-blue-600 bsw-link transition-colors">
                        Lihat Program
                        <svg class="cta-arrow w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </span>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- CTA hover text-colour fix via JS below --}}


{{-- ══════════════════════════════════════
     BERITA
══════════════════════════════════════ --}}
<section class="py-28" style="background: var(--warm);">
    <div class="container mx-auto max-w-6xl px-6">

        <div class="flex items-end justify-between mb-14 fs">
            <div>
                <p class="text-[10px] tracking-[.35em] uppercase text-[var(--forest)] font-medium mb-3">Terkini</p>
                <h2 class="serif text-4xl md:text-5xl font-light text-[var(--ink)]">
                    Berita <em class="text-[var(--forest)] not-italic">Utama</em>
                </h2>
            </div>
            <a href="{{ route('berita.lengkap') }}"
               class="hidden md:inline-flex items-center gap-1.5 text-[11px] font-medium uppercase tracking-widest
                      text-[var(--forest)] hover:opacity-60 transition-opacity">
                Semua
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($beritas as $berita)
            <div x-data="{open:false}" class="news-card bg-white rounded-2xl overflow-hidden border border-gray-100/80 flex flex-col">

                <div class="news-thumb overflow-hidden h-48 cursor-pointer relative" @click="open=true">
                    @if($berita->foto)
                        <img src="{{ asset($berita->foto) }}" alt="{{ $berita->judul }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                    <span class="absolute top-4 left-4 text-[10px] font-semibold uppercase tracking-widest
                                 bg-[var(--forest)]/85 backdrop-blur-sm text-white px-3 py-1 rounded-full">
                        Berita
                    </span>
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    <p class="text-[11px] text-gray-400 mb-3 flex items-center gap-1.5">
                        <svg class="w-3 h-3 text-[var(--forest)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                    </p>
                    <h3 @click="open=true"
                        class="serif text-xl font-light text-gray-900 mb-3 line-clamp-2 cursor-pointer
                               hover:text-[var(--forest)] transition-colors leading-snug">
                        {{ $berita->judul }}
                    </h3>
                    <p class="text-xs text-gray-400 mb-5 flex-1 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($berita->konten), 110) }}
                    </p>
                    <button @click="open=true"
                            class="inline-flex items-center gap-1.5 text-[11px] font-semibold uppercase tracking-widest
                                   text-[var(--forest)] hover:opacity-60 transition-opacity w-fit">
                        Baca selengkapnya
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>

                {{-- Modal --}}
                <div x-show="open" style="display:none"
                     class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/65 backdrop-blur-md">
                    <div @click.away="open=false"
                         x-show="open"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl max-h-[88vh] overflow-hidden flex flex-col">
                        <button @click="open=false"
                                class="absolute top-4 right-4 z-10 w-9 h-9 bg-gray-900/60 hover:bg-gray-900
                                       text-white rounded-full flex items-center justify-center transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <div class="overflow-y-auto">
                            @if($berita->foto)
                                <img src="{{ asset($berita->foto) }}" alt="{{ $berita->judul }}"
                                     class="w-full h-52 md:h-64 object-cover">
                            @endif
                            <div class="p-8 md:p-10">
                                <p class="text-[11px] text-[var(--forest)] font-semibold uppercase tracking-widest mb-4 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                                </p>
                                <h2 class="serif text-2xl md:text-3xl font-light text-gray-900 mb-6 leading-tight">
                                    {{ $berita->judul }}
                                </h2>
                                <div class="text-sm text-gray-600 leading-8 space-y-4">
                                    {!! nl2br(e($berita->konten)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-14 bg-white rounded-2xl border border-dashed border-gray-200">
                <p class="text-gray-400 text-sm italic">Belum ada berita yang diterbitkan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12 text-center fs">
            <a href="{{ route('berita.lengkap') }}" class="btn-forest">
                <span>Lihat Semua Berita</span>
                <span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════
     TESTIMONI — Premium Redesign v2
══════════════════════════════════════ --}}
<section class="py-28 relative overflow-hidden"
         style="background: linear-gradient(160deg, #0b1520 0%, #0d1e12 60%, #0f1a0b 100%);">

    <div class="absolute inset-0 opacity-[.022] pointer-events-none"
         style="background-image: linear-gradient(rgba(255,255,255,1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,1) 1px, transparent 1px);
                background-size: 56px 56px;"></div>
    <div class="absolute -top-20 -right-16 w-80 h-80 pointer-events-none"
         style="background: radial-gradient(circle, rgba(26,74,56,.3) 0%, transparent 70%);"></div>
    <div class="absolute -bottom-16 -left-10 w-64 h-64 pointer-events-none"
         style="background: radial-gradient(circle, rgba(184,150,62,.12) 0%, transparent 70%);"></div>

    <div class="container mx-auto max-w-6xl px-6 relative z-10">

        {{-- Header --}}
        <div class="text-center mb-14 fs">
            <p class="text-[10px] tracking-[.35em] uppercase text-[var(--gold)] font-semibold mb-3">Kisah Sukses</p>
            <h2 class="serif text-4xl md:text-5xl font-light text-white mb-3">
                Suara <em class="text-green-300/90 not-italic">Alumni</em>
            </h2>
            <p class="text-gray-500 max-w-xs mx-auto text-sm leading-relaxed">
                Mendengar langsung perjalanan karir para lulusan Bioteknologi IT Del.
            </p>
        </div>

        {{-- Slider --}}
        <div class="overflow-hidden mx-auto" id="testiWrap" style="max-width: 960px;">
            <div class="flex gap-5 transition-transform duration-500" id="testiTrack" style="will-change:transform;">

                @forelse($testimonials as $index => $t)
                <div class="testi-slide flex-shrink-0 rounded-3xl p-7 flex flex-col items-center text-center relative
                            transition-all duration-300 group
                            border border-white/[.07] hover:border-green-300/25 hover:-translate-y-2"
                     style="background: rgba(255,255,255,0.04); width: 300px;">

                    {{-- Top glow line --}}
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/5 h-px opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                         style="background: linear-gradient(90deg, transparent, rgba(134,239,172,0.45), transparent);"></div>

                    {{-- Avatar --}}
                    <div class="relative mb-4">
                        <div class="w-20 h-20 rounded-full p-[3px]"
                             style="background: linear-gradient(135deg, rgba(184,150,62,.6), rgba(134,239,172,.4));">
                            <div class="w-full h-full rounded-full overflow-hidden bg-[#1a2e1e] border-2 border-[#0d1e12] flex items-center justify-center">
                                @if($t->photo)
                                    <img src="{{ asset($t->photo) }}" alt="{{ $t->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="serif text-2xl font-light text-green-300">
                                        {{ strtoupper(substr($t->name, 0, 1)) }}{{ strtoupper(substr(strrchr($t->name.' ', ' '), 1, 1)) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full flex items-center justify-center
                                    bg-[#1a4a38] border-2 border-[#0d1e12]">
                            <svg class="w-2.5 h-2.5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>

                    {{-- Info --}}
                    <p class="text-[12px] font-semibold text-gray-100 tracking-[.08em] uppercase mb-1 leading-tight">{{ $t->name }}</p>
                    <p class="text-[10px] text-green-400 font-semibold tracking-[.12em] uppercase mb-1">Alumni {{ $t->graduation_year }}</p>
                    @if($t->position || $t->workplace)
                    <p class="text-[11px] text-gray-600 mb-4 leading-snug">
                        {{ $t->position }}{{ $t->position && $t->workplace ? ' · ' : '' }}{{ $t->workplace }}
                    </p>
                    @else
                    <div class="mb-4"></div>
                    @endif

                    {{-- Divider --}}
                    <div class="w-8 h-px mb-4" style="background: linear-gradient(90deg, transparent, rgba(255,255,255,.15), transparent);"></div>

                    {{-- Quote --}}
                    <div class="serif leading-none mb-2" style="font-size:48px; color: rgba(134,239,172,0.12); height:24px;">"</div>
                    <p class="serif italic text-[14px] text-gray-400 leading-[1.8] flex-1">
                        "{{ Str::limit($t->testimony, 150) }}"
                    </p>

                    {{-- Stars --}}
                    <div class="flex gap-1 justify-center mt-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-2.5 h-2.5 text-[var(--gold)]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-[9px] text-gray-700 tracking-[.15em] uppercase font-semibold mt-2">Angkatan {{ $t->graduation_year }}</p>
                </div>
                @empty
                <div class="text-center py-10 w-full rounded-2xl border border-dashed border-gray-800/60">
                    <p class="text-gray-600 text-sm italic">Belum ada cerita alumni.</p>
                </div>
                @endforelse

            </div>
        </div>

        {{-- Navigation --}}
        <div class="flex items-center justify-center gap-3 mt-10 fs">
            <button id="testiPrev"
                    class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300
                           border border-white/10 bg-white/[.04] text-gray-500
                           hover:border-green-300/40 hover:text-green-300 hover:bg-green-300/[.06]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            <div id="testiDots" class="flex gap-2 items-center"></div>
            <button id="testiNext"
                    class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300
                           border border-white/10 bg-white/[.04] text-gray-500
                           hover:border-green-300/40 hover:text-green-300 hover:bg-green-300/[.06]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 6l6 6-6 6"/>
                </svg>
            </button>
        </div>

        <div class="mt-10 text-center fs">
            <a href="{{ route('publik.testimoni') }}" class="btn-white">
                <span>Lihat Semua Testimoni</span>
                <span><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg></span>
            </a>
        </div>
    </div>
</section>

<script>
(function(){
    const track = document.getElementById('testiTrack');
    if (!track) return;
    const slides = track.querySelectorAll('.testi-slide');
    const dotsWrap = document.getElementById('testiDots');
    if (!slides.length) return;

    const CARD_W = 300;
    const GAP    = 20;
    const STEP   = CARD_W + GAP;

    function getPerView() {
        const wrap = document.getElementById('testiWrap');
        return Math.floor((wrap.offsetWidth + GAP) / STEP);
    }

    let perView    = getPerView();
    let totalPages = Math.max(1, Math.ceil(slides.length / perView));
    let page       = 0;

    /* — build dots — */
    function buildDots() {
        dotsWrap.innerHTML = '';
        totalPages = Math.max(1, Math.ceil(slides.length / getPerView()));
        for (let i = 0; i < totalPages; i++) {
            const d = document.createElement('div');
            d.style.cssText = 'height:6px;border-radius:3px;cursor:pointer;transition:all .3s ease;background:rgba(255,255,255,.2);';
            d.addEventListener('click', () => goTo(i));
            dotsWrap.appendChild(d);
        }
    }

    function updateDots() {
        const ds = dotsWrap.querySelectorAll('div');
        ds.forEach((d, i) => {
            d.style.width      = i === page ? '24px' : '6px';
            d.style.background = i === page ? '#4ade80' : 'rgba(255,255,255,.2)';
        });
        /* highlight first card of active page */
        slides.forEach((s, i) => {
            const pv   = getPerView();
            const isFirst = i === page * pv;
            s.style.borderColor = isFirst ? 'rgba(134,239,172,.25)' : 'rgba(255,255,255,.07)';
            s.style.background  = isFirst ? 'rgba(134,239,172,.05)' : 'rgba(255,255,255,.04)';
        });
    }

    function goTo(p) {
        perView    = getPerView();
        totalPages = Math.max(1, Math.ceil(slides.length / perView));
        page       = ((p % totalPages) + totalPages) % totalPages;
        track.style.transform = `translateX(-${page * perView * STEP}px)`;
        updateDots();
    }

    document.getElementById('testiNext').addEventListener('click', () => goTo(page + 1));
    document.getElementById('testiPrev').addEventListener('click', () => goTo(page - 1));

    let auto = setInterval(() => goTo(page + 1), 4500);
    track.addEventListener('mouseenter', () => clearInterval(auto));
    track.addEventListener('mouseleave', () => { auto = setInterval(() => goTo(page + 1), 4500); });

    window.addEventListener('resize', () => { buildDots(); goTo(0); });

    buildDots();
    updateDots();
})();
</script>

{{-- ══════════════════════════════════════
     MITRA
══════════════════════════════════════ --}}
<section class="py-28 bg-white">
    <div class="container mx-auto max-w-6xl px-6 text-center">

        <div class="mb-14 fs">
            <p class="text-[10px] tracking-[.35em] uppercase text-gray-400 font-medium mb-3">Kolaborasi</p>
            <h2 class="serif text-4xl md:text-5xl font-light text-[var(--ink)]">
                Mitra <em class="text-[var(--forest)] not-italic">Kerja Sama</em>
            </h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            @forelse($mitras as $mitra)
            <div x-data="{open:false}">
                <div @click="open=true"
                     class="partner-tile bg-[var(--cream)] border border-gray-100 rounded-xl p-5
                            flex flex-col items-center cursor-pointer hover:shadow-md transition-all h-full">
                    <div class="w-12 h-12 bg-white rounded-full shadow-sm border border-gray-100
                                flex items-center justify-center mb-3 overflow-hidden p-2">
                        @if($mitra->logo)
                            <img src="{{ asset($mitra->logo) }}" alt="{{ $mitra->partner_name }}"
                                 class="w-full h-full object-contain">
                        @else
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16"/>
                            </svg>
                        @endif
                    </div>
                    <p class="text-[11px] font-medium text-gray-600 line-clamp-2 leading-tight">
                        {{ $mitra->partner_name }}
                    </p>
                </div>

                {{-- Mitra Modal --}}
                <div x-show="open" style="display:none"
                     class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/65 backdrop-blur-md">
                    <div @click.away="open=false"
                         x-show="open"
                         x-transition:enter="transition ease-out duration-250"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
                        <button @click="open=false"
                                class="absolute top-4 right-4 w-8 h-8 bg-gray-100 hover:bg-gray-200
                                       text-gray-500 rounded-full flex items-center justify-center transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <div class="flex items-center gap-4 mb-5 pb-5 border-b border-gray-100">
                            <div class="w-14 h-14 bg-[var(--cream)] rounded-xl border border-gray-100
                                        flex items-center justify-center shrink-0 p-2 overflow-hidden">
                                @if($mitra->logo)
                                    <img src="{{ asset($mitra->logo) }}" alt="{{ $mitra->partner_name }}"
                                         class="w-full h-full object-contain">
                                @else
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16"/>
                                    </svg>
                                @endif
                            </div>
                            <div class="text-left">
                                <span class="text-[10px] bg-green-50 text-[var(--forest)] font-semibold
                                             uppercase tracking-widest px-2.5 py-1 rounded-full inline-block mb-1.5">
                                    {{ $mitra->type }}
                                </span>
                                <h3 class="serif text-xl font-light text-gray-900">{{ $mitra->partner_name }}</h3>
                            </div>
                        </div>

                        <p class="text-sm text-gray-500 leading-relaxed mb-5 text-left">
                            {{ $mitra->description ?? 'Menjalin kolaborasi strategis dalam pengembangan pendidikan, penelitian, dan pengabdian masyarakat.' }}
                        </p>

                        <div class="flex items-center justify-between bg-[var(--cream)] rounded-xl p-4 border border-[var(--mist)]">
                            <div class="text-left">
                                <p class="text-[10px] text-gray-400 uppercase tracking-wider">Mulai Kerja Sama</p>
                                <p class="text-sm font-semibold text-gray-800 mt-0.5">
                                    {{ \Carbon\Carbon::parse($mitra->start_date)->format('F Y') }}
                                </p>
                            </div>
                            @if($mitra->document_file)
                            <a href="{{ asset($mitra->document_file) }}" target="_blank"
                               class="flex items-center gap-1.5 bg-[var(--forest)] text-white
                                      text-xs font-semibold px-4 py-2.5 rounded-xl hover:bg-[var(--sage)] transition shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Dokumen
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-6 text-center py-10">
                <p class="text-gray-400 text-sm italic">Belum ada data mitra.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12 fs">
            <a href="{{ route('mitra.index') }}" class="btn-forest">
                <span>Lihat Semua Direktori Mitra</span>
                <span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>


<script>
/* ── Scroll progress bar ── */
window.addEventListener('scroll', () => {
    const pct = window.scrollY / (document.body.scrollHeight - window.innerHeight) * 100;
    document.getElementById('pgbar').style.width = pct + '%';
});

/* ── Hero reveal ── */
document.querySelectorAll('.rv').forEach(el => el.classList.add('go'));

/* ── Section scroll fade-in ── */
const sectionObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('vis'); sectionObs.unobserve(e.target); }
    });
}, { threshold: 0.1 });
document.querySelectorAll('.fs').forEach(el => sectionObs.observe(el));

/* ── Card stagger fade-in ── */
const cardObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.opacity = '1';
            e.target.style.transform = 'translateY(0)';
            cardObs.unobserve(e.target);
        }
    });
}, { threshold: 0.1 });
document.querySelectorAll('.news-card, .testi-card, .stat-item, .why-card').forEach((el, i) => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(24px)';
    el.style.transition = `opacity .68s ease ${i * 0.06}s, transform .68s ease ${i * 0.06}s`;
    cardObs.observe(el);
});

/* ── CTA card hover — colour swap for text/icons ── */
document.querySelectorAll('.cta-card').forEach(card => {
    const pmb = card.querySelector('.pmb-title, .pmb-desc, .pmb-link');
    const isGreen = card.querySelector('.cta-fill.bg-gradient-to-br.from-\\[var\\(--forest\\)\\]');

    card.addEventListener('mouseenter', () => {
        card.querySelectorAll('.pmb-title, .bsw-title').forEach(el => el.style.color = '#fff');
        card.querySelectorAll('.pmb-desc, .bsw-desc').forEach(el => el.style.color = 'rgba(255,255,255,.7)');
        card.querySelectorAll('.pmb-link, .bsw-link').forEach(el => el.style.color = '#fff');
    });
    card.addEventListener('mouseleave', () => {
        card.querySelectorAll('.pmb-title, .bsw-title').forEach(el => el.style.color = '');
        card.querySelectorAll('.pmb-desc, .bsw-desc').forEach(el => el.style.color = '');
        card.querySelectorAll('.pmb-link, .bsw-link').forEach(el => el.style.color = '');
    });
});
</script>

@endsection
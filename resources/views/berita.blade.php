@extends('layouts.main')

@section('title', 'Berita & Kerjasama - Bioteknologi IT Del')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
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

    /* Swiper Customization */
    .swiper-button-next, .swiper-button-prev {
        color: var(--gold) !important;
        transform: scale(0.7);
        transition: all 0.3s;
    }
    .swiper-button-next:hover, .swiper-button-prev:hover { transform: scale(1); }
    .swiper-pagination-bullet-active { background: var(--gold) !important; }

    /* Glassmorphism */
    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    /* Hero Image Frame */
    .hero-frame {
        position: relative;
        display: inline-block;
    }
    .hero-frame::after {
        content: '';
        position: absolute;
        top: 15px;
        right: -15px;
        width: 100%;
        height: 100%;
        border: 2px solid var(--gold);
        border-radius: 1.5rem;
        z-index: -1;
    }

    #modal-berita-img {
        max-height: 300px;
        object-fit: cover;
        width: 100%;
        border-radius: 1rem 1rem 0 0;
    }
</style>
@endpush

@section('content')

{{-- HERO SLIDER --}}
<section class="relative w-full h-[650px] bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/microbes.png');"></div>
    
    <div class="swiper mySwiper w-full h-full">
        <div class="swiper-wrapper">
            @foreach($beritas as $berita)
            <div class="swiper-slide flex items-center">
                <div class="container mx-auto px-6 py-20">
                    <div class="grid md:grid-cols-2 gap-16 items-center">
                        {{-- GAMBAR --}}
                        <div class="hero-frame fade-in">
                            <img src="{{ $berita->gambar }}" 
                                 class="rounded-2xl shadow-2xl w-full h-[380px] object-cover border-4 border-white/10">
                        </div>

                        {{-- TEKS --}}
                        <div class="text-white">
                            <span class="text-[var(--gold)] tracking-[0.4em] uppercase text-[10px] font-bold mb-4 block">Latest Update</span>
                            <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-light leading-tight mb-6">
                                {{ $berita->judul }}
                            </h1>
                            <p class="text-gray-300 font-sans font-light leading-relaxed mb-8 opacity-80">
                                {{ \Illuminate\Support\Str::limit($berita->isi, 160) }}
                            </p>
                            <button 
                                onclick="openNewsModal('modal-berita', `{{ $berita->judul }}`, `{{ $berita->isi }}`, `{{ $berita->gambar }}`)"
                                class="group px-8 py-4 bg-[var(--forest)] text-[var(--gold)] border border-[var(--gold)] rounded-full font-bold text-[10px] uppercase tracking-widest hover:bg-[var(--gold)] hover:text-white transition-all duration-500 shadow-xl">
                                Baca Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

{{-- KERJASAMA (PARTNERSHIP) --}}
<section class="py-16 bg-white border-b border-gray-100">
    <div class="container mx-auto px-6">
        <p class="text-center text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em] mb-10">Trusted Partners & Cooperations</p>
        <div class="flex flex-wrap justify-center items-center gap-12 grayscale opacity-40 hover:grayscale-0 transition-all duration-700">
            {{-- Ganti dengan logo instansi asli --}}
            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/0/03/Logo_IT_Del.png/1200px-Logo_IT_Del.png" class="h-12 w-auto">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Logo_ITB.svg/1200px-Logo_ITB.svg.png" class="h-12 w-auto">
            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/b/be/Logo_UI.png/800px-Logo_UI.png" class="h-12 w-auto">
            <h3 class="font-serif text-2xl text-gray-400">LIPI</h3>
            <h3 class="font-serif text-2xl text-gray-400">KEMENKES</h3>
        </div>
    </div>
</section>

{{-- TESTIMONI --}}
<section class="bg-[var(--soft-bg)] py-24 font-sans relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[var(--gold)] opacity-5 rounded-full blur-3xl"></div>
    
    <div class="container mx-auto px-6 text-center relative z-10">
        <span class="text-[var(--gold)] tracking-[0.3em] uppercase text-[10px] font-bold mb-4 block">Student Voice</span>
        <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-16">Apa Kata Mereka?</h2>

        <div class="grid md:grid-cols-4 gap-8">
            @foreach([
                ['nama'=>'Anatasya','text'=>'Fasilitas lab di Bioteknologi IT Del sangat mendukung riset biomolekuler modern.'],
                ['nama'=>'Naratama','text'=>'Kurikulumnya sangat relevan dengan kebutuhan industri bio-industri saat ini.'],
                ['nama'=>'Dito','text'=>'Dosen-dosennya sangat kompeten dan membimbing kami dengan standar akademik tinggi.'],
                ['nama'=>'Jhona','text'=>'Lingkungan kampus yang asri di tepian Danau Toba membuat belajar jadi sangat fokus.']
            ] as $t)
            <div class="glass-card p-8 rounded-[2rem] shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 group text-left">
                <div class="text-[var(--gold)] mb-6 opacity-30 group-hover:opacity-100 transition-opacity">
                    <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v8h-10zm-14 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v8h-9z"/></svg>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed italic mb-8">"{{ $t['text'] }}"</p>
                <div class="flex items-center gap-4">
                    <img src="https://ui-avatars.com/api/?name={{ $t['nama'] }}&background=1a4a38&color=c6a54a" 
                         class="w-10 h-10 rounded-full border border-[var(--gold)]">
                    <div>
                        <h4 class="font-bold text-xs text-[var(--forest-dark)]">{{ $t['nama'] }}</h4>
                        <p class="text-[9px] text-gray-400 uppercase tracking-widest">Mahasiswa Biotek</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- MODAL --}}
<div id="modal-berita" 
     class="fixed inset-0 bg-[var(--forest-dark)]/90 hidden items-center justify-center z-[999] p-4 opacity-0 transition-all duration-500 backdrop-blur-sm">

    <div class="bg-white rounded-[2rem] max-w-2xl w-full overflow-hidden transform scale-95 transition-all duration-500 shadow-2xl">
        <div class="relative">
            <img id="modal-berita-img" src="">
            <button onclick="closeModal('modal-berita')" 
                    class="absolute top-4 right-4 w-10 h-10 bg-black/20 hover:bg-red-500 backdrop-blur-md text-white rounded-full flex items-center justify-center transition-all duration-300">
                &times;
            </button>
        </div>

        <div class="p-10">
            <span class="text-[var(--gold)] font-bold text-[9px] uppercase tracking-[0.3em] mb-2 block">Article Detail</span>
            <h3 id="modal-berita-title" class="font-serif text-3xl text-[var(--forest-dark)] mb-6 leading-tight"></h3>
            
            <div class="max-h-[250px] overflow-y-auto custom-scrollbar">
                <p id="modal-berita-content" class="text-gray-600 font-sans leading-relaxed text-sm text-justify pr-4"></p>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                <button onclick="closeModal('modal-berita')" 
                        class="px-8 py-3 bg-[var(--forest)] text-[var(--gold)] rounded-full font-bold text-[10px] uppercase tracking-widest hover:bg-[var(--forest-dark)] transition-all">
                    Tutup Jendela
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        centeredSlides: true,
        autoplay: { delay: 6000, disableOnInteraction: false },
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true }
    });

    function openNewsModal(id, title, content, image) {
        const modal = document.getElementById(id);
        document.getElementById('modal-berita-title').innerText = title;
        document.getElementById('modal-berita-content').innerText = content;
        document.getElementById('modal-berita-img').src = image;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.querySelector('.transform').classList.remove('scale-95');
        }, 50);
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('opacity-0');
        modal.querySelector('.transform').classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 500);
    }

    window.addEventListener('click', (e) => {
        if (e.target.id === 'modal-berita') closeModal('modal-berita');
    });
</script>
@endpush
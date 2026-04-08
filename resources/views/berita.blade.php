@extends('layouts.main')

@section('title', 'Berita & Kerjasama - Bioteknologi IT Del')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>
    .swiper-slide {
        display: flex;
        align-items: center;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: white;
    }

    .swiper-pagination-bullet-active {
        background: #3b82f6 !important;
    }

    #modal-berita-img {
        max-height: 250px;
        object-fit: cover;
        width: 100%;
    }
</style>
@endpush

@section('content')

{{-- HERO SLIDER --}}
<section class="relative w-full h-[550px] bg-gray-900">
    <div class="swiper mySwiper w-full h-full">
        <div class="swiper-wrapper">

            @foreach($beritas as $berita)
            <div class="swiper-slide">

                <div class="container mx-auto px-6">
                    <div class="grid md:grid-cols-2 gap-10 items-center">

                        {{-- GAMBAR --}}
                        <div class="relative">
                            <img src="{{ $berita->gambar }}" 
                                 class="rounded-2xl shadow-2xl w-full h-[320px] object-cover">

                            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>

                        {{-- TEKS --}}
                        <div class="text-white">
                            <h1 class="text-3xl md:text-4xl font-bold mb-4">
                                {{ $berita->judul }}
                            </h1>

                            <p class="text-gray-300 mb-6">
                                {{ \Illuminate\Support\Str::limit($berita->isi, 150) }}
                            </p>

                            <button 
                                onclick="openNewsModal(
                                    'modal-berita',
                                    `{{ $berita->judul }}`,
                                    `{{ $berita->isi }}`,
                                    `{{ $berita->gambar }}`
                                )"
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold transition flex items-center gap-2">
                                
                                👁 Selengkapnya
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

{{-- TESTIMONI --}}
<section class="bg-gray-50 py-20">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-10">Suara Mahasiswa</h2>

        <div class="grid md:grid-cols-4 gap-6">
            @foreach([
                ['nama'=>'Anatasya','text'=>'Lab lengkap dan modern'],
                ['nama'=>'Naratama','text'=>'Lingkungan nyaman'],
                ['nama'=>'Dito','text'=>'Dosen berkualitas'],
                ['nama'=>'Jhona','text'=>'Kurikulum bagus']
            ] as $t)

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition">
                <img src="https://ui-avatars.com/api/?name={{ $t['nama'] }}&background=1e40af&color=fff" 
                     class="w-16 h-16 mx-auto rounded-full mb-4">

                <h4 class="font-bold">{{ $t['nama'] }}</h4>
                <p class="text-sm text-gray-500 mt-2">"{{ $t['text'] }}"</p>
            </div>

            @endforeach
        </div>
    </div>
</section>

{{-- MODAL --}}
<div id="modal-berita" 
     class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50 p-4 opacity-0 transition">

    <div class="bg-white rounded-xl max-w-lg w-full overflow-hidden transform scale-95 transition">

        <img id="modal-berita-img" src="">

        <div class="p-6">
            <div class="flex justify-between mb-3">
                <h3 id="modal-berita-title" class="text-xl font-bold"></h3>
                <button onclick="closeModal('modal-berita')" class="text-red-500 text-2xl">&times;</button>
            </div>

            <p id="modal-berita-content" class="text-gray-600"></p>

            <div class="text-right mt-4">
                <button onclick="closeModal('modal-berita')" 
                        class="px-4 py-2 bg-blue-600 text-white rounded">
                    Tutup
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
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
    effect: 'fade',
    fadeEffect: { crossFade: true }
});

// MODAL
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
    }, 10);
}

function closeModal(id) {
    const modal = document.getElementById(id);

    modal.classList.add('opacity-0');
    modal.querySelector('.transform').classList.add('scale-95');

    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}

// klik luar
window.addEventListener('click', function(e) {
    if (e.target.classList.contains('bg-black/70')) {
        closeModal('modal-berita');
    }
});
</script>
@endpush
@extends('layouts.main')

@section('title', 'Beranda - Prodi Bioteknologi IT Del')

@section('content')

    <div class="relative w-full h-screen flex flex-col items-center justify-center overflow-hidden bg-gray-900">
        
        <div class="absolute inset-0 z-0">
            <video autoplay loop muted playsinline class="w-full h-full object-cover object-center scale-105">
                <source src="{{ asset('Adminlte/dist/img/tes.mp4') }}" type="video/mp4">
            </video>
            
            <div class="absolute inset-0 bg-black/60 pointer-events-none"></div>
        </div>

        <div class="relative z-10 flex flex-col items-center text-center px-4 mt-16">
            
            <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" class="h-20 md:h-24 w-auto mb-6 drop-shadow-2xl transition transform hover:scale-105" alt="Logo IT Del">

            <h3 class="text-white text-sm md:text-lg font-bold tracking-[0.2em] uppercase drop-shadow-md mb-2">
                Selamat Datang Di
            </h3>

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white uppercase tracking-wider drop-shadow-xl mb-4">
                Prodi Bioteknologi
            </h1>
            
            <h2 class="text-xl md:text-3xl lg:text-4xl font-bold text-white uppercase tracking-wide drop-shadow-lg mb-6">
                Institut Teknologi Del
            </h2>

            <p class="text-gray-200 text-lg md:text-xl drop-shadow-md mb-12">
                Shaping the World Through Biotechnology
            </p>

            <div class="flex items-center justify-center gap-6 md:gap-10 mt-4">
                <img src="https://via.placeholder.com/200x80.png?text=Logo+Dikti" alt="Diktisaintek Berdampak" class="h-10 md:h-14 w-auto drop-shadow-lg opacity-90 hover:opacity-100 transition cursor-pointer">
                <img src="https://via.placeholder.com/100x100.png?text=Akreditasi" alt="Akreditasi Baik" class="h-16 md:h-24 w-auto drop-shadow-xl opacity-90 hover:opacity-100 transition cursor-pointer transform hover:scale-110">
            </div>

        </div>
    </div>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Berita Terbaru</h2>
                    <div class="h-1 w-20 bg-yellow-400 mt-2 rounded"></div>
                </div>
                <a href="#" class="text-green-800 font-bold hover:underline">Lihat Semua Berita &rarr;</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <article class="group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-4 shadow-md h-56 relative">
                         <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition z-10"></div>
                         <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500" alt="Berita">
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded font-bold">PRESTASI</span>
                        <span>• 12 Feb 2026</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-800 transition leading-snug">
                        Mahasiswa Bioteknologi IT Del Raih Medali Emas di Kompetisi Sains Nasional
                    </h3>
                </article>

                <article class="group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-4 shadow-md h-56 relative">
                         <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition z-10"></div>
                         <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500" alt="Berita">
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded font-bold">AKADEMIK</span>
                        <span>• 10 Feb 2026</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-800 transition leading-snug">
                        Kuliah Umum: Masa Depan Rekayasa Genetika di Indonesia
                    </h3>
                </article>

                <article class="group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-4 shadow-md h-56 relative">
                         <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition z-10"></div>
                         <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500" alt="Berita">
                    </div>
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                        <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded font-bold">KERJASAMA</span>
                        <span>• 08 Feb 2026</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-800 transition leading-snug">
                        Penandatanganan MoU dengan Pusat Riset Biologi BRIN
                    </h3>
                </article>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold text-green-900 mb-2">Mitra Kerjasama</h2>
            <div class="h-1 w-16 bg-yellow-400 mx-auto mb-10 rounded"></div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center justify-center opacity-70">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/368px-Google_2015_logo.svg.png" class="h-8 mx-auto grayscale hover:grayscale-0 transition" alt="Google">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Microsoft_logo_%282012%29.svg/512px-Microsoft_logo_%282012%29.svg.png" class="h-8 mx-auto grayscale hover:grayscale-0 transition" alt="Microsoft">
                <img src="https://upload.wikimedia.org/wikipedia/id/9/95/Logo_Institut_Teknologi_Bandung.png" class="h-12 mx-auto grayscale hover:grayscale-0 transition" alt="ITB">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Badan_Riset_dan_Inovasi_Nasional_logo.png/640px-Badan_Riset_dan_Inovasi_Nasional_logo.png" class="h-10 mx-auto grayscale hover:grayscale-0 transition" alt="BRIN">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" class="h-8 mx-auto grayscale hover:grayscale-0 transition" alt="Amazon">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/799px-Netflix_2015_logo.svg.png" class="h-8 mx-auto grayscale hover:grayscale-0 transition" alt="Netflix">
            </div>
        </div>
    </section>

@endsection
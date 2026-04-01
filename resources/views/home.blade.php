@extends('layouts.main')

@section('title', 'Beranda - Bioteknologi IT Del')

@section('content')

    <div class="relative w-full h-[90vh] flex items-center justify-center overflow-hidden">
        
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('Adminlte/dist/img/plaza.jpg') }}" 
                 alt="Gedung IT Del" 
                 class="w-full h-full object-cover object-center scale-105">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80"></div>
        </div>

        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto mt-12 flex flex-col items-center">
            
            <div class="flex items-center gap-3 mb-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/98/Logo_IT_Del.png" class="h-12 w-auto brightness-0 invert drop-shadow-md">
                <div class="border-l-2 border-yellow-400 pl-3 text-left">
                    <p class="text-yellow-400 font-bold tracking-widest uppercase text-xs">Official Website</p>
                    <p class="text-white font-medium text-xs">Institut Teknologi Del</p>
                </div>
            </div>

            <h2 class="text-2xl md:text-3xl text-white font-light mb-2 drop-shadow-md">Selamat Datang di Program Studi</h2>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg">
                Sarjana <span class="text-yellow-400">Bioteknologi</span>
            </h1>
            
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-3xl mx-auto drop-shadow-md leading-relaxed">
                Menghasilkan lulusan unggul yang mampu memanfaatkan teknologi hayati untuk kesejahteraan masyarakat dan kemajuan bangsa.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 items-center justify-center">
                <a href="https://spmb.del.ac.id" target="_blank" class="bg-yellow-400 hover:bg-yellow-500 text-green-900 font-extrabold px-8 py-4 rounded-full transition transform hover:-translate-y-1 hover:shadow-2xl flex items-center gap-2">
                    Daftar PMB Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                
                <a href="#" class="bg-white/20 hover:bg-white/30 backdrop-blur-md text-white border border-white/50 font-bold px-8 py-4 rounded-full transition flex items-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    Tonton Video Profil
                </a>
            </div>
            
            <p class="text-white mt-6 text-sm opacity-80">Gelombang Pendaftaran: <span class="font-bold text-yellow-400">26 Jan - 27 Feb 2026</span></p>

        </div>
    </div>

    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white rounded-xl shadow-2xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transform transition hover:-translate-y-2 group">
                <div class="w-16 h-16 bg-green-50 group-hover:bg-green-100 rounded-full flex shrink-0 items-center justify-center text-green-800 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Akreditasi BAN-PT</p>
                    <h3 class="text-2xl font-extrabold text-green-900">Baik Sekali</h3>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-2xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transform transition hover:-translate-y-2 group">
                <div class="w-16 h-16 bg-green-50 group-hover:bg-green-100 rounded-full flex shrink-0 items-center justify-center text-green-800 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Serapan Lulusan</p>
                    <h3 class="text-2xl font-extrabold text-green-900">95% Bekerja</h3>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-2xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transform transition hover:-translate-y-2 group">
                <div class="w-16 h-16 bg-green-50 group-hover:bg-green-100 rounded-full flex shrink-0 items-center justify-center text-green-800 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Staf Pengajar</p>
                    <h3 class="text-2xl font-extrabold text-green-900">S3 & S2 Ahli</h3>
                </div>
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
                         <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
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
                         <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
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
                         <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
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
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/368px-Google_2015_logo.svg.png" class="h-8 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Microsoft_logo_%282012%29.svg/512px-Microsoft_logo_%282012%29.svg.png" class="h-8 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/id/9/95/Logo_Institut_Teknologi_Bandung.png" class="h-12 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Badan_Riset_dan_Inovasi_Nasional_logo.png/640px-Badan_Riset_dan_Inovasi_Nasional_logo.png" class="h-10 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" class="h-8 mx-auto grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/799px-Netflix_2015_logo.svg.png" class="h-8 mx-auto grayscale hover:grayscale-0 transition">
            </div>
        </div>
    </section>

@endsection
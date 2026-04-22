@extends('layouts.main')

@section('title', 'Beranda - Prodi Bioteknologi IT Del')

@section('content')

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<div class="relative text-white min-h-screen flex flex-col items-center justify-center px-6 py-20 overflow-hidden">
    
    {{-- Video Background --}}
    <video 
        autoplay 
        muted 
        loop 
        playsinline
        class="absolute inset-0 w-full h-full object-cover z-0"
    >
        <source src="{{ asset('videos/profil.mp4') }}" type="video/mp4">
    </video>

    {{-- Overlay gelap agar teks tetap terbaca --}}
    <div class="absolute inset-0 bg-[#0b1320]/75 z-10"></div>

    {{-- Konten (tambahkan relative z-20 agar di atas overlay) --}}
    <div class="relative z-20 flex flex-col items-center justify-center w-full">
        <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" alt="Logo IT Del" class="h-24 md:h-32 mb-8">
        
        <h3 class="text-sm md:text-lg font-bold tracking-[0.2em] mb-4 uppercase text-gray-300">Selamat Datang Di</h3>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-2 text-center tracking-tight">PRODI BIOTEKNOLOGI</h1>
        <h2 class="text-2xl md:text-4xl font-bold mb-8 text-center text-gray-200">INSTITUT TEKNOLOGI DEL</h2>
        
        <p class="text-lg md:text-xl text-gray-400 font-light italic mb-16">"Shaping the World Through Biotechnology"</p>
        
        <div class="flex gap-8 items-center mt-10 opacity-70">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center text-xs">Logo</div>
                <span class="text-sm font-semibold">Diktisaintek Berdampak</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center text-xs">Logo</div>
                <span class="text-sm font-semibold">Akreditasi Baik</span>
            </div>
        </div>
    </div>
</div>


<div class="relative w-full py-32 bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: url('{{ asset('images/gedung-del.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 flex flex-col items-center justify-center h-full px-6 text-white text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-8 drop-shadow-lg uppercase tracking-wider">
            TEKNIK BIOTEKNOLOGI IT DEL
        </h2>

        <div class="bg-[#1c2331]/80 backdrop-blur-md p-8 md:p-12 max-w-5xl rounded-xl border border-gray-500/30 shadow-2xl">
            <p class="text-sm md:text-base leading-loose text-justify md:text-center text-gray-200">
                Teknik Bioteknologi adalah bidang ilmu teknik yang mempelajari proses ekstraksi, pengolahan, karakterisasi, dan rekayasa material hayati agar dapat dimanfaatkan secara optimal dalam berbagai sektor industri. Teknik Bioteknologi IT Del dikembangkan untuk menjawab tantangan industri modern dengan pendekatan yang terintegrasi antara teori, praktik laboratorium, dan pemanfaatan teknologi terkini. Fokus utamanya mencakup rekayasa bioproses, biomaterial, serta pengembangan material yang ramah lingkungan dan berkelanjutan. Melalui program ini, mahasiswa dibekali dengan kompetensi teknis, analitis, serta etika profesi yang kuat.
            </p>
        </div>
    </div>
</div>


<div class="bg-white py-24">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            
            <div class="w-full lg:w-1/2">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/mahasiswa.jpg') }}" alt="Mahasiswa Bioteknologi" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    <div class="absolute -z-10 -bottom-6 -left-6 w-full h-full bg-blue-50 rounded-2xl"></div>
                </div>
            </div>

            <div class="w-full lg:w-1/2">
                <h2 class="text-4xl font-bold text-gray-800 mb-10">Mengapa <span class="text-[#0b1320]">Memilih</span> Kami?</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <div class="text-[#1a4a38] mb-4">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Fasilitas</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Kami memiliki berbagai fasilitas laboratorium mutakhir yang dapat menunjang aktivitas riset civitas akademika.</p>
                    </div>
                    <div>
                        <div class="text-[#1a4a38] mb-4">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20"><path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Inovasi</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Prodi kami terus berinovasi dalam riset bioproses, energi terbarukan, dan rekayasa genetika lingkungan.</p>
                    </div>
                    <div>
                        <div class="text-[#1a4a38] mb-4">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 01.932.638l2.15 5.093 5.583.44a1 1 0 01.564 1.743l-4.225 3.731 1.25 5.46a1 1 0 01-1.492 1.082L10 17.317l-4.762 2.87a1 1 0 01-1.492-1.082l1.25-5.46-4.225-3.731a1 1 0 01.564-1.742l5.583-.44 2.15-5.093A1 1 0 0110 2z" clip-rule="evenodd"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Prestasi</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Telah meraih berbagai prestasi riset dan kompetisi inovasi mahasiswa baik di tingkat nasional maupun internasional.</p>
                    </div>
                    <div>
                        <div class="text-[#1a4a38] mb-4">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Beasiswa</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Memiliki berbagai program beasiswa prestasi dan bantuan finansial. Klik di sini untuk informasi beasiswa.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="bg-gray-50 py-24">
    <div class="container mx-auto px-6 max-w-5xl text-center">
        <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-2">INFORMASI</p>
        <h2 class="text-4xl font-bold text-gray-800 mb-16">Penerimaan <span class="text-[#0b1320]">Mahasiswa</span> Baru</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 px-4 md:px-0">
            
            <div class="bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] pt-12 pb-8 px-6 relative flex flex-col items-center hover:-translate-y-2 transition-transform duration-300">
                <div class="w-20 h-20 mb-6 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-4">Panduan Pendaftaran</h3>
                <a href="#" class="absolute -bottom-6 w-12 h-12 bg-[#0b1320] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-blue-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] pt-12 pb-8 px-6 relative flex flex-col items-center hover:-translate-y-2 transition-transform duration-300">
                <div class="w-20 h-20 mb-6 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-4">Biaya Pendidikan</h3>
                <a href="#" class="absolute -bottom-6 w-12 h-12 bg-[#0b1320] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-blue-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] pt-12 pb-8 px-6 relative flex flex-col items-center hover:-translate-y-2 transition-transform duration-300">
                <div class="w-20 h-20 mb-6 bg-green-50 text-green-500 rounded-2xl flex items-center justify-center">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-4">Syarat Pendaftaran</h3>
                <a href="#" class="absolute -bottom-6 w-12 h-12 bg-[#0b1320] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-blue-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
    </div>
</div>


<div class="bg-gray-50 py-24 border-t border-gray-200">
    <div class="container mx-auto px-6 max-w-6xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Berita <span class="text-[#0b1320]">Utama</span></h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            @forelse($beritas as $berita)
            <div x-data="{ openModal: false }" class="bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden flex flex-col group relative">
                
                <div class="overflow-hidden h-48 cursor-pointer" @click="openModal = true">
                    @if($berita->foto)
                        <img src="{{ asset($berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center text-xs text-gray-400 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-[#1a4a38]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                            {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                        </span>
                        </div>
                    
                    <h3 @click="openModal = true" class="text-lg font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-[#1a4a38] transition-colors cursor-pointer">
                        {{ $berita->judul }}
                    </h3>
                    
                    <p class="text-sm text-gray-500 mb-6 flex-1 line-clamp-3">
                        {{ Str::limit(strip_tags($berita->konten), 120) }}
                    </p>
                    
                    <button type="button" @click="openModal = true" class="text-[#0b1320] text-sm font-bold flex items-center gap-2 hover:text-blue-600 transition w-fit">
                        Baca selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>

                <div x-show="openModal" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
                    <div @click.away="openModal = false" 
                         x-show="openModal" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-4"
                         class="relative w-full max-w-3xl bg-white rounded-2xl shadow-2xl flex flex-col max-h-[90vh] overflow-hidden">
                        
                        <button @click="openModal = false" class="absolute top-4 right-4 z-10 bg-black/50 hover:bg-black text-white rounded-full p-2 backdrop-blur-md transition duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>

                        <div class="overflow-y-auto w-full custom-scrollbar">
                            @if($berita->foto)
                                <img src="{{ asset($berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-64 md:h-80 object-cover">
                            @endif
                            
                            <div class="p-6 md:p-10">
                                <div class="flex items-center text-sm font-bold text-[#1a4a38] mb-4 gap-2 uppercase tracking-wider">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                                </div>
                                
                                <h2 class="text-2xl md:text-4xl font-extrabold text-gray-900 mb-8 leading-tight">
                                    {{ $berita->judul }}
                                </h2>
                                
                                <div class="text-gray-700 leading-relaxed text-justify space-y-4 md:text-lg">
                                    {!! nl2br(e($berita->konten)) !!}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
            @empty
            <div class="col-span-3 text-center py-12 bg-white rounded-xl border border-dashed border-gray-300">
                <p class="text-gray-500 italic">Belum ada berita yang diterbitkan oleh Admin.</p>
            </div>
            @endforelse
            </div>
            
            <div class="mt-16 text-center">
            <a href="{{ route('berita.lengkap') }}" class="inline-flex items-center gap-3 bg-white text-[#1a4a38] border-2 border-[#1a4a38] px-10 py-3 rounded-full font-bold shadow-sm hover:bg-[#1a4a38] hover:text-white transition-all duration-300 group">
                Lihat Semua Berita
                <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

    </div>
</div>

        </div>
    </div>
</div>

<div class="bg-white py-24">
    <div class="container mx-auto px-6 max-w-6xl text-center">
        <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-2">KOLABORASI</p>
        <h2 class="text-3xl font-bold text-gray-800 mb-12">Mitra <span class="text-[#0b1320]">Kerja Sama</span></h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @forelse($mitras as $mitra)
            
            <div x-data="{ openMitra: false }" class="relative">
                
                <div @click="openMitra = true" class="bg-gray-50 hover:bg-green-50 border border-gray-100 rounded-xl p-6 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group h-full">
                    
                    <div class="w-20 h-20 bg-white rounded-full shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform overflow-hidden p-3 border border-gray-100">
                        @if($mitra->logo)
                            <img src="{{ asset($mitra->logo) }}" alt="Logo {{ $mitra->partner_name }}" class="w-full h-full object-contain">
                        @else
                            @if($mitra->type == 'Industri')
                                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            @elseif($mitra->type == 'Pendidikan')
                                <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                            @else
                                <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                            @endif
                        @endif
                    </div>
                    
                    <h3 class="text-sm font-extrabold text-gray-800 line-clamp-2 leading-tight">{{ $mitra->partner_name }}</h3>
                </div>

                <div x-show="openMitra" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm text-left">
                    <div @click.away="openMitra = false" 
                         x-show="openMitra" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl p-8">
                        
                        <button @click="openMitra = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-800 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>

                        <div class="flex items-center gap-4 mb-6 border-b border-gray-100 pb-6">
                            
                            <div class="w-20 h-20 bg-gray-50 rounded-xl flex items-center justify-center shrink-0 overflow-hidden p-2 border border-gray-200">
                                @if($mitra->logo)
                                    <img src="{{ asset($mitra->logo) }}" alt="Logo {{ $mitra->partner_name }}" class="w-full h-full object-contain">
                                @else
                                    @if($mitra->type == 'Industri')
                                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    @elseif($mitra->type == 'Pendidikan')
                                        <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                                    @else
                                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                                    @endif
                                @endif
                            </div>
                            
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-widest px-2 py-1 rounded bg-gray-100 text-gray-500 mb-1 inline-block">{{ $mitra->type }}</span>
                                <h3 class="text-2xl font-extrabold text-gray-900 leading-tight">{{ $mitra->partner_name }}</h3>
                            </div>
                        </div>

                        <div class="mb-6">
                            <p class="text-sm font-bold text-gray-800 mb-2">Deskripsi Kerja Sama:</p>
                            <p class="text-gray-600 text-sm leading-relaxed text-justify">
                                {{ $mitra->description ?? 'Menjalin kolaborasi strategis dalam pengembangan pendidikan, penelitian, dan pengabdian kepada masyarakat.' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4 flex items-center justify-between border border-gray-100">
                            <div>
                                <p class="text-xs text-gray-500">Mulai Kerja Sama</p>
                                <p class="text-sm font-bold text-gray-800">{{ \Carbon\Carbon::parse($mitra->start_date)->format('F Y') }}</p>
                            </div>
                            @if($mitra->document_file)
                            <a href="{{ asset($mitra->document_file) }}" target="_blank" class="flex items-center gap-2 bg-[#1a4a38] text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-green-800 transition shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Lihat Dokumen
                            </a>
                            @endif
                        </div>

                    </div>
                </div>
                </div>
            
            @empty
            <div class="col-span-2 md:col-span-3 lg:col-span-6 text-center py-10">
                <p class="text-gray-500 italic">Belum ada data mitra.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('mitra.index') }}" class="inline-flex items-center gap-2 text-[#1a4a38] font-bold hover:underline transition-all">
                Lihat Semua Direktori Mitra 
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

    </div>
</div>

@endsection
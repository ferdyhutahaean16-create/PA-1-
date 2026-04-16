@extends('layouts.main')

@section('title', 'Beranda - Prodi Bioteknologi IT Del')

@section('content')

<!-- HERO -->
<div class="relative w-full h-[90vh] flex items-center justify-center overflow-hidden bg-gray-900">
    
    <!-- VIDEO -->
    <div class="absolute inset-0 z-0">
        <video autoplay loop muted playsinline 
        class="w-full h-full object-cover">
            <source src="/tes.mp4" type="video/mp4">
        </video>

        <!-- overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80"></div>

        <!-- efek biotech -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(0,255,150,0.2),transparent_40%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_70%,rgba(255,255,0,0.15),transparent_40%)]"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto flex flex-col items-center">

        <div class="flex items-center gap-3 mb-6">
            <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" class="h-12 brightness-0 invert">
            <div class="border-l-2 border-yellow-400 pl-3 text-left">
                <p class="text-yellow-400 font-bold text-xs uppercase">Official Website</p>
                <p class="text-white text-xs">Institut Teknologi Del</p>
            </div>
<div class="bg-[#0b1320] text-white min-h-screen flex flex-col items-center justify-center relative px-6 py-20">
    <img src="{{ asset('images/logo-del.png') }}" alt="Logo IT Del" class="h-24 md:h-32 mb-8">
    
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

        <h2 class="text-2xl md:text-3xl text-white mb-2">
            Selamat Datang di Program Studi
        </h2>

        <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 animate-[floatText_4s_ease-in-out_infinite]">
            Sarjana <span class="text-yellow-400">Bioteknologi</span>
        </h1>

        <p class="text-lg text-gray-200 mb-10 max-w-3xl">
            Menghasilkan lulusan unggul yang mampu memanfaatkan teknologi hayati 
            untuk kesejahteraan masyarakat dan kemajuan bangsa.
        </p>

        <!-- BUTTON -->
        <div class="flex flex-col sm:flex-row gap-4">

            <a href="https://spmb.del.ac.id" target="_blank"
            class="relative overflow-hidden bg-yellow-400 text-green-900 font-bold px-8 py-4 rounded-full transition group">
                <span class="relative z-10">Daftar PMB Sekarang →</span>
                <span class="absolute inset-0 bg-white/30 opacity-0 group-hover:opacity-100 transition"></span>
            </a>

            <a href="#"
            class="bg-white/20 hover:bg-white/30 text-white border px-8 py-4 rounded-full transition">
                ▶ Tonton Video Profil
            </a>

        </div>

        <!-- FIX TEKS -->
        <p class="mt-12 text-sm text-white bg-black/40 px-4 py-2 rounded-full backdrop-blur-sm">
            Gelombang Pendaftaran: 
            <span class="text-yellow-400 font-bold">26 Jan - 27 Feb 2026</span>
        </p>

    </div>
</div>

<!-- STATS -->
<div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 mb-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-xl shadow-xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transition duration-300 hover:-translate-y-2 hover:scale-105">
            <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-green-800">✔</div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase">Akreditasi</p>
                <h3 class="text-2xl font-extrabold text-green-900">Baik Sekali</h3>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transition duration-300 hover:-translate-y-2 hover:scale-105">
            <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-green-800">💼</div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase">Serapan</p>
                <h3 class="text-2xl font-extrabold text-green-900">95% Bekerja</h3>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xl p-6 flex items-center gap-5 border-b-4 border-yellow-400 transition duration-300 hover:-translate-y-2 hover:scale-105">
            <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-green-800">👨‍🏫</div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase">Staf</p>
                <h3 class="text-2xl font-extrabold text-green-900">S2 & S3</h3>
            </div>
        </div>

    </div>
</div>

<!-- BERITA -->
<section class="py-16 bg-gradient-to-b from-white to-green-50">
    <div class="container mx-auto px-6">

        <div class="flex justify-between mb-10">
            <h2 class="text-3xl font-bold">Berita Terbaru</h2>
            <a href="#" class="text-green-800 font-bold hover:underline">Lihat Semua →</a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="group">
                <img src="{{ asset('images/berita/berita1.jpg') }}"
                onerror="this.src='https://source.unsplash.com/400x300/?biology'"
                class="w-full h-48 object-cover rounded-lg mb-3 transition group-hover:scale-105">
                <h3 class="font-bold">Prestasi Mahasiswa</h3>
            </div>

            <div class="group">
                <img src="{{ asset('images/berita/berita2.jpg') }}"
                onerror="this.src='https://source.unsplash.com/400x300/?lab'"
                class="w-full h-48 object-cover rounded-lg mb-3 transition group-hover:scale-105">
                <h3 class="font-bold">Kuliah Umum</h3>
            </div>

            <div class="group">
                <img src="{{ asset('images/berita/berita3.jpg') }}"
                onerror="this.src='https://source.unsplash.com/400x300/?research'"
                class="w-full h-48 object-cover rounded-lg mb-3 transition group-hover:scale-105">
                <h3 class="font-bold">Kerjasama BRIN</h3>

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
</section>

<!-- MITRA -->
<section class="py-16 bg-gray-50 text-center">
    <h2 class="text-2xl font-bold text-green-900 mb-6">Mitra Kerjasama</h2>

    <div class="flex flex-wrap justify-center gap-10 opacity-70">

        <img src="{{ asset('images/mitra/google.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/microsoft.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/brin.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/5/55/BRIN_logo.png'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/itb.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/id/9/95/Logo_Institut_Teknologi_Bandung.png'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/netflix.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg'" class="h-10 hover:scale-110 transition">
        <img src="{{ asset('images/mitra/amazon.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'" class="h-10 hover:scale-110 transition">

    </div>
</section>
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


<div class="bg-white py-24">
    <div class="container mx-auto px-6 max-w-6xl">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Berita <span class="text-[#0b1320]">Utama</span></h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden flex flex-col">
                <img src="{{ asset('images/berita1.jpg') }}" alt="Berita 1" class="w-full h-48 object-cover">
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center text-xs text-gray-400 mb-3 gap-4">
                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 2 March 2026</span>
                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> 139 views</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2">Prestasi Membanggakan Sebagai Juara 2 Lomba Scientific Atmosphere</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-1 line-clamp-3">Prestasi membanggakan kembali diraih oleh mahasiswa Bioteknologi Fakultas Teknik melalui keberhasilan...</p>
                    <a href="#" class="text-[#0b1320] text-sm font-bold flex items-center gap-2 hover:text-blue-600 transition">Read more <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden flex flex-col">
                <img src="{{ asset('images/berita2.jpg') }}" alt="Berita 2" class="w-full h-48 object-cover">
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center text-xs text-gray-400 mb-3 gap-4">
                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 2 March 2026</span>
                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> 117 views</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2">Finalis MAPRES IT Del Tahun 2026</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-1 line-clamp-3">Mahasiswa prodi Bioteknologi berhasil menorehkan prestasi membanggakan dengan terpilih sebagai finalis Mahasiswa Berprestasi...</p>
                    <a href="#" class="text-[#0b1320] text-sm font-bold flex items-center gap-2 hover:text-blue-600 transition">Read more <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden flex flex-col">
                <img src="{{ asset('images/berita3.jpg') }}" alt="Berita 3" class="w-full h-48 object-cover">
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex items-center text-xs text-gray-400 mb-3 gap-4">
                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 2 March 2026</span>
                        <span class="flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> 103 views</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2">Karya Inovasi Paling Prospektif Tahun 2026</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-1 line-clamp-3">Pengembangan material ramah lingkungan sebagai alternatif industri berhasil meraih penghargaan inovasi...</p>
                    <a href="#" class="text-[#0b1320] text-sm font-bold flex items-center gap-2 hover:text-blue-600 transition">Read more <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@extends('layouts.main')

@section('title', 'Beranda - Prodi Bioteknologi IT Del')

@section('content')

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
@extends('layouts.main')

@section('title', 'Prestasi & Karya Mahasiswa')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-biotech-primary mb-2">Mahasiswa Berprestasi</h1>
        <p class="text-gray-500">Pencapaian kompetisi, publikasi, dan tugas akhir mahasiswa</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">

    <div class="flex justify-center mb-12 gap-4">
        <a href="#prestasi" class="px-6 py-2 rounded-full bg-biotech-primary text-white font-bold hover:bg-biotech-secondary transition">Prestasi & Lomba</a>
        <a href="#publikasi" class="px-6 py-2 rounded-full bg-white border border-gray-300 text-gray-600 font-bold hover:bg-gray-50 transition">Publikasi</a>
        <a href="#ta" class="px-6 py-2 rounded-full bg-white border border-gray-300 text-gray-600 font-bold hover:bg-gray-50 transition">Hasil Tugas Akhir</a>
    </div>

    <section id="prestasi" class="mb-16 scroll-mt-28">
        <h2 class="text-2xl font-bold text-biotech-primary mb-6 border-b pb-2">Prestasi Kompetisi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <div class="h-2 bg-biotech-accent"></div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-2 py-1 rounded">JUARA 1</span>
                        <span class="text-gray-400 text-xs">2025</span>
                    </div>
                    <h3 class="font-bold text-lg text-gray-800 mb-2">Lomba Karya Tulis Ilmiah Nasional</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">Inovasi Pangan Berbasis Limbah Kulit Kopi.</p>
                    <div class="flex items-center gap-2 border-t pt-4">
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-xs font-bold text-gray-600">FR</div>
                        <div class="text-sm">
                            <p class="font-bold text-gray-800">Ferdy Roberto</p>
                            <p class="text-xs text-gray-500">Angkatan 2023</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>

    <section id="publikasi" class="mb-16 scroll-mt-28">
        <h2 class="text-2xl font-bold text-biotech-primary mb-6 border-b pb-2">Publikasi Mahasiswa</h2>
        <div class="space-y-4">
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-biotech-primary flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="font-bold text-lg text-biotech-primary">Analisis DNA Metagenomik Tanah Gambut</h3>
                    <p class="text-sm text-gray-600 mt-1"><span class="font-bold">Penulis:</span> Budi Santoso, Dosen Pembimbing</p>
                    <p class="text-xs text-gray-500 mt-1 italic">Dipublikasikan di: Seminar Nasional Biologi 2024</p>
                </div>
                <a href="#" class="text-biotech-secondary font-bold text-sm border border-biotech-secondary px-4 py-2 rounded hover:bg-biotech-secondary hover:text-white transition">
                    Lihat Jurnal
                </a>
            </div>
        </div>
    </section>

    <section id="ta" class="scroll-mt-28">
        <h2 class="text-2xl font-bold text-biotech-primary mb-6 border-b pb-2">Hasil Tugas Akhir (TA)</h2>
        
        <div class="grid grid-cols-1 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
                <div class="flex flex-col md:flex-row justify-between gap-6">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Pengaruh Pemberian Probiotik Terhadap Pertumbuhan Ikan Nila
                        </h3>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-bold">Tugas Akhir</span>
                            <span class="text-sm text-gray-600">Oleh: <span class="font-bold">Siti Aminah</span></span>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <h4 class="font-bold text-xs text-gray-500 uppercase mb-2">Abstrak</h4>
                            <p class="text-sm text-gray-700 leading-relaxed">
                                Penelitian ini bertujuan untuk mengetahui pengaruh penambahan probiotik Lactobacillus sp. pada pakan komersial terhadap laju pertumbuhan spesifik dan kelulushidupan ikan nila...
                            </p>
                        </div>

                        <div>
                            <h4 class="font-bold text-xs text-gray-500 uppercase mb-1">Deskripsi Singkat</h4>
                            <p class="text-sm text-gray-600">
                                Penelitian eksperimental menggunakan Rancangan Acak Lengkap (RAL) dengan 4 perlakuan dan 3 ulangan.
                            </p>
                        </div>
                    </div>

                    <div class="md:w-1/4 flex flex-col justify-center items-center border-t md:border-t-0 md:border-l border-gray-100 pt-4 md:pt-0 md:pl-6">
                        <div class="text-center">
                            <p class="text-xs text-gray-400 uppercase mb-2">Kontak Penulis</p>
                            <a href="mailto:siti@student.del.ac.id" class="text-biotech-primary font-bold text-sm hover:underline break-all">
                                siti@student.del.ac.id
                            </a>
                            <button class="mt-4 w-full bg-biotech-primary text-white text-sm font-bold py-2 px-4 rounded hover:bg-biotech-secondary transition">
                                Download Full PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>

</div>

@endsection
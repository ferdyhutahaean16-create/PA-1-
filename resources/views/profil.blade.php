@extends('layouts.main')

@section('title', 'Profil Umum - Bioteknologi')

@section('content')

<div class="bg-gray-100 py-8 border-b border-gray-200">
    <div class="container mx-auto px-6">
        <p class="text-sm text-gray-500 mb-2">Beranda / Profil Umum</p>
        <h1 class="text-3xl font-bold text-biotech-primary">Profil Program Studi</h1>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row gap-12">

        <div class="w-full md:w-1/4">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden sticky top-24">
                <div class="bg-biotech-primary text-white p-4 font-bold text-lg">
                    Menu Profil
                </div>
                <ul class="divide-y divide-gray-100">
                    <li>
                        <a href="#visi-misi" class="block p-4 hover:bg-green-50 text-gray-700 hover:text-biotech-primary font-medium transition flex justify-between items-center">
                            Visi & Misi
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#sejarah" class="block p-4 hover:bg-green-50 text-gray-700 hover:text-biotech-primary font-medium transition flex justify-between items-center">
                            Sejarah Singkat
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#prospek" class="block p-4 hover:bg-green-50 text-gray-700 hover:text-biotech-primary font-medium transition flex justify-between items-center">
                            Prospek Karir
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w-full md:w-3/4 space-y-16">

            <section id="visi-misi" class="scroll-mt-28">
                <h2 class="text-2xl font-bold text-biotech-primary mb-6 flex items-center gap-3">
                    <span class="w-2 h-8 bg-biotech-accent rounded"></span>
                    Visi & Misi
                </h2>
                
                <div class="bg-green-50 border-l-4 border-biotech-primary p-6 mb-8 rounded-r-lg">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Visi</h3>
                    <p class="text-gray-700 leading-relaxed italic">
                        "Menjadi program studi yang unggul dalam pengembangan bioteknologi berbasis sumber daya alam lokal untuk kesejahteraan masyarakat pada tahun 2030."
                        </p>
                </div>

                <h3 class="text-xl font-bold text-gray-800 mb-4">Misi</h3>
                <ul class="divide-y divide-gray-100">
                    <li>
                        <a href="#visi-misi" class="block p-4 hover:bg-green-50 text-gray-700 hover:text-biotech-primary font-medium transition flex justify-between items-center">
                            Visi & Misi
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#sejarah" class="block p-4 hover:bg-green-50 text-gray-700 hover:text-biotech-primary font-medium transition flex justify-between items-center">
                            Sejarah Singkat
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#prospek" class="block p-4 hover:bg-green-50 text-gray-700 hover:text-biotech-primary font-medium transition flex justify-between items-center">
                            Prospek Karir
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </li>
                </ul>
            </section>

            <hr class="border-gray-200">

            <section id="sejarah" class="scroll-mt-28">
                <h2 class="text-2xl font-bold text-biotech-primary mb-6 flex items-center gap-3">
                    <span class="w-2 h-8 bg-biotech-accent rounded"></span>
                    Sejarah Program Studi
                </h2>
                <div class="prose max-w-none text-gray-700 leading-relaxed text-justify">
                    <p class="mb-4">
                        Program Studi Sarjana Bioteknologi Institut Teknologi Del didirikan pada tahun [Tahun Pendirian] sebagai respon terhadap kebutuhan tenaga ahli di bidang bioteknologi yang semakin meningkat di Indonesia.
                    </p>
                    <p>
                        Sejak awal berdirinya, prodi ini berfokus pada pemanfaatan keanekaragaman hayati Indonesia, khususnya di kawasan Danau Toba. Dengan dukungan fasilitas laboratorium yang modern dan tenaga pengajar lulusan universitas terkemuka dalam dan luar negeri, Program Studi Bioteknologi terus berkomitmen mencetak lulusan yang kompeten dan berkarakter.
                    </p>
                    </div>
            </section>

            <hr class="border-gray-200">

            <section id="prospek" class="scroll-mt-28">
                <h2 class="text-2xl font-bold text-biotech-primary mb-6 flex items-center gap-3">
                    <span class="w-2 h-8 bg-biotech-accent rounded"></span>
                    Prospek Karir Lulusan
                </h2>
                <p class="text-gray-700 mb-8">
                    Lulusan Bioteknologi memiliki peluang karir yang luas di berbagai sektor industri, penelitian, dan pemerintahan.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition border-t-4 border-t-biotech-secondary">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Peneliti & Akademisi</h3>
                        <p class="text-sm text-gray-600">Bekerja di lembaga riset (LIPI/BRIN), universitas, atau pusat R&D perusahaan swasta.</p>
                    </div>

                    <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition border-t-4 border-t-biotech-secondary">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Quality Control (QC/QA)</h3>
                        <p class="text-sm text-gray-600">Memastikan kualitas produk di industri pangan, farmasi, dan agroteknologi.</p>
                    </div>

                    <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition border-t-4 border-t-biotech-secondary">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Bio-Entrepreneur</h3>
                        <p class="text-sm text-gray-600">Membangun start-up berbasis produk bioteknologi seperti kultur jaringan, fermentasi, atau bibit unggul.</p>
                    </div>

                    <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm hover:shadow-md transition border-t-4 border-t-biotech-secondary">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Konsultan Lingkungan</h3>
                        <p class="text-sm text-gray-600">Ahli dalam remediasi lingkungan, pengolahan limbah, dan konservasi biodiversitas.</p>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

@endsection
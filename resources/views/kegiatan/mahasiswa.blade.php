@extends('layouts.main')

@section('title', 'Kegiatan Mahasiswa')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-biotech-primary mb-2">Kegiatan Kemahasiswaan</h1>
        <p class="text-gray-500">Himpunan, Kaderisasi, dan Pengabdian Mahasiswa</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <a href="#himpunan" class="px-6 py-2 bg-white border border-biotech-primary text-biotech-primary rounded-full hover:bg-biotech-primary hover:text-white transition font-bold">Himpunan</a>
        <a href="#pkm" class="px-6 py-2 bg-white border border-biotech-primary text-biotech-primary rounded-full hover:bg-biotech-primary hover:text-white transition font-bold">PkM Mahasiswa</a>
        <a href="#kaderisasi" class="px-6 py-2 bg-white border border-biotech-primary text-biotech-primary rounded-full hover:bg-biotech-primary hover:text-white transition font-bold">Kaderisasi</a>
    </div>

    <section id="himpunan" class="mb-16 scroll-mt-24">
        <h2 class="text-2xl font-bold text-biotech-primary mb-6 border-l-4 border-biotech-accent pl-4">Himpunan Mahasiswa</h2>
        <div class="bg-white rounded-xl shadow p-8 flex flex-col md:flex-row gap-8 items-center">
            <div class="md:w-1/3">
                <img src="https://via.placeholder.com/300x300" class="rounded-lg shadow-lg mx-auto" alt="Logo Himpunan">
            </div>
            <div class="md:w-2/3">
                <h3 class="text-xl font-bold mb-4">HIMABIO (Himpunan Mahasiswa Bioteknologi)</h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Wadah organisasi bagi seluruh mahasiswa Bioteknologi untuk mengembangkan *soft skill*, kepemimpinan, dan jaringan.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://via.placeholder.com/200x150" class="rounded shadow" alt="Kegiatan 1">
                    <img src="https://via.placeholder.com/200x150" class="rounded shadow" alt="Kegiatan 2">
                </div>
            </div>
        </div>
    </section>

    <section id="pkm" class="mb-16 scroll-mt-24">
        <h2 class="text-2xl font-bold text-biotech-primary mb-6 border-l-4 border-biotech-accent pl-4">PkM Mahasiswa</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow overflow-hidden group">
                <div class="h-48 overflow-hidden">
                    <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-lg mb-2">Mengajar di Sekolah Dasar</h4>
                    <p class="text-sm text-gray-600">Mahasiswa memberikan edukasi sains sederhana kepada siswa SD di sekitar kampus.</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow overflow-hidden group">
                <div class="h-48 overflow-hidden">
                    <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-lg mb-2">Bersih Danau Toba</h4>
                    <p class="text-sm text-gray-600">Aksi nyata mahasiswa dalam menjaga kebersihan lingkungan perairan Danau Toba.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="kaderisasi" class="scroll-mt-24">
        <h2 class="text-2xl font-bold text-biotech-primary mb-6 border-l-4 border-biotech-accent pl-4">Kaderisasi & Orientasi</h2>
        <div class="bg-biotech-bg rounded-xl p-8">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2 space-y-4">
                    <img src="https://via.placeholder.com/500x300" class="rounded-lg shadow w-full" alt="Malam Keakraban">
                </div>
                <div class="md:w-1/2">
                    <h3 class="font-bold text-xl text-gray-800 mb-3">Welcoming Party & Makrab</h3>
                    <p class="text-gray-700 mb-4">
                        Kegiatan penyambutan mahasiswa baru untuk memperkenalkan budaya kampus dan mempererat tali persaudaraan antar angkatan.
                    </p>
                    <ul class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Latihan Kepemimpinan Dasar</li>
                        <li>Mentoring Senior-Junior</li>
                        <li>Character Building Camp</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
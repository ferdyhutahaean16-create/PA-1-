@extends('layouts.main')

@section('title', 'Struktur Organisasi - Bioteknologi')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold text-biotech-primary mb-2">Struktur Organisasi</h1>
        <p class="text-gray-500">Program Studi Sarjana Bioteknologi Institut Teknologi Del</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    
    <div class="max-w-4xl mx-auto text-center mb-12">
        <p class="text-gray-700 leading-relaxed text-lg">
            Struktur organisasi kami dirancang untuk memastikan tata kelola yang transparan, efisien, dan kolaboratif demi mendukung visi menjadi program studi unggulan.
        </p>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 mb-16">
        <img src="https://via.placeholder.com/1200x600?text=BAGAN+STRUKTUR+ORGANISASI+FULL+WIDTH" 
             alt="Bagan Struktur Organisasi" 
             class="w-full h-auto rounded hover:opacity-95 transition cursor-pointer">
    </div>

    <div class="max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-biotech-primary mb-8 text-center">Pimpinan & Koordinator</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-biotech-primary text-center">
                <div class="w-24 h-24 bg-gray-200 rounded-full overflow-hidden mx-auto mb-4 border-2 border-white shadow">
                    <img src="https://via.placeholder.com/150" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-xl text-gray-800">Nama Kaprodi</h4>
                <p class="text-sm font-bold text-biotech-secondary uppercase mb-2">Ketua Program Studi</p>
                <p class="text-sm text-gray-500">NIDN: 12345678</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-biotech-accent text-center">
                <div class="w-24 h-24 bg-gray-200 rounded-full overflow-hidden mx-auto mb-4 border-2 border-white shadow">
                    <img src="https://via.placeholder.com/150" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-xl text-gray-800">Nama Kalab</h4>
                <p class="text-sm font-bold text-biotech-secondary uppercase mb-2">Kepala Laboratorium</p>
                <p class="text-sm text-gray-500">NIDN: 87654321</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-biotech-secondary text-center">
                <div class="w-24 h-24 bg-gray-200 rounded-full overflow-hidden mx-auto mb-4 border-2 border-white shadow">
                    <img src="https://via.placeholder.com/150" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-xl text-gray-800">Nama Koordinator</h4>
                <p class="text-sm font-bold text-biotech-secondary uppercase mb-2">Koordinator Tugas Akhir</p>
                <p class="text-sm text-gray-500">NIDN: 11223344</p>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.main')

@section('title', 'Penelitian Dosen & Mahasiswa')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-biotech-primary mb-2">Penelitian & Riset</h1>
        <p class="text-gray-500">Inovasi sains dari Dosen dan Mahasiswa Bioteknologi</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        
        <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-biotech-primary text-white flex items-center justify-center rounded-full font-bold">D</div>
                <h2 class="text-2xl font-bold text-gray-800">Penelitian Dosen</h2>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-biotech-primary hover:translate-x-2 transition duration-300">
                    <h3 class="font-bold text-lg text-biotech-primary mb-2">Eksplorasi Mikroba Endofit Tanaman Andaliman</h3>
                    <p class="text-sm text-gray-600 mb-2">Ketua Peneliti: <b>Dr. Nama Dosen A</b></p>
                    <p class="text-sm text-gray-500 italic">Didanai oleh: Hibah Dikti 2024</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-biotech-primary hover:translate-x-2 transition duration-300">
                    <h3 class="font-bold text-lg text-biotech-primary mb-2">Bioremediasi Limbah Tekstil Menggunakan Bakteri Lokal</h3>
                    <p class="text-sm text-gray-600 mb-2">Ketua Peneliti: <b>Nama Dosen B, M.Sc.</b></p>
                    <p class="text-sm text-gray-500 italic">Didanai oleh: Internal IT Del</p>
                </div>
            </div>
            
            <div class="mt-6 text-center">
                <a href="#" class="text-biotech-secondary font-bold hover:underline">Lihat Semua Penelitian Dosen &rarr;</a>
            </div>
        </div>

        <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-biotech-accent text-biotech-primary flex items-center justify-center rounded-full font-bold">M</div>
                <h2 class="text-2xl font-bold text-gray-800">Penelitian Mahasiswa</h2>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-biotech-accent hover:translate-x-2 transition duration-300">
                    <h3 class="font-bold text-lg text-gray-800 mb-2">Uji Aktivitas Antibakteri Ekstrak Daun Jambu Biji</h3>
                    <p class="text-sm text-gray-600 mb-2">Mahasiswa: <b>Budi Santoso (11320001)</b></p>
                    <p class="text-sm text-gray-500">Status: <span class="bg-green-100 text-green-800 px-2 py-0.5 rounded text-xs font-bold">Selesai</span></p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-biotech-accent hover:translate-x-2 transition duration-300">
                    <h3 class="font-bold text-lg text-gray-800 mb-2">Pembuatan Bioetanol dari Kulit Singkong</h3>
                    <p class="text-sm text-gray-600 mb-2">Mahasiswa: <b>Siti Aminah (11320005)</b></p>
                    <p class="text-sm text-gray-500">Status: <span class="bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded text-xs font-bold">Sedang Berjalan</span></p>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="#" class="text-biotech-secondary font-bold hover:underline">Lihat Semua Penelitian Mahasiswa &rarr;</a>
            </div>
        </div>

    </div>
</div>
@endsection
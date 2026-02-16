@extends('layouts.main')

@section('title', 'Prestasi & Publikasi Dosen')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-biotech-primary mb-2">Kinerja Dosen</h1>
        <p class="text-gray-500">Rekam jejak Workshop dan Publikasi Ilmiah Staf Pengajar</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-biotech-primary mb-6 flex items-center gap-3">
            <span class="w-2 h-8 bg-biotech-accent rounded"></span>
            Workshop & Pelatihan
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-biotech-secondary hover:shadow-lg transition">
                <span class="text-xs font-bold text-gray-400 uppercase">2025</span>
                <h3 class="text-lg font-bold text-gray-800 mt-1 mb-2">Workshop Bioteknologi Molekuler Lanjut</h3>
                <p class="text-gray-600 text-sm mb-3">Diselenggarakan oleh Pusat Riset Biologi BRIN, Cibinong.</p>
                <div class="flex items-center gap-2 text-sm text-biotech-primary font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Peserta: Nama Dosen A, M.Si.
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-biotech-secondary hover:shadow-lg transition">
                <span class="text-xs font-bold text-gray-400 uppercase">2024</span>
                <h3 class="text-lg font-bold text-gray-800 mt-1 mb-2">Pelatihan Penulisan Jurnal Internasional Bereputasi</h3>
                <p class="text-gray-600 text-sm mb-3">Universitas Sumatera Utara, Medan.</p>
                <div class="flex items-center gap-2 text-sm text-biotech-primary font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Peserta: Nama Dosen B, Ph.D.
                </div>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold text-biotech-primary mb-6 flex items-center gap-3">
            <span class="w-2 h-8 bg-biotech-accent rounded"></span>
            Publikasi Ilmiah
        </h2>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Judul Publikasi</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Jurnal / Tahun</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-6 py-4">
                            <a href="#" class="text-biotech-primary font-bold hover:underline text-sm">
                                Isolation of Amylase-Producing Bacteria from Lake Toba
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">Nama Dosen A, Mahasiswa B</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-bold">Q3</span>
                            Jurnal Biologi Indonesia, 2024
                        </td>
                    </tr>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-6 py-4">
                            <a href="#" class="text-biotech-primary font-bold hover:underline text-sm">
                                Fermentation Technology for Local Coffee Beans
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">Nama Dosen C</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-bold">Nasional</span>
                            Jurnal Pangan, 2023
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
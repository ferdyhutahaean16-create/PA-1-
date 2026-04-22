@extends('layouts.main')

@section('title', 'Fasilitas - Ruang Kelas')

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content')
<div class="bg-gray-50 py-10 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl font-bold text-[#1a4a38] mb-2 uppercase tracking-wide">Fasilitas</h1>
        <p class="text-gray-600">Sarana dan Prasarana Program Studi Bioteknologi</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12 max-w-4xl min-h-screen">

    @if($ruang_kelas->isEmpty())
        <div class="text-center p-10 bg-gray-50 rounded-lg border border-gray-200 text-gray-500 italic">
            Belum ada data ruang kelas yang ditambahkan.
        </div>
    @else
        <div class="space-y-4">
            @foreach($ruang_kelas as $index => $kelas)
            <div x-data="{ expanded: {{ $index === 0 ? 'true' : 'false' }} }" class="border border-gray-200 rounded-lg bg-white overflow-hidden shadow-sm">
                
                <button @click="expanded = ! expanded" class="w-full px-6 py-4 flex justify-between items-center bg-white hover:bg-gray-50 transition-colors focus:outline-none">
                    <span class="font-semibold text-gray-800 text-lg">{{ $kelas->nama_ruangan }}</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>

                <div x-show="expanded" x-collapse class="px-6 pb-8 pt-2 border-t border-gray-100">
                    
                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="font-bold text-gray-800 tracking-wide">INFORMASI UMUM</h3>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed text-justify">
                            {{ $kelas->deskripsi ?? 'Ruang kelas ini dirancang untuk mendukung proses belajar mengajar secara optimal. Dilengkapi dengan fasilitas pendukung seperti ' . ($kelas->fasilitas_pendukung ?? 'AC, Proyektor, dan Papan Tulis') . ' untuk menunjang interaksi antara dosen dan mahasiswa.' }}
                        </p>
                    </div>

                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="font-bold text-gray-800 tracking-wide">JAM KERJA</h3>
                        </div>
                        <div class="text-sm text-gray-600 space-y-1">
                            <p><span class="inline-block w-32 font-medium">Hari Akademik:</span> {{ $kelas->hari_akademik ?? 'Senin - Jumat' }}</p>
                            <p><span class="inline-block w-32 font-medium">Jam Akademik:</span> {{ $kelas->jam_akademik ?? '08:00 - 17:00' }}</p>
                            <p><span class="inline-block w-32 font-medium">Jam Kolaboratif:</span> {{ $kelas->jam_kolaboratif ?? '17:00 - 22:00' }}</p>
                            <p><span class="inline-block w-32 font-medium">Kapasitas:</span> {{ $kelas->kapasitas ? $kelas->kapasitas . ' Mahasiswa' : '-' }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if($kelas->foto)
                            <img src="{{ asset($kelas->foto) }}" class="w-full h-48 object-cover rounded-md border border-gray-200 shadow-sm hover:opacity-90 transition-opacity">
                        @endif
                        
                        @if($kelas->foto_2)
                            <img src="{{ asset($kelas->foto_2) }}" class="w-full h-48 object-cover rounded-md border border-gray-200 shadow-sm hover:opacity-90 transition-opacity">
                        @endif
                        
                        @if($kelas->foto_3)
                            <img src="{{ asset($kelas->foto_3) }}" class="w-full h-48 object-cover rounded-md border border-gray-200 shadow-sm hover:opacity-90 transition-opacity">
                        @endif
                        
                        @if($kelas->foto_4)
                            <img src="{{ asset($kelas->foto_4) }}" class="w-full h-48 object-cover rounded-md border border-gray-200 shadow-sm hover:opacity-90 transition-opacity">
                        @endif
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
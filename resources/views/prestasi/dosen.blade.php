@extends('layouts.main')

@section('title', 'Prestasi & Publikasi Dosen')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-3xl font-bold text-[#1a4a38] mb-2">Kinerja & Prestasi Dosen</h1>
        <p class="text-gray-500">Rekam jejak Penghargaan, Workshop, dan Publikasi Ilmiah Staf Pengajar</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    
    {{-- BAGIAN 1: PENGHARGAAN / WORKSHOP (Diambil dari tabel Achievements) --}}
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-[#1a4a38] mb-6 flex items-center gap-3">
            <span class="w-2 h-8 bg-yellow-500 rounded"></span>
            Rekognisi & Penghargaan
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Looping Data Prestasi Dosen --}}
            @forelse($achievements as $prestasi)
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500 hover:shadow-lg transition">
                <div class="flex justify-between items-center mb-1">
                    <span class="text-xs font-bold text-white bg-[#1a4a38] px-2 py-1 rounded uppercase tracking-wider">
                        {{ $prestasi->level ?? 'Nasional' }}
                    </span>
                    <span class="text-xs font-bold text-gray-400 uppercase">
                        {{ \Carbon\Carbon::parse($prestasi->date_earned)->format('Y') }}
                    </span>
                </div>
                
                <h3 class="text-lg font-bold text-gray-800 mt-2 mb-2">{{ $prestasi->achievement_name }}</h3>
                <p class="text-gray-600 text-sm mb-3">Penyelenggara: {{ $prestasi->organizer ?? '-' }}</p>
                
                <div class="flex items-center gap-2 text-sm text-[#1a4a38] font-bold mt-auto pt-2 border-t border-gray-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Peraih: {{ $prestasi->achiever_name }}
                </div>
            </div>
            @empty
            <div class="col-span-2 text-center py-8 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                <p class="text-gray-500 italic">Belum ada data rekognisi atau penghargaan yang diterbitkan.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- BAGIAN 2: PUBLIKASI ILMIAH (Diambil dari tabel Publications) --}}
    <div>
        <h2 class="text-2xl font-bold text-[#1a4a38] mb-6 flex items-center gap-3">
            <span class="w-2 h-8 bg-yellow-500 rounded"></span>
            Publikasi Ilmiah
        </h2>

        <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Judul Publikasi</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Penulis</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Jurnal / Tahun</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- Looping Data Publikasi Dosen --}}
                        @forelse($publications as $pub)
                        <tr class="hover:bg-green-50/50 transition">
                            <td class="px-6 py-4">
                                <a href="{{ $pub->view_link ?? '#' }}" target="_blank" class="text-[#1a4a38] font-bold hover:underline text-sm leading-snug block">
                                    {{ $pub->title }}
                                </a>
                                @if($pub->download_link)
                                    <a href="{{ $pub->download_link }}" target="_blank" class="text-[10px] bg-gray-100 text-gray-600 px-2 py-1 rounded mt-2 inline-block hover:bg-gray-200">Unduh Berkas</a>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $pub->author }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="bg-green-100 text-green-800 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider">
                                        {{ $pub->publication_type ?? 'Jurnal' }}
                                    </span>
                                </div>
                                {{ \Carbon\Carbon::parse($pub->publication_date)->format('Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-gray-500 italic">
                                Belum ada data publikasi ilmiah yang diterbitkan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
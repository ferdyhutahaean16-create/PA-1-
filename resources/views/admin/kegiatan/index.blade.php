@extends('layouts.admin.admin')

@section('title', 'Manajemen Kegiatan')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Kegiatan Program Studi</h1>
                <div class="h-1 w-20 bg-green-600 mt-2 rounded"></div>
            </div>
            
            <a href="{{ route('kegiatan.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Kegiatan
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-800 text-white text-sm uppercase tracking-wider">
                        <tr>
                            <th class="p-4 font-semibold text-center w-32">Kategori</th>
                            <th class="p-4 font-semibold">Nama Kegiatan & Waktu</th>
                            <th class="p-4 font-semibold">Pelaksana</th>
                            <th class="p-4 font-semibold text-center">Foto</th>
                            <th class="p-4 font-semibold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse($kegiatan as $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="p-4 text-center">
                                @php
                                    // Membuat warna badge berbeda untuk tiap kategori
                                    $bgColor = 'bg-gray-100 text-gray-800';
                                    if($item->kategori == 'Pengabdian Dosen') $bgColor = 'bg-blue-100 text-blue-800';
                                    elseif($item->kategori == 'Kegiatan Mahasiswa') $bgColor = 'bg-yellow-100 text-yellow-800';
                                    elseif($item->kategori == 'Penelitian') $bgColor = 'bg-purple-100 text-purple-800';
                                @endphp
                                <span class="text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide {{ $bgColor }}">
                                    {{ $item->kategori }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="text-sm font-bold text-gray-900 mb-1">{{ $item->judul }}</div>
                                <div class="text-xs text-green-700 font-semibold flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $item->waktu_pelaksanaan }}
                                </div>
                                @if($item->tempat)
                                    <div class="text-[11px] text-gray-500 mt-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $item->tempat }}
                                    </div>
                                @endif
                            </td>
                            <td class="p-4 text-sm font-semibold text-gray-800">{{ $item->pelaksana }}</td>
                            <td class="p-4 text-center">
                                @if($item->foto)
                                    <img src="{{ asset($item->foto) }}" class="w-16 h-12 object-cover rounded border shadow-sm mx-auto hover:scale-150 transition-transform">
                                @else
                                    <span class="text-xs text-gray-400 italic">Tanpa Foto</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('kegiatan.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data kegiatan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-600 transition shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada data kegiatan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
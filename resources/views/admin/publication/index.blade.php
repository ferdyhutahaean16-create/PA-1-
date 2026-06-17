@extends('layouts.admin.admin')

@section('title', 'Manajemen Publikasi')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Publikasi</h1>
                <div class="h-1 w-20 bg-blue-600 mt-2 rounded"></div>
            </div>
            
            <a href="{{ route('publication.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Publikasi
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
                            <th class="p-4 font-semibold text-center w-24">Tanggal</th>
                            <th class="p-4 font-semibold text-center">Kategori</th>
                            <th class="p-4 font-semibold">Judul Publikasi & Penulis</th>
                            <th class="p-4 font-semibold text-center">Cover</th>
                            <th class="p-4 font-semibold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse($publications as $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="p-4 text-center font-bold text-gray-800">{{ $item->publication_date }}</td>
                            <td class="p-4 text-center">
                                <span class="text-xs font-bold px-3 py-1 rounded-full {{ $item->category == 'Dosen' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $item->category }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="text-sm font-bold text-blue-600 mb-1">{{ $item->title }}</div>
                                <div class="text-xs text-gray-600 font-semibold">Oleh: {{ $item->author }}</div>
                                <div class="text-[10px] text-gray-400 mt-1 uppercase">{{ $item->publication_type }}</div>
                            </td>
                            <td class="p-4 text-center">
                                @if($item->cover_image)
                                    <img src="{{ asset($item->cover_image) }}" class="w-16 h-20 object-cover rounded border shadow-sm mx-auto">
                                @else
                                    <span class="text-xs text-gray-400 italic">Tanpa Gambar</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('publication.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    <form action="{{ route('publication.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-600 transition shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada data publikasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
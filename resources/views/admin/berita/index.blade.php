@extends('layouts.admin.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Data Berita Utama</h1>
                <p class="text-gray-500">Kelola artikel dan berita yang akan tampil di halaman depan.</p>
            </div>
            <a href="{{ route('berita.create') }}" class="bg-[#1a4a38] text-white px-6 py-2.5 rounded-lg font-bold shadow hover:bg-green-800 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tulis Berita Baru
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
                    <thead class="bg-gray-800 text-white text-sm uppercase">
                        <tr>
                            <th class="p-4 w-16 text-center">No</th>
                            <th class="p-4 w-32 text-center">Foto</th>
                            <th class="p-4">Judul Berita</th>
                            <th class="p-4 w-40 text-center">Tanggal</th>
                            <th class="p-4 w-24 text-center">Views</th>
                            <th class="p-4 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($beritas as $index => $berita)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-center font-medium">{{ $index + 1 }}</td>
                            <td class="p-4 text-center">
                                @if($berita->foto)
                                    <img src="{{ asset($berita->foto) }}" class="w-20 h-14 object-cover rounded shadow-sm mx-auto">
                                @else
                                    <div class="w-20 h-14 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-400 mx-auto">No Image</div>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-gray-800 line-clamp-1">{{ $berita->judul }}</div>
                                <div class="text-xs text-gray-500 mt-1 line-clamp-1">{{ Str::limit($berita->konten, 60) }}</div>
                            </td>
                            <td class="p-4 text-center text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                            </td>
                            <td class="p-4 text-center text-sm">
                                <span class="bg-blue-100 text-blue-700 py-1 px-3 rounded-full text-xs font-bold">{{ $berita->views }}</span>
                            </td>
                            <td class="p-4 text-center flex justify-center gap-2 mt-2">
                                <a href="{{ route('berita.edit', $berita->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-xs transition">Edit</a>
                                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 italic">Belum ada berita yang diterbitkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
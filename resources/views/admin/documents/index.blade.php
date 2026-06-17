@extends('layouts.admin.admin')

@section('title', 'Kelola Arsip Dokumen')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Arsip Dokumen Prodi</h1>
                <p class="text-gray-500">Kelola dan unggah dokumen resmi (PDF, Word, Excel) Program Studi.</p>
            </div>
            <a href="{{ route('documents.create') }}" class="bg-[#1a4a38] text-white px-6 py-2.5 rounded-lg font-bold shadow hover:bg-green-800 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Dokumen
            </a>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table Section --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-800 text-white text-sm uppercase">
                        <tr>
                            <th class="p-4 w-16 text-center">No</th>
                            <th class="p-4">Informasi Dokumen</th>
                            <th class="p-4 text-center">Tipe File</th>
                            <th class="p-4 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($documents as $index => $doc)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-center font-medium">{{ $index + 1 }}</td>
                            <td class="p-4">
                                <div class="font-bold text-gray-800 text-lg">{{ $doc->title }}</div>
                                @if($doc->description)
                                    <div class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $doc->description }}</div>
                                @endif
                                <div class="text-xs text-gray-400 mt-2">
                                    Diunggah: {{ $doc->created_at->translatedFormat('d M Y') }}
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <a href="{{ asset($doc->file_path) }}" target="_blank" class="inline-flex items-center gap-1 bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full text-xs font-bold hover:bg-blue-100 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Lihat / Unduh
                                </a>
                            </td>
                            <td class="p-4 text-center flex justify-center gap-2 mt-4">
                                <a href="{{ route('documents.edit', $doc->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-xs transition">Edit</a>
                                <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dokumen ini secara permanen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500 italic">Belum ada dokumen yang diunggah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
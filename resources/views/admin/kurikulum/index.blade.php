@extends('layouts.admin.admin')

@section('title', 'Manajemen Kurikulum')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Kurikulum Program Studi</h1>
                <div class="h-1 w-20 bg-blue-600 mt-2 rounded"></div>
            </div>
            
            <a href="{{ route('kurikulum.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Mata Kuliah
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
                            <th class="p-4 font-semibold text-center w-24">Smt</th>
                            <th class="p-4 font-semibold w-32">Kode MK</th>
                            <th class="p-4 font-semibold">Nama Mata Kuliah</th>
                            <th class="p-4 font-semibold text-center w-24">SKS</th>
                            <th class="p-4 font-semibold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse($kurikulum as $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="p-4 text-center font-bold text-blue-600">{{ $item->semester }}</td>
                            <td class="p-4 font-mono text-sm text-gray-500">{{ $item->kode_mk }}</td>
                            <td class="p-4 font-bold text-gray-800">{{ $item->mata_kuliah }}</td>
                            <td class="p-4 text-center">{{ $item->sks }}</td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('kurikulum.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    <form action="{{ route('kurikulum.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus mata kuliah ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-600 transition shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada data mata kuliah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
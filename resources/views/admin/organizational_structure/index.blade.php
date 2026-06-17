@extends('layouts.admin.admin')

@section('title', 'Manajemen Struktur Organisasi')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Bagan Struktur Organisasi</h1>
                <div class="h-1 w-20 bg-blue-600 mt-2 rounded"></div>
            </div>
            
            <a href="{{ route('organizational-structure.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Anggota Struktur
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
                            <th class="p-4 font-semibold text-center w-24">Level</th>
                            <th class="p-4 font-semibold">Foto</th>
                            <th class="p-4 font-semibold">Jabatan</th>
                            <th class="p-4 font-semibold">Nama Pejabat</th>
                            <th class="p-4 font-semibold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse($structures as $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="p-4 text-center">
                                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-0.5 rounded-full">
                                    Lvl {{ $item->level }}
                                </span>
                            </td>
                            <td class="p-4">
                                @if($item->photo)
                                    <img src="{{ asset($item->photo) }}" class="w-12 h-12 rounded-full object-cover border-2 border-gray-100 shadow-sm">
                                @else
                                    <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-400">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                    </div>
                                @endif
                            </td>
                            <td class="p-4 font-bold text-gray-800">{{ $item->position }}</td>
                            <td class="p-4">{{ $item->name }}</td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('organizational-structure.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    <form action="{{ route('organizational-structure.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-600 transition shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada data struktur organisasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
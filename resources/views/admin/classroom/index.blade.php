@extends('layouts.admin.admin')

@section('title', 'Manajemen Ruang Kelas')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Ruang Kelas</h1>
                <div class="h-1 w-20 bg-green-600 mt-2 rounded"></div>
            </div>
            
            <a href="{{ route('classroom.create') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah
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
                            <th class="p-4 font-semibold w-16 text-center">No</th>
                            <th class="p-4 font-semibold">Nama Ruangan & Deskripsi</th>
                            <th class="p-4 font-semibold text-center">Hari Akademik</th>
                            <th class="p-4 font-semibold text-center">Foto</th>
                            <th class="p-4 font-semibold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse($classrooms as $index => $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="p-4 text-center font-bold text-gray-500">{{ $index + 1 }}</td>
                            <td class="p-4">
                                <div class="text-base font-bold text-gray-900">{{ $item->name }}</div>
                                @if($item->description)
                                    <div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ strip_tags($item->description) }}
                                    </div>
                                @endif
                            </td>
                            <td class="p-4 text-center font-semibold text-blue-600">
                                {{ $item->academic_days ?? '-' }}
                            </td>
                            <td class="p-4 text-center">
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" class="w-16 h-12 object-cover rounded border shadow-sm mx-auto hover:scale-150 transition-transform cursor-pointer">
                                @else
                                    <span class="text-xs text-gray-400 italic">Tanpa Foto</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('classroom.edit', $item->id) }}" class="bg-yellow-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    <form action="{{ route('classroom.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus ruangan ini secara permanen?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-600 transition shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada data ruang kelas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
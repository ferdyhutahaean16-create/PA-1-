@extends('layouts.admin.admin')

@section('title', 'Manajemen Tenaga Pendidik - Admin Bioteknologi')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Manajemen Tenaga Pendidik</h1>
                <div class="h-1 w-20 bg-yellow-500 mt-2 rounded"></div>
            </div>
            
            <a href="{{ route('lecturer.create') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-10 rounded-lg shadow-md transition transform hover:-translate-y-0.5 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Tambah</span>
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
                            <th class="p-4 font-semibold">Foto</th>
                            <th class="p-4 font-semibold">NIDN / NIK</th>
                            <th class="p-4 font-semibold">Nama Lengkap</th>
                            <th class="p-4 font-semibold">Posisi / Jabatan</th>
                            <th class="p-4 font-semibold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        
                        @forelse($lecturers as $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            
                            <td class="p-4">
                                @if($item->photo)
                                    <img src="{{ asset($item->photo) }}" alt="photo {{ $item->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-gray-200 shadow-sm">
                                @else
                                    <div class="w-12 h-12 bg-green-100 text-green-700 rounded-full flex items-center justify-center text-xl font-bold border-2 border-green-200 shadow-sm">
                                        {{ substr($item->name, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            
                            <td class="p-4 font-medium">{{ $item->nidn }}</td>
                            <td class="p-4 font-bold text-green-700">{{ $item->name }}</td>
                            <td class="p-4 text-sm">{{ $item->position }}</td>
                            
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    
                                    <a href="{{ route('lecturer.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    
                                    <form action="{{ route('lecturer.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data tenaga pendidik ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-600 transition shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                Belum ada data tenaga pendidik.
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
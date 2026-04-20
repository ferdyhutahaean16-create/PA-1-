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
            
            <a href="{{ route('tenaga-pendidik.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Data Baru
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
                        
                        @forelse($tenaga_pendidiks as $tenaga_pendidik)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            
                            <td class="p-4">
                                @if($tenaga_pendidik->foto)
                                    <img src="{{ asset($tenaga_pendidik->foto) }}" alt="Foto {{ $tenaga_pendidik->nama }}" class="w-12 h-12 rounded-full object-cover border-2 border-gray-200 shadow-sm">
                                @else
                                    <div class="w-12 h-12 bg-green-100 text-green-700 rounded-full flex items-center justify-center text-xl font-bold border-2 border-green-200 shadow-sm">
                                        {{ substr($tenaga_pendidik->nama, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            
                            <td class="p-4 font-medium">{{ $tenaga_pendidik->nidn }}</td>
                            <td class="p-4 font-bold text-green-700">{{ $tenaga_pendidik->nama }}</td>
                            <td class="p-4 text-sm">{{ $tenaga_pendidik->jabatan }}</td>
                            
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    
                                    <a href="{{ route('tenaga-pendidik.edit', $tenaga_pendidik->id) }}" class="bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    
                                    <form action="{{ route('tenaga-pendidik.destroy', $tenaga_pendidik->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
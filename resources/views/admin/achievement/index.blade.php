@extends('layouts.admin.admin')

@section('title', 'Manajemen Prestasi')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Prestasi Civitas Akademika</h1>
                <div class="h-1 w-20 bg-yellow-500 mt-2 rounded"></div>
            </div>
            
            <a href="{{ route('achievement.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Prestasi
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
                            <th class="p-4 font-semibold text-center w-20">Tahun</th>
                            <th class="p-4 font-semibold text-center">Kategori</th>
                            <th class="p-4 font-semibold">Nama Peraih</th>
                            <th class="p-4 font-semibold">Judul Prestasi & Tingkat</th>
                            <th class="p-4 font-semibold text-center">Foto</th>
                            <th class="p-4 font-semibold text-center w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse($achievements as $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            {{-- Mengambil Tahun dari kolom date_earned --}}
                            <td class="p-4 text-center font-bold text-gray-800">
                                {{ \Carbon\Carbon::parse($item->date_earned)->format('Y') }}
                            </td>
                            
                            <td class="p-4 text-center">
                                <span class="text-xs font-bold px-3 py-1 rounded-full {{ $item->category == 'Dosen' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $item->category }}
                                </span>
                            </td>
                            
                            <td class="p-4 font-semibold text-gray-800">{{ $item->achiever_name }}</td>
                            
                            <td class="p-4">
                                <div class="text-sm font-bold text-gray-800">{{ $item->achievement_name }}</div>
                                <div class="text-xs text-yellow-600 font-semibold mt-1">{{ $item->level ?? 'Tidak disebutkan' }}</div>
                            </td>
                            
                            <td class="p-4 text-center">
                                @if($item->certificate_file)
                                    <img src="{{ asset($item->certificate_file) }}" class="w-16 h-16 object-cover rounded-lg border shadow-sm mx-auto">
                                @else
                                    <span class="text-xs text-gray-400 italic">Tanpa Foto</span>
                                @endif
                            </td>
                            
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('achievement.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    <form action="{{ route('achievement.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data prestasi ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-600 transition shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 italic">Belum ada data prestasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
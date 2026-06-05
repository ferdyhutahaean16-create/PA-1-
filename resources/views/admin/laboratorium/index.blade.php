@extends('layouts.admin.admin')

@section('title', 'Kelola Laboratorium')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Data Laboratorium</h1>
                <p class="text-gray-500">Kelola informasi fasilitas dan deskripsi masing-masing lab.</p>
            </div>
            <a href="{{ route('admin.fasilitas.create') }}" class="bg-[#1a4a38] text-white px-6 py-2.5 rounded-lg font-bold shadow hover:bg-green-800 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Lab Baru
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
                            <th class="p-4">Nama Laboratorium</th>
                            <th class="p-4">Kepala Lab</th>
                            <th class="p-4">Fasilitas</th>
                            <th class="p-4 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($labs as $index => $lab)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-center">{{ $index + 1 }}</td>
                            <td class="p-4 font-bold text-gray-800">{{ $lab->nama_lab }}</td>
                            <td class="p-4 text-sm text-gray-600">{{ $lab->kepala_lab ?? '-' }}</td>
                            <td class="p-4 text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($lab->fasilitas, 50) }}</td>
                            <td class="p-4 text-center flex justify-center gap-2">
                                <a href="{{ route('admin.fasilitas.edit', $lab->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-xs transition">Edit</a>
                                <form action="{{ route('admin.fasilitas.destroy', $lab->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lab ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada data laboratorium yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
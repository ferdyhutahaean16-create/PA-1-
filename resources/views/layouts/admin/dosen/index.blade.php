@extends('layouts.admin.admin')
@section('title', 'Data Dosen')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Manajemen Data Dosen</h1>
    <a href="{{ route('dosen.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-bold shadow">+ Tambah Dosen</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-4">NIDN</th>
                <th class="p-4">Nama Dosen</th>
                <th class="p-4">Jabatan</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($dosens as $dosen)
            <tr class="hover:bg-gray-50">
                <td class="p-4">{{ $dosen->nidn }}</td>
                <td class="p-4 font-bold">{{ $dosen->nama }}</td>
                <td class="p-4">{{ $dosen->jabatan }}</td>
                <td class="p-4 text-center flex justify-center gap-2">
                    <a href="{{ route('dosen.edit', $dosen->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dosen ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-4 text-center text-gray-500">Belum ada data dosen.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.admin.admin')

@section('title', 'Kelola Testimoni Alumni')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Testimoni Alumni</h1>
                <p class="text-gray-500">Daftar cerita sukses dan kesan pesan dari alumni Bioteknologi.</p>
            </div>
            <a href="{{ route('testimoni.create') }}" class="bg-[#1a4a38] text-white px-6 py-2.5 rounded-lg font-bold shadow hover:bg-green-800 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Testimoni
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
                            <th class="p-4 w-24 text-center">Foto</th>
                            <th class="p-4">Nama Alumni</th>
                            <th class="p-4 text-center">Angkatan</th>
                            <th class="p-4">Pekerjaan / Instansi</th>
                            <th class="p-4 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($testimonials as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-center font-medium">{{ $index + 1 }}</td>
                            <td class="p-4">
                                @if($item->photo)
                                    <img src="{{ asset($item->photo) }}" class="w-12 h-12 object-cover rounded-full mx-auto border border-gray-200 shadow-sm">
                                @else
                                    <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-xs text-gray-400 mx-auto">N/A</div>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-gray-800">{{ $item->name }}</div>
                            </td>
                            <td class="p-4 text-center text-gray-600">{{ $item->graduation_year }}</td>
                            <td class="p-4">
                                <div class="text-sm font-semibold text-gray-700">{{ $item->position ?? '-' }}</div>
                                <div class="text-xs text-gray-500">{{ $item->workplace ?? '-' }}</div>
                            </td>
                            <td class="p-4 text-center flex justify-center gap-2 mt-2">
                                <a href="{{ route('testimoni.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-xs transition font-bold shadow">Edit</a>
                                <form action="{{ route('testimoni.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs transition font-bold shadow">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 italic">Belum ada testimoni alumni yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin.admin')

@section('title', 'Kelola Mitra Kerja Sama')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Data Mitra Kerja Sama</h1>
                <p class="text-gray-500">Kelola daftar instansi yang bekerja sama dengan Prodi Bioteknologi.</p>
            </div>
            <a href="{{ route('cooperation.create') }}" class="bg-[#1a4a38] text-white px-6 py-2.5 rounded-lg font-bold shadow hover:bg-green-800 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Mitra Baru
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
                            <th class="p-4">Nama Instansi Mitra</th>
                            <th class="p-4 text-center">Tipe</th>
                            <th class="p-4 text-center">Periode Kerja Sama</th>
                            <th class="p-4 text-center">Dokumen / MoU</th>
                            <th class="p-4 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($cooperations as $index => $mitra)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-center font-medium">{{ $index + 1 }}</td>
                            <td class="p-4">
                                <div class="font-bold text-gray-800">{{ $mitra->partner_name }}</div>
                                <div class="text-xs text-gray-500 mt-1 line-clamp-1">{{ $mitra->description ?? 'Tidak ada deskripsi.' }}</div>
                            </td>
                            <td class="p-4 text-center">
                                @if($mitra->type == 'Industri')
                                    <span class="bg-blue-100 text-blue-700 py-1 px-3 rounded-full text-xs font-bold">Industri</span>
                                @elseif($mitra->type == 'Pendidikan')
                                    <span class="bg-emerald-100 text-emerald-700 py-1 px-3 rounded-full text-xs font-bold">Pendidikan</span>
                                @else
                                    <span class="bg-purple-100 text-purple-700 py-1 px-3 rounded-full text-xs font-bold">Pemerintah</span>
                                @endif
                            </td>
                            <td class="p-4 text-center text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($mitra->start_date)->format('M Y') }} - 
                                {{ $mitra->end_date ? \Carbon\Carbon::parse($mitra->end_date)->format('M Y') : 'Sekarang' }}
                            </td>
                            <td class="p-4 text-center">
                                @if($mitra->document_file)
                                    <a href="{{ asset($mitra->document_file) }}" target="_blank" class="inline-flex items-center gap-1 text-[#1a4a38] hover:text-green-600 font-bold text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        Unduh
                                    </a>
                                @else
                                    <span class="text-xs text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="p-4 text-center flex justify-center gap-2 mt-2">
                                <a href="{{ route('cooperation.edit', $mitra->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-xs transition">Edit</a>
                                <form action="{{ route('cooperation.destroy', $mitra->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data mitra ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-xs transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 italic">Belum ada data mitra kerja sama yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
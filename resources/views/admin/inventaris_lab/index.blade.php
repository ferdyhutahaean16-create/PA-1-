@extends('layouts.admin.admin')

@section('title', 'Data Inventaris Lab')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-6xl">
        
        {{-- Header & Tombol Tambah --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Inventaris Laboratorium</h1>
                <p class="text-gray-500 mt-1">Kelola data alat, bahan kimia, dan instrumen aset lab.</p>
            </div>
            <a href="{{ route('inventaris-lab.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2.5 px-6 rounded-lg shadow-md transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Inventaris
            </a>
        </div>

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <strong class="font-bold">Berhasil!</strong> {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Data --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-800 text-white text-sm uppercase tracking-wider">
                            <th class="p-4 font-semibold text-center w-16">No</th>
                            <th class="p-4 font-semibold">Kategori</th>
                            <th class="p-4 font-semibold">Nama Barang / Bahan</th>
                            <th class="p-4 font-semibold text-center">Stok</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($inventaris as $index => $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 text-center text-gray-600 font-medium">{{ $index + 1 }}</td>
                                <td class="p-4">
                                    {{-- Badge Warna Sesuai Kategori --}}
                                    @if($item->kategori == 'Alat')
                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Alat Lab</span>
                                    @elseif($item->kategori == 'Bahan')
                                        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Bahan</span>
                                    @else
                                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Instrumen</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-gray-800">{{ $item->nama_barang }}</div>
                                    @if($item->spesifikasi)
                                        <div class="text-xs text-gray-500 mt-0.5">{{ $item->spesifikasi }}</div>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <span class="font-bold text-lg text-gray-700">{{ $item->jumlah }}</span>
                                    <span class="text-xs text-gray-500 uppercase">{{ $item->satuan }}</span>
                                </td>
                                <td class="p-4 text-center flex justify-center gap-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('inventaris-lab.edit', $item->id) }}" class="bg-blue-50 text-blue-500 hover:bg-blue-500 hover:text-white p-2 rounded-lg transition" title="Edit Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('inventaris-lab.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-50 text-red-500 hover:bg-red-500 hover:text-white p-2 rounded-lg transition" title="Hapus Data">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-10 text-center">
                                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    <p class="text-gray-500 font-medium">Belum ada data inventaris yang ditambahkan.</p>
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
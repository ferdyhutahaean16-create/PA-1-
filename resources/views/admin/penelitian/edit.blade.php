@extends('layouts.admin.admin') @section('title', 'Edit Data Penelitian')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        
        {{-- Header & Tombol Kembali --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Data Penelitian</h1>
                <p class="text-gray-500 mt-1">Perbarui informasi riset dan publikasi tenaga pendidik.</p>
            </div>
            <a href="{{ route('admin.penelitian.index') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg shadow-sm font-semibold transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        {{-- Form Edit Utama --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden p-8">
            <form action="{{ route('admin.penelitian.update', $penelitian->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Penelitian *</label>
                        <input type="text" name="judul" value="{{ $penelitian->judul ?? $penelitian->judul_penelitian }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori *</label>
                        <select name="kategori" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                            <option value="RISET" {{ $penelitian->kategori == 'RISET' ? 'selected' : '' }}>RISET</option>
                            <option value="JURNAL" {{ $penelitian->kategori == 'JURNAL' ? 'selected' : '' }}>JURNAL</option>
                            <option value="PUBLIKASI" {{ $penelitian->kategori == 'PUBLIKASI' ? 'selected' : '' }}>PUBLIKASI</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tahun *</label>
                        <input type="number" name="tahun" value="{{ $penelitian->tahun }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                    </div>

                </div>

                {{-- Tombol Eksekusi --}}
                <div class="flex justify-end mt-8 border-t pt-6">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg shadow-md transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
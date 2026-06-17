@extends('layouts.admin.admin')

@section('title', 'Edit Anggota Struktur')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6 max-w-4xl">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Edit Anggota Struktur</h1>
            <div class="h-1 w-20 bg-blue-600 mt-2 rounded"></div>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                <ul class="list-disc ml-5 text-sm font-bold">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
            
            <form action="{{ route('struktur-organisasi.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Pejabat</label>
                        <input type="text" name="name" value="{{ old('name', $struktur->name) }}" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jabatan</label>
                        <input type="text" name="position" value="{{ old('position', $struktur->position) }}" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tingkatan (Level)</label>
                        <input type="number" name="level" value="{{ old('level', $struktur->level) }}" required min="1" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none">
                        <p class="text-xs text-gray-500 mt-1 font-semibold">Angka lebih kecil = posisi lebih tinggi (Contoh: 1 untuk Kaprodi).</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Update Foto (Opsional)</label>
                        <input type="file" name="photo" accept="image/jpeg,image/png,image/jpg" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none bg-gray-50">
                        <p class="text-xs text-gray-500 mt-1 font-semibold text-red-500">Biarkan kosong jika tidak ingin mengganti foto saat ini.</p>
                    </div>
                </div>

                @if($struktur->photo)
                <div class="mb-8 p-4 bg-blue-50 rounded-lg border border-blue-100 inline-block">
                    <p class="text-sm font-bold text-gray-700 mb-3">Foto Saat Ini:</p>
                    <img src="{{ asset($struktur->photo) }}" alt="Foto {{ $struktur->name }}" class="w-32 h-32 object-cover rounded shadow border border-white">
                </div>
                @endif

                <div class="flex justify-end gap-4 mt-6 border-t border-gray-100 pt-6">
                    <a href="{{ route('struktur-organisasi.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition shadow-sm">Batal</a>
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg shadow-md hover:bg-blue-700 transition">Simpan Perubahan</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
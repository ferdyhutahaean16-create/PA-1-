@extends('layouts.admin.admin')
@section('title', 'Edit Dosen')

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="{{ route('dosen.index') }}" class="text-gray-500 hover:text-green-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <h1 class="text-3xl font-bold text-gray-800">Edit Data Dosen</h1>
</div>

<div class="bg-white p-6 rounded-lg shadow-md max-w-2xl border-t-4 border-yellow-500">
    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">NIDN</label>
                <input type="text" name="nidn" value="{{ $dosen->nidn }}" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap & Gelar</label>
                <input type="text" name="nama" value="{{ $dosen->nama }}" class="w-full border border-gray-300 rounded p-2" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Lulusan (Univ)</label>
                <input type="text" name="lulusan" value="{{ $dosen->lulusan }}" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan</label>
                <input type="text" name="jabatan" value="{{ $dosen->jabatan }}" class="w-full border border-gray-300 rounded p-2" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700 mb-1">Pengampu Matakuliah</label>
            <input type="text" name="pengampu_matkul" value="{{ $dosen->pengampu_matkul }}" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Email Del</label>
                <input type="email" name="email" value="{{ $dosen->email }}" class="w-full border border-gray-300 rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Ruangan</label>
                <input type="text" name="ruangan" value="{{ $dosen->ruangan }}" class="w-full border border-gray-300 rounded p-2" required>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-1">Update Foto Dosen</label>
            
            @if($dosen->foto)
                <div class="flex items-center gap-4 mb-3">
                    <img src="{{ asset($dosen->foto) }}" alt="Foto Lama" class="w-20 h-20 rounded-full object-cover shadow border border-gray-200">
                    <span class="text-sm text-gray-500">Foto saat ini</span>
                </div>
            @endif

            <input type="file" name="foto" class="w-full border border-gray-300 rounded p-2 bg-white">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG, GIF. Maks: 2MB. Biarkan kosong jika tidak ingin mengubah foto.</p>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('dosen.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Batal</a>
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded font-bold hover:bg-yellow-700 transition shadow-lg">Update Dosen</button>
        </div>
    </form>
</div>
@endsection
@extends('layouts.admin.admin')
@section('title', 'Edit Dosen')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Data Dosen</h1>

<div class="bg-white p-6 rounded-lg shadow-md max-w-2xl">
    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">NIDN</label>
                <input type="text" name="nidn" value="{{ $dosen->nidn }}" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap & Gelar</label>
                <input type="text" name="nama" value="{{ $dosen->nama }}" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Lulusan (Univ)</label>
                <input type="text" name="lulusan" value="{{ $dosen->lulusan }}" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan</label>
                <input type="text" name="jabatan" value="{{ $dosen->jabatan }}" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700 mb-1">Pengampu Matakuliah</label>
            <input type="text" name="pengampu_matkul" value="{{ $dosen->pengampu_matkul }}" class="w-full border rounded p-2" required>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Email Del</label>
                <input type="email" name="email" value="{{ $dosen->email }}" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Ruangan</label>
                <input type="text" name="ruangan" value="{{ $dosen->ruangan }}" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('dosen.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded font-bold">Update Dosen</button>
        </div>
    </form>
</div>
@endsection
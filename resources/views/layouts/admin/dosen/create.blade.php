@extends('layouts.admin.admin')
@section('title', 'Tambah Dosen')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Dosen Baru</h1>

<div class="bg-white p-6 rounded-lg shadow-md max-w-2xl">
    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">NIDN</label>
                <input type="text" name="nidn" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap & Gelar</label>
                <input type="text" name="nama" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Lulusan (Univ)</label>
                <input type="text" name="lulusan" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan</label>
                <input type="text" name="jabatan" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700 mb-1">Pengampu Matakuliah</label>
            <input type="text" name="pengampu_matkul" class="w-full border rounded p-2" placeholder="Pisahkan dengan koma" required>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Email Del</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Ruangan</label>
                <input type="text" name="ruangan" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('dosen.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded font-bold">Simpan Dosen</button>
        </div>
    </form>
</div>
@endsection
@extends('layouts.admin.admin')

@section('title', 'Tambah Anggota Struktur')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="mb-8">
            <a href="{{ route('organizational-structure.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Anggota Struktur</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            <form action="{{ route('organizational-structure.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jabatan <span class="text-red-500">*</span></label>
                        <input type="text" name="position" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Ketua Program Studi" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Level Bagan <span class="text-red-500">*</span></label>
                        <select name="level" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                            <option value="1">Level 1 (Fakultas - Dekan/Senat)</option>
                            <option value="2" selected>Level 2 (Prodi - Kaprodi/Kalab)</option>
                            <option value="3">Level 3 (Staf/Koordinator TA)</option>
                        </select>
                        <p class="text-xs text-gray-400 mt-1">Level menentukan posisi urutan dari atas ke bawah.</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap & Gelar <span class="text-red-500">*</span></label>
                    <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Dr. Arnaldo Marulitua Sinaga, S.T., M.InfoTech" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto Pejabat</label>
                    <div class="mt-1 flex items-center gap-4">
                        <input type="file" name="photo" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-gray-200 rounded-md bg-gray-50">
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, JPEG. Maksimal 2MB. Gunakan foto dengan latar belakang transparan atau solid untuk hasil terbaik.</p>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition transform hover:-translate-y-0.5">
                        Simpan Anggota
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
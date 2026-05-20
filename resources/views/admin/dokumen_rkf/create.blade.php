@extends('layouts.admin.admin')
@section('title', 'Tambah Dokumen RKF')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <a href="{{ route('dokumen-rkf.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">← Kembali ke Daftar RKF</a>
        
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-blue-500">
            <h1 class="text-2xl font-bold mb-6">Tambah Dokumen RKF Baru</h1>
            
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <strong class="font-bold">Gagal Mengunggah!</strong> Silakan perbaiki kesalahan berikut:
                    <ul class="list-disc ml-5 mt-2 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dokumen-rkf.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-bold mb-2 text-gray-800">Judul Dokumen RKF *</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Contoh: RKF Laboratorium Mikrobiologi 2026" class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>

                <div>
                    <label class="block text-sm font-bold mb-2 text-gray-800">File Dokumen (PDF, DOCX, XLSX) *</label>
                    <div class="w-full border-2 border-dashed border-gray-300 p-6 rounded-lg bg-gray-50 hover:bg-blue-50 transition cursor-pointer relative">
                        <input type="file" name="file_dokumen" accept=".pdf,.doc,.docx,.xls,.xlsx" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                        <div class="text-center pointer-events-none">
                            <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="text-sm text-gray-600 font-bold">Klik atau seret file ke sini untuk mengunggah</p>
                            <p class="text-xs text-gray-400 mt-1">Maksimal ukuran file: 5 MB</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold mb-2 text-gray-800">Keterangan Singkat / Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" rows="3" placeholder="Berikan sedikit penjelasan tentang dokumen ini..." class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg w-full md:w-auto transition shadow-md">
                        Simpan & Unggah Dokumen
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
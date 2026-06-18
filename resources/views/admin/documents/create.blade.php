@extends('layouts.admin.admin')

@section('title', 'Tambah Dokumen Baru')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        
        {{-- Tombol Kembali yang sudah diperbaiki rutenya --}}
        <a href="{{ route('documents.index') }}" class="text-emerald-600 hover:text-emerald-500 hover:underline mb-6 inline-flex items-center gap-2 font-semibold transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gray-800 text-white p-6 border-b border-gray-700">
                <h2 class="text-xl font-bold">Unggah Dokumen Baru</h2>
                <p class="text-gray-300 text-sm mt-1">Lengkapi form di bawah ini untuk mengunggah dokumen resmi (PDF/Word/Excel).</p>
            </div>

            {{-- Form Action yang sudah disesuaikan --}}
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
                @csrf

                {{-- Input Judul (disesuaikan dengan kolom 'title') --}}
                <div class="mb-6">
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Nama / Judul Dokumen <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a4a38] focus:border-transparent transition shadow-sm"
                           placeholder="Contoh: RKF Laboratorium Mikrobiologi 2026" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Deskripsi (disesuaikan dengan kolom 'description') --}}
                <div class="mb-6">
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat <span class="text-gray-400 font-normal">(Opsional)</span></label>
                    <textarea name="description" id="description" rows="3" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a4a38] focus:border-transparent transition shadow-sm"
                              placeholder="Tambahkan keterangan tambahan mengenai dokumen ini jika diperlukan...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input File (disesuaikan dengan kolom 'file_path') --}}
                <div class="mb-8">
                    <label for="file_path" class="block text-sm font-bold text-gray-700 mb-2">File Dokumen <span class="text-red-500">*</span></label>
                    <div class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 transition relative">
                        <input type="file" name="file_path" id="file_path" 
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#1a4a38] file:text-white hover:file:bg-green-800 cursor-pointer"
                               accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                    </div>
                    <p class="text-gray-400 text-xs mt-2 italic">Format yang diizinkan: PDF, DOC, DOCX, XLS, XLSX. Maksimal ukuran: 10MB.</p>
                    @error('file_path')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                    <button type="submit" class="px-6 py-2.5 bg-emerald-600 text-white font-bold rounded-lg shadow hover:bg-emerald-500 transition">
                        Simpan Dokumen
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
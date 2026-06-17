@extends('layouts.admin.admin')

@section('title', 'Edit Dokumen')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        
        {{-- Tombol Kembali --}}
        <a href="{{ route('documents.index') }}" class="text-[#1a4a38] hover:underline mb-6 inline-flex items-center gap-2 font-semibold transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Daftar Dokumen
        </a>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gray-800 text-white p-6 border-b border-gray-700">
                <h2 class="text-xl font-bold">Edit Dokumen</h2>
                <p class="text-gray-300 text-sm mt-1">Perbarui informasi atau ganti file dokumen lama dengan yang baru.</p>
            </div>

            {{-- Form Action mengarah ke route update dengan method PUT --}}
            <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
                @csrf
                @method('PUT')

                {{-- Input Judul --}}
                <div class="mb-6">
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Nama / Judul Dokumen <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $document->title) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a4a38] focus:border-transparent transition shadow-sm" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Deskripsi --}}
                <div class="mb-6">
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat <span class="text-gray-400 font-normal">(Opsional)</span></label>
                    <textarea name="description" id="description" rows="3" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a4a38] focus:border-transparent transition shadow-sm">{{ old('description', $document->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input File --}}
                <div class="mb-8">
                    <label for="file_path" class="block text-sm font-bold text-gray-700 mb-2">Ganti File Dokumen <span class="text-gray-400 font-normal">(Opsional)</span></label>
                    
                    {{-- Alert Info File Saat Ini --}}
                    <div class="mb-4 p-4 bg-blue-50 border border-blue-100 rounded-lg flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <div>
                                <p class="text-xs text-blue-500 font-bold uppercase tracking-wider">File Saat Ini</p>
                                <p class="text-sm font-medium text-gray-700 line-clamp-1">{{ basename($document->file_path) }}</p>
                            </div>
                        </div>
                        <a href="{{ asset($document->file_path) }}" target="_blank" class="text-xs bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700 transition font-medium">Lihat File</a>
                    </div>

                    {{-- Form Upload Baru --}}
                    <div class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 transition relative">
                        <input type="file" name="file_path" id="file_path" 
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#1a4a38] file:text-white hover:file:bg-green-800 cursor-pointer"
                               accept=".pdf,.doc,.docx,.xls,.xlsx">
                    </div>
                    <p class="text-gray-400 text-xs mt-2 italic">Biarkan kosong jika Anda tidak ingin mengganti file. Format diizinkan: PDF, DOC, DOCX, XLS, XLSX.</p>
                    @error('file_path')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                    <a href="{{ route('documents.index') }}" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-bold rounded-lg hover:bg-gray-300 transition">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-[#1a4a38] text-white font-bold rounded-lg shadow hover:bg-green-800 transition">Perbarui Dokumen</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
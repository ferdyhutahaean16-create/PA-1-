@extends('layouts.admin.admin')

@section('title', 'Edit Data Penelitian')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        
        {{-- Header & Tombol Kembali --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Data Penelitian</h1>
                <p class="text-gray-500 mt-1">Perbarui informasi riset dan publikasi tenaga pendidik.</p>
            </div>
            <a href="{{ route('research.index') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg shadow-sm font-semibold transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        {{-- Pesan Eror Validasi --}}
        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg shadow-sm">
            <strong class="font-bold block mb-1">Gagal Memperbarui Data!</strong>
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Form Edit Utama --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden p-8">
            <form action="{{ route('research.update', $research->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Pilih Dosen --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Dosen (Tenaga Pendidik) <span class="text-red-500">*</span></label>
                    <select name="lecturer_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all" required>
                        <option value="">-- Pilih Dosen --</option>
                        @foreach($lecturers as $lecturer)
                            <option value="{{ $lecturer->id }}" {{ old('lecturer_id', $research->lecturer_id) == $lecturer->id ? 'selected' : '' }}>
                                {{ $lecturer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Judul --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul Penelitian / Jurnal <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $research->title) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                            <option value="Research" {{ old('category', $research->category) == 'Research' ? 'selected' : '' }}>Riset Dasar</option>
                            <option value="National Journal" {{ old('category', $research->category) == 'National Journal' ? 'selected' : '' }}>Jurnal Nasional</option>
                            <option value="International Journal" {{ old('category', $research->category) == 'International Journal' ? 'selected' : '' }}>Jurnal Internasional</option>
                            <option value="Proceeding" {{ old('category', $research->category) == 'Proceeding' ? 'selected' : '' }}>Prosiding</option>
                        </select>
                    </div>

                    {{-- Tahun --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tahun <span class="text-red-500">*</span></label>
                        <input type="number" name="year" value="{{ old('year', $research->year) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                    </div>
                </div>

                {{-- Penulis --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Penulis <span class="text-red-500">*</span></label>
                    <input type="text" name="author" value="{{ old('author', $research->author) }}" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Abstrak / Deskripsi Singkat</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition">{{ old('description', $research->description) }}</textarea>
                </div>

                {{-- File PDF & Link Eksternal --}}
                <div class="p-5 bg-gray-50 rounded-xl border border-gray-200 flex flex-col gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Berkas PDF Saat Ini</label>
                        @if($research->pdf_file)
                            <div class="mb-3 flex items-center gap-2 p-3 bg-white rounded-lg border border-gray-200 inline-block shadow-sm">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 24"><path d="M4 0h10l6 6v18H4V0zm10 5.5h4.5L14 1V5.5z"/></svg>
                                <a href="{{ asset($research->pdf_file) }}" target="_blank" class="text-xs text-blue-600 font-bold hover:underline break-all">
                                    {{ basename($research->pdf_file) }}
                                </a>
                            </div>
                        @else
                            <p class="text-xs text-gray-400 italic mb-2">Belum ada berkas PDF yang diunggah.</p>
                        @endif
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ganti File PDF (Opsional)</label>
                        <input type="file" name="pdf_file" accept="application/pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1a4a38]/10 file:text-[#1a4a38] hover:file:bg-[#1a4a38]/20 transition-all cursor-pointer">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Link Sumber Jurnal (Opsional)</label>
                        <input type="url" name="journal_link" value="{{ old('journal_link', $research->journal_link) }}" placeholder="https://jurnal..." class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm outline-none focus:border-[#1a4a38]">
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
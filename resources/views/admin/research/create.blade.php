@extends('layouts.admin.admin')

@section('title', 'Tambah Data Penelitian')

@section('content')
<div class="p-4 md:p-6 max-w-4xl mx-auto">
    
    {{-- Header --}}
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('research.index') }}" class="text-emerald-600 hover:text-emerald-500 flex items-center gap-2 mb-4 font-semibold">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
        <div>
            <h1 class="text-4xl font-extrabold text-biotech-primary uppercase tracking-wider mb-2">Tambah Penelitian Baru</h2>
            <p class="text-sm text-gray-500">Lengkapi form di bawah ini untuk menambahkan data publikasi.</p>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('research.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 flex flex-col gap-6">
            @csrf
            
            {{-- Pilih Dosen --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Dosen (Tenaga Pendidik) <span class="text-red-500">*</span></label>
                <select name="lecturer_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all" required>
                    <option value="">-- Pilih Dosen --</option>
                    @foreach($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}" {{ old('lecturer_id') == $lecturer->id ? 'selected' : '' }}>
                            {{ $lecturer->name }}
                        </option>
                    @endforeach
                </select>
                @error('lecturer_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- Judul --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Penelitian / Jurnal <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul lengkap..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all" required>
                @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select name="category" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all" required>
                        <option value="Research" {{ old('category') == 'Research' ? 'selected' : '' }}>Riset Dasar</option>
                        <option value="National Journal" {{ old('category') == 'National Journal' ? 'selected' : '' }}>Jurnal Nasional</option>
                        <option value="International Journal" {{ old('category') == 'International Journal' ? 'selected' : '' }}>Jurnal Internasional</option>
                        <option value="Proceeding" {{ old('category') == 'Proceeding' ? 'selected' : '' }}>Prosiding</option>
                    </select>
                </div>
                
                {{-- Tahun --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tahun Publikasi <span class="text-red-500">*</span></label>
                    <input type="number" name="year" value="{{ old('year', date('Y')) }}" min="1990" max="2099" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all" required>
                </div>
            </div>

            {{-- Penulis --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Penulis <span class="text-red-500">*</span></label>
                <input type="text" name="author" value="{{ old('author') }}" placeholder="Contoh: Budi Santoso, Ferdy Roberto" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all" required>
                <span class="text-xs text-gray-400 mt-1 block">Tuliskan semua nama penulis yang terlibat sesuai dengan dokumen.</span>
                @error('author') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Abstrak / Deskripsi Singkat</label>
                <textarea name="description" rows="4" placeholder="Tuliskan intisari penelitian..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all">{{ old('description') }}</textarea>
                @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- File PDF & Link Eksternal --}}
            <div class="p-5 bg-gray-50 rounded-xl border border-gray-100 flex flex-col gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Upload File PDF (Opsional)</label>
                    <input type="file" name="pdf_file" accept="application/pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1a4a38]/10 file:text-[#1a4a38] hover:file:bg-[#1a4a38]/20 transition-all cursor-pointer">
                    @error('pdf_file') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Link Sumber Jurnal (Opsional)</label>
                    <input type="url" name="journal_link" value="{{ old('journal_link') }}" placeholder="https://jurnal..." class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm outline-none focus:border-[#1a4a38]">
                    @error('journal_link') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>
            
            {{-- Submit Button --}}
            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <button type="submit" class="px-6 py-3 text-sm font-bold text-white bg-[#1a4a38] hover:bg-[#0f2e22] rounded-xl transition-all shadow-md hover:shadow-lg">Simpan Data</button>
            </div>

        </form>
    </div>
</div>
@endsection
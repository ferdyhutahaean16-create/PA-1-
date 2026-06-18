@extends('layouts.admin.admin')
@section('title', 'Edit Kurikulum - Bioteknologi IT Del')

@section('content')
<div class="py-10 bg-[#f8fafc] min-h-screen">
    <div class="container mx-auto px-8 max-w-4xl">
        
        <div class="mb-8">
            <a href="{{ route('curriculum.index') }}" class="text-emerald-600 hover:text-emerald-800 font-bold flex items-center gap-2 mb-4 text-sm w-fit transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Edit Mata Kuliah</h1>
            <p class="text-gray-500 mt-2 text-sm">Ubah rincian data mata kuliah yang sudah terdaftar di sistem.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('curriculum.update', $curriculum->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                {{-- Gaya desain sama seperti form Create --}}
                <div class="bg-gray-50 rounded-xl border border-gray-200 p-6 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                        
                        <div class="md:col-span-2">
                            <label class="block text-[10px] font-bold text-gray-700 uppercase tracking-wider mb-2">Semester <span class="text-red-500">*</span></label>
                            <select name="semester" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-sm font-medium shadow-sm" required>
                                @for($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ $curriculum->semester == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="md:col-span-3">
                            <label class="block text-[10px] font-bold text-gray-700 uppercase tracking-wider mb-2">Kode Matkul <span class="text-red-500">*</span></label>
                            <input type="text" name="course_code" value="{{ $curriculum->course_code }}" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-sm shadow-sm" required>
                        </div>

                        <div class="md:col-span-4">
                            <label class="block text-[10px] font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Mata Kuliah <span class="text-red-500">*</span></label>
                            <input type="text" name="course_name" value="{{ $curriculum->course_name }}" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-sm shadow-sm" required>
                        </div>

                        <div class="md:col-span-1">
                            <label class="block text-[10px] font-bold text-gray-700 uppercase tracking-wider mb-2">SKS <span class="text-red-500">*</span></label>
                            <input type="number" name="credits" min="1" max="6" value="{{ $curriculum->credits }}" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-sm text-center shadow-sm" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-[10px] font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori <span class="text-red-500">*</span></label>
                            <select name="category" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-sm shadow-sm" required>
                                <option value="Mandatory" {{ $curriculum->category == 'Mandatory' ? 'selected' : '' }}>Wajib</option>
                                <option value="Elective" {{ $curriculum->category == 'Elective' ? 'selected' : '' }}>Pilihan</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-8 rounded-lg shadow-md transition transform hover:-translate-y-0.5">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
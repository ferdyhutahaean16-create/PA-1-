@extends('layouts.admin.admin')

@section('title', 'Edit Kurikulum')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="mb-8">
            <a href="{{ route('kurikulum.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Batal
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Edit Mata Kuliah</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            <form action="{{ route('kurikulum.update', $kurikulum->id) }}" method="POST" class="space-y-6">
                @csrf @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Semester <span class="text-red-500">*</span></label>
                        <select name="semester" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                            @for($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" {{ $kurikulum->semester == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kode Mata Kuliah <span class="text-red-500">*</span></label>
                        <input type="text" name="kode_mk" value="{{ $kurikulum->kode_mk }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mata Kuliah <span class="text-red-500">*</span></label>
                    <input type="text" name="mata_kuliah" value="{{ $kurikulum->mata_kuliah }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="w-full md:w-1/2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jumlah SKS <span class="text-red-500">*</span></label>
                    <input type="number" name="sks" value="{{ $kurikulum->sks }}" min="1" max="6" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Update Mata Kuliah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
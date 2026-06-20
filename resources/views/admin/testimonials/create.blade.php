@extends('layouts.admin.admin')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Tambah Testimoni</h1>
                <p class="text-gray-500">Berikan inspirasi bagi calon mahasiswa melalui kisah alumni.</p>
            </div>
            <a href="{{ route('testimonials.index') }}" class="text-emerald-600 hover:text-emerald-500 font-bold flex items-center gap-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg shadow-sm">
                <strong class="font-bold">Gagal Menyimpan!</strong> Silakan perbaiki kesalahan berikut:
                <ul class="list-disc ml-5 mt-2 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden border-t-4 border-t-[#1a4a38]">
            <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Angkatan <span class="text-red-500"></span></label>
                        <input type="number" name="graduation_year" value="{{ old('graduation_year') }}" placeholder="Contoh: 2022" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pekerjaan / Jabatan Saat Ini</label>
                        <input type="text" name="position" value="{{ old('position') }}" placeholder="Contoh: Senior Researcher" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Instansi / Perusahaan</label>
                        <input type="text" name="workplace" value="{{ old('workplace') }}" placeholder="Contoh: PT. Kimia Farma" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto Profil</label>
                    <input type="file" name="photo" accept="image/*" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:ring-[#1a4a38]">
                    <p class="text-xs text-gray-400 mt-1 italic">Format: JPG, PNG. Maksimal 2MB.</p>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Isi Testimoni <span class="text-red-500">*</span></label>
                    <textarea name="testimony" rows="5" class="ckeditor-field w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" placeholder="Ceritakan pengalaman selama kuliah di Bioteknologi IT Del...">{{ old('testimony') }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white px-8 py-3 rounded-lg font-bold shadow-md transition">
                        Simpan Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let editors = document.querySelectorAll('.ckeditor-field');
        
        editors.forEach(function(editorElement) {
            ClassicEditor
                .create(editorElement, {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection
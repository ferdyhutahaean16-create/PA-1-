@extends('layouts.admin.admin')

@section('title', 'Tambah Profil & Struktur')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-5xl">
        
        <div class="mb-8">
            <a href="{{ route('profil.index') }}" class="text-emerald-700 hover:underline flex items-center gap-2 mb-4 font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Profil
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Data Profil Program Studi</h1>
            <p class="text-gray-500 mt-2">Silakan isi teks informasi dan unggah bagan struktur di tab yang berbeda.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl shadow-sm">
                <strong class="font-bold">Gagal Menyimpan!</strong> Silakan perbaiki kesalahan berikut:
                <ul class="list-disc ml-5 mt-2 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex border-b border-gray-200 mb-6">
            <button onclick="switchTab('teks')" id="tab-teks" type="button" class="py-3 px-6 text-sm font-bold border-b-2 border-[#1a4a38] text-[#1a4a38] focus:outline-none transition-colors">
                1. Informasi Program Studi
            </button>
            <button onclick="switchTab('struktur')" id="tab-struktur" type="button" class="py-3 px-6 text-sm font-bold border-b-2 border-transparent text-gray-500 hover:text-gray-700 focus:outline-none transition-colors">
                2. Bagan Struktur Organisasi
            </button>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            
            <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div id="konten-teks" class="block space-y-6">
                    <div class="bg-emerald-50 p-4 rounded-xl mb-4 border border-emerald-100">
                        <p class="text-sm text-emerald-800 font-semibold">Bagian ini untuk mengisi teks Visi, Misi, Sejarah, dan Prospek Karir.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Sejarah Singkat <span class="text-red-500">*</span></label>
                        <textarea name="sejarah" rows="5" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a4a38]">{{ old('sejarah') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Visi <span class="text-red-500">*</span></label>
                            <textarea name="visi" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a4a38]">{{ old('visi') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Misi <span class="text-red-500">*</span></label>
                            <textarea name="misi" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a4a38]">{{ old('misi') }}</textarea>
                        </div>
                    </div>

                    <div class="hidden"> 
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tujuan</label>
                        <textarea name="tujuan" rows="2" class="w-full p-3 border border-gray-300 rounded-lg">-</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Prospek Karir <span class="text-red-500">*</span></label>
                        <textarea name="prospek_karir" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a4a38]">{{ old('prospek_karir') }}</textarea>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-[#1a4a38] hover:bg-emerald-900 text-white font-bold py-3 px-8 rounded-lg shadow-md transition transform hover:-translate-y-0.5">
                        Simpan Data Profil
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        // 1. Sembunyikan semua konten tab
        document.getElementById('konten-teks').classList.add('hidden');
        document.getElementById('konten-struktur').classList.add('hidden');
        
        // 2. Reset warna garis bawah indikator tombol tab
        document.getElementById('tab-teks').classList.remove('border-[#1a4a38]', 'text-[#1a4a38]');
        document.getElementById('tab-teks').classList.add('border-transparent', 'text-gray-500');
        
        document.getElementById('tab-struktur').classList.remove('border-[#1a4a38]', 'text-[#1a4a38]');
        document.getElementById('tab-struktur').classList.add('border-transparent', 'text-gray-500');

        // 3. Aktifkan tab yang dipilih pengguna
        document.getElementById('konten-' + tab).classList.remove('hidden');
        document.getElementById('tab-' + tab).classList.add('border-[#1a4a38]', 'text-[#1a4a38]');
        document.getElementById('tab-' + tab).classList.remove('border-transparent', 'text-gray-500');
    }
</script>

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
        min-height: 250px;
    }
    .ck-editor__main .ck-content {
        border-radius: 0 0 0.5rem 0.5rem !important;
        border-color: #d1d5db !important;
    }
    .ck-toolbar {
        border-radius: 0.5rem 0.5rem 0 0 !important;
        background-color: #f9fafb !important;
        border-color: #d1d5db !important;
    }
    /* Mengaktifkan kembali fungsi penomoran otomatis hasil cetakan CKEditor */
    .prose-custom ol {
        list-style-type: decimal !important;
        padding-left: 1.5rem !important;
        margin-bottom: 1.25rem !important;
    }
    
    .prose-custom li {
        margin-bottom: 0.5rem !important;
        line-height: 1.7;
    }
</style>
@endsection
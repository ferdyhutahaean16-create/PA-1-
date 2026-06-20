@extends('layouts.main')

@section('title', 'Pratinjau Dokumen - ' . str_replace('_', ' ', $document->title))

@section('content')
<div class="py-28 bg-[#f5f7f6] min-h-screen">
    <div class="container mx-auto px-6 max-w-5xl">
        
        <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div>
                <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#1a4a38] font-bold mb-4 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Arsip
                </a>
                <h1 class="text-2xl md:text-3xl font-serif font-bold text-[#1a4a38] mb-1">
                    {{ str_replace('_', ' ', $document->title) }}
                </h1>
                <p class="text-gray-500 text-sm italic">Mode Pratinjau (Hanya Baca)</p>
            </div>

            @auth
                <a href="{{ asset($document->file_path) }}" download class="bg-yellow-500 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-yellow-600 transition-colors flex items-center gap-2 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Unduh Dokumen (Admin)
                </a>
            @endauth
        </div>

        <div class="bg-white p-3 md:p-4 rounded-3xl shadow-xl border border-gray-200 h-[75vh] relative flex flex-col">
            
            @guest
                <div class="bg-red-50 text-red-600 text-xs font-bold text-center py-2 mb-3 rounded-xl border border-red-100">
                    Dokumen ini dilindungi. Akses pengunduhan hanya untuk staf akademik (Admin).
                </div>
            @endguest

            <iframe 
                src="{{ asset($document->file_path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                class="w-full h-full rounded-2xl border border-gray-100 flex-1"
                id="pdf-viewer">
            </iframe>
            
        </div>
    </div>
</div>

<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
</script>
@endsection
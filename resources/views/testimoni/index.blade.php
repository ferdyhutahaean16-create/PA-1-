@extends('layouts.main')

@section('title', 'Kisah Sukses Alumni - Prodi Bioteknologi IT Del')

@section('content')
<div class="bg-[#1a4a38] py-20 px-6">
    <div class="container mx-auto max-w-6xl text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 uppercase tracking-tight">Kisah Sukses Alumni</h1>
        <p class="text-green-100 text-lg max-w-3xl mx-auto leading-relaxed">
            Jejak langkah, pengalaman, dan inspirasi dari para lulusan Program Studi Bioteknologi Institut Teknologi Del yang kini berkarya di berbagai sektor.
        </p>
    </div>
</div>

<div class="bg-gray-50 py-16 min-h-screen">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($testimonials as $testimoni)
            <div class="bg-white border border-gray-100 rounded-2xl p-8 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 flex flex-col shadow-sm relative group">
                
                <div class="absolute top-6 right-8 text-green-100 group-hover:text-green-200 transition-colors">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                </div>

                <p class="text-gray-600 leading-relaxed mb-8 flex-1 relative z-10 italic text-justify">
                    "{{ $testimoni->testimony }}"
                </p>

                <div class="flex items-center gap-4 mt-auto pt-6 border-t border-gray-100">
                    <div class="w-16 h-16 bg-gray-50 rounded-full border-2 border-[#1a4a38] flex items-center justify-center shrink-0 overflow-hidden shadow-inner">
                        @if($testimoni->photo)
                            <img src="{{ asset($testimoni->photo) }}" alt="{{ $testimoni->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        @endif
                    </div>
                    <div>
                        <h4 class="text-gray-900 font-extrabold text-lg">{{ $testimoni->name }}</h4>
                        <p class="text-xs font-bold text-[#1a4a38] bg-green-50 inline-block px-2 py-1 rounded mb-1">Alumni {{ $testimoni->graduation_year }}</p>
                        @if($testimoni->position || $testimoni->workplace)
                            <p class="text-xs text-gray-500 font-medium">
                                {{ $testimoni->position }}{{ $testimoni->position && $testimoni->workplace ? ' di ' : '' }}{{ $testimoni->workplace }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                <p class="text-gray-400 italic">Belum ada cerita alumni yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
@endsection
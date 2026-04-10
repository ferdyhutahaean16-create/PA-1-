@extends('layouts.main')

@section('title', 'Laboratorium Bioteknologi')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-10">
        <h2 class="font-serif text-4xl text-emerald-900 mb-2">Fasilitas Laboratorium</h2>
        <p class="text-slate-600">Pusat riset dan inovasi bioteknologi dengan standar keamanan tinggi.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="glass border border-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="h-48 bg-emerald-800 relative">
                <div class="absolute inset-0 opacity-20 bg-pattern"></div>
                <div class="absolute bottom-6 left-6 text-white text-2xl font-bold font-serif">Lab Mikrobiologi</div>
            </div>
            <div class="p-8">
                <p class="text-slate-600 mb-6 leading-relaxed">Fokus pada analisis mikroorganisme, sterilisasi, dan pengembangan kultur jaringan.</p>
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="bg-emerald-100 text-emerald-700 text-xs px-3 py-1 rounded-full font-semibold uppercase tracking-wider">Biosafety Level 2</span>
                    <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold uppercase tracking-wider">Lengkap</span>
                </div>
                <button class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-semibold transition">Detail Fasilitas Alat</button>
            </div>
        </div>

        <div class="glass border border-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="h-48 bg-teal-800 relative">
                <div class="absolute inset-0 opacity-20 bg-pattern"></div>
                <div class="absolute bottom-6 left-6 text-white text-2xl font-bold font-serif">Lab Rekayasa Genetika</div>
            </div>
            <div class="p-8">
                <p class="text-slate-600 mb-6 leading-relaxed">Dilengkapi dengan mesin PCR, elektroforesis, dan sistem imaging DNA terbaru.</p>
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="bg-teal-100 text-teal-700 text-xs px-3 py-1 rounded-full font-semibold uppercase tracking-wider">PCR System</span>
                    <span class="bg-amber-100 text-amber-700 text-xs px-3 py-1 rounded-full font-semibold uppercase tracking-wider">Terbatas</span>
                </div>
                <button class="w-full py-3 bg-teal-600 hover:bg-teal-700 text-white rounded-xl font-semibold transition">Detail Fasilitas Alat</button>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="w-full bg-white">
    
    <section class="relative h-screen w-full flex items-center justify-center">
        <img src="https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1920" 
             class="absolute inset-0 w-full h-full object-cover" alt="Hero Background">
        
        <div class="absolute inset-0 bg-black/30"></div>

        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-6xl md:text-8xl font-black tracking-tighter uppercase leading-none mb-2">
                BIOTECHNOLOGY
            </h1>
            <p class="text-lg md:text-2xl tracking-[0.5em] font-light uppercase opacity-90">
                INSTITUT TEKNOLOGI DEL
            </p>
            
            <div class="flex justify-center gap-3 mt-16">
                <div class="w-2.5 h-2.5 bg-white/40 rounded-full"></div>
                <div class="w-2.5 h-2.5 bg-white rounded-full"></div>
                <div class="w-2.5 h-2.5 bg-white/40 rounded-full"></div>
            </div>
        </div>
    </section>

    <section class="max-w-4xl mx-auto py-24 px-6 text-center">
        <h2 class="text-3xl font-black text-slate-800 uppercase tracking-tight mb-8">
            Pusat Riset Bioteknologi Terpadu
        </h2>
        <div class="space-y-6">
            <p class="text-slate-500 leading-relaxed">
                Program Studi Bioteknologi Institut Teknologi Del adalah salah satu pusat unggulan di Sumatera Utara. Di tempat ini, kami menawarkan riset mendalam dengan pemanfaatan teknologi hayati yang inovatif, modern, dan berkelanjutan.
            </p>
            <p class="text-slate-500 leading-relaxed text-sm italic">
                Dilengkapi dengan fasilitas laboratorium mutakhir yang mendukung eksplorasi genetik, mikrobiologi, hingga bioproses untuk kemajuan industri hayati di masa depan.
            </p>
        </div>
    </section>

    <section class="flex gap-4 px-4 overflow-hidden mb-32 h-[550px] items-center justify-center">
        <div class="w-1/4 h-[450px] rounded-2xl overflow-hidden shadow-2xl self-start">
            <img src="https://images.unsplash.com/photo-1532187875462-be93c5e590b5?w=600" class="w-full h-full object-cover hover:scale-110 transition duration-700">
        </div>
        <div class="w-1/4 h-[450px] rounded-2xl overflow-hidden shadow-2xl translate-y-12">
            <img src="https://images.unsplash.com/photo-1576086213369-97a306d36557?w=600" class="w-full h-full object-cover hover:scale-110 transition duration-700">
        </div>
        <div class="w-1/4 h-[450px] rounded-2xl overflow-hidden shadow-2xl self-start">
            <img src="https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=600" class="w-full h-full object-cover hover:scale-110 transition duration-700">
        </div>
        <div class="w-1/4 h-[450px] rounded-2xl overflow-hidden shadow-2xl translate-y-12">
            <img src="https://images.unsplash.com/photo-1579154235602-3c27f391d24f?w=600" class="w-full h-full object-cover hover:scale-110 transition duration-700">
        </div>
    </section>

    <section class="relative py-24 bg-slate-50 overflow-hidden">
        <div class="max-w-5xl mx-auto flex items-center gap-6 mb-16">
            <div class="h-[1px] flex-grow bg-slate-300 relative">
                <div class="absolute -left-1 -top-1 w-2 h-2 bg-slate-800 rounded-full"></div>
            </div>
            <h3 class="text-xl font-black uppercase tracking-widest text-slate-800">Popular Tours</h3>
            <div class="h-[1px] flex-grow bg-slate-300 relative">
                <div class="absolute -right-1 -top-1 w-2 h-2 bg-slate-800 rounded-full"></div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 px-6">
            <div class="relative group h-[480px] rounded-3xl overflow-hidden border-4 border-white shadow-2xl">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=600" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8 text-white">
                    <h4 class="text-4xl font-black mb-1 uppercase tracking-tighter">LAB 1</h4>
                    <p class="text-sm font-medium text-emerald-300 uppercase tracking-widest">Molecular Research</p>
                </div>
            </div>

            <div class="relative group h-[480px] rounded-3xl overflow-hidden border-4 border-white shadow-2xl">
                <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=600" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8 text-white">
                    <h4 class="text-4xl font-black mb-1 uppercase tracking-tighter">LAB 2</h4>
                    <p class="text-sm font-medium text-emerald-300 uppercase tracking-widest">Microbiology Area</p>
                </div>
            </div>

            <div class="relative group h-[480px] rounded-3xl overflow-hidden border-4 border-white shadow-2xl">
                <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?w=600" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-8 left-8 text-white">
                    <h4 class="text-4xl font-black mb-1 uppercase tracking-tighter">LAB 3</h4>
                    <p class="text-sm font-medium text-emerald-300 uppercase tracking-widest">Bioprocess Unit</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-16">
            <a href="/berita" class="px-10 py-3 bg-white/80 backdrop-blur-md border border-slate-300 rounded-xl font-black text-xs uppercase tracking-[0.3em] hover:bg-emerald-600 hover:text-white transition duration-500 shadow-lg">
                See More >
            </a>
        </div>
    </section>

    <footer class="py-12 bg-emerald-900/5 border-t border-slate-200">
        <p class="text-[10px] text-slate-400 font-bold text-center uppercase tracking-[0.5em]">
            Archived by Lza_km | BIOTEKNOLOGI IT DEL | Pict by Unsplash
        </p>
    </footer>

</div>
@endsection



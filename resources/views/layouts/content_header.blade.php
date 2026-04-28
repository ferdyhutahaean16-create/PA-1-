<div class="px-8 py-6 bg-white/50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <nav class="flex text-xs font-bold uppercase tracking-widest text-emerald-600 mb-2">
                <a href="/" class="hover:underline">Home</a>
                <span class="mx-2 text-slate-400">/</span>
                <span class="text-slate-400">@yield('title')</span>
            </nav>
            <h1 class="font-serif text-3xl text-slate-900 capitalize">@yield('subtitle', 'Program Studi Bioteknologi')</h1>
        </div>
        
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="text-sm">
                <p class="font-bold text-slate-800 leading-none">{{ now()->format('d M Y') }}</p>
                <p class="text-slate-500">Institut Teknologi Del</p>
            </div>
        </div>
    </div>
</div>
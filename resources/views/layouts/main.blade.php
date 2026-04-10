<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bioteknologi IT Del | @yield('title')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'biotech-accent': '#10b981', 
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); }
        .bg-pattern { background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23059669' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-900 antialiased bg-pattern">

    @include('layouts.navbar')

    <div class="flex min-h-screen">
        {{-- Sidebar (Jika ada) --}}
        {{-- @include('layouts.sidebar') --}}

        <div class="flex-1 flex flex-col min-w-0">
            @include('layouts.content_header')

            <main class="flex-grow p-4 md:p-8">
                @yield('content')
            </main>

            <footer class="bg-emerald-950 text-white pt-16 pb-8">
                <div class="container mx-auto px-6 md:px-12">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-12">
                        
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <img src="https://www.del.ac.id/wp-content/uploads/2021/01/Logo-IT-Del.png" class="w-16 brightness-0 invert" alt="Logo IT Del">
                                <h2 class="font-extrabold text-lg leading-tight tracking-wider uppercase">
                                    Fakultas Teknologi Industri<br>
                                    Teknik Bioteknologi<br>
                                    Institut Teknologi Del
                                </h2>
                            </div>
                            <p class="text-sm text-emerald-100/70 leading-relaxed max-w-sm">
                                Mencetak tenaga ahli bioteknologi yang inovatif dan berkarakter untuk kemajuan industri hayati Indonesia.
                            </p>
                        </div>

                        <div class="lg:pl-12">
                            <h3 class="font-bold text-xl mb-6 uppercase tracking-widest text-biotech-accent">Tentang Kami</h3>
                            <ul class="space-y-3 text-sm">
                                <li><a href="#" class="hover:text-biotech-accent transition-colors flex items-center gap-2">▶ Sejarah</a></li>
                                <li><a href="#" class="hover:text-biotech-accent transition-colors flex items-center gap-2">▶ Visi dan Misi</a></li>
                                <li><a href="#" class="hover:text-biotech-accent transition-colors flex items-center gap-2">▶ Struktur Organisasi</a></li>
                                <li><a href="#" class="hover:text-biotech-accent transition-colors flex items-center gap-2">▶ Lokasi Kampus</a></li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="font-bold text-xl mb-6 uppercase tracking-widest text-biotech-accent">Kontak Kami</h3>
                            <ul class="space-y-5 text-sm">
                                <li class="flex items-center gap-4">
                                    <div class="p-2 bg-emerald-900 rounded-lg text-biotech-accent">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </div>
                                    +62 632 331234
                                </li>
                                <li class="flex items-center gap-4">
                                    <div class="p-2 bg-emerald-900 rounded-lg text-biotech-accent">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    bioteknologi@del.ac.id
                                </li>
                                <li class="flex items-start gap-4">
                                    <div class="p-2 bg-emerald-900 rounded-lg text-biotech-accent mt-1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <span class="leading-relaxed">Institut Teknologi Del, Sitoluama Laguboti, Toba, Sumatera Utara</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="border-t border-emerald-800/50 mt-12 pt-8 text-center">
                        <p class="text-[11px] text-emerald-100/50 uppercase tracking-[0.2em]">
                            Created By: Ferdy, Sesilia, Wesly, Ravael, Hanada (D3TI 2025)
                        </p>
                        <p class="text-[11px] text-emerald-100/50 mt-2">
                            Supervised By : Goklas Henry Agus Panjaitan, S.Tr.Kom., M.T.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
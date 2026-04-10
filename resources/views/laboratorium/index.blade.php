@extends('layouts.main')

@section('title', 'Peminjaman Lab')
@section('subtitle', 'Sistem Manajemen Fasilitas Lab')

@section('content')
<div class="relative min-h-screen w-full -mt-20 pt-32 pb-20 px-4">
    <div class="fixed inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1581093588401-fbb62a02f120?auto=format&fit=crop&w=1920" 
             class="w-full h-full object-cover" alt="Background Lab">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>
    </div>

    <div class="relative z-10 max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-black text-white tracking-tighter uppercase mb-2">
                LABORATORY <span class="text-emerald-400 text-outline">ACCESS</span>
            </h2>
            <p class="text-white/60 tracking-[0.3em] font-light uppercase text-sm italic">Sistem Manajemen Fasilitas Lab Bioteknologi</p>
            <div class="w-24 h-1 bg-emerald-500 mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white/10 backdrop-blur-xl rounded-[2.5rem] p-8 text-white border border-white/20 shadow-2xl">
                    <h4 class="text-xl font-bold mb-6 flex items-center gap-2 text-emerald-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Informasi Penting
                    </h4>
                    <ul class="text-sm space-y-5">
                        <li class="flex gap-4 items-start">
                            <span class="flex-shrink-0 h-6 w-6 rounded-full bg-emerald-500/30 border border-emerald-400 flex items-center justify-center font-bold text-xs text-emerald-400">1</span>
                            <p class="text-white/80 leading-relaxed">Ajukan peminjaman minimal <span class="text-white font-bold">H-3</span> sebelum penggunaan alat.</p>
                        </li>
                        <li class="flex gap-4 items-start">
                            <span class="flex-shrink-0 h-6 w-6 rounded-full bg-emerald-500/30 border border-emerald-400 flex items-center justify-center font-bold text-xs text-emerald-400">2</span>
                            <p class="text-white/80 leading-relaxed">Wajib mengunggah surat izin dari <span class="text-white font-bold">Dosen Pembimbing</span>.</p>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-black/20 backdrop-blur-xl rounded-[2.5rem] p-8 border border-white/10 shadow-2xl">
                    <h4 class="font-bold text-white mb-2 uppercase tracking-widest text-sm">Lacak Status</h4>
                    <p class="text-xs text-white/50 mb-6 italic">Masukkan NIM untuk cek status pengajuan</p>
                    <div class="relative">
                        <input type="text" class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white focus:ring-2 focus:ring-emerald-500 outline-none transition placeholder:text-white/20" placeholder="Cari NIM Anda...">
                        <button class="absolute right-3 top-3 p-2 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 transition shadow-lg shadow-emerald-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 bg-white/10 backdrop-blur-2xl rounded-[3rem] p-10 md:p-14 border border-white/20 shadow-2xl">
                <div class="flex items-center gap-4 mb-10">
                    <div class="h-10 w-2 bg-emerald-500 rounded-full"></div>
                    <h3 class="text-3xl font-bold text-white tracking-tight uppercase">Formulir Pengajuan</h3>
                </div>
                
                <form action="#" class="space-y-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-400 ml-1">Nama Lengkap</label>
                            <input type="text" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-white focus:bg-white/10 focus:ring-2 focus:ring-emerald-500 outline-none transition" placeholder="Sesuai KTM">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-400 ml-1">NIM</label>
                            <input type="text" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-white focus:bg-white/10 focus:ring-2 focus:ring-emerald-500 outline-none transition" placeholder="12S210XX">
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-400 ml-1">Alat/Bahan yang Dibutuhkan</label>
                        <select class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-white focus:bg-white/10 focus:ring-2 focus:ring-emerald-500 outline-none transition appearance-none">
                            <option class="bg-slate-900">Mikroskop Cahaya Binokuler</option>
                            <option class="bg-slate-900">PCR Thermal Cycler</option>
                            <option class="bg-slate-900">Spektrofotometer UV-Vis</option>
                        </select>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-400 ml-1">Tanggal Pinjam</label>
                            <input type="date" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-white focus:ring-2 focus:ring-emerald-500 outline-none transition invert-[0.9] opacity-80">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-400 ml-1">Tanggal Kembali</label>
                            <input type="date" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-white focus:ring-2 focus:ring-emerald-500 outline-none transition invert-[0.9] opacity-80">
                        </div>
                    </div>

                    <button class="w-full py-6 bg-emerald-500 hover:bg-emerald-400 text-white font-black rounded-2xl shadow-xl shadow-emerald-500/20 hover:-translate-y-1 transition-all duration-300 uppercase tracking-widest text-sm mt-4">
                        Submit Permohonan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .text-outline {
        -webkit-text-stroke: 1px rgba(255,255,255,0.5);
        color: transparent;
    }
</style>
@endsection
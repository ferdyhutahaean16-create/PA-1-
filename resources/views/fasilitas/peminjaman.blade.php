@extends('layouts.main')

@section('content')
<!-- Tailwind Configuration & Font -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { 'jakarta': ['Plus Jakarta Sans', 'sans-serif'] },
                colors: {
                    'biotech-green': '#15803d',
                    'biotech-dark': '#064e3b',
                    'biotech-light': '#f0fdf4',
                    'biotech-accent': '#facc15',
                },
                boxShadow: {
                    'soft': '0 20px 25px -5px rgb(0 0 0 / 0.05), 0 8px 10px -6px rgb(0 0 0 / 0.05)',
                    'glow': '0 0 20px rgba(21, 128, 61, 0.15)',
                }
            }
        }
    }
</script>

<style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    .glass-effect { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    .gradient-header { background: linear-gradient(135deg, #15803d 0%, #064e3b 100%); }
</style>

<div class="bg-biotech-light min-h-screen py-12 px-4">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header Section -->
        <div class="relative mb-12 rounded-[2rem] overflow-hidden shadow-2xl">
            <div class="gradient-header p-10 md:p-14 text-white text-center relative">
                <div class="relative z-10 flex flex-col items-center">
                    <div class="bg-biotech-accent/20 p-4 rounded-2xl mb-6 backdrop-blur-md">
                        <svg class="w-12 h-12 text-biotech-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4 uppercase">Portal Peminjaman Lab</h1>
                    <p class="text-biotech-light/80 text-lg max-w-2xl font-light">
                        Shaping the World Through Biotechnology — <span class="font-semibold text-biotech-accent italic">IT Del</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Form Card -->
            <div class="lg:col-span-2">
                <div class="glass-effect rounded-[2.5rem] shadow-soft border border-green-50 overflow-hidden">
                    <div class="p-8 md:p-12">
                        <!-- Notifikasi -->
                        @if(session('success'))
                            <div class="mb-6 p-4 bg-emerald-100 text-emerald-700 rounded-2xl border border-emerald-200 text-sm font-bold">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="flex items-center gap-4 mb-10 bg-amber-50 p-5 rounded-2xl border border-amber-100">
                            <div class="bg-amber-500 text-white p-2 rounded-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <p class="text-amber-800 text-sm leading-snug">
                                <span class="font-bold block">Pemberitahuan:</span>
                                Pengajuan wajib dilakukan minimal <span class="underline">H-1 (24 jam)</span> sebelum jadwal penggunaan.
                            </p>
                        </div>

                        <!-- PERBAIKAN: Point Action ke route store -->
                        <form action="{{ route('lab.pinjam.store') }}" method="POST" class="space-y-10">
                            @csrf
                            <input type="hidden" name="jenis_form" value="Alat">
                            <input type="hidden" name="prodi" value="Teknik Bioteknologi">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Identitas -->
                                <div class="space-y-6">
                                    <div class="flex items-center gap-2 text-biotech-green font-bold uppercase tracking-wider text-sm mb-2">
                                        <span class="w-8 h-[2px] bg-biotech-accent"></span> Identitas Mahasiswa
                                    </div>
                                    <div class="group">
                                        <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1">Nama Lengkap</label>
                                        <input type="text" name="nama_peminjam" class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl p-4 focus:border-biotech-green focus:bg-white outline-none transition-all shadow-sm" placeholder="Sesuai KTM..." required>
                                    </div>
                                    <div class="group">
                                        <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1">NIM</label>
                                        <input type="text" name="nim" class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl p-4 focus:border-biotech-green focus:bg-white outline-none transition-all shadow-sm" placeholder="Contoh: 11S22001" required>
                                    </div>
                                </div>

                                <!-- Detail -->
                                <div class="space-y-6">
                                    <div class="flex items-center gap-2 text-biotech-green font-bold uppercase tracking-wider text-sm mb-2">
                                        <span class="w-8 h-[2px] bg-biotech-accent"></span> Lab & Keperluan
                                    </div>
                                    <div class="group">
                                        <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1">Pilih Laboratorium</label>
                                        <select name="laboratorium" class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl p-4 text-sm focus:border-biotech-green outline-none appearance-none" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Lab Bioteknologi">Lab Bioteknologi</option>
                                            <option value="Lab Kimia">Lab Kimia</option>
                                        </select>
                                    </div>
                                    <div class="group">
                                        <label class="block text-[10px] font-black text-gray-400 uppercase mb-2 ml-1">Judul Penelitian / Matkul</label>
                                        <input type="text" name="judul_penelitian" class="w-full bg-gray-50 border-2 border-gray-100 rounded-2xl p-4 focus:border-biotech-green outline-none" placeholder="Contoh: Genetika Molekuler" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Alpine.js Multi-Row Alat -->
                            <div class="space-y-6" x-data="{ items: [{ nama: '', jumlah: '', ukuran: '' }] }">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2 text-biotech-green font-bold uppercase tracking-wider text-sm">
                                        <span class="w-8 h-[2px] bg-biotech-accent"></span> Rincian Alat
                                    </div>
                                    <button type="button" @click="items.push({ nama: '', jumlah: '', ukuran: '' })" class="text-[10px] font-black bg-biotech-light text-biotech-green px-4 py-2 rounded-xl border border-biotech-green hover:bg-biotech-green hover:text-white transition-all uppercase">
                                        + Tambah Alat
                                    </button>
                                </div>

                                <div class="space-y-4">
                                    <template x-for="(item, index) in items" :key="index">
                                        <div class="grid grid-cols-12 gap-3 p-4 bg-gray-50/50 rounded-2xl border-2 border-dashed border-gray-200 relative group">
                                            <div class="col-span-6">
                                                <input type="text" :name="'items['+index+'][nama]'" x-model="item.nama" placeholder="Nama Alat" class="w-full bg-white border border-gray-200 rounded-xl p-3 text-sm focus:border-biotech-green outline-none" required>
                                            </div>
                                            <div class="col-span-2">
                                                <input type="number" :name="'items['+index+'][jumlah]'" x-model="item.jumlah" placeholder="Jml" class="w-full bg-white border border-gray-200 rounded-xl p-3 text-sm focus:border-biotech-green outline-none" required>
                                            </div>
                                            <div class="col-span-3">
                                                <input type="text" :name="'items['+index+'][ukuran]'" x-model="item.ukuran" placeholder="Spek" class="w-full bg-white border border-gray-200 rounded-xl p-3 text-sm focus:border-biotech-green outline-none">
                                            </div>
                                            <div class="col-span-1 flex items-center justify-center">
                                                <button type="button" @click="items.splice(index, 1)" x-show="items.length > 1" class="text-red-400 hover:text-red-600 transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <div class="flex justify-center pt-6">
                                <button type="submit" class="group relative bg-biotech-green hover:bg-biotech-dark text-white font-extrabold py-5 px-16 rounded-2xl shadow-glow transition-all transform hover:-translate-y-1 flex items-center gap-3">
                                    <span>AJUKAN PEMINJAMAN</span>
                                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Status Side Panel (Dinamis) -->
            <div class="lg:col-span-1">
                <div class="glass-effect rounded-[2.5rem] shadow-soft border border-green-50 p-8 h-full">
                    <div class="text-center mb-8">
                        <h2 class="text-xl font-bold text-biotech-dark uppercase mb-2">Status Terakhir</h2>
                        <form action="{{ route('lab.cek-status') }}" method="GET" class="relative">
                            <input type="text" name="nim" placeholder="Cek NIM Anda..." class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-biotech-green outline-none text-sm">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </form>
                    </div>

                    <div class="space-y-4">
                        @forelse($peminjamans ?? [] as $p)
                        <div class="bg-white border {{ $p->status == 'Disetujui' ? 'border-green-100 border-l-4 border-l-biotech-green' : 'border-gray-100' }} p-5 rounded-[1.5rem] shadow-sm">
                            <div class="flex justify-between items-start mb-3">
                                <span class="font-mono font-bold text-biotech-green">{{ $p->nim }}</span>
                                <span class="text-[9px] font-black px-3 py-1 rounded-full uppercase {{ $p->status == 'Disetujui' ? 'bg-green-100 text-green-700' : ($p->status == 'Ditolak' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700') }}">
                                    {{ $p->status }}
                                </span>
                            </div>
                            <p class="text-[11px] text-gray-500 font-semibold mb-1 uppercase tracking-tighter">{{ $p->laboratorium }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-[10px] text-gray-400">{{ $p->created_at->format('d M Y') }}</span>
                                @if($p->status == 'Disetujui')
                                <a href="{{ route('lab.peminjaman.cetak', $p->id) }}" class="text-[9px] bg-biotech-green text-white font-bold px-3 py-1 rounded-lg">CETAK</a>
                                @endif
                            </div>
                        </div>
                        @empty
                        <p class="text-center text-gray-400 text-sm italic">Cari NIM untuk status.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
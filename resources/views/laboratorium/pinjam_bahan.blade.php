@extends('layouts.main')

@section('title', 'Form Pengambilan Bahan - Clean Professional')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #1e293b; }
    .card-container { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); }
    .input-clean { border: 1px solid #cbd5e1; border-radius: 8px; padding: 10px 14px; transition: all 0.2s; font-size: 0.875rem; }
    .input-clean:focus { border-color: #6b21a8; outline: none; box-shadow: 0 0 0 3px rgba(107, 33, 168, 0.1); }
    .label-clean { font-size: 0.813rem; font-weight: 600; color: #475569; margin-bottom: 6px; display: block; }
</style>

<div class="min-h-screen py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-slate-800 mb-8">Bon Pengambilan Bahan</h1>

        <form action="{{ route('lab.pinjam.store') }}" method="POST">
            @csrf
            <input type="hidden" name="jenis_form" value="Bahan">

            <!-- Section 1: Identitas -->
            <div class="card-container p-8 mb-6">
                <p class="text-sm text-slate-500 mb-6">Lengkapi informasi pemohon untuk pengambilan bahan habis pakai.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="label-clean">Nama Lengkap Anda</label>
                        <input type="text" name="nama_peminjam" placeholder="Masukkan nama sesuai KTM" class="input-clean w-full" required>
                    </div>
                    <div>
                        <label class="label-clean">NIM</label>
                        <input type="text" name="nim" placeholder="Contoh: 11S22001" class="input-clean w-full" required>
                    </div>
                    <div>
                        <label class="label-clean">Program Studi</label>
                        <input type="text" name="prodi" value="Teknik Bioteknologi" class="input-clean w-full bg-slate-50 text-slate-500" readonly>
                    </div>
                </div>
            </div>

            <!-- Section 2: Keperluan -->
            <div class="card-container p-8 mb-6">
                <label class="label-clean">Keperluan Penggunaan Bahan</label>
                <textarea name="judul_penelitian" rows="3" placeholder="Jelaskan alasan pengambilan bahan (misal: Praktikum Mikrobiologi)..." class="input-clean w-full" required></textarea>
            </div>

            <!-- Section 3: Daftar Bahan -->
            <div class="card-container p-8 mb-8" x-data="{ items: [{ nama: '', jumlah: '' }] }">
                <div class="flex justify-between items-center mb-6">
                    <label class="label-clean !mb-0">Daftar Bahan / Reagen</label>
                    <button type="button" @click="items.push({ nama: '', jumlah: '' })" class="text-xs font-bold text-purple-700 hover:text-purple-800 flex items-center gap-1 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Tambah Bahan
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex flex-col md:flex-row gap-4 p-4 bg-slate-50 rounded-xl border border-slate-100 relative">
                            <div class="flex-grow">
                                <label class="text-[10px] uppercase font-bold text-slate-400 mb-1 block">Nama Bahan</label>
                                <input type="text" x-model="item.nama" :name="'items['+index+'][nama]'" placeholder="Contoh: Etanol 96% atau Media Agar" class="input-clean w-full !bg-white" required>
                            </div>
                            <div class="w-full md:w-64">
                                <label class="text-[10px] uppercase font-bold text-slate-400 mb-1 block text-center">Jumlah / Volume</label>
                                <input type="text" x-model="item.jumlah" :name="'items['+index+'][jumlah]'" placeholder="Contoh: 500 ml / 1 Pack" class="input-clean w-full text-center !bg-white" required>
                            </div>
                            <button type="button" @click="items.splice(index, 1)" x-show="items.length > 1" class="absolute -right-2 -top-2 bg-white border border-slate-200 text-red-400 hover:text-red-600 rounded-full p-1 shadow-sm transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-purple-800 text-white px-10 py-3 rounded-lg font-bold shadow-sm hover:shadow-md transition transform active:scale-95">
                    Kirim Permohonan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
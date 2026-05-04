@extends('layouts.main')
@section('title', 'Manajemen Ruang Kelas - Bioteknologi IT Del')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --gold: #c6a54a;
    --soft-bg: #f5f7f6;
}

.font-serif { font-family: 'Cormorant Garamond', serif; }
.font-sans { font-family: 'Jost', sans-serif; }

/* Table Glass Effect */
.glass-panel {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2.5rem;
}

.premium-table thead th {
    background-color: var(--forest);
    color: var(--gold);
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-weight: 700;
}

.premium-table tbody tr {
    transition: all 0.3s ease;
}

.premium-table tbody tr:hover {
    background-color: white;
    transform: scale(1.005);
    box-shadow: 0 10px 30px rgba(26, 74, 56, 0.05);
}

/* Custom Status Pills */
.status-pill {
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 0.1em;
    padding: 0.4rem 1rem;
    border-radius: 9999px;
}

.status-available {
    background-color: #ecfdf5;
    color: #059669;
    border: 1px solid #10b98133;
}

.status-occupied {
    background-color: #fff1f2;
    color: #e11d48;
    border: 1px solid #f43f5e33;
}

/* Background Ornament */
.bg-dna-light {
    background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.41L1.41 0h1.42L0 2.83V1.41zm38.59 0L40 0v1.41l-1.41 1.42L37.17 0h1.42zM40 38.59v1.41h-1.41l-2.83-2.83 1.41-1.41L40 38.59z" fill="%231a4a38" fill-opacity="0.03"/%3E%3C/svg%3E');
}
</style>

<!-- HEADER SECTION -->
<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/microbes.png')]"></div>
    <div class="relative z-10 py-24 text-center px-6">
        <span class="inline-block text-[var(--gold)] tracking-[0.5em] uppercase text-[10px] font-bold mb-4">Space Management</span>
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight">Ketersediaan Ruang</h1>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-8 opacity-60"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] bg-dna-light py-20 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <!-- HEADER ROW -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h2 class="font-serif text-3xl text-[var(--forest-dark)]">Katalog Ruang Kuliah</h2>
                <p class="text-sm text-gray-500 mt-1 italic">Update real-time ketersediaan infrastruktur perkuliahan.</p>
            </div>
            
            <!-- Connection Status Badge -->
            <div class="flex items-center px-5 py-2.5 bg-white border border-gray-100 rounded-full shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="w-2 h-2 bg-[#059669] rounded-full"></div>
                        <div class="absolute inset-0 w-2 h-2 bg-[#059669] rounded-full animate-ping"></div>
                    </div>
                    <span class="text-[10px] font-bold text-[var(--forest)] uppercase tracking-widest">Sistem Terkoneksi</span>
                </div>
            </div>
        </div>

        <!-- TABLE SECTION -->
        <div class="glass-panel overflow-hidden shadow-sm">
            <table class="w-full premium-table">
                <thead>
                    <tr>
                        <th class="px-10 py-6 text-left">Nama Ruangan</th>
                        <th class="px-10 py-6 text-left">Kapasitas</th>
                        <th class="px-10 py-6 text-left">Lokasi Gedung</th>
                        <th class="px-10 py-6 text-center">Status Saat Ini</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/50">
                    <!-- Row 01 -->
                    <tr>
                        <td class="px-10 py-7">
                            <div class="flex items-center gap-3">
                                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
                                <span class="font-bold text-[var(--forest-dark)] text-base">Ruang Biotek 01</span>
                            </div>
                        </td>
                        <td class="px-10 py-7">
                            <span class="text-sm text-gray-500 italic font-serif text-lg">40 Mahasiswa</span>
                        </td>
                        <td class="px-10 py-7">
                            <div class="flex items-center gap-2 text-gray-600 text-sm">
                                <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0Normally I can help with things like this, but I don't seem to have access to that content. You can try again or ask me for something else.
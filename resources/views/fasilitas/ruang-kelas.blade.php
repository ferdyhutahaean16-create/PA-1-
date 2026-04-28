@extends('layouts.main')

@section('title', 'Ruang Kelas')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="font-serif text-4xl text-emerald-900 mb-2">Manajemen Ruang Kelas</h2>
            <p class="text-slate-600">Informasi ketersediaan ruang perkuliahan Prodi Bioteknologi.</p>
        </div>
        <div class="flex gap-3">
            <span class="flex items-center text-sm text-emerald-700 font-semibold bg-emerald-50 px-4 py-2 rounded-lg">
                <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                Sistem Terkoneksi
            </span>
        </div>
    </div>

    <div class="glass border border-white rounded-3xl overflow-hidden shadow-sm">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50/50 text-slate-500 uppercase text-xs font-bold tracking-widest border-b border-slate-100">
                    <th class="px-8 py-5">Ruangan</th>
                    <th class="px-8 py-5">Kapasitas</th>
                    <th class="px-8 py-5">Lokasi Gedung</th>
                    <th class="px-8 py-5 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100/50 text-slate-700">
                <tr class="hover:bg-white/50 transition">
                    <td class="px-8 py-5 font-semibold">Ruang Biotek 01</td>
                    <td class="px-8 py-5 italic text-slate-500">40 Mahasiswa</td>
                    <td class="px-8 py-5">Gedung 9, Lantai 1</td>
                    <td class="px-8 py-5 text-center">
                        <span class="bg-emerald-100 text-emerald-700 text-[10px] px-3 py-1 rounded-full font-bold">TERSEDIA</span>
                    </td>
                </tr>
                <tr class="hover:bg-white/50 transition">
                    <td class="px-8 py-5 font-semibold">Ruang Biotek 02</td>
                    <td class="px-8 py-5 italic text-slate-500">35 Mahasiswa</td>
                    <td class="px-8 py-5">Gedung 9, Lantai 2</td>
                    <td class="px-8 py-5 text-center">
                        <span class="bg-rose-100 text-rose-700 text-[10px] px-3 py-1 rounded-full font-bold">IN USE</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
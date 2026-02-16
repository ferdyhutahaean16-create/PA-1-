@extends('layouts.main')

@section('title', $lab['name'])

@section('content')

<div class="bg-biotech-primary text-white py-12">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-2/3">
            <span class="bg-biotech-accent text-biotech-primary px-3 py-1 rounded text-xs font-bold uppercase mb-2 inline-block">Laboratorium Riset & Praktikum</span>
            <h1 class="text-4xl font-bold mb-2">{{ $lab['name'] }}</h1>
            <p class="text-green-100 text-lg mb-4">{{ $lab['course'] }}</p>
            <div class="flex items-center gap-2 text-sm opacity-90">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                Lokasi: {{ $lab['room'] }}
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col lg:flex-row gap-12">

        <div class="lg:w-2/3">
            
            <div class="mb-10 rounded-xl overflow-hidden shadow-lg">
                <img src="{{ $lab['image'] }}" alt="Dokumentasi Lab" class="w-full object-cover h-[400px]">
                <div class="p-4 bg-gray-50 border-t text-center italic text-gray-500 text-sm">
                    Dokumentasi kegiatan praktikum di {{ $lab['name'] }}
                </div>
            </div>

            <div class="mb-10">
                <h3 class="text-2xl font-bold text-biotech-primary mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    Daftar Alat (Tools)
                </h3>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="p-4 font-bold text-sm">Nama Alat</th>
                                <th class="p-4 font-bold text-sm">Stok</th>
                                <th class="p-4 font-bold text-sm">Status</th>
                                <th class="p-4 font-bold text-sm text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lab['tools'] as $tool)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">{{ $tool['name'] }}</td>
                                <td class="p-4 font-mono">{{ $tool['stock'] }} unit</td>
                                <td class="p-4">
                                    @if($tool['status'] == 'Tersedia')
                                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-bold">Tersedia</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full font-bold">Dipakai</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <button class="text-biotech-primary hover:text-biotech-secondary font-bold text-sm underline" onclick="addToCart('{{ $tool['name'] }}', 'Alat')">
                                        + Pinjam
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <h3 class="text-2xl font-bold text-biotech-primary mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    Daftar Bahan (Materials)
                </h3>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="p-4 font-bold text-sm">Nama Bahan</th>
                                <th class="p-4 font-bold text-sm">Stok</th>
                                <th class="p-4 font-bold text-sm">Status</th>
                                <th class="p-4 font-bold text-sm text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lab['materials'] as $material)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">{{ $material['name'] }}</td>
                                <td class="p-4 font-mono">{{ $material['stock'] }}</td>
                                <td class="p-4">
                                    @if($material['status'] == 'Tersedia')
                                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-bold">Tersedia</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full font-bold">Habis</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    @if($material['status'] == 'Tersedia')
                                    <button class="text-biotech-primary hover:text-biotech-secondary font-bold text-sm underline" onclick="addToCart('{{ $material['name'] }}', 'Bahan')">
                                        + Ambil
                                    </button>
                                    @else
                                    <span class="text-gray-400 text-sm cursor-not-allowed">X</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="lg:w-1/3">
            <div class="bg-white p-6 rounded-xl shadow-xl border-t-8 border-biotech-accent sticky top-24">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Form Peminjaman</h3>
                
                <form action="#" method="POST"> @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mahasiswa</label>
                        <input type="text" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-biotech-primary" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">NIM</label>
                        <input type="text" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-biotech-primary" placeholder="NIM">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Item yang Dipinjam</label>
                        <div id="cart-items" class="bg-gray-50 p-3 rounded border border-gray-200 text-sm text-gray-500 min-h-[50px]">
                            Belum ada item dipilih.
                        </div>
                        <input type="hidden" name="items" id="items-input">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Pengembalian</label>
                        <input type="date" class="w-full border border-gray-300 rounded p-2">
                    </div>

                    <button type="button" onclick="alert('Permintaan peminjaman berhasil dikirim! Silakan ambil alat di Laboran.')" class="w-full bg-biotech-primary text-white font-bold py-3 rounded hover:bg-biotech-secondary transition shadow-lg">
                        Ajukan Peminjaman
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    // Script Sederhana untuk Simulasi Masuk Keranjang
    function addToCart(name, type) {
        const cartDiv = document.getElementById('cart-items');
        
        // Hapus teks default jika ada
        if(cartDiv.innerText.includes('Belum ada')) {
            cartDiv.innerHTML = '';
        }

        // Tambah item baru
        const newItem = document.createElement('div');
        newItem.className = 'flex justify-between items-center mb-1 border-b pb-1 last:border-0';
        newItem.innerHTML = `
            <span>${name} <span class="text-xs text-gray-400">(${type})</span></span>
            <span class="text-red-500 cursor-pointer font-bold ml-2" onclick="this.parentElement.remove()">x</span>
        `;
        cartDiv.appendChild(newItem);
    }
</script>

@endsection
@extends('layouts.main')

@section('title', 'Dosen - Bioteknologi IT Del')

@section('content')

<div class="bg-gray-100 py-10 border-b border-gray-200 text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-biotech-primary mb-2">Staf Pengajar</h1>
        <p class="text-gray-500">Mengenal lebih dekat para pendidik di Program Studi Bioteknologi</p>
    </div>
</div>

<div class="container mx-auto px-6 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        
        <div class="bg-white rounded-xl shadow-lg border-t-4 border-biotech-primary overflow-hidden hover:shadow-2xl transition duration-300 group">
            <div class="p-8">
                <div class="w-40 h-40 mx-auto rounded-full overflow-hidden border-4 border-gray-100 group-hover:border-biotech-accent transition mb-6">
                    <img src="https://via.placeholder.com/160" alt="Foto Dosen" class="w-full h-full object-cover">
                </div>

                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold text-biotech-primary leading-tight">Nama Dosen, M.Si.</h2>
                    <p class="text-biotech-secondary font-semibold uppercase text-xs tracking-widest mt-1">Jabatan Fungsional</p>
                </div>

                <div class="space-y-3 text-sm border-t border-gray-50 pt-6">
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-medium">NIDN</span>
                        <span class="text-gray-800 font-bold">1234567890</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-medium">Lulusan</span>
                        <span class="text-gray-800 text-right font-medium">Institut Teknologi Bandung</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-medium">Ruangan</span>
                        <span class="text-gray-800">Gedung 9, Ruang 912</span>
                    </div>
                    <div class="pt-2">
                        <span class="text-gray-400 font-medium block mb-1">Pengampu Matakuliah:</span>
                        <p class="text-gray-700 italic leading-snug">Mikrobiologi Dasar, Genetika Molekuler, Bioinformatika.</p>
                    </div>
                </div>
            </div>

            <div class="bg-biotech-bg p-4 text-center">
                <a href="mailto:dosen@del.ac.id" class="text-biotech-primary font-bold hover:text-biotech-secondary transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Kirim Email
                </a>
            </div>
        </div>

        </div>
</div>

@endsection
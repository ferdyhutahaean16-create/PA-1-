@extends('layouts.main')

@section('title', 'Tenaga Pendidik - Prodi Bioteknologi IT Del')

@section('content')
<div class="bg-gray-50 py-16 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 max-w-5xl">
        
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-800 uppercase tracking-wider mb-2">Tenaga Pendidik</h1>
            <div class="h-1.5 w-24 bg-blue-600 mx-auto rounded"></div>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Profil jajaran tenaga pendidik Program Studi Bioteknologi Institut Teknologi Del.</p>
        </div>

        <div class="space-y-10">
            
            @forelse($tenaga_pendidiks as $tenaga_pendidik)
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden flex flex-col md:flex-row">

                <div class="w-full md:w-1/3 p-8 flex items-center justify-center border-b md:border-b-0 md:border-r border-gray-100">
                    @if($tenaga_pendidik->foto)
                        <img src="{{ asset($tenaga_pendidik->foto) }}" alt="Foto {{ $tenaga_pendidik->nama }}" class="w-56 h-56 rounded-full object-cover shadow-sm bg-gray-100">
                    @else
                        <div class="w-56 h-56 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center">
                            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        </div>
                    @endif
                </div>

                <div class="w-full md:w-2/3 flex flex-col">
                    
                    <div class="flex flex-wrap border-b border-gray-100 bg-gray-50/50">
                        <div class="flex-1 min-w-[120px] bg-blue-600 text-white font-bold py-4 px-2 text-center text-xs sm:text-sm flex items-center justify-center gap-2 cursor-pointer transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            PROFIL
                        </div>
                        <div class="flex-1 min-w-[120px] text-gray-500 font-bold py-4 px-2 text-center text-xs sm:text-sm flex items-center justify-center gap-2 hover:bg-gray-100 cursor-pointer transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            PENGAJARAN
                        </div>
                        <div class="flex-1 min-w-[120px] text-gray-500 font-bold py-4 px-2 text-center text-xs sm:text-sm flex items-center justify-center gap-2 hover:bg-gray-100 cursor-pointer transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            RISET
                        </div>
                        <div class="flex-1 min-w-[120px] text-gray-500 font-bold py-4 px-2 text-center text-xs sm:text-sm flex items-center justify-center gap-2 hover:bg-gray-100 cursor-pointer transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            PENGABDIAN
                        </div>
                    </div>

                    <div class="p-8 sm:p-10">
                        
                        <span class="inline-block bg-blue-600 text-white text-xs font-bold px-4 py-1.5 rounded-full mb-4 shadow-sm">
                            DOSEN
                        </span>

                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-8">{{ $tenaga_pendidik->nama }}</h2>

                        <div class="space-y-4 text-gray-700 text-[15px]">
                            
                            <div class="flex items-start gap-4">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                <div><span class="font-bold text-gray-900">NIDN:</span> {{ $tenaga_pendidik->nidn }}</div>
                            </div>

                            <div class="flex items-start gap-4">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                                <div><span class="font-bold text-gray-900">Posisi:</span> {{ $tenaga_pendidik->jabatan }}</div>
                            </div>

                            <div class="flex items-start gap-4">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                <div><span class="font-bold text-gray-900">Email:</span> <a href="mailto:{{ $tenaga_pendidik->email }}" class="text-blue-600 hover:underline">{{ $tenaga_pendidik->email }}</a></div>
                            </div>

                            <div class="flex items-start gap-4">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg>
                                <div><span class="font-bold text-gray-900">Kantor:</span> {{ $tenaga_pendidik->ruangan }}</div>
                            </div>

                            <div class="flex items-start gap-4">
                                <svg class="w-5 h-5 text-blue-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0z"></path></svg>
                                <div class="w-full">
                                    <span class="font-bold text-gray-900 block mb-2">Latar Belakang Pendidikan:</span>
                                    <ul class="list-disc list-inside text-gray-600 space-y-1.5 ml-1">
                                        @foreach(explode(',', $tenaga_pendidik->lulusan) as $pendidikan)
                                            @if(trim($pendidikan) != '')
                                                <li>{{ trim($pendidikan) }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>
            @empty
            
            <div class="col-span-full text-center py-16 bg-white rounded-xl shadow-sm border border-gray-100">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <p class="text-gray-500 text-lg">Belum ada data tenaga pendidik yang dipublikasikan.</p>
            </div>
            
            @endforelse

        </div>
    </div>
</div>
@endsection
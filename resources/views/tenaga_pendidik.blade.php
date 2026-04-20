@extends('layouts.main')

@section('title', 'Tenaga Pendidik - Prodi Bioteknologi IT Del')

@section('content')
<div class="bg-gray-50 py-16 min-h-screen">
    <div class="container mx-auto px-6">
        
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-biotech-primary uppercase tracking-wider mb-2">Tenaga Pendidik</h1>
            <div class="h-1 w-24 bg-yellow-400 mx-auto rounded"></div>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Profil jajaran tenaga pendidik Program Studi Bioteknologi Institut Teknologi Del yang berkompeten di bidangnya.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($tenaga_pendidiks as $tenaga_pendidik)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border-t-4 border-biotech-primary hover:shadow-2xl transition transform hover:-translate-y-1">
                <div class="p-6">
                    
                    @if($tenaga_pendidik->foto) 
                        <div class="w-32 h-32 rounded-full overflow-hidden mb-4 mx-auto shadow-sm border-4 border-gray-50 object-cover">
                            <img src="{{ asset($tenaga_pendidik->foto) }}" alt="Foto {{ $tenaga_pendidik->nama }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-32 h-32 bg-green-100 text-green-700 rounded-full flex items-center justify-center text-4xl font-bold mb-4 mx-auto shadow-sm border-4 border-green-50">
                            {{ substr($tenaga_pendidik->nama, 0, 1) }}
                        </div>
                    @endif
                    
                    <h2 class="text-xl font-bold text-gray-800 text-center mb-1">{{ $tenaga_pendidik->nama }}</h2>
                    <p class="text-sm text-yellow-500 font-bold text-center uppercase tracking-wide mb-6">{{ $tenaga_pendidik->jabatan }}</p>

                    <div class="space-y-3 text-sm text-gray-600 border-t border-gray-100 pt-4">
                        <div class="flex">
                            <span class="font-bold w-28 text-gray-800 flex-shrink-0">NIDN / NIK</span>
                            <span class="flex-1">: {{ $tenaga_pendidik->nidn }}</span>
                        </div>
                        <div class="flex">
                            <span class="font-bold w-28 text-gray-800 flex-shrink-0">Pendidikan</span>
                            <span class="flex-1 leading-relaxed">: {{ $tenaga_pendidik->lulusan }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-bold w-28 text-gray-800 flex-shrink-0">Kantor</span>
                            <span class="flex-1">: {{ $tenaga_pendidik->ruangan }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-bold w-28 text-gray-800 flex-shrink-0">No. Telpon</span>
                            <span class="flex-1">: {{ $tenaga_pendidik->no_telpon ?? '-' }}</span>
                        </div>
                        <div class="flex items-start">
                            <span class="font-bold w-28 text-gray-800 flex-shrink-0">Email</span>
                            <span class="flex-1 break-all">: <a href="mailto:{{ $tenaga_pendidik->email }}" class="text-blue-500 hover:underline">{{ $tenaga_pendidik->email }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
            
            @empty
            <div class="col-span-full text-center py-12 bg-white rounded-lg shadow-sm border border-gray-200">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <p class="text-gray-500 text-lg">Belum ada data tenaga pendidik yang dipublikasikan.</p>
            </div>
            @endforelse

        </div>
    </div>
</div>
@endsection
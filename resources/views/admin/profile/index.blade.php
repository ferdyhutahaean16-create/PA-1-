@extends('layouts.admin.admin')

@section('title', 'Manajemen Profil Institusi')

@section('content')
<div class="py-10 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Profil Institusi (Visi, Misi & Sejarah)</h1>
                <div class="h-1 w-20 bg-[#1a4a38] mt-2 rounded"></div>
            </div>
            
            @if($profiles->isEmpty())
            <a href="{{ route('profile.create') }}" class="bg-[#1a4a38] hover:bg-emerald-900 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Profil
            </a>
            @endif
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-800 text-white text-sm uppercase tracking-wider">
                        <tr>
                            <th class="p-4 font-semibold">Visi & Misi</th>
                            <th class="p-4 font-semibold w-48 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse($profiles as $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="p-4 space-y-3">
                                <div>
                                    <div class="text-sm font-bold text-emerald-700 uppercase tracking-wider mb-1">Visi:</div>
                                    <p class="text-sm text-gray-600 leading-relaxed">
                                        {{ Str::limit(strip_tags($item->vision), 150, '...') }}
                                    </p>
                                </div>
                                <div class="pt-2 border-t border-gray-100">
                                    <div class="text-sm font-bold text-amber-600 uppercase tracking-wider mb-1">Misi:</div>
                                    <p class="text-sm text-gray-600 leading-relaxed">
                                        {{ Str::limit(strip_tags($item->mission), 150, '...') }}
                                    </p>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('profile.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-1.5 rounded-md text-sm font-semibold hover:bg-yellow-600 transition shadow-sm">Edit</a>
                                    <form action="{{ route('profile.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data profil ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-600 transition shadow-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="p-8 text-center text-gray-500 italic">Belum ada data profil.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
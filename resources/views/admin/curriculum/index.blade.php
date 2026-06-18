@extends('layouts.admin.admin')
@section('title', 'Daftar Kurikulum - Bioteknologi IT Del')

@section('content')
<div class="py-10 bg-[#f8fafc] min-h-screen">
    <div class="container mx-auto px-8 max-w-7xl">
        
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Daftar Kurikulum Program Studi</h1>
                <p class="text-gray-500 mt-2 text-sm">Manajemen daftar mata kuliah yang dikelompokkan berdasarkan semester.</p>
            </div>
            <a href="{{ route('curriculum.create') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition flex items-center gap-2 text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah
            </a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-8 rounded-lg shadow-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        {{-- 💡 Looping Cerdas Berdasarkan Semester --}}
        @forelse($curriculums as $semester => $courses)
            <div class="mb-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-[#1a4a38] px-6 py-4 border-b border-emerald-800">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Semester {{ $semester }}
                    </h2>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                            <tr>
                                <th class="p-4 font-bold border-b border-gray-100 w-16 text-center">No</th>
                                <th class="p-4 font-bold border-b border-gray-100 w-32">Kode MK</th>
                                <th class="p-4 font-bold border-b border-gray-100">Nama Mata Kuliah</th>
                                <th class="p-4 font-bold border-b border-gray-100 w-24 text-center">SKS</th>
                                <th class="p-4 font-bold border-b border-gray-100 w-32 text-center">Kategori</th>
                                <th class="p-4 font-bold border-b border-gray-100 w-32 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @foreach($courses as $index => $mk)
                                <tr class="hover:bg-emerald-50/30 transition-colors">
                                    <td class="p-4 text-center text-gray-500">{{ $loop->iteration }}</td>
                                    <td class="p-4 font-mono font-bold text-gray-700">{{ $mk->course_code }}</td>
                                    <td class="p-4 font-bold text-gray-900">{{ $mk->course_name }}</td>
                                    <td class="p-4 text-center font-bold text-emerald-600">{{ $mk->credits }}</td>
                                    <td class="p-4 text-center">
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest {{ $mk->category == 'Mandatory' ? 'bg-blue-50 text-blue-600' : 'bg-amber-50 text-amber-600' }}">
                                            {{ $mk->category == 'Mandatory' ? 'Wajib' : 'Pilihan' }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-center flex justify-center gap-2">
                                        <a href="{{ route('curriculum.edit', $mk->id) }}" class="p-2 bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white rounded-lg transition-colors" title="Edit Data">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        <form action="{{ route('curriculum.destroy', $mk->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus Mata Kuliah ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-500 hover:text-white rounded-lg transition-colors" title="Hapus Data">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <p class="text-gray-500 font-medium">Belum ada data kurikulum mata kuliah yang terdaftar.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
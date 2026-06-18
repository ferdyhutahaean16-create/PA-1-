@extends('layouts.admin.admin')

@section('title', 'Daftar Inventaris Laboratorium')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Inventaris Laboratorium</h1>
                <p class="text-gray-500">Kelola data Equipment, Material, dan Instrument Aset Lab.</p>
            </div>
            
            <a href="{{ route('inventories.create') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-2.5 rounded-lg font-bold shadow transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm font-bold">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-wrap gap-2 mb-6 border-b border-gray-300 pb-2">
            <button onclick="switchAdminTab('tab-alat', this)" class="admin-tab-btn active bg-gray-800 text-white px-6 py-2 rounded-t-lg font-bold text-sm transition">Equipment</button>
            <button onclick="switchAdminTab('tab-bahan', this)" class="admin-tab-btn bg-white text-gray-500 hover:bg-gray-100 px-6 py-2 rounded-t-lg font-bold text-sm border border-b-0 border-gray-200 transition">Material</button>
            <button onclick="switchAdminTab('tab-instrumen', this)" class="admin-tab-btn bg-white text-gray-500 hover:bg-gray-100 px-6 py-2 rounded-t-lg font-bold text-sm border border-b-0 border-gray-200 transition">Instrument</button>
        </div>

        <style>
            .admin-tab-content { display: none; opacity: 0; transform: translateY(10px); transition: all 0.3s ease; }
            .admin-tab-content.active { display: block; opacity: 1; transform: translateY(0); }
        </style>

        <div class="bg-white rounded-b-xl rounded-tr-xl shadow-lg border border-gray-100 overflow-hidden">
            
            <div id="tab-alat" class="admin-tab-content active p-1">
                @if($equipment->isEmpty())
                    <p class="text-center text-gray-400 italic py-10">Data Equipment masih kosong.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-blue-50 text-blue-900 text-[11px] uppercase tracking-wider">
                                <tr>
                                    <th class="p-4 text-center w-16">No</th>
                                    <th class="p-4">Item Name</th>
                                    <th class="p-4 text-center">Quantity</th>
                                    <th class="p-4 text-center w-32">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($equipment as $index => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-4 text-center text-gray-500">{{ $loop->iteration }}</td>
                                    <td class="p-4 font-bold text-gray-800">{{ $item->item_name }}</td>
                                    <td class="p-4 text-center"><span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">{{ $item->quantity }}</span></td>
                                    <td class="p-4 text-center flex justify-center gap-2">
                                        <a href="{{ route('inventories.edit', $item->id) }}" class="bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white p-2 rounded transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                                        <form action="{{ route('inventories.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus item ini?')" class="bg-red-100 text-red-600 hover:bg-red-600 hover:text-white p-2 rounded transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div id="tab-bahan" class="admin-tab-content p-1">
                @if($materials->isEmpty())
                    <p class="text-center text-gray-400 italic py-10">Data Material masih kosong.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-emerald-50 text-emerald-900 text-[11px] uppercase tracking-wider">
                                <tr>
                                    <th class="p-4 text-center w-16">No</th>
                                    <th class="p-4">Item Name</th>
                                    <th class="p-4 text-center">Quantity</th>
                                    <th class="p-4 text-center">Expiry Date</th>
                                    <th class="p-4 text-center w-32">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($materials as $index => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-4 text-center text-gray-500">{{ $loop->iteration }}</td>
                                    <td class="p-4 font-bold text-gray-800">{{ $item->item_name }}</td>
                                    <td class="p-4 text-center"><span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">{{ $item->quantity }}</span></td>
                                    <td class="p-4 text-center text-xs text-gray-600">{{ $item->expiry_date ? \Carbon\Carbon::parse($item->expiry_date)->format('d/m/Y') : '-' }}</td>
                                    <td class="p-4 text-center flex justify-center gap-2">
                                        <a href="{{ route('inventories.edit', $item->id) }}" class="bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white p-2 rounded transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                                        <form action="{{ route('inventories.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus item ini?')" class="bg-red-100 text-red-600 hover:bg-red-600 hover:text-white p-2 rounded transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div id="tab-instrumen" class="admin-tab-content p-1">
                @if($instruments->isEmpty())
                    <p class="text-center text-gray-400 italic py-10">Data Instrument masih kosong.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-purple-50 text-purple-900 text-[11px] uppercase tracking-wider">
                                <tr>
                                    <th class="p-4 text-center w-16">No</th>
                                    <th class="p-4">Item Name</th>
                                    <th class="p-4 text-center">Quantity</th>
                                    <th class="p-4 text-center w-32">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($instruments as $index => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-4 text-center text-gray-500">{{ $loop->iteration }}</td>
                                    <td class="p-4 font-bold text-gray-800">{{ $item->item_name }}</td>
                                    <td class="p-4 text-center"><span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">{{ $item->quantity }}</span></td>
                                    <td class="p-4 text-center flex justify-center gap-2">
                                        <a href="{{ route('inventories.edit', $item->id) }}" class="bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white p-2 rounded transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                                        <form action="{{ route('inventories.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus item ini?')" class="bg-red-100 text-red-600 hover:bg-red-600 hover:text-white p-2 rounded transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

<script>
    function switchAdminTab(tabId, btn) {
        document.querySelectorAll('.admin-tab-content').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.admin-tab-btn').forEach(el => {
            el.classList.remove('bg-gray-800', 'text-white');
            el.classList.add('bg-white', 'text-gray-500', 'border', 'border-b-0', 'border-gray-200');
        });
        document.getElementById(tabId).classList.add('active');
        btn.classList.add('bg-gray-800', 'text-white');
        btn.classList.remove('bg-white', 'text-gray-500', 'border', 'border-b-0', 'border-gray-200');
    }
</script>
@endsection
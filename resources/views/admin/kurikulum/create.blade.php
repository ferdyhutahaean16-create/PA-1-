@extends('layouts.admin.admin')

@section('title', 'Tambah Kurikulum')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="mb-8">
            <a href="{{ route('kurikulum.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Mata Kuliah</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            <form action="{{ route('kurikulum.store') }}" method="POST">
                @csrf
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-6">

                    <div id="form-container" class="space-y-4">
                        <div class="flex items-start gap-4 input-row bg-gray-50 p-4 rounded-lg border border-gray-200">

                            <div class="w-1/4">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Semester *</label>
                                <select name="semester[]" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" required>
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                </select>
                            </div>

                            <div class="w-1/4">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Kode Matkul *</label>
                                <input type="text" name="kode_matkul[]" placeholder="Contoh: TIB101" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" required>
                            </div>

                            <div class="w-2/4">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Nama Mata Kuliah *</label>
                                <input type="text" name="nama_matkul[]" placeholder="Contoh: Biologi Dasar" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" required>
                            </div>

                            <div class="w-1/6">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">SKS *</label>
                                <input type="number" name="sks[]" placeholder="Contoh: 3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm" required>
                            </div>

                            <div class="w-auto pt-6">
                                <button type="button" class="btn-remove hidden text-red-500 hover:text-red-700 p-2" onclick="removeRow(this)">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="button" onclick="addRow()" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg text-sm font-bold hover:bg-blue-100 transition-colors border border-blue-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah Mata Kuliah Lainnya
                        </button>
                    </div>

                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold shadow-md hover:bg-blue-700 transition-colors">
                        Simpan Semua Mata Kuliah
                    </button>
                </div>
            </form>
            <script>
                function addRow() {
                    const container = document.getElementById('form-container');
                    const firstRow = container.querySelector('.input-row');
                    const newRow = firstRow.cloneNode(true); // Duplikasi baris pertama
                    
                    // Kosongkan nilai input di baris baru
                    const inputs = newRow.querySelectorAll('input');
                    inputs.forEach(input => input.value = '');
                    
                    // Tampilkan tombol hapus di baris baru
                    const removeBtn = newRow.querySelector('.btn-remove');
                    removeBtn.classList.remove('hidden');
                    
                    container.appendChild(newRow);
                }
            
                function removeRow(button) {
                    const row = button.closest('.input-row');
                    row.remove();
                }
            </script>
        </div>
    </div>
</div>
@endsection
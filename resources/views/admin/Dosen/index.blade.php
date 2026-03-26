<thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-4">Foto</th> <th class="p-4">NIDN</th>
                <th class="p-4">Nama Dosen</th>
                <th class="p-4">Jabatan</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($dosens as $dosen)
            <tr class="hover:bg-gray-50">
                <td class="p-4">
                    @if($dosen->foto)
                        <img src="{{ asset($dosen->foto) }}" alt="Foto {{ $dosen->nama }}" class="w-12 h-12 rounded-full object-cover border border-gray-200 shadow-sm">
                    @else
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                            {{ substr($dosen->nama, 0, 1) }}
                        </div>
                    @endif
                </td>
                <td class="p-4">{{ $dosen->nidn }}</td>
                <td class="p-4 font-bold text-green-700">{{ $dosen->nama }}</td>
                <td class="p-4">{{ $dosen->jabatan }}</td>
                <td class="p-4 text-center flex justify-center gap-2">
                    <a href="{{ route('dosen.edit', $dosen->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 transition">Edit</a>
                    </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">Belum ada data dosen.</td> </tr>
            @endforelse
        </tbody>
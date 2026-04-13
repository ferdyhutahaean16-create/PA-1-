@extends('layouts.main') @section('title', 'Kurikulum Program Studi')

@section('content')
<div class="py-16 bg-white min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <h1 class="text-3xl font-bold text-center mb-12 uppercase tracking-widest text-black">
            Kurikulum
        </h1>

        <div class="flex flex-col md:flex-row gap-8 items-center mb-20">
            <div class="w-full md:w-2/5">
                <img src="https://via.placeholder.com/600x400?text=Foto+Kegiatan+Bioteknologi" alt="Suasana Kelas" class="rounded-lg shadow-md w-full object-cover border border-gray-200">
            </div>
            
            <div class="w-full md:w-3/5 text-gray-800 leading-relaxed text-justify text-sm md:text-base">
                <p>
                    Salah satu unsur utama untuk mencapai pembelajaran yang baik, Perguruan Tinggi harus memiliki rancangan pembelajaran dalam bentuk kurikulum yang disusun berdasarkan kebutuhan dan tantangan di masa depan. Kurikulum ini merupakan kurikulum yang diterapkan pada Program Studi Bioteknologi. Penyusunan kurikulum ini didasarkan pada konsep ilmu dasar serta perkembangan dan kebutuhan ilmu bioteknologi pada dunia industri. Rumusan kompetensi dan urutan strategi pembelajarannya disusun secara bertahap menurut semesternya.
                </p>
            </div>
        </div>

        @if($kurikulum_per_semester->isEmpty())
            <div class="text-center text-gray-500 py-10 italic">
                Data kurikulum belum tersedia.
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-16 gap-y-16">
                
                @foreach($kurikulum_per_semester as $semester => $matkul)
                    <div>
                        <h3 class="text-lg font-normal text-center mb-6 uppercase tracking-wide text-black">
                            Semester {{ $semester }}
                        </h3>
                        
                        <div class="w-full">
                            <table class="w-full border-collapse text-sm">
                                <thead>
                                    <tr class="bg-[#e5e7eb] text-black">
                                        <th class="py-3 px-2 text-center font-normal">Kode Mata Kuliah</th>
                                        <th class="py-3 px-2 text-center font-normal">Nama Mata Kuliah</th>
                                        <th class="py-3 px-2 text-center font-normal w-16">SKS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matkul as $item)
                                        <tr class="border-b border-gray-400">
                                            <td class="py-4 px-2 text-center font-bold text-black">{{ $item->kode_mk }}</td>
                                            
                                            <td class="py-4 px-2 text-center text-black">{{ $item->mata_kuliah }}</td>
                                            
                                            <td class="py-4 px-2 text-center text-black">{{ $item->sks }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
                
            </div>
        @endif

    </div>
</div>
@endsection
@extends('layouts.admin.admin')

@section('title', 'Kelola Data Penelitian / Riset')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            
            {{-- Notifikasi Sukses --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Daftar Penelitian & Publikasi Dosen</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.penelitian.create') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-plus mr-1"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead class="bg-light">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th>Judul Penelitian</th>
                                <th>Nama Dosen</th>
                                <th>Kategori</th>
                                <th class="text-center">Tahun</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penelitians as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-wrap" style="min-width: 250px;">{{ $item->judul }}</td>
                                <td>{{ $item->dosen->nama ?? 'Dosen Tidak Ditemukan' }}</td>
                                <td><span class="badge badge-info">{{ $item->kategori }}</span></td>
                                <td class="text-center">{{ $item->tahun }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.penelitian.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.penelitian.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data penelitian yang ditambahkan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
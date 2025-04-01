@extends('layouts.admin.main')

@section('title', 'Potensi Wisata')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Potensi Wisata</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Potensi Wisata</h6>
                <a href="{{ route('admin.potensi-wisata.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-auto" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Wisata</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($potensiWisata as $wisata)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $wisata->nama_wisata }}</td>
                                    <td>{{ Str::limit(strip_tags($wisata->deskripsi), 100) }}</td>
                                    <td>
                                        @if ($wisata->gambar->isNotEmpty())
                                            @foreach ($wisata->gambar as $gambar)
                                                <img src="{{ asset('images/potensi-wisata/' . $gambar->file_path) }}"
                                                    alt="{{ $wisata->nama_wisata }}" width="80px" class="mb-2">
                                            @endforeach
                                        @else
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.potensi-wisata.edit', $wisata->id) }}"
                                            class="btn btn-warning btn-sm mb-2"><i class="fas fa-edit"></i>
                                            Edit</a>

                                        <form action="{{ route('admin.potensi-wisata.destroy', $wisata->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

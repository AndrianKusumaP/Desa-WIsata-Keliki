@extends('layouts.admin.main')

@section('title', 'Artikel')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Artikel</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6>
                <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-auto" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>
                                <th>Isi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                                    <td>
                                        @if ($item->gambar)
                                            <img src="{{ asset('images/artikel/' . $item->gambar) }}"
                                                alt="{{ $item->judul }}" width="80px" class="mb-2">
                                        @else
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit(strip_tags($item->isi), 100) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.artikel.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm mb-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST"
                                            style="display:inline-block;">
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

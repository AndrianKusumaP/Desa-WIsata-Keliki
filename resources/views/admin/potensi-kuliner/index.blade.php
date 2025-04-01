@extends('layouts.admin.main')

@section('title', 'Potensi Kuliner')

@section('content')
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Potensi Kuliner</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Potensi Kuliner</h6>
        <a href="{{ route('admin.potensi-kuliner.create') }}" class="btn btn-primary">Tambah</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Tempat</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Lokasi</th>
                <th>Kontak</th>
                <th>Kisaran Harga</th>
                <th>Masakan</th>
                <th>Makanan</th>
                <th>Fitur</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($potensiKuliner as $kuliner)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kuliner->nama_tempat }}</td>
                  <td>{{ Str::limit($kuliner->deskripsi, 50) }}</td>
                  <td>
                    @if ($kuliner->gambar->isNotEmpty())
                      @foreach ($kuliner->gambar as $gambar)
                        <img src="{{ asset('images/potensi-kuliner/' . $gambar->file_path) }}"
                          alt="{{ $kuliner->nama_tempat }}" width="80px" class="mb-2">
                      @endforeach
                    @else
                      <span>Tidak ada gambar</span>
                    @endif
                  </td>
                  <td>{{ $kuliner->lokasi }}</td>
                  <td>{{ $kuliner->kontak }}</td>
                  <td>{{ $kuliner->kisaran_harga }}</td>
                  <td>{{ $kuliner->masakan }}</td>
                  <td>{{ Str::limit($kuliner->makanan, 50) }}</td>
                  <td>{{ Str::limit($kuliner->fitur, 50) }}</td>
                  <td class="text-center">
                    <a href="{{ route('admin.potensi-kuliner.edit', $kuliner->id) }}"
                      class="btn btn-warning btn-sm mb-2">
                      <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('admin.potensi-kuliner.destroy', $kuliner->id) }}" method="POST"
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

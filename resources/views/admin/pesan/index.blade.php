@extends('layouts.admin.main')

@section('title', 'Pesan')

@section('content')
  <div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Pesan</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pesan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-auto" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pesans as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->nomor_telepon }}</td>
                  <td>{{ Str::limit($item->pesan, 50) }}</td>
                  <td>{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                  <td class="text-center">
                    <a href="{{ route('admin.pesan.show', $item->id) }}" class="btn btn-info btn-sm">
                      <i class="fas fa-eye"></i> Lihat
                    </a>
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

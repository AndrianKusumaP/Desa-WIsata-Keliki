@extends('layouts.admin.main')

@section('title', 'Paket Tour')

@section('content')
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Paket Tour</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Paket Tour</h6>
        <a href="{{ route('admin.paket-tour.create') }}" class="btn btn-primary">Tambah</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Isi Paket</th>
                <th>Gambar</th>
                <th>Rentang Harga</th>
                <th>Sembunyikan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($paketTour as $paket)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $paket->nama_paket }}</td>
                  <td>
                    @php
                      $isiPaket = json_decode($paket->isi_paket); // Decode JSON
                      $limit = 3; // Jumlah item yang ingin ditampilkan
                    @endphp
                    <ul>
                      @foreach ($isiPaket as $index => $item)
                        @if ($index < $limit)
                          <li>{{ $item }}</li>
                        @endif
                      @endforeach
                      @if (count($isiPaket) > $limit)
                        <li>dan lainnya...</li>
                      @endif
                    </ul>
                  </td>
                  <td>
                    @if ($paket->gambar)
                      <img src="{{ asset('images/paket-tour/' . $paket->gambar) }}" alt="{{ $paket->nama_paket }}"
                        width="80px" class="mb-2">
                    @else
                      <span>Tidak ada gambar</span>
                    @endif
                  </td>
                  <td>
                    @if ($paket->harga_min == $paket->harga_max)
                      Rp {{ number_format($paket->harga_min, 0, ',', '.') }}
                    @else
                      Rp {{ number_format($paket->harga_min, 0, ',', '.') }} -
                      Rp {{ number_format($paket->harga_max, 0, ',', '.') }}
                    @endif
                  </td>
                  <td>
                    @if ($paket->sembunyikan == 1)
                      <span class="badge badge-success">Iya</span>
                    @else
                      <span class="badge badge-danger">Tidak</span>
                    @endif
                  </td>
                  <td class="text-center">
                    <a href="{{ route('admin.paket-tour.edit', $paket->id) }}" class="btn btn-warning btn-sm mb-2">
                      <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('admin.paket-tour.destroy', $paket->id) }}" method="POST"
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

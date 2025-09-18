@extends('layouts.admin.main')

@section('title', 'Detail Pesan')

@section('content')
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Pesan</h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Pesan dari {{ $pesan->nama }}</h6>
        <a href="{{ route('admin.pesan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-sm-3">Nama</dt>
          <dd class="col-sm-9">{{ $pesan->nama }}</dd>

          <dt class="col-sm-3">Email</dt>
          <dd class="col-sm-9">{{ $pesan->email }}</dd>

          <dt class="col-sm-3">Nomor Telepon</dt>
          <dd class="col-sm-9">
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pesan->nomor_telepon) }}" target="_blank">
              {{ $pesan->nomor_telepon }}
            </a>
          </dd>

          <dt class="col-sm-3">Pesan</dt>
          <dd class="col-sm-9">{{ $pesan->pesan }}</dd>

          <dt class="col-sm-3">Tanggal Kirim</dt>
          <dd class="col-sm-9">{{ $pesan->created_at->format('d-m-Y H:i:s') }}</dd>
        </dl>
      </div>
    </div>
  </div>
@endsection

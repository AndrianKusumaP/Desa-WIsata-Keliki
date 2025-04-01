@extends('layouts.admin.main')

@section('title', 'Tambah Potensi Kuliner')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">Tambah Potensi Kuliner</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Potensi Kuliner</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.potensi-kuliner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="nama_tempat">Nama Tempat</label>
          <input type="text" class="form-control @error('nama_tempat') is-invalid @enderror" id="nama_tempat"
            name="nama_tempat" value="{{ old('nama_tempat') }}" required>
          @error('nama_tempat')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
          @error('deskripsi')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="lokasi">Lokasi</label>
          <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
            value="{{ old('lokasi') }}" required>
          @error('lokasi')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="kontak">Kontak</label>
          <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak"
            value="{{ old('kontak') }}" required>
          @error('kontak')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="kisaran_harga">Kisaran Harga</label>
          <input type="text" class="form-control @error('kisaran_harga') is-invalid @enderror" id="kisaran_harga"
            name="kisaran_harga" value="{{ old('kisaran_harga') }}" required>
          @error('kisaran_harga')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="masakan">Masakan</label>
          <input type="text" class="form-control @error('masakan') is-invalid @enderror" id="masakan" name="masakan"
            value="{{ old('masakan') }}" required>
          @error('masakan')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="makanan">Makanan</label>
          <input type="text" class="form-control @error('makanan') is-invalid @enderror" id="makanan" name="makanan"
            value="{{ old('makanan') }}" required>
          @error('makanan')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="fitur">Fitur</label>
          <textarea class="form-control @error('fitur') is-invalid @enderror" id="fitur" name="fitur" required>{{ old('fitur') }}</textarea>
          @error('fitur')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="gambar">Upload Gambar (Harus 3 gambar) & Ukuran maks 10MB</label>
          <input type="file" class="form-control-file @error('gambar') is-invalid @enderror" id="gambar"
            name="gambar[]" multiple required>
          @error('gambar')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          @foreach ($errors->get('gambar.*') as $error)
            <div class="text-danger">{{ $error[0] }}</div>
          @endforeach
        </div>

        <div class="text-right">
          <a href="{{ route('admin.potensi-kuliner.index') }}" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
          <button type="submit" class="btn btn-success">
            <i class="fa fa-plus"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

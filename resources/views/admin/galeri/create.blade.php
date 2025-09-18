@extends('layouts.admin.main')

@section('title', 'Tambah Galeri')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">Tambah Galeri</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Galeri</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
          @error('judul')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
          @error('deskripsi')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="images">Upload Gambar (Bisa lebih dari satu, maks 10MB per file)</label>
          <input type="file" class="form-control-file" id="images" name="images[]" multiple required>
          @error('images.*')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-right">
          <a href="{{ route('admin.galeri.index') }}" class="btn btn-danger">
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

@extends('layouts.admin.main')

@section('title', 'Tambah Potensi Wisata')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">Tambah Potensi Wisata</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Potensi Wisata</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.potensi-wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="nama_wisata">Nama Wisata</label>
          <input type="text" class="form-control @error('nama_wisata') is-invalid @enderror" id="nama_wisata"
            name="nama_wisata" value="{{ old('nama_wisata') }}" required>
          @error('nama_wisata')
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
          <a href="{{ route('admin.potensi-wisata.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i>
            Kembali</a>
          <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('admin/vendor/ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('deskripsi');
    CKEDITOR.instances.deskripsi.setData(`{!! old('deskripsi') !!}`);
  </script>
@endsection

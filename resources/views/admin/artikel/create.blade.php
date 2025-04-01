@extends('layouts.admin.main')

@section('title', 'Tambah Artikel')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tambah Artikel</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Artikel</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Artikel</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                    @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Artikel</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi">Isi Artikel</label>
                    <textarea class="form-control" id="isi" name="isi" required></textarea>
                    @error('isi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Upload Gambar (Ukuran maks 10MB)</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                    @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-right">
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-danger">
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

@section('scripts')
    <script src="{{ asset('admin/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('isi');
    </script>
@endsection

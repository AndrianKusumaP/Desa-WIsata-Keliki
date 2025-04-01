@extends('layouts.admin.main')

@section('title', 'Edit Galeri')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Galeri</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Galeri</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul"
                        value="{{ old('judul', $galeri->judul) }}" required>
                    @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar Saat Ini</label>
                    @if ($galeri->gambar)
                        <div>
                            <img src="{{ asset('images/galeri/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}"
                                width="150px">
                        </div>
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="gambar">Upload Gambar Baru (Opsional)</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                    @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-right">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

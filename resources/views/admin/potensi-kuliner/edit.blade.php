@extends('layouts.admin.main')

@section('title', 'Edit Potensi Kuliner')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Potensi Kuliner</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Potensi Kuliner</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.potensi-kuliner.update', $potensiKuliner->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_tempat">Nama Tempat</label>
                    <input type="text" class="form-control" id="nama_tempat" name="nama_tempat"
                        value="{{ old('nama_tempat', $potensiKuliner->nama_tempat) }}" required>
                    @error('nama_tempat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $potensiKuliner->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                        value="{{ old('lokasi', $potensiKuliner->lokasi) }}" required>
                    @error('lokasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kontak">Kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak"
                        value="{{ old('kontak', $potensiKuliner->kontak) }}" required>
                    @error('kontak')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kisaran_harga">Kisaran Harga</label>
                    <input type="text" class="form-control" id="kisaran_harga" name="kisaran_harga"
                        value="{{ old('kisaran_harga', $potensiKuliner->kisaran_harga) }}" required>
                    @error('kisaran_harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="masakan">Masakan</label>
                    <input type="text" class="form-control" id="masakan" name="masakan"
                        value="{{ old('masakan', $potensiKuliner->masakan) }}" required>
                    @error('masakan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="makanan">Makanan</label>
                    <input type="text" class="form-control" id="makanan" name="makanan"
                        value="{{ old('makanan', $potensiKuliner->makanan) }}" required>
                    @error('makanan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fitur">Fitur</label>
                    <textarea class="form-control class="form-control" id="fitur" name="fitur" required>{{ old('deskripsi', $potensiKuliner->deskripsi) }}</textarea>
                    @error('fitur')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Upload Gambar (Harus  3 gambar) & Ukuran maks 10MB</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar[]" multiple>
                    @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="mt-2">
                        <label>Gambar Saat Ini:</label>
                        <div>
                            @if ($potensiKuliner->gambar->isNotEmpty())
                                @foreach ($potensiKuliner->gambar as $gambar)
                                    <img src="{{ asset('images/potensi-kuliner/' . $gambar->file_path) }}"
                                        alt="{{ $potensiKuliner->nama_tempat }}" width="100px" class="mr-2 mb-2">
                                @endforeach
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="{{ route('admin.potensi-kuliner.index') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

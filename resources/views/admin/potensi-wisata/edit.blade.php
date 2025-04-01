@extends('layouts.admin.main')

@section('title', 'Edit Potensi Wisata')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Edit Potensi Wisata</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Potensi Wisata</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.potensi-wisata.update', $potensiWisata->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_wisata">Nama Wisata</label>
                    <input type="text" class="form-control" id="nama_wisata" name="nama_wisata"
                        value="{{ old('nama_wisata', $potensiWisata->nama_wisata) }}" required>
                    @error('nama_wisata')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $potensiWisata->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Upload Gambar (Harus 3 gambar) & Ukuran maks 10MB</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar[]" multiple>
                    @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="mt-2">
                        <label>Gambar Saat Ini:</label>
                        <div>
                            @if ($potensiWisata->gambar->isNotEmpty())
                                @foreach ($potensiWisata->gambar as $gambar)
                                    <img src="{{ asset('images/potensi-wisata/' . $gambar->file_path) }}"
                                        alt="{{ $potensiWisata->nama_wisata }}" width="100px" class="mr-2 mb-2">
                                @endforeach
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="{{ route('admin.potensi-wisata.index') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endsection

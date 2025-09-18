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
          <label class="font-weight-bold">Gambar Saat Ini</label>
          <div class="row">
            @php $paths = $galeri->image_paths ?? []; @endphp
            @forelse ($paths as $index => $path)
              <div class="col-md-3 mb-4">
                <div class="card h-100 border shadow-sm">
                  <img src="{{ asset($path) }}" class="card-img-top" style="height: 150px; object-fit: cover;">

                  <div class="card-body py-2 text-center">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="existing_images[]" value="{{ $path }}"
                        id="imageCheck{{ $index }}" checked>
                      <label class="form-check-label small text-muted" for="imageCheck{{ $index }}">
                        Gunakan gambar ini
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12">
                <p class="text-muted">Tidak ada gambar</p>
              </div>
            @endforelse
          </div>
        </div>

        <div class="form-group">
          <label for="images">Upload Gambar Baru (Bisa lebih dari satu)</label>
          <input type="file" class="form-control-file" id="images" name="images[]" multiple accept="image/*">
          @error('images.*')
            <div class="text-danger">{{ $message }}</div>
          @enderror

          <!-- Preview container -->
          <div class="row mt-3" id="preview-images"></div>
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

  <script>
    document.getElementById('images').addEventListener('change', function(e) {
      const previewContainer = document.getElementById('preview-images');
      previewContainer.innerHTML = ''; // Kosongkan preview lama

      Array.from(e.target.files).forEach(file => {
        if (!file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = function(event) {
          const col = document.createElement('div');
          col.className = 'col-md-3 mb-3';
          col.innerHTML = `
            <div class="card h-100 shadow-sm">
              <img src="${event.target.result}" class="card-img-top" style="height: 150px; object-fit: cover;">
              <div class="card-body py-2 text-center small text-muted">
                Gambar baru
              </div>
            </div>
          `;
          previewContainer.appendChild(col);
        };
        reader.readAsDataURL(file);
      });
    });
  </script>

@endsection

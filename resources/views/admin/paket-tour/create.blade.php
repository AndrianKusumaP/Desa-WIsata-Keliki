@extends('layouts.admin.main')

@section('title', 'Tambah Paket Tour')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">Tambah Paket Tour</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Paket Tour</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.paket-tour.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="nama_paket">Nama Paket</label>
          <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ old('nama_paket') }}"
            required>
          @error('nama_paket')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="isi_paket">Isi Paket</label>
          <div id="list-items">
            <input type="text" class="form-control mb-2" name="isi_paket[]" required>
          </div>
          <button type="button" class="btn btn-primary" id="add-item">Tambah Item</button>
          <button type="button" class="btn btn-danger" id="remove-item">Kurang Item</button>
          @error('isi_paket')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="harga_min">Harga Minimum</label>
          <input type="number" step="0.01" class="form-control" id="harga_min" name="harga_min"
            value="{{ old('harga_min') }}" required>
          @error('harga_min')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="harga_max">Harga Maksimum</label>
          <input type="number" step="0.01" class="form-control" id="harga_max" name="harga_max"
            value="{{ old('harga_max') }}" required>
          @error('harga_max')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- Field Sembunyikan dengan Select Option -->
        <div class="form-group">
          <label for="sembunyikan">Sembunyikan Paket</label>
          <select class="form-control" id="sembunyikan" name="sembunyikan" required>
            <option value="0" {{ old('sembunyikan') == 0 ? 'selected' : '' }}>Tidak</option>
            <option value="1" {{ old('sembunyikan') == 1 ? 'selected' : '' }}>Iya</option>
          </select>
          @error('sembunyikan')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="gambar">Upload Gambar Ukuran Maks 10MB</label>
          <input type="file" class="form-control-file" id="gambar" name="gambar" required>
          @error('gambar')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-right">
          <a href="{{ route('admin.paket-tour.index') }}" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
          <button type="submit" class="btn btn-success">
            <i class="fa fa-plus"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- JavaScript untuk menambahkan input dinamis -->
  <script>
    document.getElementById('add-item').addEventListener('click', function() {
      var newItem = document.createElement('input');
      newItem.type = 'text';
      newItem.name = 'isi_paket[]';
      newItem.className = 'form-control mb-2';
      document.getElementById('list-items').appendChild(newItem);
    });

    document.getElementById('remove-item').addEventListener('click', function() {
      var itemList = document.getElementById('list-items');
      var inputs = itemList.getElementsByTagName('input');
      if (inputs.length > 1) {
        itemList.removeChild(inputs[inputs.length - 1]);
      }
    });
  </script>
@endsection

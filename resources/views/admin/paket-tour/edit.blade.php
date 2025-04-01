@extends('layouts.admin.main')

@section('title', 'Edit Paket Tour')

@section('content')
  <h1 class="h3 mb-2 text-gray-800">Edit Paket Tour</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Paket Tour</h6>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.paket-tour.update', $paketTour->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="nama_paket">Nama Paket</label>
          <input type="text" class="form-control" id="nama_paket" name="nama_paket"
            value="{{ old('nama_paket', $paketTour->nama_paket) }}" required>
          @error('nama_paket')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="isi_paket">Isi Paket</label>
          <!-- Input list item -->
          <div id="list-items">
            @php
              $isiPaket = json_decode($paketTour->isi_paket, true);
            @endphp
            @foreach ($isiPaket as $item)
              <input type="text" class="form-control mb-2" name="isi_paket[]" value="{{ $item }}" required>
            @endforeach
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
            value="{{ old('harga_min', $paketTour->harga_min) }}" required>
          @error('harga_min')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="harga_max">Harga Maksimum</label>
          <input type="number" step="0.01" class="form-control" id="harga_max" name="harga_max"
            value="{{ old('harga_max', $paketTour->harga_max) }}" required>
          @error('harga_max')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="sembunyikan">Sembunyikan Paket</label>
          <select class="form-control" id="sembunyikan" name="sembunyikan" required>
            <option value="0" {{ old('sembunyikan', $paketTour->sembunyikan) == 0 ? 'selected' : '' }}>Tidak
            </option>
            <option value="1" {{ old('sembunyikan', $paketTour->sembunyikan) == 1 ? 'selected' : '' }}>Iya</option>
          </select>
          @error('sembunyikan')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="gambar">Gambar Saat Ini</label>
          @if ($paketTour->gambar)
            <div>
              <img src="{{ asset('images/paket-tour/' . $paketTour->gambar) }}" alt="{{ $paketTour->nama_paket }}"
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
          <a href="{{ route('admin.paket-tour.index') }}" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
          <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Perbarui
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

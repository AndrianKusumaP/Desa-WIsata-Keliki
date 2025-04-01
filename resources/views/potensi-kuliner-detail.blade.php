<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', $potensiKuliner->nama_tempat)

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center h-50">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Potensi Kuliner</h1>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Detail Potensi Kuliner -->
<div id="detail-kuliner">
    <div class="container pt-3">
        <h1 class="main-title fw-bold">{{ $potensiKuliner->nama_tempat }}</h1>
        <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
            <div class="progress-bar bg-warning" style="width: 64%"></div>
            <div class="progress-bar bg-primary" style="width: 36%"></div>
        </div>
        <div class="row image-container pt-4">
            <div class="col-md-7 main-image">
                <!-- Tampilkan gambar utama -->
                @if ($potensiKuliner->gambar->isNotEmpty())
                    <img alt="{{ $potensiKuliner->nama_tempat }}"
                        src="{{ asset('images/potensi-kuliner/' . $potensiKuliner->gambar->first()->file_path) }}" />
                @else
                    <img alt="No Image Available" src="https://via.placeholder.com/600x400?text=No+Image" />
                @endif
            </div>
            <div class="col-md-5 side-images">
                <!-- Tampilkan gambar lainnya -->
                @if ($potensiKuliner->gambar->count() > 1)
                    @foreach ($potensiKuliner->gambar->skip(1) as $gambar)
                        <img alt="Additional image of {{ $potensiKuliner->nama_tempat }}"
                            src="{{ asset('images/potensi-kuliner/' . $gambar->file_path) }}" />
                    @endforeach
                @else
                    <img alt="No Image Available" src="https://via.placeholder.com/300x200?text=No+Image" />
                @endif
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header green">
                        Deskripsi &amp; Kontak
                    </div>
                    <div class="card-body">
                        <p><strong>Tentang</strong></p>
                        <p>{{ $potensiKuliner->deskripsi }}</p>

                        <p><strong>Lokasi</strong></p>
                        <p>
                            {{ $potensiKuliner->lokasi }}
                        </p>

                        <p><strong>No Handphone</strong></p>
                        <p>{{ $potensiKuliner->kontak }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header green">Rincian</div>
                    <div class="card-body">
                        <p><strong>Kisaran Harga</strong></p>
                        <p>{{ $potensiKuliner->kisaran_harga }}</p>

                        <p><strong>Masakan</strong></p>
                        <p>{{ $potensiKuliner->masakan }}</p>

                        <p><strong>Makanan</strong></p>
                        <p>{{ $potensiKuliner->makanan }}</p>

                        <p><strong>Fitur</strong></p>
                        <p>{{ $potensiKuliner->fitur }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail Potensi Kuliner End -->

@include('templates.footer')

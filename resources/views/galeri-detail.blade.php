<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', $galeri->judul)

<!-- Hero Section -->
<section id="hero">
  <div class="hero-section d-flex align-items-center justify-content-center text-white text-center h-50">
    <div class="hero-overlay"></div>
    <div class="container position-relative col-md-8 offset-md-2">
      <h1 class="display-3 fw-bold">{{ $galeri->judul }}</h1>
      <p class="lead fs-5">
        {{ $galeri->judul }}
      </p>
    </div>
  </div>
</section>
<!-- Hero Section End -->

<!-- Galeri Section -->
<div id="galeri">
  <div class="container py-6 overflow-hidden py-3">
    <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        @php
          $paths = $galeri->image_paths ?? [];
        @endphp

        @forelse ($paths as $path)
          <div class="swiper-slide">
            <div class="gallery">
              <img alt="{{ $galeri->judul }}" src="{{ asset($path) }}" class="img-fluid"
                style="width: 550px; height: 250px; object-fit: cover;" />
            </div>
          </div>
        @empty
          <p class="text-muted">Tidak ada gambar untuk ditampilkan.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
<!-- Galeri Section End -->

@include('templates.footer')

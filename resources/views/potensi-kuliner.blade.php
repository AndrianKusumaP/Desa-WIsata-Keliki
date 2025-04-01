<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', 'Potensi Desa')

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Desa Kuliner</h1>
            <p class="lead fs-5">
                Jelajahi beragam pilihan kuliner di Desa Keliki melalui restoran dan warung makan lokal yang menyajikan
                hidangan autentik Bali. Setiap restoran menawarkan suasana yang nyaman dengan pemandangan alam yang
                memukau, sehingga Anda bisa menikmati makanan lezat sambil merasakan keindahan sekitar. Mulai dari
                masakan tradisional Bali hingga menu fusion modern, destinasi kuliner di Desa Keliki memberikan
                pengalaman yang memanjakan selera. Temukan tempat makan favorit Anda, dari restoran dengan menu lokal
                khas hingga spot tersembunyi yang menawarkan masakan otentik buatan tangan penduduk setempat. 
            </p>
        </div>
    </div>
</section>
<!-- Hero Section End -->


<!-- Desa kuliner section -->
<div id="desa-kuliner">
    <div class="container py-5">
        <div class="row">
            @foreach ($potensiKuliner as $kuliner)
                <div class="col-md-4 mb-4">
                    <div class="card d-flex flex-column h-100">
                        @if ($kuliner->gambar->isNotEmpty())
                            <img src="{{ asset('images/potensi-kuliner/' . $kuliner->gambar->first()->file_path) }}"
                                class="card-img-top" alt="{{ $kuliner->nama_tempat }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top"
                                alt="No Image Available">
                        @endif
                        <div class="card-body d-flex flex-column flex-grow-1 justify-content-between">
                            <h5 class="card-title">{{ $kuliner->nama_tempat }}</h5>
                            <p class="card-text">{{ Str::limit($kuliner->deskripsi, 100) }}</p>
                            <a href="{{ route('potensi-kuliner-detail', $kuliner->slug) }}" class="card-link">Learn More
                                <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Desa kuliner section end -->

@include('templates.footer')

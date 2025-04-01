<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', 'Potensi Desa')

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Desa Wisata</h1>
            <p class="lead fs-5">
                Desa Wisata Keliki adalah destinasi unik di Ubud, Bali, yang menawarkan perpaduan keindahan alam dan
                budaya lokal. Kami berkomitmen memberikan pengalaman otentik melalui berbagai paket wisata, sambil
                menjaga kelestarian lingkungan dan tradisi desa.
            </p>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Potensi Desa  -->
<div id="potensi">
    <div class="container py-5">
        <div class="row">
            @foreach ($potensiWisata as $wisata)
                <div class="col-md-4 mb-4">
                    <div class="card d-flex flex-column h-100">
                        @if ($wisata->gambar->isNotEmpty())
                            <img src="{{ asset('images/potensi-wisata/' . $wisata->gambar->first()->file_path) }}"
                                class="card-img-top" alt="{{ $wisata->nama_wisata }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top"
                                alt="No Image Available">
                        @endif
                        <div class="card-body d-flex flex-column flex-grow-1 justify-content-between">
                            <h5 class="card-title">{{ $wisata->nama_wisata }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($wisata->deskripsi), 100) }}</p>
                            <a href="{{ route('potensi-wisata-detail', $wisata->slug) }}" class="card-link">Learn More
                                <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Potensi Desa End -->

@include('templates.footer')

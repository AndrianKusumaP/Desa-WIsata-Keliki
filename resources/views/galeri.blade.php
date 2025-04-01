<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', 'Galeri')

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Galeri</h1>
            <p class="lead fs-5">
                Selamat datang di Galeri Desa Keliki! Di sini, Anda bisa menikmati koleksi foto dan video yang
                menampilkan keindahan alam dan budaya yang unik. Lihatlah pemandangan sawah terasering, karya seni
                tradisional, dan momen-momen berharga dari kehidupan sehari-hari penduduk desa. Kami menghadirkan potret
                keajaiban Desa Keliki yang akan membuat Anda semakin ingin mengunjunginya. Jelajahi galeri ini untuk
                merasakan pesona Keliki sebelum Anda datang langsung!
            </p>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Galeri Section -->
<div id="galeri">
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach ($galeri as $item)
                <div class="col">
                    <div class="card image-card">
                        <!-- Tampilkan gambar galeri -->
                        <img src="{{ asset('images/galeri/' . $item->gambar) }}" alt="{{ $item->judul }}">

                        <div class="overlay">
                            <h3>{{ $item->judul }}</h3>
                            <p>{{ Str::limit($item->deskripsi, 100) }}</p> <!-- Batasi deskripsi hingga 100 karakter -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Galeri Section End -->

@include('templates.footer')

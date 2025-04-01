<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', 'Artikel')

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Artikel</h1>
            <p class="lead fs-5">
                Temukan cerita dan inspirasi dari Desa Keliki melalui berbagai artikel menarik! Kami menyajikan
                tulisan-tulisan tentang sejarah, tradisi, seni, dan budaya yang melekat dalam kehidupan masyarakat desa
                ini. Pelajari lebih lanjut tentang warisan seni lukis miniatur khas Keliki, festival tahunan, dan
                perkembangan pariwisata berbasis komunitas yang menjaga kelestarian alam dan budaya. Di sini, Anda juga
                dapat menemukan tips perjalanan dan panduan wisata untuk memaksimalkan kunjungan Anda ke Desa Keliki.
            </p>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Berita Section -->
<div id="berita">
    <div class="container py-4">
        @foreach ($artikels as $artikel)
            <div class="card my-4">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-4 img-container">
                        <img src="{{ asset('images/artikel/' . $artikel->gambar) }}" class="img-fluid"
                            alt="Gambar Artikel {{ $artikel->judul }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $artikel->judul }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($artikel->isi), 250, '...') }}</p>
                            <a href="{{ route('artikel-detail', $artikel->slug) }}" class="card-link">
                                Learn More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Berita Section End -->

@include('templates.footer')

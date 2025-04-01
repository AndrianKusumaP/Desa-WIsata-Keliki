<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', $artikel->judul)
@section('description', \Illuminate\Support\Str::words($artikel->isi, 50))

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center h-50">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Artikel Wisata Keliki</h1>
        </div>
    </div>
</section>
<!-- Hero Section End -->


<!-- Artikel -->
<div id="artikel-detail">
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <!-- Judul Artikel -->
            <h1 class="display-4 fw-bold">{{ $artikel->judul }}</h1>

            <!-- Tanggal Artikel -->
            <p class="muted-text article-date">{{ \Carbon\Carbon::parse($artikel->tanggal)->format('d F Y') }}</p>

            <!-- Gambar Artikel -->
            <div class="text-center my-4">
                <img src="{{ asset('images/artikel/' . $artikel->gambar) }}" class="img-fluid"
                    alt="Gambar {{ $artikel->judul }}">
            </div>

            <!-- Isi Artikel -->
            <div class="mt-4">
                <p class="fs-5" style="text-align: justify;">{!! $artikel->isi !!}</p>
            </div>
        </div>
    </div>
</div>
<!-- Artikel End -->

@include('templates.footer')

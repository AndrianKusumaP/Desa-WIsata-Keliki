<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', $potensiWisata->nama_wisata)

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center h-50">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Potensi Wisata</h1>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Detail Potensi Wisata -->
<div id="detail-wisata">
    <div class="container pt-3">
        <h1 class="main-title fw-bold">{{ $potensiWisata->nama_wisata }}</h1>
        <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
            <div class="progress-bar bg-warning" style="width: 64%"></div>
            <div class="progress-bar bg-primary" style="width: 36%"></div>
        </div>
        <div class="row image-container pt-4">
            <div class="col-md-7 main-image">
                <!-- Tampilkan gambar utama -->
                @if ($potensiWisata->gambar->isNotEmpty())
                    <img alt="{{ $potensiWisata->nama_wisata }}"
                        src="{{ asset('images/potensi-wisata/' . $potensiWisata->gambar->first()->file_path) }}" />
                @else
                    <img alt="No Image Available" src="https://via.placeholder.com/600x400?text=No+Image" />
                @endif
            </div>
            <div class="col-md-5 side-images">
                <!-- Tampilkan gambar lainnya -->
                @if ($potensiWisata->gambar->count() > 1)
                    @foreach ($potensiWisata->gambar->skip(1) as $gambar)
                        <img alt="Additional image of {{ $potensiWisata->nama_wisata }}"
                            src="{{ asset('images/potensi-wisata/' . $gambar->file_path) }}" />
                    @endforeach
                @else
                    <img alt="No Image Available" src="https://via.placeholder.com/300x200?text=No+Image" />
                @endif
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header green">
                        Detail Potensi Wisata
                    </div>
                    <div class="card-body">
                        <p><strong>Deskripsi</strong></p>
                        <p>{!! $potensiWisata->deskripsi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Detail Potensi Wisata End -->

@include('templates.footer')

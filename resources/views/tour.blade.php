<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', 'Paket Tour')

<!-- Hero Section -->
<section id="hero">
  <div class="hero-section d-flex align-items-center justify-content-center text-white text-center">
    <div class="hero-overlay"></div>
    <div class="container position-relative col-md-8 offset-md-2">
      <h1 class="display-3 fw-bold">Paket Tour</h1>
      <p class="lead fs-5">
        Rencanakan petualangan Anda di Desa Keliki dengan berbagai pilihan paket wisata yang kami tawarkan.
        Mulai dari trekking melintasi sawah yang hijau, tur seni lukis di studio seniman lokal, hingga workshop
        kerajinan tangan, setiap paket dirancang untuk memberikan pengalaman mendalam dan autentik. Kami juga
        menyediakan paket khusus yang mengajak Anda berinteraksi langsung dengan penduduk desa, sehingga Anda
        bisa merasakan hangatnya kebudayaan dan tradisi Keliki. Pilih paket yang sesuai dan nikmati liburan yang
        tak terlupakan di Desa Keliki!
      </p>
    </div>
  </div>
</section>
<!-- Hero Section End -->

<!-- Paket Tour Section -->
<div id="paket-tour">
  <div class="container">
    <div class="row text-center my-5">
      <div class="col">
        <h2 class="fw-bold">Paket Tour</h2>
        <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 12rem">
          <div class="progress-bar bg-warning" style="width: 64%"></div>
          <div class="progress-bar bg-primary" style="width: 36%"></div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center pb-4">
      @foreach ($paketTour as $paket)
        <!-- Cek jika sembunyikan = 0 (tidak disembunyikan) -->
        @if ($paket->sembunyikan == 0)
          <div class="col-md-4 mb-4">
            <div class="card card-custom">
              <!-- Gambar dari database -->
              <img src="{{ asset('images/paket-tour/' . $paket->gambar) }}" class="card-img-top"
                alt="{{ $paket->nama_paket }}">
              <div class="card-body text-center">
                <h5 class="card-title fw-bold">{{ $paket->nama_paket }}</h5>
                <p class="text-success fw-bold">
                  Rp. {{ number_format($paket->harga_min, 0, ',', '.') }} -
                  Rp. {{ number_format($paket->harga_max, 0, ',', '.') }}
                </p>
                <hr>
                <h6 class="mb-4">Yang Didapatkan</h6>
                <ul class="list-unstyled">
                  @php
                    // Decode isi_paket JSON dari database
                    $isiPaket = json_decode($paket->isi_paket);
                  @endphp
                  @foreach ($isiPaket as $item)
                    <li class="mb-3">&bull; {{ $item }}</li>
                  @endforeach
                </ul>
              </div>
              <a href="https://wa.me/6282237787222?text=Saya%20ingin%20memesan%20paket%20wisata"
                class="btn btn-custom w-100" target="_blank">
                Pilih Ini
              </a>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</div>
<!-- Paket Tour Section End -->

@include('templates.footer')

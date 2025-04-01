<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap"rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- SweetAlert2 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.css" rel="stylesheet">

    <title>@yield('title') | Desa Wisata Keliki</title>
    <meta name="description" content="@yield('description')" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark p-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand fs-3 fw-bold" href="{{ url('/') }}">Desa Keliki</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item fs-5 mx-2">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item fs-5 mx-2">
                        <a class="nav-link {{ Request::is('profil') ? 'active' : '' }}"
                            href="{{ url('/profil') }}">Profil</a>
                    </li>
                    <li class="nav-item dropdown fs-5 mx-2">
                        <a class="nav-link dropdown-toggle {{ Request::is('potensi-wisata') || Request::is('potensi-kuliner') ? 'active' : '' }}"
                            href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Potensi Desa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/potensi-wisata') }}">Desa Wisata</a></li>
                            <li><a class="dropdown-item" href="{{ url('/potensi-kuliner') }}">Desa Kuliner</a></li>
                        </ul>
                    </li>
                    <li class="nav-item fs-5 mx-2">
                        <a class="nav-link {{ Request::is('tour') ? 'active' : '' }}" href="{{ url('/tour') }}">Paket
                            Tour</a>
                    </li>
                    <li class="nav-item fs-5 mx-2">
                        <a class="nav-link {{ Request::is('galeri') ? 'active' : '' }}"
                            href="{{ url('/galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item fs-5 mx-2">
                        <a class="nav-link {{ Request::is('artikel') ? 'active' : '' }}"
                            href="{{ url('/artikel') }}">Artikel</a>
                    </li>
                </ul>

                <div>
                    <a href="{{ url('/login') }}" class="btn-login">Masuk</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

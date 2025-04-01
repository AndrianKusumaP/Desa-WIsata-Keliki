<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', 'Profil')

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Profil Kami</h1>
            <p class="lead fs-5">
                Menyampaikan Cerita dan Nilai di Balik Desa Keliki! Kami adalah sekelompok individu yang berkomitmen
                memperkenalkan keindahan dan kearifan Desa Keliki. Tim kami terdiri dari pecinta alam dan penggiat
                budaya yang menjaga warisan unik desa ini. Melalui inisiatif kami, Desa Keliki menawarkan keindahan alam
                serta pengalaman budaya yang mendalam, dengan kerja sama bersama masyarakat lokal untuk memastikan
                pengunjung merasakan kehangatan penduduk setempat. Bergabunglah bersama kami dalam menjelajahi keajaiban
                Desa Keliki! </p>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Sejarah -->
<div id="sejarah">
    <div class="container">
        <div class="row text-center my-5">
            <div class="col">
                <h2 class="fw-bold">Sejarah Desa Keliki</h2>
                <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
                    <div class="progress-bar bg-warning" style="width: 64%"></div>
                    <div class="progress-bar bg-primary" style="width: 36%"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-11">
                <p class="fs-5 text-center">
                    Sejarah Desa Keliki adalah tidak banyak tertuang di prasasti ataupun Babad kono, akan tetapi dapat
                    di tulis sejarah desa dari beberapa Lontar dan juga cerita orang – orang yang bisa
                    dipertanggungjawabkan ceritanya, Konon Pada Zaman perjalanan Maha Resi Markandya ke Bali, ada
                    daratan yang membentang dari Desa Taro ke Campuan Ubud yang diapit Sungai Wos, salah satu daratan
                    yang dilalui dari Pura Campuhan Ubud menuju Taro adalah sangat mirip dengan semut hitam dan di beri
                    nama Bangkiang Sidem, dari tempat itu Resi Markandya kembali melakukan perjalanan kearah Utara dan
                    menemukan tempat yang penuh dengan Hutan belantara, dan di hutan tersebut di bangun Pura Jemeng di
                    daerah Sebali atau Desa Yadnya.
                    <br>
                    <br>
                    Hutan yang dilalui banyak sekali tumbuhan pepohinan salah satu pohon yang memancarkan sinar adalah
                    pohon jarak dan diberi nama Pejarakan, dan saat ini tempat itu disebut Keliki, di tempat ini beliau
                    membuat suatu pertanda tentang perjalanan beliau dengan sebuah batu yang sampai saat ini masih
                    disucikan oleh Masyarakat setempat dan disebut Ratu Lingsir yang ada di antara Desa Kelusa dan Desa
                    Keliki sekarang. Pada Zaman Kerajaan Menguwi ditunjuklah Pasek Aan yang dikenal dengan nama Pasek
                    batu Melumut memimpin Masyarakat Pejarakan, dan membangun infrastruktur seperti Pemerintahan, Subak
                    dan sebagainya. Seperti Subak Tain kambingyang ada seperti sekarang.
                    <br>
                    <br>
                    Pada Zaman Kerajaan ini sering terjadi beberapa perluasan Daerah termasuk kerajaan Gianyar,
                    sedangkan Desa Pejarakan pada saat itu diserang oleh Raja Gianyar dengan pemimpin pasukan I Dewa
                    Kelikiyang dibantu Desa lain di Tegallalang, Seperti Pejengaji, Gagah dan lainnya sehingga pasukan
                    Mengwi di Pejarakan dapat dikalahkan, dan tempat I Dewa Keliki menyusun kekuatan disebut Pura Indra
                    Kila dan Desa Pejarakan di rubah namannya sesuai sesuai dengan yang mengalahkan yaitu Dewa Keliki
                    sekitar Tahun 1678, dan sampai sekarang Desa itu disebut Desa Keliki.
                </p>
            </div>
        </div>
    </div>

    <!-- Add Video Section -->
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="video-container mb-4">
                    <iframe width="100%" height="350"
                        src="https://www.youtube.com/embed/fQVQiUAU0VU?si=7D7hlHYaou0O5yGq" title="Sejarah Desa Keliki"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Section End -->

    <div class="container py-4 overflow-hidden">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                @if ($potensiKuliner && $potensiKuliner->count() > 0)
                    @foreach ($potensiKuliner->take(6) as $kuliner)
                        <div class="swiper-slide">
                            <div class="wisata-card">
                                <img alt="{{ $kuliner->nama_tempat }}"
                                    src="{{ asset('images/potensi-kuliner/' . $kuliner->gambar->first()->file_path) }}"
                                    class="img-fluid" />
                                <div class="caption">{{ $kuliner->nama_tempat }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Tidak data yang ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Sejarah End -->

<!-- Visi & Misi -->
<div id="visi-misi">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-7">
                <h1>Visi</h1>
                <p>TERWUJUDNYA MASYARAKAT DESA KELIKI YANG SEJAHTERA, ADIL DAN MAKMUR YANG BERBASIS PERTANIAN YANG
                    DIJIWAI TRI HITA KARANA</p>
                <h1>Misi</h1>
                <ol>
                    <li>Meningkatkan ketahanan ekonomi dengan menggalakkan usaha ekonomi kerakyatan, melalui program
                        strategis di bidang produksi pertanian, pemasaran, koperasi, usaha kecil dan menengah serta
                        koperasi.</li>
                    <li>Meningkatkan kualitas sumber daya manusia melalui program pendidikan dan program kesehatan serta
                        pengamalan ajaran agama kepada masyarakat sesuai falsafah Tri Hita Karana</li>
                    <li>Meningkatkan partisipasi masyarakat dalam pembangunan, sehingga dapat menumbuhkembangkan
                        kesadaran dan kemandirian dalam pembangunan desa yang berkelanjutan.</li>
                    <li>Menggali, melestarikan dan mengembangkan nilai – nilai budaya desa.</li>
                    <li>Meningkatkan pelayanan kepada masyarakat dan meningkatkan kerjasama antar lembaga pemerintahan
                        desa dengan lembaga adat.</li>
                    <li>Menciptakan suasana aman dan tertib dalam kehidupan bermasyarakat.</li>
                    <li>Memberdayakan masyarakat menuju masyarakat mandiri.</li>
                </ol>
            </div>
            <div class="col-md-5 image-container text-center">
                <img src="{{ asset('images/profil/person.png') }}" alt="Person" class="img-fluid mb-3" />
            </div>
        </div>
    </div>
</div>

<!-- Visi & Misi End -->
@include('templates.footer')

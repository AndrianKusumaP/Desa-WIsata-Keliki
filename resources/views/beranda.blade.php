<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
@extends('templates.header')

@section('title', 'Beranda')
@section('description', 'Desa wisata keliki merupakan salah satu desa yang memiliki berbagai macam potensi wisata yang dapat dikunjungi bagi pengunjung domestik maupun internasional')

<!-- Hero Section -->
<section id="hero">
    <div class="hero-section d-flex align-items-center justify-content-center text-white text-center">
        <div class="hero-overlay"></div>
        <div class="container position-relative col-md-8 offset-md-2">
            <h1 class="display-3 fw-bold">Desa Wisata Keliki</h1>
            <p class="lead fs-5">
                Surga Tersembunyi di Bali yang Menawarkan Keindahan Alam dan Budaya yang Kental! Terletak di jantung
                Bali, Desa Keliki mempesona dengan sawah hijau dan perbukitan yang
                indah. Desa ini adalah tempat sempurna untuk melarikan diri dari keramaian, sambil menikmati tradisi
                lokal dan seni lukis yang kaya. Temukan pengalaman otentik dan
                berkesan di Desa Keliki, destinasi menarik bagi setiap pengunjung!
            </p>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row text-center my-5">
            <div class="col">
                <h2>Desa Wisata Keliki</h2>
                <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
                    <div class="progress-bar bg-warning" style="width: 64%"></div>
                    <div class="progress-bar bg-primary" style="width: 36%"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <p class="fs-5 text-center">
                    Selamat Datang di Desa Wisata Keliki Desa Keliki, yang terletak di kawasan Ubud, Bali,
                    menawarkan keindahan alam pedesaan yang asri serta kekayaan budaya lokal yang
                    memikat. Dikelilingi oleh persawahan hijau dan hutan tropis, desa ini memberikan pengalaman yang
                    tenang dan otentik bagi para wisatawan yang mencari kedamaian di
                    tengah nuansa tradisional Bali. Selain keindahan alamnya, Desa Keliki juga dikenal dengan seni
                    lukis miniatur yang unik dan kaya akan nilai budaya. Pengunjung dapat
                    mengikuti berbagai kegiatan menarik seperti trekking, belajar menanam padi, atau berpartisipasi
                    dalam lokakarya seni dan kerajinan khas Bali, semuanya dipandu oleh
                    penduduk lokal yang ramah. Desa Keliki adalah tempat yang sempurna untuk merasakan harmoni
                    antara alam dan budaya.
                </p>
            </div>
        </div>
    </div>
    <div class="container py-4 overflow-hidden">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                @if ($potensiWisata && $potensiWisata->count() > 0)
                    @foreach ($potensiWisata->take(6) as $wisata)
                        <div class="swiper-slide">
                            <div class="wisata-card">
                                <img alt="{{ $wisata->nama_wisata }}"
                                    src="{{ asset('images/potensi-wisata/' . $wisata->gambar->first()->file_path) }}"
                                    class="img-fluid" />
                                <div class="caption">{{ $wisata->nama_wisata }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Tidak data yang ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<div>
    <div class="container">
        <div class="row text-center my-5">
            <div class="col">
                <a href="http://yayasangumanti.com" target="_blank" style="text-decoration: none;"
                    onmouseover="this.style.color='#008100'" onmouseout="this.style.color='inherit'">
                    <h2>Yayasan Gumanti Alam Rahayu</h2>
                </a>
                <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
                    <div class="progress-bar bg-warning" style="width: 64%"></div>
                    <div class="progress-bar bg-primary" style="width: 36%"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 col-12 text-center mb-3">
                <img src="{{ asset('images/beranda/yayasan-gumanti-alam-rahayu.png') }}"
                     alt="yayasan gumanti alam rahayu" class="img-fluid">
            </div>
            <div class="col-md-3 col-12 text-center">
                <img src="{{ asset('images/beranda/desa-keliki.jpg') }}" 
                     alt="desa keliki" class="img-fluid" style="width: 58%">
            </div>
            <div class="col-11">
                <p class="fs-5 text-center">
                    Desa Keliki dinaungi oleh Yayasan Gumanti Alam Rahayu, sebuah organisasi nirlaba yang berdedikasi
                    untuk meningkatkan kualitas pendidikan dan pengembangan karakter anak-anak di desa-desa Bali.
                    Yayasan ini memiliki visi untuk membentuk generasi muda yang berkarakter kuat, berbudi luhur, sadar
                    lingkungan, dan terampil dalam berbagai bidang. Melalui program pendidikan formal yang menyenangkan,
                    yayasan berusaha menyediakan akses pendidikan yang setara, sambil menanamkan nilai-nilai positif
                    melalui pelatihan karakter dan kegiatan pengembangan diri.
                    <br>
                    Selain pendidikan formal, Yayasan Gumanti Alam Rahayu juga berfokus pada peningkatan kesadaran
                    lingkungan dan pengembangan minat serta bakat anak-anak. Berbagai kegiatan lingkungan, seperti
                    penanaman pohon dan daur ulang, dilaksanakan untuk menumbuhkan kepedulian terhadap alam sejak dini.
                    Selain itu, yayasan menyelenggarakan beragam kegiatan ekstrakurikuler secara gratis untuk mendukung
                    minat dan bakat anak-anak, mulai dari seni hingga olahraga dan keterampilan kreatif lainnya,
                    sehingga mereka dapat berkembang menjadi generasi yang siap menghadapi masa depan.
                </p>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="container">
        <div class="row text-center my-5">
            <div class="col">
                <h2>Pertamina Patra Niaga</h2>
                <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
                    <div class="progress-bar bg-warning" style="width: 64%"></div>
                    <div class="progress-bar bg-primary" style="width: 36%"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 col-6 text-center">
                <img src="{{ asset('images/beranda/pertamina.png') }}" alt="pertamina" class="img-fluid" style="width: 60%">
            </div>
            <div class="col-11 pt-3">
                <p class="fs-5 text-center">
                    Desa Keliki dengan bangga menjalin kerja sama strategis dengan PT Pertamina dalam upaya mendorong
                    kemajuan dan kesejahteraan masyarakat desa. Melalui kolaborasi ini, berbagai program pengembangan
                    disusun secara terpadu untuk meningkatkan kualitas hidup dan memberdayakan warga setempat. PT
                    Pertamina, sebagai perusahaan energi terkemuka, berperan aktif dalam menghadirkan program-program
                    yang mendukung pembangunan berkelanjutan di Desa Keliki, termasuk pelatihan keterampilan bagi pemuda
                    dan kaum perempuan, pengembangan infrastruktur desa, serta peningkatan akses terhadap energi yang
                    ramah lingkungan.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Wisata & kuliner section -->
<div id="wisata-kuliner">
    <div class="container">
        <div class="row text-center my-5">
            <div class="col">
                <h2>Wisata dan Kuliner</h2>
                <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
                    <div class="progress-bar bg-warning" style="width: 64%"></div>
                    <div class="progress-bar bg-primary" style="width: 36%"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 fs-5 text-center">
                <p>
                    Desa Keliki menawarkan berbagai paket wisata menarik yang memberikan pengalaman unik bagi para
                    pengunjung. Dari keindahan alam hingga kekayaan budayanya, setiap paket
                    dirancang untuk memenuhi berbagai minat. Berikut adalah beberapa paket wisata pilihan yang
                    tersedia di Desa Keliki.
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 mb-4">
                <div class="wisata-kuliner-card h-100 d-flex flex-column">
                    <img alt="People standing in front of a large stone sculpture of an animal's mouth"
                        class="card-img-top" height="400" src="{{ asset('images/beranda/daftar-wisata.png') }}"
                        width="600" style="object-fit: cover" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Daftar Wisata</h5>
                        <p class="card-text">
                            Jelajahi keindahan Desa Keliki dengan daftar eksklusif paket wisata kami yang menanti
                            untuk memberikan pengalaman tak terlupakan. Berikut ini adalah beberapa
                            pilihan yang dapat Anda nikmati.
                        </p>
                        <div class="mt-auto">
                            <a class="learn-more" href="{{ url('/potensi-wisata') }}">
                                Learn More
                                <i class="fas fa-arrow-right"> </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="wisata-kuliner-card h-100 d-flex flex-column">
                    <img alt="Hand holding a slice of pizza with a glass of drink in the background"
                        class="card-img-top" height="400" src="{{ asset('images/beranda/daftar-kuliner.png') }}"
                        width="600" style="object-fit: cover" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Daftar Kuliner</h5>
                        <p class="card-text">Siapkan selera Anda untuk menjelajahi kelezatan kuliner khas Desa
                            Keliki! Berikut adalah beberapa hidangan unik yang wajib dicoba.</p>
                        <div class="mt-auto">
                            <a class="learn-more" href="{{ url('/potensi-kuliner') }}">
                                Learn More
                                <i class="fas fa-arrow-right"> </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wisata & kuliner section end -->

<!-- Contact section -->
<div id="contact">
    <div class="container p-5">
        <div class="row text-center my-5 mt-0">
            <div class="col">
                <h2>Hubungi Kami</h2>
                <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 15rem">
                    <div class="progress-bar bg-warning" style="width: 64%"></div>
                    <div class="progress-bar bg-primary" style="width: 36%"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 fs-5 text-center">
                <p>
                    Hubungi kami untuk informasi lebih lanjut tentang wisata dan keindahan Desa Wisata Keliki. Kami
                    siap membantu menjawab pertanyaan Anda dan memastikan pengalaman
                    wisata Anda berjalan lancar.
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31572.000190251743!2d115.23975937840916!3d-8.450657011670156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd222b8409c5ddf%3A0x5030bfbca830fd0!2sKeliki%2C%20Kec.%20Tegallalang%2C%20Kabupaten%20Gianyar%2C%20Bali!5e0!3m2!1sid!2sid!4v1728666054766!5m2!1sid!2sid"
                    class="w-100" height="400"
                    style="border: 0; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1)"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <form action="{{ route('pesan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" id="name" name="nama" type="text" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone">Telephone</label>
                        <input class="form-control" id="phone" name="nomor_telepon" type="text" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-control" id="message" name="pesan" rows="4" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<!-- Gallery section -->
<div id="gallery">
    <div class="container">
        <div class="row text-center my-5">
            <div class="col">
                <h2>Galeri Desa Wisata Keliki</h2>
                <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
                    <div class="progress-bar bg-warning" style="width: 64%"></div>
                    <div class="progress-bar bg-primary" style="width: 36%"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 fs-5 text-center">
                <p>
                    Jelajahi Galeri kami untuk melihat keindahan Desa Wisata Keliki. Temukan momen-momen menakjubkan
                    dari alam pedesaan, budaya lokal, dan pengalaman wisata yang bisa
                    Anda nikmati di sini.
                </p>
            </div>
        </div>
    </div>
    @if ($galeriPertama->isNotEmpty())
        <div class="container py-6 overflow-hidden pt-3">
            <div class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($galeriPertama as $item)
                        <div class="swiper-slide">
                            <div class="gallery">
                                <img alt="{{ $item->judul }}" src="{{ asset('images/galeri/' . $item->gambar) }}"
                                    class="img-fluid" style="width: 550px; height: 250px" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($galeriKedua->isNotEmpty())
        <div class="container py-6 overflow-hidden pt-3">
            <div class="swiper-container myGallerySwiper">
                <div class="swiper-wrapper">
                    @foreach ($galeriKedua as $item)
                        <div class="swiper-slide">
                            <div class="gallery">
                                <img alt="{{ $item->judul }}" src="{{ asset('images/galeri/' . $item->gambar) }}"
                                    class="img-fluid" style="width: 550px; height: 250px" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
<!-- Gallery section End -->

<!-- Berita section -->
<div id="berita">
    <div class="container pb-5">
        <div class="row text-center my-5">
            <div class="col">
                <h2>Artikel Desa Wisata Keliki</h2>
                <div class="progress mx-auto" style="height: 4px; border-radius: 2px; width: 18rem">
                    <div class="progress-bar bg-warning" style="width: 64%"></div>
                    <div class="progress-bar bg-primary" style="width: 36%"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 fs-5 text-center">
                <p>
                    Temukan berbagai berita terbaru dan menarik seputar Desa Keliki dalam kumpulan informasi kami.
                    Dapatkan wawasan mendalam tentang kegiatan, budaya, dan perkembangan
                    terbaru di desa kami!
                </p>
            </div>
        </div>
        <div class="row pt-4">
            @if ($artikels && $artikels->count() > 0)
                @foreach ($artikels->take(3) as $artikel)
                    <div class="col-12 col-sm-6 col-md-4 pb-3">
                        <div class="berita-card">
                            <img alt="Gambar Artikel {{ $artikel->judul }}" class="card-img-top img-fluid"
                                src="{{ asset('images/artikel/' . $artikel->gambar) }}"
                                style="object-fit: cover; height: 200px; width: 100%;" />
                            <div class="berita-card-body">
                                <h5 class="berita-card-title">{{ $artikel->judul }}</h5>
                                <p class="berita-card-text">
                                    {{ Str::limit(strip_tags($artikel->isi), 150, '...') }}</p>
                                <a class="learn-more" href="{{ route('artikel-detail', $artikel->slug) }}">
                                    Learn More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Tidak ada artikel yang ditemukan.</p>
            @endif
        </div>
    </div>
</div>
<!-- Berita section End -->
@include('templates.footer')

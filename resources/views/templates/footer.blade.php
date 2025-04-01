    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <img src="{{ asset('images/beranda/primakara_logo.png') }}" alt="primakara" width="250">
            <div class="social-icons py-3" style="display: flex; align-items: center; justify-content: center;">
                <a href="https://youtube.com/@officialdesawisatakeliki?si=FFtaO9xx2pWgHdQV" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://www.facebook.com/desawisatakeliki.id?mibextid=ZbWKwL" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/desawisatakeliki?igsh=NTc4MTIwNjQ2YQ==" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/6282237787222?" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
            <p>© 2024 Desa Keliki. All rights reserved.</p>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.all.min.js"></script>
    @include('layouts.pengguna.partials.sweetalert')

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            slidesPerView: 1,
            freeMode: true,
            freeModeMomentum: false,
            spaceBetween: 10,
            autoplay: {
                delay: 1,
                disableOnInteraction: false,
            },
            speed: 6000,
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
            },
        });
        var swiper = new Swiper(".myGallerySwiper", {
            loop: true,
            slidesPerView: 1,
            freeMode: true,
            freeModeMomentum: false,
            spaceBetween: 10,
            autoplay: {
                delay: 1,
                disableOnInteraction: false,
                reverseDirection: true,
            },
            speed: 6000,
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
            },
        });
    </script>
    </body>

    </html>

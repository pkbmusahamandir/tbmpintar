<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('assets/icons/logotbm.png') }}">

    <title>Taman Bacaan Masyarakat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    {{--  AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Magnific --}}
    <link rel="stylesheet" href="{{ asset('assets/css/magnific.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navbar')
    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    <section id="footer" class="text-dark" style="background: linear-gradient(to right, #e0e0e0, #ffffff);">
        <div class="container py-5">
            <footer>
                <div class="row gy-4">

                    <!-- Sosial Media -->
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3 text-uppercase">Ikuti Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="https://www.instagram.com/tbmpintar?igsh=MXJiczZjMDN5Z3F1cw==" target="_blank">
                                <img src="{{ asset('assets/icons/ig.png') }}" height="55" width="55"
                                    alt="Instagram" class="rounded-circle bg-white p-1 shadow-sm hover-scale">
                            </a>
                            {{-- <a href="https://www.tiktok.com/@pkbmusahamandiri" target="_blank">
                                <img src="{{ asset('assets/icons/tiktok.png') }}" height="55" width="55"
                                    alt="Tiktok" class="rounded-circle bg-white p-1 shadow-sm hover-scale">
                            </a> --}}
                            <a href="https://youtube.com/@tbmpintarblitar?si=qSqw4xGLSs5JE0ge" target="_blank">
                                <img src="{{ asset('assets/icons/yt.png') }}" height="55" width="55"
                                    alt="Youtube" class="rounded-circle bg-white p-1 shadow-sm hover-scale">
                            </a>
                            <a href="https://www.facebook.com/share/1GZSK4J4P2/?mibextid=wwXIfr" target="_blank">
                                <img src="{{ asset('assets/icons/fb.png') }}" height="55" width="55"
                                    alt="Facebook" class="rounded-circle bg-white p-1 shadow-sm hover-scale">
                            </a>
                        </div>
                    </div>

                    <!-- Kontak -->
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3 text-uppercase">Kontak Kami</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-envelope me-2"></i> tbmpintar7@gmail.com </li>
                            <li class="mb-2"><i class="bi bi-telephone me-2"></i> (0342) 804627</li>
                            {{-- <li class="mb-2"><i class="bi bi-whatsapp me-2"></i> (0342) 804627</li> --}}
                        </ul>
                    </div>

                    <!-- Alamat -->
                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold mb-3 text-uppercase">Alamat Kami</h5>
                        <p class="small">Jalan Kresna No. 02, Kademangan, Kec. Kademangan, Kabupaten Blitar, Jawa Timur
                            66161.</p>
                        <a href="https://maps.app.goo.gl/frG64StasfmRocJi8" target="_blank">
                            <img src="{{ asset('assets/icons/maps.png') }}" height="50" width="50"
                                alt="Google Maps" class="rounded-circle bg-white p-1 shadow-sm hover-scale">
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </section>

    {{-- Boorder --}}
    <section class="bg-light border-top">
        <div class="container py-2">
            <div class="d-flex justify-content-between">
                <div>
                    Taman Bacaan Masyarakat "PINTAR"
                </div>
                <div class="d-flex">
                    <p class="me-4">Syarat & Ketentuan</p>
                    <p>
                        <a href="/kebijakan" class="text-decoration-none text-dark">Kebijakan Privacy</a>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/magnific.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQKtsj8PCm0N9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });
        });
    </script>


    <script>
        const navbar = document.querySelector(".fixed-top");
        window.onscroll = () => {
            if (window.scrollY > 100) {
                navbar.classList.add("scroll-nav-active");
                navbar.classList.add("text-nav-active");
                // navbar.classList.remove("navbar-dark");
            } else {
                navbar.classList.remove("scroll-nav-active");
                // navbar.classList.add("navbar-dark");
            }
        };

        //animasi AOS
        AOS.init();

        // Magnific
        $(document).ready(function() {
            $('.image-link').magnificPopup({
                type: 'image',
                retina: {
                    ratio: 1,
                    replaceSrc: function(item, ratio) {
                        return item.src.replace(/\.\w+$/, function(m) {
                            return '@2x' + m;
                        });
                    }
                }
            });
        });
    </script>

</body>

</html>

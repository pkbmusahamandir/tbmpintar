@extends('layouts.layouts')

@section('content')
    {{-- Hero --}}
    <section id="hero" class="px-0">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                {{-- Slide 1 --}}
                <div class="carousel-item active">
                    <img src="{{ asset('assets/bg-hero.jpg') }}" class="d-block w-100"
                        style="height:800px; object-fit:cover;">
                </div>

                {{-- Slide 2 --}}
                <div class="carousel-item">
                    <img src="{{ asset('assets/bg-hero2.jpg') }}" class="d-block w-100"
                        style="height:800px; object-fit:cover;">
                </div>

                {{-- Slide 3 --}}
                <div class="carousel-item">
                    <img src="{{ asset('assets/bg-hero3.jpg') }}" class="d-block w-100"
                        style="height:800px; object-fit:cover;">
                </div>
            </div>

            {{-- Tombol Next/Prev --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

            {{-- Indikator --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>

            {{-- Teks Hero (tetap, tidak ikut geser) --}}
            <div class="hero-title text-white text-center position-absolute top-50 start-50 translate-middle">
                <div class="hero-text">
                    Selamat Datang <br> Di Taman Bacaan Masyarakat <br> "PINTAR"
                </div>
                <h2>Kec. Kademangan Kab. Blitar</h2>
            </div>
        </div>
    </section>


    {{-- Program Literasi --}}
    <section id="program" style="margin-top: -30px">
        <div class="container col-xxl-10">
            <div class="container-fluid mb-5">
                <div class="row g-3 px-0 mx-0">
                    @foreach ($literasi as $item)
                        @php
                            $iconMap = [
                                'Literasi Baca Tulis' => '<i class="bi bi-book text-dark"></i>',
                                'Literasi Budaya' => '<i class="bi bi-people-fill text-danger"></i>',
                                'Literasi Digital' => '<i class="bi bi-laptop text-primary"></i>',
                                'Literasi Finansial' => '<i class="bi bi-cash-stack text-success"></i>',
                                'Literasi Numeric' => '<i class="bi bi-calculator text-warning"></i>',
                                'Literasi Sains' => '<i class="fa-solid fa-flask text-purple"></i>',
                            ];

                            $slugMap = [
                                'Literasi Digital' => 'literasi-digital',
                                'Literasi Sains' => 'literasi-sains',
                                'Literasi Numeric' => 'literasi-numeric',
                                'Literasi Baca Tulis' => 'literasi-baca-tulis',
                                'Literasi Finansial' => 'literasi-finansial',
                                'Literasi Budaya' => 'literasi-budaya',
                            ];

                            $slug = $slugMap[$item->category] ?? '';
                        @endphp

                        @if ($slug)
                            <div class="col-lg-2 col-md-4 col-sm-6" data-aos="flip-left">
                                <a href="{{ route('literasi.show', $slug) }}" class="text-decoration-none text-reset">
                                    <div class="literasi-card shadow-sm">
                                        <div class="literasi-icon">
                                            {!! $iconMap[$item->category] ?? '' !!}
                                        </div>
                                        <p class="mb-0 text-center fw-semibold">{{ $item->category }}</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Berita --}}
    <section id="berita" class="py-5">
        <div class="container">

            {{-- Header --}}
            <div class="header-berita text-center mb-5">
                <h2 class="fw-bold">📚 Berita Kegiatan Taman Bacaan Masyarakat</h2>
                <p class="text-muted">Kegiatan literasi & informasi terbaru untuk masyarakat</p>
            </div>

            {{-- Daftar Card --}}
            <div class="row g-4" data-aos="fade-up">
                @foreach ($artikels as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card berita-card h-100 border-0">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="gambar berita">
                            </div>
                            <div class="card-body">
                                <p class="mb-2 text-muted small">
                                    <i class="bi bi-calendar-event me-1"></i> {{ $item->created_at->format('d M Y') }}
                                </p>
                                <h5 class="fw-bold mb-3 text-dark berita-judul">
                                    {{ $item->judul }}
                                </h5>
                                <p class="text-muted small mb-3">
                                    <i class="bi bi-book me-1"></i> #TamanBacaanMasyarakatPintar
                                </p>
                                <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}"
                                    class="btn btn-sm btn-outline-danger rounded-pill">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Footer --}}
            <div class="footer-berita text-center mt-5">
                <a href="/berita" class="btn btn-danger rounded-pill px-4 py-2">
                    Berita Lainnya
                </a>
            </div>

        </div>
    </section>


    {{-- Fasilitas --}}
    <section id="fasilitas" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="fw-bold">Fasilitas Taman Bacaan Masyarakat "PINTAR"</h3>
            </div>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas1.jpg') }}" alt="fasilitas 1">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas2.jpg') }}" alt="Fasilitas 2">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas3.jpg') }}" alt="Fasilitas 3">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas4.jpg') }}" alt="Fasilitas 4">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas5.jpg') }}" alt="Fasilitas 5">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas6.jpg') }}" alt="Fasilitas 6">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas11.jpg') }}" alt="Fasilitas 7">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas8.jpg') }}" alt="Fasilitas 8">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas9.jpg') }}" alt="Fasilitas 9">
                </div>
                <div class="fasilitas-item">
                    <img src="{{ asset('assets/images/fasilitas10.jpg') }}" alt="Fasilitas 10">
                </div>
            </div>
        </div>
    </section>
@endsection

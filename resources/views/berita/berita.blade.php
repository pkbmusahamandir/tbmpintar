@extends('layouts.layouts')

@section('content')
    {{-- Berita --}}
    <section id="berita" style="margin-top: 100px; background-color:#f8f9fa;" class="py-5">
        <div class="container">

            <div class="header-berita text-center mb-5">
                <h2 class="fw-bold text-dark"> 📚 Berita Kegiatan Taman Bacaan Masyarakat "PINTAR"</h2>
                <p class="text-muted">Update kegiatan terbaru seputar Taman Bacaan Masyarakat "PINTAR"</p>
            </div>

            <div class="row g-4" data-aos="fade-up">
                @foreach ($artikels as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-lg h-100 berita-card">
                            <div class="card-img-top overflow-hidden"
                                style="height: 220px; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    class="img-fluid h-100 w-100 object-fit-cover" alt="gambar {{ $item->judul }}">
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <p class="mb-2 text-secondary small">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    {{ $item->created_at->format('d M Y') }}
                                </p>
                                <h5 class="fw-bold mb-3 text-dark">{{ Str::limit($item->judul, 60) }}</h5>
                                <p class="text-muted flex-grow-1">#TamanBacaanMasyarakatPintar</p>
                                <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}"
                                    class="btn btn-sm btn-outline-danger rounded-pill">
                                    Selengkapnya <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Tambahkan style custom --}}
    <style>
        .berita-card {
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .berita-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .berita-card img {
            transition: transform 0.4s ease;
        }

        .berita-card:hover img {
            transform: scale(1.05);
        }
    </style>
@endsection

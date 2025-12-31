@extends('layouts.layouts')

@section('content')
<section id="detail" style="margin-top: 100px" class="py-5">
    <div class="container col-xxl-8">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
            </ol>
        </nav>

        {{-- Gambar --}}
        <div class="detail-img mb-4">
            <img src="{{ asset('storage/' . $artikel->image) }}" class="img-fluid rounded shadow-sm" alt="gambar berita">
        </div>

        {{-- Konten --}}
        <div class="content-berita">
            <p class="mb-2 text-secondary small">
                <i class="bi bi-calendar-event me-1"></i> {{ $artikel->created_at->format('d M Y') }}
            </p>
            <h2 class="fw-bold mb-4">{{ $artikel->judul }}</h2>
            <div class="text-secondary fs-6 lh-lg">
                {!! $artikel->desc !!}
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Biar gambar rapi */
    .detail-img img {
        width: 100%;
        max-height: 450px; /* seragam tinggi */
        object-fit: cover;
    }

    /* Konten biar lebih nyaman dibaca */
    .content-berita {
        font-size: 1.05rem;
        line-height: 1.8;
    }

    /* Breadcrumb lebih halus */
    .breadcrumb a {
        text-decoration: none;
        color: #dc3545;
    }
    .breadcrumb a:hover {
        text-decoration: underline;
    }
</style>
@endpush

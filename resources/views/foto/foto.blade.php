@extends('layouts.layouts')

@section('content')
<section id="foto" class="section-foto parallax" style="margin-top: 100px">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div class="d-flex align-items-center">
                <div class="stripe-putih me-2"></div>
                <h5 class="fw-bold text-black me-2">Foto Kegiatan TBM "Pintar"</h5>
                <div class="stripe-putih"></div>
            </div>
        </div>

        <div class="row g-3">
            @foreach ($photos as $photo)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="photo-card">
                        <a class="image-link" href="{{ asset('storage/' . $photo->image) }}">
                            <div class="photo-wrapper">
                                <img src="{{ asset('storage/' . $photo->image) }}" alt="{{ $photo->judul }}">
                            </div>
                        </a>
                        <p class="photo-title">{{ $photo->judul }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@extends('layouts.layouts')

@section('content')
    <section class="py-5" style="margin-top:100px">
        <div class="container">

            {{-- Judul & Deskripsi --}}
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="fw-bold mb-3">{{ $label }}</h2>

                    {{-- Deskripsi Literasi (WARNA HITAM) --}}
                    <div class="literasi-desc">
                        {!! nl2br(e($description)) !!}
                    </div>
                </div>

                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('literasi.create') }}" class="btn btn-primary">
                            + Tambah Deskripsi Literasi
                        </a>
                    @endif
                @endauth
            </div>

            {{-- Video --}}
            <div class="mb-5">
                <h4 class="mb-3">Video Kegiatan</h4>
                <div class="row g-4">
                    @forelse($videos as $v)
                        <div class="col-lg-4">
                            <h6 class="text-center mb-2">{{ $v->judul }}</h6>
                            <iframe width="100%" height="215" src="https://www.youtube.com/embed/{{ $v->youtube_code }}"
                                title="{{ $v->judul }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada video pada kategori ini.</p>
                    @endforelse
                </div>
            </div>

            {{-- Foto --}}
            <div class="mb-4">
                <h4 class="mb-3">Foto Kegiatan</h4>
                <div class="row g-3">
                    @forelse($photos as $p)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="photo-card">
                                <a class="image-link" href="{{ asset('storage/' . $p->image) }}">
                                    <div class="photo-wrapper">
                                        <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->judul }}">
                                    </div>
                                </a>
                                <p class="photo-title">{{ $p->judul }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada foto pada kategori ini.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

    {{-- Styling paragraf --}}
    <style>
        .literasi-desc {
            color: #000;
            /* WARNA HITAM */
            max-width: 850px;
            line-height: 1.8;
            font-size: 1rem;
            text-align: justify;
        }

        .literasi-desc br {
            display: block;
            margin-bottom: 1rem;
            content: "";
        }
    </style>
@endsection

@extends('layouts.layouts')

@section('content')
<section style="margin-top: 100px">
    <div class="container col-xxl-8 py-5">
        <!-- Judul -->
        <h3 class="fw-bold mb-2 text-dark">Halaman Dashboard Admin</h3>
        <p class="mb-4">Selamat datang di halaman dashboard admin</p>

        <!-- Row untuk kartu -->
        <div class="row g-4">
            <!-- Blog -->
            <div class="col-lg-4">
                <div class="card dashboard-card card-blog h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h5 class="card-title fw-bold">📝 Blog Artikel</h5>
                        <p class="card-text">Atur dan kelola artikel kegiatan TBM</p>
                        <a href="{{ route('blog') }}" class="btn-action mt-auto">
                            <button class="btn btn-dark fw-bold">Kelola Blog</button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Photo -->
            <div class="col-lg-4">
                <div class="card dashboard-card card-photo h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h5 class="card-title fw-bold">📷 Photo Kegiatan</h5>
                        <p class="card-text">Atur dan kelola photo kegiatan TBM</p>
                        <a href="{{ route('photo') }}" class="btn-action mt-auto">
                            <button class="btn btn-dark fw-bold">Kelola Foto</button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Video -->
            <div class="col-lg-4">
                <div class="card dashboard-card card-video h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h5 class="card-title fw-bold">🎥 Video Kegiatan</h5>
                        <p class="card-text">Atur dan kelola video kegiatan TBM</p>
                        <a href="{{ route('video') }}" class="btn-action mt-auto">
                            <button class="btn btn-dark fw-bold">Kelola Video</button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Literasi -->
            <div class="col-lg-4">
                <div class="card dashboard-card card-literasi h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h5 class="card-title fw-bold">📖 Deskripsi Literasi</h5>
                        <p class="card-text">Atur dan kelola deskripsi literasi sesuai kategori</p>
                        <a href="{{ route('literasi.index') }}" class="btn-action mt-auto">
                            <button class="btn btn-dark fw-bold">Kelola Literasi</button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Buku Digital -->
            <div class="col-lg-4">
                <div class="card dashboard-card card-buku h-100">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h5 class="card-title fw-bold">📚 Buku Digital</h5>
                        <p class="card-text">Kelola e-book dan kategori buku digital TBM</p>

                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ route('ebooks.index') }}" class="btn btn-dark fw-bold">
                                Kelola E-Book
                            </a>
                            <a href="{{ route('categories.index') }}" class="btn btn-dark fw-bold">
                                Kelola Kategori
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .dashboard-card {
        border: none;
        border-radius: 15px;
        color: #fff;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .dashboard-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    /* Warna pastel elegan tiap card */
    .card-blog { background: linear-gradient(135deg, #6fb1fc, #4364f7); }
    .card-photo { background: linear-gradient(135deg, #66d6a3, #3eb489); }
    .card-video { background: linear-gradient(135deg, #f78ca0, #f9748f); }
    .card-literasi { background: linear-gradient(135deg, #fbc687, #f7a440); }
    .card-buku { background: linear-gradient(135deg, #a18cd1, #7b5fcf); }

    .dashboard-card .card-title {
        font-size: 1.25rem;
        color: #fff;
    }

    .dashboard-card .card-text {
        color: rgba(255,255,255,0.9);
        font-size: 0.95rem;
        margin-bottom: 20px;
    }

    /* Tombol dasar */
    .btn-action {
        display: inline-block;
        padding: 0;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .btn-action button {
        border: none;
        border-radius: 12px;
        padding: 10px 22px;
        cursor: pointer;
    }

    .btn-action:hover button {
        transform: translateY(-3px) scale(1.05);
    }

    .btn-light {
        background-color: #fff;
        color: #6c63ff;
        border-radius: 12px;
        border: none;
        transition: 0.3s;
    }

    .btn-light:hover {
        background-color: #ece8ff;
    }

    .btn-outline-light {
        border: 2px solid #fff;
        color: #fff;
        border-radius: 12px;
        transition: 0.3s;
    }

    .btn-outline-light:hover {
        background-color: rgba(255,255,255,0.15);
    }
</style>
@endpush

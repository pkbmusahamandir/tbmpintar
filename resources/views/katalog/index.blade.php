@extends('layouts.layouts')

@section('title', 'Katalog E-Book')

@section('content')
<section class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-10">

        <h3 class="mb-4 text-center">Katalog Buku Digital</h3>

        {{-- Pencarian & Filter --}}
        <form action="{{ route('katalog.ebooks') }}" method="GET" class="row mb-4 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Cari Judul / Penulis:</label>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari buku...">
            </div>

            <div class="col-md-4">
                <label class="form-label">Filter Kategori:</label>
                <select name="category_id" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Filter</button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('katalog.ebooks') }}" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>

        <div class="row g-4">
            @forelse($ebooks as $ebook)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm" style="border-radius: 8px; overflow: hidden;">
                    <img src="{{ $ebook->cover ? asset('storage/' . $ebook->cover) : asset('assets/images/no-cover.png') }}"
                         class="card-img-top" style="height: 250px; object-fit: cover;">

                    <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $ebook->judul }}</h6>

                        <p class="mb-1"><strong>Kategori:</strong> {{ $ebook->category->name ?? '-' }}</p>
                        <p class="mb-1"><strong>Penulis:</strong> {{ $ebook->author }}</p>
                        <p class="mb-1"><strong>Penerbit:</strong> {{ $ebook->publisher }}</p>
                        <p class="mb-2"><strong>Tahun:</strong> {{ $ebook->year }}</p>

                        <a href="{{ asset('storage/' . $ebook->pdf) }}" target="_blank" class="btn btn-primary w-100">
                            📖 Baca / Download
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                <p>Tidak ada buku ditemukan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $ebooks->withQueryString()->links() }}
        </div>

    </div>
</section>
@endsection

@extends('layouts.layouts')

@section('content')
<section class="py-5" style="margin-top: 100px;">
    <div class="container col-xxl-8">

        {{-- Navigasi --}}
        <div class="d-flex mb-3">
            <a href="{{ route('blog') }}">Blog</a>
            <div class="mx-1">></div>
            <span>Edit Artikel</span>
        </div>

        <h4>Edit Artikel</h4>

        <form action="{{ route('blog.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="form-group mb-4">
                <label for="judul">Judul Artikel</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $artikel->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gambar Lama --}}
            <div class="mb-3">
                <label>Gambar Saat Ini</label><br>
                <img src="{{ asset('storage/' . $artikel->image) }}" height="100">
            </div>

            {{-- Upload Gambar Baru --}}
            <div class="form-group mb-4">
                <label for="image">Ganti Gambar (Opsional)</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="form-group mb-4">
                <label for="desc">Artikel Berita</label>
                <textarea name="desc" id="summernote" class="form-control @error('desc') is-invalid @enderror">{{ old('desc', $artikel->desc) }}</textarea>
                @error('desc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</section>
@endsection

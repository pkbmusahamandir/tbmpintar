@extends('layouts.layouts') @section('content')
    <section class="py-5" style="margin-top: 100px;">
        <div class="container col-xxl-8"> {{-- Navigasi --}} <div class="d-flex mb-3"> <a
                    href="{{ route('blog') }}">Blog</a>
                <div class="mx-1">></div> <span>Buat Artikel</span>
            </div>
            <h4>Halaman Buat Artikel</h4>
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data"> @csrf {{-- Judul --}}
                <div class="form-group mb-4"> <label for="judul">Masukkan Judul Kegiatan</label> <input type="text"
                        name="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"> @error('judul')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div> {{-- Gambar --}} <div class="form-group mb-4"> <label for="image">Pilih Foto Kegiatan</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div> {{-- Deskripsi --}} <div class="form-group mb-4"> <label for="desc">Artikel Berita</label>
                    <textarea name="desc" id="summernote" class="form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea> @error('desc')
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div> <button type="submit" class="btn btn-primary">Simpan</button> </form>
        </div>
    </section>
@endsection

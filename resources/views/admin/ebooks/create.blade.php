@extends('layouts.layouts')

@section('title', 'Tambah Buku Digital')

@section('content')
    <section class="py-5" style="margin-top: 100px">
        <div class="container col-xxl-8">
            <h4>Tambah Buku Digital</h4>

            <form action="{{ route('ebooks.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" name="tahun" id="tahun" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Cover (opsional)</label>
                    <input type="file" name="cover" id="cover" class="form-control">
                </div>

                <div class="mb-4">
                    <label for="pdf" class="form-label">File PDF</label>
                    <input type="file" name="pdf" id="pdf" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </section>
@endsection

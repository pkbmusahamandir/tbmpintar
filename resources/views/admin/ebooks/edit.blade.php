@extends('layouts.layouts')

@section('title', 'Edit Buku Digital')

@section('content')
    <section class="py-5" style="margin-top: 100px">
        <div class="container col-xxl-8">
            <h4>Edit Buku Digital</h4>

            <form action="{{ route('ebooks.update', $ebook) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ $ebook->judul }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $ebook->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" name="penulis" id="penulis" value="{{ $ebook->author }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" value="{{ $ebook->publisher }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" name="tahun" id="tahun" value="{{ $ebook->year }}" class="form-control"
                        required>
                </div>


                <div class="mb-3">
                    <label for="cover" class="form-label">Cover (opsional)</label>
                    <input type="file" name="cover" id="cover" class="form-control">
                    @if ($ebook->cover)
                        <small>Cover sekarang:</small><br>
                        <img src="{{ asset('storage/' . $ebook->cover) }}" width="100" class="mt-1 rounded">
                    @endif
                </div>

                <div class="mb-4">
                    <label for="pdf" class="form-label">File PDF (opsional)</label>
                    <input type="file" name="pdf" id="pdf" class="form-control">
                    @if ($ebook->pdf)
                        <small>PDF saat ini:</small><br>
                        <a href="{{ asset('storage/' . $ebook->pdf) }}" target="_blank">{{ basename($ebook->pdf) }}</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Perbarui</button>
            </form>
        </div>
    </section>
@endsection

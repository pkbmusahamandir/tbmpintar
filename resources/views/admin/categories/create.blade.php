@extends('layouts.layouts')

@section('title', 'Tambah Kategori Buku')

@section('content')
<section class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">
        <h4>Tambah Kategori Buku</h4>

        <form action="{{ route('categories.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama kategori" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</section>
@endsection

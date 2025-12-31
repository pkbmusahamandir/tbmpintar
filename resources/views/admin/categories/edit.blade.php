@extends('layouts.layouts')

@section('title', 'Edit Kategori Buku')

@section('content')
<section class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">
        <h4>Edit Kategori Buku</h4>

        <form action="{{ route('categories.update', $category) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Perbarui</button>
        </form>
    </div>
</section>
@endsection

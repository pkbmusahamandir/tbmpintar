@extends('admin.index')

@section('content')
<div class="container col-xxl-8 py-5 mt-5 pt-5" tyle="margin-top: 100px;">
    <h2>Edit Deskripsi Literasi</h2>

    @if ($errors->any())
        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form action="{{ route('literasi.update', $content->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kategori Literasi</label>
            <select name="category" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $c)
                    <option value="{{ $c }}" {{ $content->category === $c ? 'selected' : '' }}>{{ $c }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $content->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('literasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

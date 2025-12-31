@extends('layouts.layouts')

@section('content')
    <section class="py-5" style="margin-top: 100px">
        <div class="container col-xxl-8">
            <h4>Daftar Kategori Buku</h4>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Informasi:</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Tombol Aksi -->
            <div class="d-flex gap-2 mb-3 flex-wrap">
                <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                    ← Dashboard
                </a>

                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    + Tambah Kategori
                </a>

                <a href="{{ route('ebooks.create') }}" class="btn btn-success">
                    + Tambah E-Book
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

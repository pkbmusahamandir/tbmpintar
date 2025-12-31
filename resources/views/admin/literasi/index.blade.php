@extends('admin.index')

@section('content')
    <div class="container col-xxl-8 py-5 mt-5 pt-5">
        <h2 class="mb-4">Kelola Deskripsi Literasi</h2>

        <!-- Tombol Aksi -->
        <div class="d-flex gap-2 mb-3">
            <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                ← Kembali ke Dashboard
            </a>

            <a href="{{ route('literasi.create') }}" class="btn btn-primary">
                + Tambah Deskripsi
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Kategori</th>
                    <th>Deskripsi</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contents as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('literasi.edit', $item->id) }}" class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('literasi.destroy', $item->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus deskripsi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum ada deskripsi literasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

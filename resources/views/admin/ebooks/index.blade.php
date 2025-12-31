@extends('layouts.layouts')

@section('title', 'Data Buku Digital')

@section('content')
    <section class="py-5" style="margin-top: 100px">
        <div class="container col-xxl-8">
            <h4 class="mb-3">Daftar Buku Digital</h4>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Aksi -->
            <div class="d-flex gap-2 mb-3">
                <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                    ← Kembali ke Dashboard
                </a>

                <a href="{{ route('ebooks.create') }}" class="btn btn-primary">
                    + Tambah Buku
                </a>

                <a href="{{ route('categories.create') }}" class="btn btn-success">
                    + Tambah Kategori
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>PDF</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ebooks as $ebook)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($ebook->cover)
                                        <img src="{{ asset('storage/' . $ebook->cover) }}" alt="Cover" width="60"
                                            style="border-radius:5px;">
                                    @else
                                        <img src="{{ asset('assets/images/no-cover.png') }}" alt="No Cover" width="60"
                                            style="border-radius:5px;">
                                    @endif
                                </td>
                                <td>{{ $ebook->judul }}</td>
                                <td>{{ $ebook->category->name ?? '-' }}</td>
                                <td>{{ $ebook->author ?? '-' }}</td>
                                <td>{{ $ebook->publisher ?? '-' }}</td>
                                <td>{{ $ebook->year ?? '-' }}</td>
                                <td>
                                    @if ($ebook->pdf)
                                        <a href="{{ asset('storage/' . $ebook->pdf) }}" target="_blank"
                                            class="btn btn-info text-white">
                                            Buka PDF
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('ebooks.edit', $ebook->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('ebooks.destroy', $ebook->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">
                                    Belum ada data buku
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.layouts')

@section('content')
    <section class="py-5" style="margin-top: 100px">
        <div class="container col-xxl-8">

            {{-- Judul --}}
            <h4 class="mb-2">Halaman Video Kegiatan</h4>

            {{-- Tombol --}}
            <div class="mb-3 d-flex gap-2">
                <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                    ← Kembali ke Dashboard
                </a>

                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                    Tambah Video
                </a>
            </div>


            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <strong>Informasi</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Video</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $video->judul }}</td>
                                <td>
                                    <iframe width="200" height="113"
                                        src="https://www.youtube.com/embed/{{ $video->youtube_code }}" allowfullscreen>
                                    </iframe>
                                </td>
                                <td>{{ $video->category ?? '-' }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $video->id }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus video ini?')">
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <!-- Modal Tambah Video -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('video.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Judul Video</label>
                            <input type="text" name="judul" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Kode YouTube</label>
                            <input type="text" name="youtube_code" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Kategori Literasi</label>
                            <select name="category" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Literasi Digital">Literasi Digital</option>
                                <option value="Literasi Sains">Literasi Sains</option>
                                <option value="Literasi Numeric">Literasi Numeric</option>
                                <option value="Literasi Baca Tulis">Literasi Baca Tulis</option>
                                <option value="Literasi Finansial">Literasi Finansial</option>
                                <option value="Literasi Budaya">Literasi Budaya</option>
                            </select>
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Video -->
    @foreach ($videos as $video)
        <div class="modal fade" id="editModal{{ $video->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('video.update', $video->id) }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Judul Video</label>
                                <input type="text" name="judul" value="{{ $video->judul }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Kode YouTube</label>
                                <input type="text" name="youtube_code" value="{{ $video->youtube_code }}"
                                    class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Kategori Literasi</label>
                                <select name="category" class="form-control">
                                    @foreach (['Literasi Digital', 'Literasi Sains', 'Literasi Numeric', 'Literasi Baca Tulis', 'Literasi Finansial', 'Literasi Budaya'] as $c)
                                        <option value="{{ $c }}"
                                            {{ $video->category === $c ? 'selected' : '' }}>
                                            {{ $c }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

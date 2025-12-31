@extends('layouts.layouts')

@section('content')
    <section class="py-5" style="margin-top: 100px">
        <div class="container col-xxl-8">
            <h4>Halaman Photo Kegiatan</h4>

            {{-- Tombol Navigasi --}}
            <div class="d-flex gap-2 mb-3">
                <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                    ← Kembali ke Dashboard
                </a>

                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                    Upload Photo
                </a>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Informasi</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- menampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Kegiatan</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photos as $photo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $photo->image) }}" alt="Foto" width="100">
                                </td>
                                <td>{{ $photo->judul }}</td>
                                <td>{{ $photo->category }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $photo->id }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('photo.destroy', $photo->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
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

    <!-- Modal Upload -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="uploadModalLabel">Upload Photo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Pilih Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Kategori Literasi</label>
                            <select name="category" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Literasi Digital">Literasi Digital</option>
                                <option value="Literasi Sains">Literasi Sains</option>
                                <option value="Literasi Numeric">Literasi Numeric</option>
                                <option value="Literasi Baca Tulis">Literasi Baca Tulis</option>
                                <option value="Literasi Finansial">Literasi Finansial</option>
                                <option value="Literasi Budaya">Literasi Budaya</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    @foreach ($photos as $photo)
        <div class="modal fade" id="editModal{{ $photo->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $photo->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel{{ $photo->id }}">Edit Photo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('photo.update', $photo->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($photo->image)
                                <div class="mb-3">
                                    <label>Foto Saat Ini:</label><br>
                                    <img src="{{ asset('storage/' . $photo->image) }}" width="200"
                                        class="img-thumbnail">
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label>Photo (Kosongkan jika tidak diubah)</label>
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" value="{{ $photo->judul }}"
                                    class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label>Kategori Literasi</label>
                                <select name="category" class="form-control" required>
                                    @php
                                        $cats = [
                                            'Literasi Digital',
                                            'Literasi Sains',
                                            'Literasi Numeric',
                                            'Literasi Baca Tulis',
                                            'Literasi Finansial',
                                            'Literasi Budaya',
                                        ];
                                    @endphp
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($cats as $c)
                                        <option value="{{ $c }}"
                                            {{ $photo->category === $c ? 'selected' : '' }}>
                                            {{ $c }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection

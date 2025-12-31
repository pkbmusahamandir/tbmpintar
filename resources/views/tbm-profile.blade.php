@extends('layouts.layouts')

@section('title', 'Profil TBM')

@section('content')
    <section class="py-5 profil-section" style="margin-top:100px;">
        <div class="container col-xxl-9">

            {{-- Header --}}
            <div class="text-center mb-5" data-aos="fade-up">
                <h1 class="fw-bold text-success">Profil Taman Bacaan Masyarakat "PINTAR"</h1>
                <p class="text-muted">Curriculum Vitae & Visi Misi Lembaga</p>
                <hr class="w-25 mx-auto fancy-divider">
            </div>

            {{-- Curriculum Vitae --}}
            <div class="card shadow-lg border-0 mb-5" data-aos="fade-right">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4 text-primary"><i class="bi bi-person-badge-fill me-2"></i>Curriculum Vitae</h4>
                    <div class="row g-4 align-items-start">
                        {{-- Foto --}}
                        <div class="col-md-4 text-center" data-aos="zoom-in">
                            <div class="p-2 bg-light rounded shadow-sm">
                                <img src="{{ asset('assets/images/vivi.jpeg') }}" alt="Foto Frida Luthvita S"
                                    class="img-fluid hover-zoom"
                                    style="border-radius: 8px; max-width: 220px; height: auto;">
                            </div>
                        </div>

                        {{-- Data CV --}}
                        <div class="col-md-8" data-aos="fade-left">
                            <table class="table table-borderless align-middle">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Nama</td>
                                        <td>: Frida Luthvita S</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tempat/Tgl Lahir</td>
                                        <td>: Blitar, 8 September 1989</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Jenis Kelamin</td>
                                        <td>: Perempuan</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Kewarganegaraan</td>
                                        <td>: Indonesia</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Pendidikan</td>
                                        <td>: S2-IPS</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Agama</td>
                                        <td>: Islam</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Alamat</td>
                                        <td>: Jl. Kresno 02 Kel. Kademangan Kab. Blitar</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Handphone</td>
                                        <td>: +62 857-5588-6655</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Email</td>
                                        <td>: luthvitafrida@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Visi --}}
            <div class="card shadow border-0 mb-4" data-aos="fade-up">
                <div class="card-body p-4 bg-light">
                    <h4 class="fw-bold text-success mb-3"><i class="bi bi-eye-fill me-2 text-warning"></i>Visi Lembaga</h4>
                    <blockquote class="blockquote">
                        <p class="mb-0 fst-italic text-dark fs-5">
                            "Mengatasi Kebodohan dan Menciptakan Peluang Kerja serta Membangun Kesetiakawanan Sosial
                            berdasarkan Iman dan Taqwa."
                        </p>
                    </blockquote>
                </div>
            </div>

            {{-- Misi --}}
            <div class="card shadow border-0" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-success mb-3"><i class="bi bi-flag-fill me-2 text-danger"></i>Misi Lembaga</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-book-half text-primary me-2"></i> Memotivasi masyarakat
                            untuk gemar membaca.</li>
                        <li class="list-group-item"><i class="bi bi-mortarboard-fill text-primary me-2"></i> Memberi layanan
                            pendidikan pada masyarakat.</li>
                        <li class="list-group-item"><i class="bi bi-briefcase-fill text-primary me-2"></i> Menciptakan
                            peluang kerja melalui program kecakapan hidup.</li>
                    </ul>
                </div>
            </div>

            {{-- Struktur Organisasi --}}
            <div class="card shadow border-0 mt-5" data-aos="zoom-in">
                <div class="card-body p-4 text-center">
                    <h4 class="fw-bold text-success mb-4"><i class="bi bi-diagram-3-fill me-2 text-info"></i>Struktur
                        Organisasi</h4>
                    <img src="{{ asset('assets/images/organisasi.png') }}" alt="Struktur Organisasi TBM"
                        class="img-fluid rounded shadow-sm border" style="max-width:550px; height:auto;">
                </div>
            </div>

            {{-- Izin Operasional TBM --}}
            <div class="card shadow border-0 mt-5" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-body p-4 text-center">
                    <h4 class="fw-bold text-success mb-4"><i
                            class="bi bi-file-earmark-text-fill me-2 text-secondary"></i>Izin Operasional TBM Pintar</h4>
                    <img src="{{ asset('assets/images/IZIN OPERASIONAL TBM.jpg') }}" alt="Legalitas TBM Pintar"
                        class="img-fluid rounded shadow-sm border" style="max-width:400px; height:auto;">
                    <p class="text-muted mt-3">
                        Dokumen resmi izin operasional TBM Pintar yang diterbitkan oleh Dinas Pendidikan dan Kebudayaan
                        Kabupaten Blitar.
                    </p>
                </div>
            </div>

            {{-- Sertifikat NPP TBM --}}
            <div class="card shadow border-0 mt-5" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-body p-4 text-center">
                    <h4 class="fw-bold text-success mb-4"><i
                            class="bi bi-file-earmark-text-fill me-2 text-secondary"></i>Sertifikat Nomor Pokok Perpustakaan TBM Pintar</h4>
                    <img src="{{ asset('assets/images/npp.jpg') }}" alt="Sertifikat NPP TBM Pintar"
                        class="img-fluid rounded shadow-sm border" style="max-width:400px; height:auto;">
                    <p class="text-muted mt-3">
                        Nomor Pokok Pendidik (NPP) resmi yang diterbitkan oleh Dinas Pendidikan untuk pendidik/tenaga kependidikan di lembaga non-formal.
                    </p>
                </div>
            </div>

        </div>
    </section>
@endsection

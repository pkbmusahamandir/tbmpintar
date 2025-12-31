{{-- Navbar --}}
<nav class="navbar navbar-expand-lg py-3 fixed-top {{ Request::segment(1) == '' ? 'bg-light' : 'bg-white shadow' }}">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/icons/logotbm.png') }}" height="60" width="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 18px;">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('tbm.profile') }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/berita">Berita</a>
                </li>

                <!-- Gallery Foto (ditambahkan) -->
                <li class="nav-item">
                    <a class="nav-link active" href="/foto">Gallery Foto</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('katalog.ebooks') }}">Katalog E-Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#footer">Kontak</a>
                </li>
            </ul>

            <!-- Tombol kanan -->
            <div class="d-flex justify-content-center mt-3 mt-lg-0">
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger px-4">Logout</button>
                    </form>
                @else
                    <a href="/login" class="btn btn-success px-4">Login Admin</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

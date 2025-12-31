@extends('layouts.layouts')

@section('content')
<section style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:#f8f9fa;">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <h4 class="fw-bold text-center mb-4 text-dark">Login Admin TBM</h4>

                {{-- Tampilkan error jika login gagal --}}
                @if (session('loginError'))
                    <div class="alert alert-danger text-center rounded-3">
                        {{ session('loginError') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control form-control-lg rounded-3" required autofocus
                            placeholder="contoh@email.com">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control form-control-lg rounded-3" required
                            {{-- placeholder="••••••"> --}}>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-semibold">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('auth.layouts.master')

@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-brand">
                        <strong class="text-primary">Kontrakan HOMESTAY</strong>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Masuk</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="#" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="{{ route('password.request') }}" class="text-small">
                                                Lupa Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" tabindex="2"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="remember"
                                            id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        MASUK
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Belum punya akun ? <a href="{{ url('register') }}">Buat Akun</a>
                    </div>
                    <div class="mt-2 text-muted text-center">
                        <a href="{{ url('/') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
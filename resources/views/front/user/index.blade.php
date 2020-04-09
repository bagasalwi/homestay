@extends('front.layouts.master_transaction')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        @if (Auth::user()->nik == null)
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Hello, {{ Auth::user()->name }} !</h2>
                        <p class="lead">Sebelum melanjutkan transaksi, kamu harus melengkapi profil kamu terlebih
                            dahulu.</p>
                        <div class="mt-4">
                            <a href="{{ url('/myprofile/update/') }}"
                                class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                                Lengkapi Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero bg-info text-white">
                    <div class="hero-inner">
                        <h2>Welcome Back, {{ Auth::user()->name }} !</h2>
                        <p class="lead">Kamu bisa mengecek status kamar pada menu Status Kamar.</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Show/Hide</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                        class="fas fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="collapse show" id="mycard-collapse">
                            <div class="card-body">
                                You can show or hide this card.
                            </div>
                            <div class="card-footer">
                                Card Footer
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
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
            <div class="d-flex justify-content-center">
                <div class="col-6 mb-4 text-center">
                    <img src="{{ URL::asset('front/myimages/undraw/8.svg')}}" alt="Image" class="img-fluid">
                    <h4>Kamu belum punya kamar yang aktif!</h4>
                    <p>
                        kamu bisa cek menu kamar untuk melihat jenis kamar dan memesan langsung.
                    </p>
                    <a href="{{ URL('jeniskamar') }}" class="btn btn-primary mt-2">Cek Kamar</a>
                </div>
            </div>

        </div>
        @endif

        <div class="section-body">
            <div class="row">

            </div>
        </div>
    </section>
</div>
@endsection
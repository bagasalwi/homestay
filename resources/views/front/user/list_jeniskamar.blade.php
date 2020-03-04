@extends('front.layouts.master_transaction')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jenis {{ $title }}</h1>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Status Transaksi</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-secondary" href="#"><i
                                    class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Pilih Jenis
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-map-marked-alt"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Pilih Lokasi
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-credit-card"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Pembayaran
                                            </div>
                                        </div>
                                        {{-- <div class="wizard-step wizard-step-success">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Order Completed
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- MAIN --}}
        <div class="row mt-4">
            @foreach ($location as $location)
            <div class="col-12 col-md-4 col-lg-4">
                <div class="pricing pricing-highlight">
                    <div class="pricing-title">
                        {{ $location->name }}
                    </div>
                    <div class="pricing-padding">
                        <div class="pricing-price">
                            <h6>{{ $location->name }}</h6>
                        </div>
                        <div class="pricing-details">
                            <div>{{ $location->description }}</div>
                        </div>
                    </div>
                    <div class="pricing-cta">
                        <a href="{{ url('jeniskamar/NONAC') }}">pilih <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="section-body">
            <div class="row">

            </div>
        </div>
    </section>
</div>
@endsection
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
        @elseif($transaction)
        <div class="row">
            @php
            // dd($user->name);

            
            $status = "";
            $status_color = "";

            if($payment->payment_status == 'N'){
                $status = 'BELUM SELESAI';
                $status_color = 'danger';
            }else if($payment->payment_status == 'C'){
                $status = 'BELUM DIBAYAR';
                $status_color = 'info';
            }else if($payment->payment_status == 'P'){
                $status = 'MENUNGGU VERIFIKASI ADMIN';
                $status_color = 'warning';
            }else if($payment->payment_status == 'A'){
                $status = 'LUNAS';
                $status_color = 'success';
            }else if($payment->payment_status == 'V'){
                $status = 'HANGUS';
                $status_color = 'danger';
            }
            @endphp


            <div class="col-8">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="invoice-title">
                                    <h2>Pesanan Kontrakan</h2>
                                    <div class="invoice-number">Transaksi #{{ $transaction->id }}</div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">Detail Pesanan</div>
                                <p class="section-lead">Berikut merupakan detail pesanan kamar.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">Kamar</th>
                                            <th data-width="200">Tipe Kamar</th>
                                            <th data-width="250" class="text-center">Lokasi</th>
                                            <th class="text-right">Harga</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $kamar->name }}</td>
                                            <td>{{ $kamar->jeniskamar->name }} - Kamar mandi {{ $kamar->jeniskamar->kamar_mandi }} - {{ $kamar->jeniskamar->listrik }}</td>
                                            <td>{{ $kamar->location->description }}</td>
                                            <td class="text-right">Rp. {{ number_format($transaction->transaction_price) }}</td>
                                            
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <button class="btn btn-lg btn-primary btn-icon icon-left"><i class="fas fa-print"></i>
                            Konfirmasi Pembayaran</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Konfirmasi Pembayaran</h4>
                    </div>
                    <div class="card-body">

                    </div>
                    <div class="card-footer">
                        Footer Card
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Metode Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="img-fluid text-center">
                                    <img src="{{ URL::asset('custom-images/bca.png')}}"
                                        style="height:100px;width:160px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <h6 class="text-center">Omah Saras - <strong>60411 02079</strong></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">Pembayaran dilakukan dengan mentransfer sejumlah harga sesuai
                                    kamar dengan berita No Transaksi.</div>
                                <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                    contoh berita : transaksi-6
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        <div class="text-center mb-2">Jika ada pertanyaan seputar kontrakan, anda bisa menghubungi
                            kontak kami.</div>
                        <a href="{{ url('bayarkamar/' . $transaction->id) }}" type="submit"
                            class="btn btn-sm btn-outline-primary btn-block">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center">
            <div class="col-6 mb-4 text-center">
                <img src="{{ URL::asset('custom-images/undraw/8.svg')}}" alt="Image" class="img-fluid">
                <h4>Kamu belum punya kamar yang aktif!</h4>
                <p>
                    kamu bisa cek menu kamar untuk melihat jenis kamar dan memesan langsung.
                </p>
                <a href="{{ URL('jeniskamar') }}" class="btn btn-primary mt-2">Cek Kamar</a>
            </div>
        </div>
        @endif

    </section>
</div>

@endsection
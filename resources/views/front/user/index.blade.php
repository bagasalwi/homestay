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
                            <h4>Latest Transaction</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                        class="fas fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="collapse show" id="mycard-collapse">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No Transaksi</th>
                                            <th>Pengguna</th>
                                            <th>Status</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($transactionLatest as $tr)
                                        @php
                                        $status = "";
                                        $status_color = "";
                
                                        if($tr->payment_status == 'N'){
                                        $status = 'BELUM SELESAI';
                                        $status_color = 'danger';
                                        }else if($tr->payment_status == 'C'){
                                        $status = 'BELUM DIBAYAR';
                                        $status_color = 'info';
                                        }else if($tr->payment_status == 'P'){
                                        $status = 'MENUNGGU VERIFIKASI ADMIN';
                                        $status_color = 'warning';
                                        }else if($tr->payment_status == 'A'){
                                        $status = 'LUNAS';
                                        $status_color = 'success';
                                        }else if($tr->payment_status == 'V'){
                                        $status = 'HANGUS';
                                        $status_color = 'danger';
                                        }
                                        @endphp
                
                                        <tr>
                                            <td><a href="#">{{ $tr->id }}</a></td>
                                            <td class="font-weight-600">{{ $tr->user->name }}</td>
                                            <td>
                                                <div class="badge badge-{{ $status_color }}">{{ $status }}</div>
                                            </td>
                                            <td>
                                                {{ $tr->book_startdate ? date('d F Y', strtotime($tr->book_startdate)) : null}} - 
                                                {{ $tr->book_enddate ? date('d F Y', strtotime($tr->book_enddate)) : null}}
                                            </td>
                                            <td>
                                                <a href="{{ url('list-transaksi/' . $tr->id) }}" class="btn btn-primary">DETAIL</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
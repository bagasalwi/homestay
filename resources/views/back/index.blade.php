@extends('back.layouts.master')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>TOTAL PENGGUNA</h4>
                        </div>
                        <div class="card-body">
                            {{ $userCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-door-closed"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>TOTAL KAMAR</h4>
                        </div>
                        <div class="card-body">
                            {{ $kamarCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>BUTUH PERPANJANG</h4>
                        </div>
                        <div class="card-body">
                            {{ $transactionRenewCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>KAMAR KOSONG</h4>
                        </div>
                        <div class="card-body">
                            {{ $kamarKosongCount }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Statistik Pesanan</div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $transactionSuccessCount }}</div>
                                <div class="card-stats-item-label">LUNAS</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $transactionUnverifiedCount }}</div>
                                <div class="card-stats-item-label">BELUM VERIFIED</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $transactionVoidCount }}</div>
                                <div class="card-stats-item-label">HANGUS</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pesanan</h4>
                        </div>
                        <div class="card-body">
                            {{ $transactionCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="card" style="width:100%;">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Tambah Kamar ?</h4>
                        <hr>
                        <p class="card-text">Klik tombol dibawah ini untuk menambah kamar baru untuk di daftarkan pada
                            website
                            omah saras!</p>
                        <a href="{{ url('kamar/create') }}" class="btn btn-lg btn-primary">Tambah Kamar Baru</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Transaksi Terakhir</h4>
                <div class="card-header-action">
                    <a href="{{ url('pesanan') }}" class="btn btn-danger">Lihat Selanjutnya <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
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
                                <a href="{{ url('pesanan/edit/' . $tr->id) }}" class="btn btn-primary">DETAIL</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
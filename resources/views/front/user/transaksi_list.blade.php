@extends('front.layouts.master_transaction')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ $error }}
            </div>
        </div>
        @endforeach
        @endif

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>{{ $message }}</strong>
            </div>
        </div>
        @endif

        @if (Auth::user()->nik == null)
        <div class="row">
            <div class="col-md-12 mb-4">
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
        @elseif(count($transaction) == 0)
        <div class="d-flex justify-content-center">
            <div class="col-md-6 mb-4 text-center">
                <img src="{{ URL::asset('custom-images/undraw/8.svg')}}" alt="Image" class="img-fluid">
                <h4>Kamu belum punya kamar yang aktif!</h4>
                <p>
                    kamu bisa cek menu kamar untuk melihat jenis kamar dan memesan langsung.
                </p>
                <a href="{{ URL('jenis-kamar') }}" class="btn btn-primary mt-2" target="_blank">Cek Kamar</a>
            </div>
        </div>
        @elseif(count($transaction) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Transaski</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama</th>
                                        <th>Kamar</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Harga</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp

                                    @foreach ($transaction as $row)

                                    @php
                                    $status = "";
                                    $status_color = "";

                                    if($row->payment_status == 'N'){
                                    $status = 'BELUM SELESAI';
                                    $status_color = 'danger';
                                    }else if($row->payment_status == 'C'){
                                    $status = 'BELUM DIBAYAR';
                                    $status_color = 'info';
                                    }else if($row->payment_status == 'P'){
                                    $status = 'MENUNGGU VERIFIKASI ADMIN';
                                    $status_color = 'warning';
                                    }else if($row->payment_status == 'A'){
                                    $status = 'LUNAS';
                                    $status_color = 'success';
                                    }else if($row->payment_status == 'V'){
                                    $status = 'HANGUS';
                                    $status_color = 'danger';
                                    }else if($row->payment_status == 'R'){
                                    $status = 'DAPAT DIPERPANJANG';
                                    $status_color = 'success';
                                    }
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->kamar->name }}</td>
                                        <td>{{ $row->book_startdate ? date('d F Y', strtotime($row->book_startdate)) : null}}</td>
                                        <td>{{ $row->book_enddate ? date('d F Y', strtotime($row->book_enddate)) : null}}</td>
                                        <td>Rp. {{ number_format($row->transaction_price) }}</td>
                                        <td class="text-center"><span class="badge badge-{{ $status_color }}">{{ $status }}</span></td>
                                        <td class="text-center">
                                            <a href="{{ $url_edit }}/{{ $row->id }}"
                                                class="btn btn-info">PILIH</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
</div>

@endsection

@section('script')

@endsection
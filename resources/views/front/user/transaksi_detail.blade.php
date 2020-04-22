@extends('front.layouts.master_transaction')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <a href="{{ url()->previous() }}" class="mr-2"><i class="fas fa-arrow-left fa-lg"></i></a>
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

        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible show fade">
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
        @elseif(count($transaction) == 0)
        <div class="d-flex justify-content-center">
            <div class="col-6 mb-4 text-center">
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
            @foreach ($transaction as $transaction)

            @php
            $status = "";
            $status_color = "";

            if($transaction->transaction_status == 'N'){
            $status = 'TENTUKAN TANGGAL MULAI';
            $status_color = 'danger';
            }else if($transaction->transaction_status == 'C'){
            $status = 'BELUM DIBAYAR';
            $status_color = 'info';
            }else if($transaction->transaction_status == 'P'){
            $status = 'MENUNGGU VERIFIKASI ADMIN';
            $status_color = 'warning';
            }else if($transaction->transaction_status == 'A'){
            $status = 'LUNAS';
            $status_color = 'success';
            }else if($transaction->transaction_status == 'V'){
            $status = 'HANGUS';
            $status_color = 'danger';
            }
            @endphp

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Transaksi {{ $transaction->id }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5>{{ $transaction->kamarname }}</h5>
                            </div>
                            <div class="col-6">
                                <div class="text-right text-{{ $status_color }}"><strong>{{ $status }}</strong>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <p>{{ $transaction->kamardesc }}</p>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-4">
                                <h6><i class="fas fa-info-circle"></i> Tipe Kamar</h6>
                                {{ $transaction->jeniskamar }}
                            </div>
                            <div class="col-4">
                                <h6><i class="fas fa-bath"></i> Kamar Mandi</h6>
                                Kamar mandi {{ $transaction->kamar_mandi }}
                            </div>
                            <div class="col-4">
                                <h6><i class="fas fa-bolt"></i> Listrik</h6>
                                {{ $transaction->listrik }}
                            </div>
                            <div class="col-12 mt-4">
                                <h6><i class="fas fa-map-marked-alt"></i> Lokasi</h6>
                                {{ $transaction->locationdesc }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input type="text" class="form-control text-center"
                                        value="{{$transaction->book_startdate ? date('d F Y', strtotime($transaction->book_startdate)) : null}}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <input type="text" class="form-control text-center"
                                        value="{{$transaction->book_startdate ? date('d F Y', strtotime($transaction->book_enddate)) : null}}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($transaction->transaction_status == 'P' || $transaction->transaction_status == 'A' ||
                    $transaction->transaction_status == 'V' || $transaction->transaction_status == 'R')
                    @else
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h6 class="text-danger" id="countdown"></h6>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button onclick="CancelKamar({{ $transaction->id }})" class="btn btn-danger">Batalkan
                                    Pesanan</button>
                                <button data-id="{{ $transaction->id }}" id="btn-modal" class="btn btn-primary"
                                    data-toggle="modal" data-target="#exampleModalCenter">Tentukan tanggal</button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <h6>Kamar</h6>
                        <div class="mb-1">{{ $transaction->jeniskamar }}</div>
                        <h6>Tipe Kamar Mandi</h6>
                        <div class="mb-1">Kamar mandi {{ $transaction->kamar_mandi }}</div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <h6>Total Pembayaran</h6>
                            </div>
                            <div class="col-6 text-right">Rp. {{ number_format($transaction->transaction_price) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        @if($transaction->transaction_status == 'A' || $transaction->transaction_status == 'R')
                        <a class="btn btn-lg btn-outline-primary btn-block disabled"><strong>LUNAS</strong></a>
                        @elseif ($transaction->transaction_status == 'V')
                        <a type="submit" class="btn btn-lg btn-outline-primary btn-block disabled"><strong>HANGUS</strong></a>
                        @elseif ($transaction->book_startdate)
                        <a href="{{ url('bayarkamar/' . $transaction->id) }}" type="submit"
                            class="btn btn-lg btn-outline-primary btn-block"><strong>LANJUTKAN</strong></a>
                        @else
                        <a class="btn btn-lg btn-outline-primary btn-block disabled"><strong>LANJUTKAN</strong></a>
                        @endif
                    </div>
                </div>
            </div>

            <script>
                CountDownTimer('{{ $transaction->created_at }}', 'countdown');
                function CountDownTimer(dt, id)
                {
                    var end = new Date('{{ \Carbon\Carbon::parse($transaction->created_at)->addHours(5) }}');
                    var _second = 1000;
                    var _minute = _second * 60;
                    var _hour = _minute * 60;
                    var _day = _hour * 24;
                    var timer;
                    function showRemaining() {
                        var now = new Date();
                        var distance = end - now;
                        if (distance < 0) {

                            clearInterval(timer);
                            document.getElementById(id).innerHTML = '<b>void</b> ';
                            return;
                        }
                        var days = Math.floor(distance / _day);
                        var hours = Math.floor((distance % _day) / _hour);
                        var minutes = Math.floor((distance % _hour) / _minute);
                        var seconds = Math.floor((distance % _minute) / _second);

                        document.getElementById(id).innerHTML = days + 'days ';
                        document.getElementById(id).innerHTML += hours + 'hrs ';
                        document.getElementById(id).innerHTML += minutes + 'mins ';
                        document.getElementById(id).innerHTML += seconds + 'secs';
                    }
                    timer = setInterval(showRemaining, 1000);
                }
            </script>
            @endforeach
        </div>
        @endif
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tentukan tanggal mulai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/pesankamartanggal') }}" method="POST" id="form">
                @csrf
                <input type="hidden" name="transaction_id" id="transaction_id" value="">

                <div class="modal-body">
                    <span>
                        Masukan tanggal dibawah ini! tanggal dihitung dengan periode <strong>1
                            bulan</strong>
                    </span>

                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="form-group col-md-5 col-12">
                                <label>Tanggal Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="tanggal" class="form-control datepicker">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="test1">Konfirmasi Tanggal</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    $(document).on("click", "#btn-modal", function () {
        var itemid = $(this).data('id');
        $("#transaction_id").val(itemid);        
    });

    function CancelKamar(id){       
        swal({
        title: "Delete?",
        text: "Apa kamu serius untuk membatalkan pesanan kamar ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('/cancelkamar') }}" + "/" + id,
            success: function(){
                swal("Pesanan dibatalkan!","Transaksi sudah diclose!","success");
                setInterval(function(){ window.location.href = "{{ url('/list-transaksi') }}" }, 1000);
            },
            error: function(){
                swal("Error!", "", "Error");
            }});
        }
      });
    }
</script>
@endsection
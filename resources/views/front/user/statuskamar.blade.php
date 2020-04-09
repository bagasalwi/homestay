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
        @elseif(count($transaction) == 0 || $transaction == null)
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

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>KAMAR No {{ $transaction->kamar->number }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h4>{{ $transaction->kamar->name }}</h4>
                            </div>
                            <div class="col-6">
                                <div class="text-right text-{{ $status_color }}"><strong>
                                        <h4>AKTIF</h4>
                                    </strong>
                                </div>
                            </div>
                            <div class="col-12">
                                <p>{{ $transaction->kamar->description }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                            <div class="col-4">
                                <h5><i class="fas fa-info-circle"></i> Tipe Kamar</h6>
                                    {{ $transaction->kamar->jeniskamar->name }}
                            </div>
                            <div class="col-4">
                                <h5><i class="fas fa-bath"></i> Kamar Mandi</h6>
                                    Kamar mandi {{ $transaction->kamar->jeniskamar->kamar_mandi}}
                            </div>
                            <div class="col-4">
                                <h5><i class="fas fa-bolt"></i> Listrik</h6>
                                    {{ $transaction->kamar->jeniskamar->listrik }}
                            </div>
                            <div class="col-12 mt-4">
                                <h5><i class="fas fa-map-marked-alt"></i> Lokasi</h5>
                                {{ $transaction->kamar->location->description }}
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
                    <div class="card-footer text-right">
                        @if($transaction->transaction_status == 'R')
                        <button onclick="PerpanjangKamar({{ $transaction->id }})" class="btn btn-lg btn-info">PERPANJANG</button>
                        @elseif ($transaction->transaction_status == 'P' && $transaction->transaction_status == 'A' &&
                        $transaction->transaction_status == 'V')
                        <button onclick="CancelKamar({{ $transaction->id }})" class="btn btn-lg btn-danger">Batalkan
                            Pesanan</button>
                        <button data-id="{{ $transaction->id }}" id="btn-modal" class="btn btn-lg btn-primary"
                            data-toggle="modal" data-target="#exampleModalCenter">Tentukan tanggal</button>
                        @else

                        @endif
                    </div>
                </div>
            </div>
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
                setInterval('window.location.reload()', 1000);
            },
            error: function(){
                swal("Error!", "", "Error");
            }});
        }
      });
    }

    function PerpanjangKamar(id){       
        swal({
        title: "Perpanjang?",
        text: "Perpanjang akan otomatis membuat transaksi baru dengan 1 bulan tanggal terakhir, apakah anda ingin memperpanjang kamar ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('/perpanjang') }}" + "/" + id,
            success: function(){
                swal("Transaksi telah dibuat!","menuju transaksi..","success");
                setInterval('window.location.reload()', 1000);
            },
            error: function(){
                swal("Error!", "", "Error");
            }});
        }
      });
    }
</script>
@endsection
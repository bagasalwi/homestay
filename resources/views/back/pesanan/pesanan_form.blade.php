@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pesanan</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pesanan</h2>
            <p class="section-lead">
                Pesanan kamar untuk pembeli
            </p>
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

            @php
            $status = "";
            $status_color = "";

            if($transaction->payment_status == 'N'){
            $status = 'BELUM SELESAI';
            $status_color = 'danger';
            }else if($transaction->payment_status == 'C'){
            $status = 'BELUM DIBAYAR';
            $status_color = 'info';
            }else if($transaction->payment_status == 'P'){
            $status = 'MENUNGGU VERIFIKASI ADMIN';
            $status_color = 'warning';
            }else if($transaction->payment_status == 'A'){
            $status = 'LUNAS';
            $status_color = 'success';
            }else if($transaction->payment_status == 'V'){
            $status = 'HANGUS';
            $status_color = 'danger';
            }
            @endphp

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="forms-sample">
                            <div class="card-header">
                                <h4>Pesanan {{ $transaction->id }}</h4>
                                <span class="badge badge-{{ $status_color }}">{{ $status }}</span>
                            </div>
                            <div class="card-body">
                                {{-- TAB LIST START --}}
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Detail Pesanan</a>
                                    </li>
                                    @if($transaction->transaction_status == 'P' || $transaction->transaction_status == 'A' || $transaction->transaction_status == 'V')
                                    <li class="nav-item">
                                        <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab"
                                            aria-controls="detail" aria-selected="false">Bukti Bayar</a>
                                    </li>
                                    @endif
                                </ul>
                                <form action="">
                                    @csrf
                                    <div class="tab-content tab-bordered" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Pemesan</label>
                                                        <h6><a href="{{ url('user/update') .'/'.  $transaction->user_id }}">{{ $transaction->user->name }}</a></h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Kamar</label>
                                                        <h6><a href="{{ url('kamar/update') .'/'.  $transaction->kamar->id }}">{{ $transaction->kamar->name }}</a></h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Tanggal Mulai</label>
                                                        <h6>{{ $transaction->book_startdate ? date('d F Y', strtotime($transaction->book_startdate)) : null}}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Tanggal Akhir</label>
                                                        <h6>{{ $transaction->book_enddate ? date('d F Y', strtotime($transaction->book_enddate)) : null}}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Harga</label>
                                                        <h6>Rp. {{ number_format($transaction->transaction_price) }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Nomor Kamar</label>
                                                        <h6>{{ $transaction->kamar->number }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Tipe Kamar</label>
                                                        <h6>{{ $transaction->kamar->jeniskamar->name }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Listrik</label>
                                                        <h6>{{ $transaction->kamar->jeniskamar->listrik }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label>Kamar Mandi</label>
                                                        <h6>{{ $transaction->kamar->jeniskamar->kamar_mandi }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Lokasi</label>
                                                        <h6>{{ $transaction->kamar->location->description }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="detail" role="tabpanel"
                                            aria-labelledby="detail-tab">
                                            @foreach ($transaction->payment as $p)
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Nama Transfer</label>
                                                        <h6>{{ $p->nama_transfer }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Bank Transfer</label>
                                                        <h6>{{ $p->bank_transfer }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Rekening Transfer</label>
                                                        <h6>{{ $p->rekening_transfer }}</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Bukti Transfer</label>
                                                        <br>
                                                        <img alt="image"
                                                            src="{{ URL::asset('bukti-transfer/' . $p->bukti_transfer) }}"
                                                            class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-lg btn-secondary mr-2">CANCEL</a>
                                @if ($transaction->transaction_status == 'A'|| $transaction->transaction_status == 'V')
                                <button class="btn btn-lg btn-success disabled">APPROVE</button>
                                @elseif($transaction->transaction_status == 'C' || $transaction->transaction_status == 'N')
                                <button class="btn btn-lg btn-success disabled">APPROVE</button>
                                @else
                                <button class="btn btn-lg btn-success" onclick="ApproveTransaction({{ $transaction->id }})">APPROVE</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function ApproveTransaction(id){       
    swal({
    title: "Approve Transaksi?",
    text: "Apa kamu ingin men-approve transaksi ini?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        url: "{{ url('pesanan/approve') }}" + "/" + id,
        success: function(){
            swal("Done!","Transaski berhasil di approve!","success");
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
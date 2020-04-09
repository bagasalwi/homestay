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


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Transaksi #{{ $transaction->id }}</h4> <br>
                        <h4 class="text-{{ $status_color }}">{{ $status }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <h6><strong>Informasi Pemesan :</strong></h6>
                                            <strong>Nama Lengkap : </strong> {{ $user->name }}<br>
                                            <strong>No Telepon : </strong>{{ $user->telepon }}<br>
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <h6><strong>Tanggal Pesan :</strong></h6>
                                            {{ date('d F Y', strtotime($transaction->book_startdate)) }} -
                                            {{ date('d F Y', strtotime($transaction->book_enddate)) }}<br>
                                        </address>
                                        <address>
                                            <h6><strong>Lokasi Kontrakan :</strong></h6>
                                            {{ $kamar->location->description }}<br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <td>{{ $kamar->jeniskamar->name }} - Kamar mandi
                                        {{ $kamar->jeniskamar->kamar_mandi }} -
                                        {{ $kamar->jeniskamar->listrik }}</td>
                                    <td>{{ $kamar->location->description }}</td>
                                    <td class="text-right">Rp.
                                        {{ number_format($transaction->transaction_price) }}</td>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-md-right">
                            <button class="btn btn-lg btn-primary btn-icon icon-left" data-id="{{ $transaction->id }}" id="btn-modal"
                                data-toggle="modal" data-target="#modalKonfirmasi"><i class="fas fa-wallet"></i>
                                Konfirmasi Pembayaran</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
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
                <img src="{{ URL::asset('front/myimages/undraw/8.svg')}}" alt="Image" class="img-fluid">
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

<!-- Modal -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasiTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/konfirmasipembayaran') }}" enctype="multipart/form-data" method="POST" id="form">
                @csrf
                <input type="hidden" name="transaction_id" id="transaction_id" value="">

                <div class="modal-body">
                    <span>
                        Isi form dibawah ini untuk memastikan anda telah menyewa kontrakan
                    </span>

                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="form-group col-md-4 col-12">
                                <label>Nama</label>
                                <div class="input-group">
                                    <input type="text" name="nama_transfer"
                                        class="form-control" required="" value="{{ $payment->nama_transfer }}">
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label>Nama Bank</label>
                                <div class="input-group">
                                    <input type="text" name="bank_transfer"
                                        class="form-control" required="" value="{{ $payment->bank_transfer }}">
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label>Rekening Bank</label>
                                <div class="input-group">
                                    <input type="text" name="rekening_transfer"
                                        class="form-control" required="" value="{{ $payment->rekening_transfer }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label>Bukti Transfer</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="bukti_transfer">
                                    <small class="form-text text-muted">
                                        Attachment bisa berupa screenshot bukti pembayaran.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="test1">Konfirmasi</button>
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
</script>
@endsection
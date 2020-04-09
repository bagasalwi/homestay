@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pesanan</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Manage Pesanan</h2>
            <p class="section-lead">
                Menu pengelola Pesanan untuk kontrakan dan homestay.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Pembeli</th>
                                            <th>No Kamar</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Harga</th>
                                            <th>Status Pembayaran</th>
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
                                        }
                                        @endphp

                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->kamar->number }}</td>
                                            <td>{{ $row->book_startdate ? date('d F Y', strtotime($row->book_startdate)) : null}}
                                            </td>
                                            <td>{{ $row->book_enddate ? date('d F Y', strtotime($row->book_enddate)) : null}}
                                            </td>
                                            <td>Rp. {{ number_format($row->transaction_price) }}</td>
                                            <td class="text-center"><span
                                                    class="badge badge-{{ $status_color }}">{{ $status }}</span></td>
                                            <td class="text-center">
                                                <a href="{{ $url_edit }}/{{ $row->id }}" class="btn btn-info">PILIH</a>
                                                @if ($row->transaction_status == 'A')
                                                <button class="btn btn-danger disabled">HANGUSKAN</button>   
                                                @else
                                                <button class="btn btn-danger" onclick="VoidTransaction({{ $row->id }})">HANGUSKAN</button>   
                                                @endif
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
        </div>
    </section>
</div>

<script>
    function VoidTransaction(id){       
        swal({
        title: "Void Transaksi?",
        text: "Apa kamu ingin men-void / hanguskan transaksi ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('kamar/void') }}" + "/" + id,
            success: function(){
                swal("Done!","Transaski berhasil di hanguskan!","success");
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
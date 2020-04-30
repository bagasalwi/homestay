@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kamar</h1>
        </div>

        <div class="section-body">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h4 class="card-title text-primary">Tambah Kamar ?</h4>
                    <hr>
                    <p class="card-text">Klik tombol dibawah ini untuk menambah kamar baru untuk di daftarkan pada website omah saras!</p>
                    <a href="{{ $url_create }}" class="btn btn-lg btn-primary">Tambah Kamar Baru</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-10">
                                <h4>List Kamar</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Name</th>
                                            <th>Pemesan</th>
                                            <th>Tipe</th>
                                            <th>Location</th>
                                            <th>Harga</th>
                                            <th>Tanggal Awal</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp

                                        @foreach ($kamar_array as $row)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->user_id }}</td>
                                            <td>{{ $row->jeniskamar }}</td>
                                            <td>{{ $row->locationname }}</td>
                                            <td>Rp.{{ number_format($row->harga) }}</td>
                                            <td>{{ $row->start_date }}</td>
                                            <td>{{ $row->end_date }}</td>
                                            @if($row->status == 'A')
                                            <td><span class="badge badge-success">Active</span></td>
                                            @elseif($row->status == 'B')
                                            <td><span class="badge badge-warning">Booked</span></td>
                                            @elseif($row->status == 'R')
                                            <td><span class="badge badge-info">Ready</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Inactive</span></td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{ $url_update }}/{{ $row->id }}"
                                                    class="btn btn-primary">PILIH</a>
                                                @if ($row->user_id)
                                                <button class="btn btn-danger disabled">HAPUS</button>
                                                @else
                                                <button class="btn btn-danger"
                                                    onclick="deleteSidebar({{ $row->id }})">HAPUS</button>
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
    function deleteSidebar(id){       
        swal({
        title: "Delete?",
        text: "Apa kamu ingin men-delete kamar ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('kamar/delete') }}" + "/" + id,
            success: function(){
                swal("Done!","Kamar udah ke delete ya!","success");
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
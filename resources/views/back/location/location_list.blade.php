@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lokasi</h1>
        </div>

        <div class="section-body">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h4 class="card-title text-primary">Tambah Lokasi ?</h4>
                    <hr>
                    <p class="card-text">Klik tombol dibawah ini untuk menambah lokasi baru untuk di daftarkan pada website omah saras!</p>
                    <a href="{{ $url_create }}" class="btn btn-lg btn-primary">Tambah lokasi Baru</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-11">
                                <h4>List Lokasi</h4>
                            </div>
                            <div class="col-1">
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
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp

                                        @foreach ($location_array as $row)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->description }}</td>
                                            @if($row->status == 'A')
                                            <td><span class="badge badge-success">Aktif</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Tidak Aktif</span></td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{ $url_update }}/{{ $row->id }}"
                                                    class="btn btn-primary">EDIT</a>
                                                <button class="btn btn-danger"
                                                    onclick="deleteLocation({{ $row->id }})">HAPUS</button>
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
    function deleteLocation(id){       
        swal({
        title: "Delete?",
        text: "Apa kamu ingin men-delete location ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('location/delete') }}" + "/" + id,
            success: function(){
                swal("Done!","location udah ke delete ya!","success");
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
@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lokasi</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Lokasi</h2>
            <p class="section-lead">
                Menambahkan Lokasi dengan jenis-jenisnya untuk user.
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

            @foreach ($fields as $fields)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form enctype="multipart/form-data" class="forms-sample" action="{{ url('location/save') }}"
                            method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $fields->id }}">
                            <input type="hidden" name="status" value="{{ $fields->status }}">
                            <input type="hidden" name="state" value="{{ $state }}">

                            <div class="card-header">
                                @if($state == 'create')
                                <h4>Buat Lokasi Baru</h4>
                                @else
                                <h4>{{ $fields->name }}</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama Lokasi" value="{{ $fields->name }}">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label>Deskripsi Lokasi</label>
                                            <input type="text" class="form-control" id="description" name="description"
                                                placeholder="description" value="{{ $fields->description }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        Status : &nbsp;
                                        @if($fields->status == 'A')
                                        <span class="badge badge-success">Aktif</span>
                                        @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary mr-1" type="submit">SIMPAN</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">BATAL</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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

            @if ($state == 'update')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lokasi Galeri</h4>
                            <div class="card-header-action">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate"><i
                                        class="fas fa-plus"></i> Tambah Gambar</button>
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-secondary" href="#"><i
                                        class="fas fa-minus"></i></a>
                            </div>
                        </div>



                        <div class="collapse show" id="mycard-collapse">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp

                                            @foreach ($detail as $row)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td>
                                                    <div class="gallery">
                                                        <div class="gallery-item"
                                                            data-image="{{ URL::asset('custom-images/location/' . $row->image) }}"
                                                            data-title="{{ $row->image }}"></div>
                                                    </div>
                                                </td>
                                                @if($row->status == 'A')
                                                <td><span class="badge badge-success">Active</span></td>
                                                @else
                                                <td><span class="badge badge-danger">Inactive</span></td>
                                                @endif
                                                <td class="text-center">
                                                    <button class="btn btn-danger"
                                                        onclick="deleteDetailLocation({{ $row->id }})">HAPUS</button>
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
            @endif
            @endforeach
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalCreate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah gambar lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/location-detail/create') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="location_id" value="{{ $fields->id }}">
                    <input type="hidden" name="location" value="{{ $fields->name }}">
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function deleteDetailLocation(id){       
        swal({
        title: "Hapus?",
        text: "Apa kamu ingin menghapus gambar ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('location-detail/delete') }}" + "/" + id,
            success: function(){
                swal("Done!","Gambar berhasil di hapus!","success");
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
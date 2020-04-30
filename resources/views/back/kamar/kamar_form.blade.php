@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kamar</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Kamar</h2>
            <p class="section-lead">
                Menambahkan kamar dengan jenis-jenisnya untuk user.
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

            @foreach ($fields as $fields)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @if($state == 'create')
                            <h4>Buat Kamar Baru</h4>
                            @else
                            <h4>{{ $fields->number }} - {{ $fields->name }} &nbsp;</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            {{-- TAB LIST START --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Forms</a>
                                </li>
                                @if ($state == 'update')
                                <li class="nav-item">
                                    <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab"
                                        aria-controls="detail" aria-selected="false">Detail Gambar</a>
                                </li>
                                @endif
                            </ul>
                            {{-- TAB LIST END --}}
                            <div class="tab-content tab-bordered" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <form class="forms-sample" action="{{ url('kamar/save') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $fields->id }}">
                                        <input type="hidden" name="status" value="{{ $fields->status }}">
                                        <input type="hidden" name="state" value="{{ $state }}">


                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nama Kamar</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Nama Kamar" value="{{ $fields->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Nomor Kamar</label>
                                                        <input type="text" class="form-control" id="number"
                                                            name="number" placeholder="number"
                                                            value="{{ $fields->number }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label>Lantai Kamar</label>
                                                        <input type="text" class="form-control" id="floor" name="floor"
                                                            placeholder="floor" value="{{ $fields->floor }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Tipe Kamar</label>
                                                        <select class="form-control select2" id="jeniskamar_id" name="jeniskamar_id">
                                                            @foreach ($jeniskamar as $r)
                                                            <option value="{{ $r->id }}"
                                                                {{ $fields->jeniskamar_id == $r->id ? 'selected' : '' }}>
                                                                {{ $r->name }} - {{ $r->listrik }} - kamar mandi
                                                                {{ $r->kamar_mandi }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Harga</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    Rp.
                                                                </div>
                                                            </div>
                                                            <input type="number" step="0.01" class="form-control"
                                                                id="harga" name="harga" placeholder="Harga Kamar"
                                                                value="{{ $fields->harga }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Deskripsi Kamar</label>
                                                        <input type="text" class="form-control" id="description"
                                                            name="description" placeholder="description"
                                                            value="{{ $fields->description }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Lokasi</label>
                                                        <select class="form-control select2" id="location_id"
                                                            name="location_id">
                                                            @foreach ($location as $r)
                                                            <option value="{{ $r->id }}"
                                                                {{ $fields->location_id == $r->id ? 'selected' : '' }}>
                                                                {{ $r->name }} - {{ $r->description }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer text-right">
                                            <div class="row">
                                                <div class="col-md-6 text-left">
                                                    Status : &nbsp;
                                                    @if($fields->status == 'A')
                                                    <span class="badge badge-success">Active</span>
                                                    @elseif($fields->status == 'B')
                                                    <span class="badge badge-warning">Booked</span>
                                                    @elseif($fields->status == 'R')
                                                    <span class="badge badge-info">Ready</span>
                                                    @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-lg btn-primary mr-1" type="submit">SIMPAN</button>
                                                    <a href="{{ url()->previous() }}"
                                                        class="btn btn-lg btn-secondary">BATAL</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @if ($state == 'update')
                                <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                    <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#modalCreate">
                                        <i class="fas fa-plus"></i> TAMBAH GAMBAR
                                    </button>
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
                                                                data-image="{{ URL::asset('custom-images/kamar_detail/' . $row->image) }}"
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
                                                            onclick="deleteDetailKamar({{ $row->id }})">HAPUS GAMBAR</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

{{-- Modal Detail --}}
<div class="modal fade" tabindex="-1" role="dialog" id="modalCreate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/kamar-detail/create') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="kamar_id" value="{{ $fields->id }}">
                    <input type="hidden" name="kamar" value="{{ $fields->name }}">
                    <div class="form-group">
                        <label>Upload Gambar Kamar</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function deleteDetailKamar(id){       
        swal({
        title: "Delete?",
        text: "Apa kamu ingin men-delete gambar location ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('kamar-detail/delete') }}" + "/" + id,
            success: function(){
                swal("Done!","gambar kamar udah ke delete ya!","success");
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
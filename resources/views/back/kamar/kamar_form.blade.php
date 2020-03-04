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

            @foreach ($fields as $fields)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="forms-sample" action="{{ url('kamar/save') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $fields->id }}">
                            <input type="hidden" name="status" value="{{ $fields->status }}">
                            <input type="hidden" name="state" value="{{ $state }}">

                            <div class="card-header">
                                @if($state == 'create')
                                <h4>Buat Kamar Baru</h4>
                                @else
                                <h4>{{ $fields->number }} - {{ $fields->name }} &nbsp;</h4>                                    
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-primary"
                                            data-toggle="dropdown">Actions</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a onclick="approveKamar({{ $fields->id }})"
                                                class="dropdown-item has-icon"><i class="fas fa-check"></i>
                                                Set Ready</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Nama Kamar</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama Kamar" value="{{ $fields->name }}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Nomor Kamar</label>
                                            <input type="text" class="form-control" id="number" name="number"
                                                placeholder="number" value="{{ $fields->number }}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Lantai Kamar</label>
                                            <input type="text" class="form-control" id="floor" name="floor"
                                                placeholder="floor" value="{{ $fields->floor }}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Tipe Kamar</label>
                                            <input type="text" class="form-control" id="type" name="type"
                                                placeholder="type" value="{{ $fields->type }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label>Deskripsi Kamar</label>
                                            <input type="text" class="form-control" id="description" name="description"
                                                placeholder="description" value="{{ $fields->description }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select class="form-control select2" id="location" name="location">
                                                @foreach ($location as $r)
                                                <option value="{{ $r->name }} - {{ $r->description }}">{{ $r->name }} -
                                                    {{ $r->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <div class="row">
                                    <div class="col-6 text-left">
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
                                    <div class="col-6">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>


<script>
    function approveKamar(id){       
        swal({
        title: "Ready?",
        text: "Apa kamu ingin mengganti status kamar ini menjadi ready?",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('kamar/approve') }}" + "/" + id,
            success: function(){
                swal("Done!","Kamar sudah di set ke status ready!","success");
                setInterval('window.location.reload()', 1000);
            },
            error: function(){
                swal("Error!", "Error", "Error");
            }});
        }
      });
    }
</script>
@endsection
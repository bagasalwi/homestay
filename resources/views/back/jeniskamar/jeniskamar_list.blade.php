@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
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

        <div class="section-body">
            <h2 class="section-title">Manage Jenis Kamar</h2>
            <p class="section-lead">
                Menu pengelola Jenis Kamar untuk kontrakan dan homestay.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-11">
                                <h4>List Jenis Kamar</h4>
                            </div>
                            <div class="col-1">
                                <a href="{{ $url_create }}" class="btn btn-primary">Create New</a>
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
                                            <th>Thumbnail</th>
                                            <th>Jenis Listrik</th>
                                            <th>Jenis Kamar Mandi</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp

                                        @foreach ($jeniskamar_array as $row)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td style=" width: 10%;">{{ $row->description }}</td>
                                            <td>
                                                @if ($row->thumbnail)
                                                <div class="gallery">
                                                    <div class="gallery-item"
                                                        data-image="{{ URL::asset('custom-images/jeniskamar/' . $row->thumbnail) }}"
                                                        data-title="{{ $row->thumbnail }}"></div>
                                                </div>
                                                @else
                                                <span>Belum ada Gambar</span>
                                                @endif
                                            </td>
                                            <td>{{ $row->listrik }}</td>
                                            <td>{{ $row->kamar_mandi }}</td>
                                            <td class="text-center">
                                                <a href="{{ $url_update }}/{{ $row->id }}" class="btn btn-primary"><i
                                                        class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger"
                                                    onclick="deleteJenisKamar({{ $row->id }})"><i
                                                        class="fas fa-trash"></i></button>
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
    function deleteJenisKamar(id){       
        swal({
        title: "Delete?",
        text: "Apa kamu ingin men-delete jenis kamar ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            url: "{{ url('jeniskamar/delete') }}" + "/" + id,
            success: function(){
                swal("Done!","Jenis Kamar Berhasil di Delete!","success");
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
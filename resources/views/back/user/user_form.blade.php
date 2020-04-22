@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Pengguna</h1>
        </div>

        <div class="section-body">
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $user->name }} </h4>
                        </div>
                        <div class="card-body">
                            {{-- TAB LIST START --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Detail</a>
                                </li>
                            </ul>
                            {{-- TAB LIST END --}}
                            <div class="tab-content tab-bordered" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" value="{{ $user->name }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" value="{{ $user->email }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>No Telepon</label>
                                                    <input type="text" class="form-control" value="{{ $user->telepon }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Negara Asal</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->national }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Alamat Asli</label>
                                                    <input type="text" class="form-control" value="{{ $user->address }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Tempat Kerja</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->tempat_kerja }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="form-group">
                                                    <label>Tipe</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->identity1 }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Nomor Induk</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->identity2 }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        @if ($user->attachment != null)
                                        <button class="btn btn-lg btn-warning" data-toggle="modal" data-target="#exampleModal"><i
                                                class="fas fa-user-edit"></i> Lihat Attachment</button>
                                            @endif
                                        <button class="btn btn-lg btn-info" data-toggle="modal" data-target="#profileModal"><i
                                                class="fas fa-user-edit"></i> Lihat Profil</button>
                                        <button class="btn btn-lg btn-danger" data-toggle="modal"
                                            data-target="#kontakDarurat"><i class="fas fa-user-shield"></i> Kontak
                                            Darurat</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="profileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto Profil - {{ $user->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img alt="image" src="{{ URL::asset('user-images/' . $user->profile_pic) }}" class="img-fluid">
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attachment - {{ $user->identity1 }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img alt="image" src="{{ URL::asset('user-attachment/' . $user->attachment) }}" class="img-fluid">
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="kontakDarurat">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light">Kontak Darurat Terdaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label>Nama Kerabat </label>
                        <input type="text" class="form-control" value="{{ $user->nama_kerabat }}" disabled>
                    </div>
                    <div class="form-group col-6">
                        <label>No Telepon Kerabat</label>
                        <input type="text" class="form-control" value="{{ $user->no_kerabat }}" required="" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
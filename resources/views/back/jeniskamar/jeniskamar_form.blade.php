@extends('back.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tambah Jenis Kamar</h2>
            <p class="section-lead">
                Menambahkan Jenis Kamar untuk user.
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
            <div class="card">
                <form class="forms-sample" action="{{ url('jeniskamar/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $fields->id }}">
                    <input type="hidden" name="state" value="{{ $state }}">

                    <div class="card-header">
                        @if($state == 'create')
                        <h4>Buat Jenis Kamar Baru</h4>
                        @else
                        <h4>{{ $fields->name }} &nbsp;</h4>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Jenis Kamar</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nama Kamar" value="{{ $fields->name }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Jenis Listrik</label>
                                    <select class="form-control select2" id="listrik" name="listrik">
                                        <option disabled value="" selected>Pilih jenis listrik</option>
                                        <option value="PLN" {{ ( $fields->listrik == 'PLN') ? 'selected' : '' }}>PLN</option>
                                        <option value="NON-PLN" {{ ( $fields->listrik == 'NON-PLN') ? 'selected' : '' }}>Non PLN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Jenis Kamar Mandi</label>
                                    <select class="form-control select2" id="kamar_mandi" name="kamar_mandi">
                                        <option disabled value="" selected>Pilih jenis Kamar Mandi</option>
                                        <option value="dalam" {{ ( $fields->kamar_mandi == 'dalam') ? 'selected' : '' }}>Kamar Mandi dalam</option>
                                        <option value="luar" {{ ( $fields->kamar_mandi == 'luar') ? 'selected' : '' }}>Kamar Mandi Luar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Deskripsi Kamar</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="description" value="{{ $fields->description }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Thumbnail Photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="thumbnail">
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Thumbnail berupa foto untuk menampilkan gambaran kamar.
                                    </small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-lg btn-primary mr-1" type="submit">SIMPAN</button>
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-secondary">BATAL</a>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection
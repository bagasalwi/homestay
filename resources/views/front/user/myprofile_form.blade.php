@extends('front.layouts.master_transaction')

@section('content')
<!-- Main Content -->
@php
// dd($identity2);
@endphp
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">

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

                    <div class="card">
                        <form enctype="multipart/form-data" method="post" class="needs-validation"
                            action="{{ url('myprofile/save') }}">
                            @csrf

                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Lengkap</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ $fields->name }}" required="">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-at"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ $fields->email }}" required="">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>Alamat (Alamat asli / alamat orang tua)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                value="{{old('address', $fields->address)}}" required="">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nomor Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="telepon"
                                                class="form-control @error('telepon') is-invalid @enderror"
                                                value="{{old('telepon', $fields->telepon)}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-12">
                                        <label>Tanggal Lahir <strong>*Opsional</strong></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="dob"
                                                class="form-control datepicker @error('dob') is-invalid @enderror"
                                                value="{{ old('dob',$fields->dob) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <label>Jenis Kelamin</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="gender"
                                                class="custom-control-input" value="male"
                                                {{ $fields->gender == 'male' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="customRadio1">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="gender"
                                                class="custom-control-input" value="female"
                                                {{ $fields->gender == 'female' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="customRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Identitas</label>
                                        <div class="input-group">
                                            <select class="custom-select col-md-3 col-12" id="inputGroupSelect05"
                                                name="identity1" required="">
                                                <option disabled value="" selected>Pilih...</option>
                                                <option value="nik">NIK</option>
                                                <option value="paspor">Paspor</option>
                                            </select>
                                            <input type="text" class="form-control" name="identity2" required=""
                                                value="{{ old('identity2',$fields->identity2) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Foto Identitas</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" name="attachment">
                                        </div>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Attachment berupa fotocopy ktp atau paspor dengan jenis jpg,png dan pdf.
                                        </small>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Kewarganegaraan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-flag"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="national"
                                                class="form-control @error('national') is-invalid @enderror" required=""
                                                value="{{ old('national',$fields->national) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Tempat Kerja <strong>*Opsional</strong></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="tempat_kerja"
                                                class="form-control @error('tempat_kerja') is-invalid @enderror"
                                                value="{{ old('tempat_kerja',$fields->tempat_kerja) }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama kerabat(Contoh:adik/kakak/ayah/ibu) <strong>*Optional</strong></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="nama_kerabat"
                                                class="form-control @error('nama_kerabat') is-invalid @enderror"
                                                value="{{ old('nama_kerabat',$fields->nama_kerabat) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>No kerabat yang bisa dihubungi (Contoh:adik/kakak/ayah/ibu) <strong>*Opsional</strong></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="no_kerabat"
                                                class="form-control @error('no_kerabat') is-invalid @enderror"
                                                value="{{ old('no_kerabat',$fields->no_kerabat) }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="formgroup col-md-12 col-12">
                                        <div class="alert alert-info alert-dismissible show fade">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert">
                                                    <span>&times;</span>
                                                </button>
                                                Masukan password kamu untuk konfirmasi meng-update profil!
                                            </div>
                                        </div>
                                        {{-- <label>Enter your password to change current user data.</label> --}}
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password" required=""
                                                class="form-control @error('password') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
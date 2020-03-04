@extends('front.layouts.master_transaction')

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

        @php
        $full_name = Auth::user()->name;
        $name = explode(' ',$full_name);
        $acronym = "";

        foreach ($name as $a) {
        $acronym .= strtoupper($a[0]);
        }
        @endphp

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <figure class="avatar avatar-xl">
                                    <img src="{{ URL::asset('user-images/' . Auth::user()->profile_pic) }}" alt="...">
                                    {{-- <a class="btn-sm btn-primary" href="">change</a> --}}
                                    <form method="get" action="{{ url('myprofile/change-image') }}">
                                        <button class="btn btn-primary" type="submit">change</button>
                                    </form>
                                </figure>
                            </div>
                            <div class="author-box-details pr-2">
                                <div class="author-box-name text-primary">
                                    <h3>{{ strtoupper($fields->name) }}</h3>
                                </div>
                                <div class="author-box-job mb-4">
                                    <h6>{{ $fields->email }}</h6>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" value="{{ $fields->name }}" required=""
                                            disabled>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ $fields->email }}" required=""
                                            disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Telephone Number</label>
                                        <input type="text" class="form-control" value="{{ $fields->telepon }}"
                                            required="" disabled>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Date of Birth</label>
                                        <input type="text" class="form-control" value="{{ $fields->dob }}" required=""
                                            disabled>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Nationally</label>
                                        <input type="text" class="form-control" value="{{ $fields->national }}"
                                            required="" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-2">
                                        <label>Identity Type</label>
                                        <input type="text" class="form-control" value="{{ $fields->identity1 }}"
                                            required="" disabled>
                                    </div>
                                    <div class="form-group col-10">
                                        <label>Identity Number</label>
                                        <input type="text" class="form-control" value="{{ $fields->identity2 }}"
                                            required="" disabled>
                                    </div>
                                </div>
                                <div class="w-100 d-sm-none"></div>
                                <div class="float-right mt-sm-0 mt-3">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i
                                            class="fas fa-user-edit"></i> See Attachment</button>
                                    <a href="{{ $url_update }}" class="btn btn-primary"><i class="fas fa-user-edit"></i>
                                        Edit
                                        Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attachment - {{ $fields->identity1 }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img alt="image" src="{{ URL::asset('user-attachment/' . Auth::user()->attachment) }}" class="img-fluid">
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
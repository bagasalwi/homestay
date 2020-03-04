@extends('front.layouts.master_transaction')

@section('content')
<!-- Main Content -->
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


                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="user-item">
                                        <img alt="image"
                                            src="{{ URL::asset('user-images/' . Auth::user()->profile_pic) }}"
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-8 mt-4">
                                    <form enctype="multipart/form-data" method="post" class="needs-validation"
                                        action="{{ url('myprofile/change-image') }}">
                                        @csrf

                                        <div class="form-group mt-4">
                                            <label>Upload Image Profile</label>
                                            <div class="custom-file">
                                                <input type="file" class="form-control" name="profile_pic">
                                                <small class="form-text text-muted">
                                                    Attachment berupa fotocopy ktp atau paspor dengan jenis jpg,png dan
                                                    pdf.
                                                </small>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-primary">Save Changes</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
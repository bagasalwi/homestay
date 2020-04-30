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
                                <div class="col-lg-3">
                                    <div class="user-item">
                                        {{-- @if (Auth::user()->profile_pic) --}}
                                        <img alt="image" id='img-upload' width="250" height="200"
                                            src="{{ URL::asset('user-images/' . Auth::user()->profile_pic) }}"
                                            >
                                        {{-- @else --}}
                                    </div>
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <form enctype="multipart/form-data" method="post" class="needs-validation"
                                        action="{{ url('myprofile/change-image') }}">
                                        @csrf

                                        <div class="form-group mt-4">
                                            <label>Upload Image Profile</label>
                                            <div class="custom-file">                                                
                                                <input type="file" class="form-control" name="profile_pic" id="imgInp" />
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


@section('script')
<script>
    $(document).ready( function() {
        
        $(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.user-item').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>    
@endsection
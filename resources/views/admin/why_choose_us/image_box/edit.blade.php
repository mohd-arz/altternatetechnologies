@extends('admin.layout.app') 
@section('title', 'Edit Image Box') 
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" integrity="sha512-UtLOu9C7NuThQhuXXrGwx9Jb/z9zPQJctuAgNUBK3Z6kkSYT9wJ+2+dh6klS+TDBCV9kNPBbAxbVD+vCcfGPaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    label{
        margin-top:.5rem;
        margin-block-end: 0;
    }
  </style>
@endsection 
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Image Box</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('whyChooseUs_.view') }}">Why Choose Us</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Image Box</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{-- <h2>{{ $site }}</h2> --}}
                    </div>

                    {{-- <div class="prism-toggle"></div> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('imageBox.update',$imageBox->id)}}" method="POST"
                        id="home-about-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <label for="title">Title<b class="text-danger">*</b></label>
                                <input type="text" name="title" class="form-control" placeholder="Title" required
                                    data-parsley-required-message="Title is required" value="{{$imageBox->title}}"/>
                                <span id="title_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="description">Description<b class="text-danger">*</b></label>
                                <textarea name="description" class="form-control" required data-parsley-required-message="Description is required">{{$imageBox->description}}</textarea>
                                <span id="description_error"></span>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-4">
                              <label for="title">Image <b class="text-danger">*</b><small>(Max 2MB,PNG only)</small> </label>
                                <input type="file" accept="Image/*" name="image" class="form-control file" id="img-file">
                                <div class="result">
                                    <i>(Old) </i><a href="{{asset('storage').'/'.$imageBox->image}}">View</a>
                                  </div>
                                  <span id="image_error"></span>
                          </div>
                        </div>


                        <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                            <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                role="status" aria-hidden="true"></span>
                            <span id="btn-text">Edit</span>
                        </button>
                        <span id="message" class="alert"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 @section('script')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js" integrity="sha512-JyCZjCOZoyeQZSd5+YEAcFgz2fowJ1F1hyJOXgtKu4llIa0KneLcidn5bwfutiehUTiOuK87A986BZJMko0eWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script>

<script>
    $(function() {
       
        $("#home-about-form").submit(function(e) {
            $("#home-about-form").parsley().validate();
            if (!$("#home-about-form").parsley().isValid()) {
                return false;
            }
            e.preventDefault();
            var data = new FormData($(this)[0]);
            var url = $(this).attr("action");
            var method = $(this).attr("method");
            submitBtn(true);
            $.ajax({
                url: url,
                method: method,
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    submitBtn(false);
                    if (response.status) {
                        toastr.options.positionClass = "toast-top-right";
                        toastr.success(response.message, {
                            timeOut: 5000,
                        });
                        setTimeout(() => {
                            window.location.href = "{{route('whyChooseUs_.view')}}"
                        }, 1000);
                    } else {
                        toastr.options.positionClass = "toast-top-right";
                        toastr.warning(response.error, {
                            timeOut: 5000,
                        });
                    }
                },
                error: function(error) {
                    submitBtn(false);
                    $.each(error.responseJSON.errors, function(key, value) {
                        $("#" + key + "_error").text(value[0]);
                    });
                },
            });
        });
    });
</script>
@endsection

@extends('admin.layout.app') 
@section('title', 'Home About') 
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
                <h1 class="page-title">Address</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('banner.view') }}">Banner</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Address</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Update Address
                    </div>

                    {{-- <div class="prism-toggle"></div> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('address.store')}}" method="POST"
                        id="home-about-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <label for="address">Address<b class="text-danger">*</b></label>
                                <input type="text" name="addr1" class="form-control" placeholder="Door No,Street,Town" required
                                    data-parsley-required-message="Main Address is required" @if($address) value="{{$address->addr1}}" @endif/>
                                <span id="addr1_error"></span>
                                <input type="text" name="addr2" class="form-control" placeholder="City,District,Pin" required
                                data-parsley-required-message="Sub Address is required" @if($address) value="{{$address->addr2}}" @endif/>
                            <span id="addr2_error"></span>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-4">
                              <label for="email">Email<b class="text-danger">*</b></label>
                              <input type="email" name="email" class="form-control" placeholder="Email" required
                                  data-parsley-required-message="Email is required" @if($address) value="{{$address->email}}" @endif/>
                              <span id="email_error"></span>
                          </div>
                      </div>
                    <div class="row">
                      <div class="col-4">
                          <label for="main_phno">Main Phone Number<b class="text-danger">*</b></label>
                          <input type="text" name="main_phno" class="form-control" placeholder="Phone Number" required
                              data-parsley-required-message="Phone Number is required" @if($address) value="{{$address->main_phno}}" @endif/>
                          <span id="main_phno_error"></span>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                        <label for="alter_phno1">Alternate Number</label>
                        <input type="text" name="alter_phno1" class="form-control" placeholder="Alternate Number" @if($address && $address->alter_phno1) value="{{$address->alter_phno1}}" @endif/>
                        <span id="alter_phno1_error"></span>
                    </div>
                </div>
                   <div class="row">
                    <div class="col-4">
                        <label for="alter_phno2">Land Line Number</label>
                        <input type="text" name="alter_phno2" class="form-control" placeholder="Alternate Number" @if($address && $address->alter_phno2) value="{{$address->alter_phno2}}" @endif/>
                        <span id="alter_phno2_error"></span>
                    </div>
                </div>
                        <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                            <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                role="status" aria-hidden="true"></span>
                            <span id="btn-text">Save</span>
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
                            window.location.href = "{{route('address.view')}}"
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

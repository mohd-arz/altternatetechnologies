@extends('admin.layout.app') 
@section('title', 'Create Clients') 
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" integrity="sha512-UtLOu9C7NuThQhuXXrGwx9Jb/z9zPQJctuAgNUBK3Z6kkSYT9wJ+2+dh6klS+TDBCV9kNPBbAxbVD+vCcfGPaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection 
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Edit Client</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clients_.view') }}">Client</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Client</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Edit Client
                    </div>

                    {{-- <div class="prism-toggle"></div> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('clients.update',$client->id)}}" method="POST"
                        id="clients-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="col-4">
                            <label for="type">Type<b class="text-danger">*</b></label>
                            <select name="type" id="type" class="form-control select2" required data-parsley-required-message="Type is required" data-parsley-errors-container="#type_error">
                              <option value="">Select a Type</option>
                              @foreach ($types as $type)
                                  <option value="{{$type->id}}" {{$client->client_type_id == $type->id ? 'selected':''}} >{{$type->title}}</option>
                              @endforeach
                            </select>
                            <span id="type_error"></span>
                          </div>
                        
                          <div class="col-4">
                              <label for="title">File <b class="text-danger">*</b><small>(Max 5MB)</small> </label>
                                <input type="file" name="file" accept="Image/*" class="form-control file" id="img-file">
                                <div class="result">
                                  <i>(Old) </i><a href="{{asset('storage').'/'.$client->img}}">View</a>
                                </div>
                                {{-- <input type="hidden" name="banner_img" id="banner_img"> --}}
                                <span id="file_error"></span>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="cropperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                  <button type="button" id="close-modal"  class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body" style="display: flex;justify-content:center;">
                                    <img id="cropper-img" style="display: block;max-width: 100%;">
                                </div>
                                <div class="modal-footer">
                                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                  <button type="button" id="save-crop" class="btn btn-primary">Edit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                            <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                role="status" aria-hidden="true"></span>
                            <span id="btn-text">Edit Client</span>
                        </button>
                        <span id="message" class="alert"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js" integrity="sha512-JyCZjCOZoyeQZSd5+YEAcFgz2fowJ1F1hyJOXgtKu4llIa0KneLcidn5bwfutiehUTiOuK87A986BZJMko0eWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
      $('.select2').select2();

    // const img = document.querySelector('#cropper-img');
    // let cropper;

    // const fileInput = document.getElementById('img-file');

    // fileInput.addEventListener('change', (event) => {
    //     $('#cropperModal').modal('show');
    //       const file = event.target.files[0];
    //     const reader = new FileReader();
    //     reader.onload = function(event){
    //         img.src = event.target.result;
    //         // Initialize the Cropper once the image has loaded
    //         if (cropper) {
    //             cropper.destroy();
    //         }

    //         cropper = new Cropper(img, {
    //             aspectRatio:16/9,
    //             dragMode: 'none',
    //             zoomable:false,
    //             // responsive:false,
    //             highlight:false,
    //             minContainerWidth:600,
    //             minContainerHeight:600,

    //             // Add any other Cropper options here
    //         });
    //     };
    //     reader.readAsDataURL(file);
    // });

    // $('#close-modal').on('click',function(){
    //   $('#cropperModal').modal('hide');
    // });


    // $('#save-crop').on('click',function(){
    //   if (cropper) {
    //         const croppedCanvas = cropper.getCroppedCanvas();
    //         const croppedImage = document.createElement('img');
    //         const bannerImg = document.querySelector('#banner_img');
    //         croppedImage.src = croppedCanvas.toDataURL();
    //         bannerImg.value = croppedCanvas.toDataURL();
    //         const result = document.querySelector('.result');
    //         result.innerHTML = '';
    //         result.appendChild(croppedImage);
    //     }
    //   $('#cropperModal').modal('hide');

    // })

        $("#clients-form").submit(function(e) {
            $("#clients-form").parsley().validate();
            if (!$("#clients-form").parsley().isValid()) {
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
                            window.location.href = "{{route('clients_.view')}}"
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

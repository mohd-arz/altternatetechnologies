@extends('admin.layout.app') 
@section('title', 'Create Home Banner') 
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
                <h1 class="page-title">Footer Image</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Footer Image</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                      Footer Image
                    </div>

                    {{-- <div class="prism-toggle"></div> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('footerImage.store')}}" method="POST"
                        id="home-banner-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-4">
                              <label for="title">Image<b class="text-danger">*</b> <small>(Max 2MB)</small> </label>
                                <input type="file" accept="Image/*" name="image" class="form-control file" id="img-file" required data-parsley-required-message="Image is required">
                                <div class="result" style="width:250px;margin-top:.5rem;">
                                  @if($footerImage)
                                  <i>(Old) </i><a href="{{asset('storage').'/'.$footerImage->image}}">View</a>
                                  @endif
                                </div>
                                <span id="image_error"></span>
                          </div>
                        </div>

                        <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                            <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                role="status" aria-hidden="true"></span>
                            <span id="btn-text">Upload</span>
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
      const img = document.querySelector('#cropper-img');
    let cropper;

    const fileInput = document.getElementById('img-file');

    fileInput.addEventListener('change', (event) => {
        $('#cropperModal').modal('show');
          const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(event){
            img.src = event.target.result;
            // Initialize the Cropper once the image has loaded
            if (cropper) {
                cropper.destroy();
            }

            cropper = new Cropper(img, {
                aspectRatio:1/1,
                zoomable:false,
                highlight:false,
                minContainerWidth:500,
                minContainerHeight:500,
                autoCropArea: 1,
                viewMode: 2,
                center: true,
                dragMode: 'move',
                movable: true,
                scalable: true,
                guides: true,
                zoomOnWheel: true,
                cropBoxMovable: true,
                wheelZoomRatio: 0.1,
            });
        };
        reader.readAsDataURL(file);
    });

    $('#close-modal').on('click',function(){
      $('#cropperModal').modal('hide');
    });


    $('#save-crop').on('click',function(){
      if (cropper) {
            const croppedCanvas = cropper.getCroppedCanvas();
            const croppedImage = document.createElement('img');
            const bannerImg = document.querySelector('#banner_img');
            croppedImage.src = croppedCanvas.toDataURL();
            bannerImg.value = croppedCanvas.toDataURL();
            const result = document.querySelector('.result');
            result.innerHTML = '';
            result.appendChild(croppedImage);
        }
      $('#cropperModal').modal('hide');

    })

        // $(".add_new_body").on("input", ".rate, .quantity", function() {
        //     let row = $(this).closest("tr");
        //     let rate = row.find(".rate").val();
        //     let quantity = row.find(".quantity").val();
        //     let amount = rate * quantity;

        //     row.find("#amount").val(amount);
        // });

        // $(".select2").select2();

        $("#home-banner-form").submit(function(e) {
            $("#home-banner-form").parsley().validate();
            if (!$("#home-banner-form").parsley().isValid()) {
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
                            window.location.href = "{{route('footerImage.view')}}"
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

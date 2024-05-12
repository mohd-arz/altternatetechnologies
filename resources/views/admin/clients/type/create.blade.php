@extends('admin.layout.app') 
@section('title', 'Create Clients') 
@section('css')
@endsection 
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Create Type</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clients_.view') }}">Client</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clients.type.view') }}">Type</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Type</li>
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
                    <form action="{{route('clients.type.store')}}" method="POST"
                        id="clients-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                              <label for="title">Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Title" required
                                  data-parsley-required-message="Title is required"/>
                              <span id="title_error"></span>
                            </div>
                          </div>
                        
                          

                        <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                            <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                role="status" aria-hidden="true"></span>
                            <span id="btn-text">Create Type</span>
                        </button>
                        <span id="message" class="alert"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
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
                            window.location.href = "{{route('clients.type.view')}}"
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

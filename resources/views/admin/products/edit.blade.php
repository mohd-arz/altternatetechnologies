@extends('admin.layout.app') 
@section('title', 'Edit Products') 
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" integrity="sha512-UtLOu9C7NuThQhuXXrGwx9Jb/z9zPQJctuAgNUBK3Z6kkSYT9wJ+2+dh6klS+TDBCV9kNPBbAxbVD+vCcfGPaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection 
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Products</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.view') }}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                    <form action="{{route('product.update',$product->id)}}" method="POST"
                        id="product-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" required
                                    data-parsley-required-message="Title is required" value="{{$product->title}}"/>
                                <span id="title_error"></span>
                            </div>
                          <div class="col-1">
                            <label for="is_home">Home Products</label>
                            <input type="checkbox" name="is_home" {{$product->is_home ? 'checked':''}}>
                        </div>
                        </div>
                          <div class="row">
                            <div class="col-12">
                              <label for="description">Description</label>
                              <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                              <span id="description_error"></span>
                            </div>
                          </div>

                        <div class="row">
                          <div class="col-4">
                              <label for="title">Image 1<small>(Max 2MB)</small> </label>
                                <input type="file" name="img1" accept="Image/*" class="form-control-file" id="img1">
                                <div class="result1">
                                  <i>(Old) </i><a href="{{asset('storage').'/'.$product->img1}}">View</a>
                                </div>
                                {{-- <input type="hidden" name="main_img" id="main_img"> --}}
                                <span id="img1_error"></span>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="cropperModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                              <div class="modal-content1">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                  <button type="button" id="close-modal"  class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body" style="display: flex;justify-content:center;">
                                    <img id="cropper-img1" style="display: block;max-width: 100%;">
                                </div>
                                <div class="modal-footer">
                                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                  <button type="button" id="save-crop" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>



                        {{-- Img 2 --}}
                        <div class="row">
                          <div class="col-4">
                              <label for="title">Image 2<small>(Max 2MB)</small> </label>
                              <input type="file" name="img2"  accept="Image/*" class="form-control-file" id="img2">
                                <div class="result2">
                                  <i>(Old) </i><a href="{{asset('storage').'/'.$product->img2}}">View</a>
                                </div>
                                {{-- <input type="hidden" name="sub_img1" id="sub_img1"> --}}
                                <span id="img2_error"></span>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="cropperModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                              <div class="modal-content2">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                  <button type="button" id="close-modal"  class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body" style="display: flex;justify-content:center;">
                                    <img id="cropper-img2" style="display: block;max-width: 100%;">
                                </div>
                                <div class="modal-footer">
                                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                  <button type="button" id="save-crop" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        {{-- IMg 3 --}}
                        <div class="row">
                          <div class="col-4">
                              <label for="title">Image 3<small>(Max 2MB)</small> </label>
                              <input type="file" name="img3" accept="Image/*" class="form-control-file" id="img3">
                                <div class="result3">
                                  <i>(Old) </i><a href="{{asset('storage').'/'.$product->img3}}">View</a>
                                </div>
                                {{-- <input type="hidden" name="sub_img2" id="sub_img2"> --}}
                                <span id="img3_error"></span>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="cropperModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                              <div class="modal-content3">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                  <button type="button" id="close-modal"  class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body" style="display: flex;justify-content:center;">
                                    <img id="cropper-img3" style="display: block;max-width: 100%;">
                                </div>
                                <div class="modal-footer">
                                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                  <button type="button" id="save-crop" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <table class="responsive-table display table-bordered" style="width: 100%; margin-top: 3rem;"
                        id="table">
                        <thead>
                            <th>Attribute</th>
                            <th>Value</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="add_new_body">
                        @if($product->getProductAttr->count() > 0)
                          @foreach ($product->getProductAttr as $key => $attr)
                          <tr @if($key > 0) class="removeTr{{ $key }}" @endif>
                            <td>
                              <input type="text" name="attribute[]" class="form-control"
                                  placeholder="Attribute" required data-parsley-required-message="Attribute is required" value="{{$attr->attribute}}"/>
                              <span id="quantity_error"></span>
                            </td>
                            <td>
                                  <input type="text" name="value[]" class="form-control"
                                      placeholder="Value" required data-parsley-required-message="Value is required" value="{{$attr->value}}" />
                                  <span id="value_error"></span>
                            </td>
                            <td>
                              @if ($key > 0)
                              <button class="btn btn-danger cyan waves-effect waves-light right"
                                  style="float: left!important;" type="button"
                                      onclick="remove({{ $key }})">-</button>
                              @else
                                  <button
                                      class="btn btn-success cyan waves-effect waves-light right add_new"
                                      style="float: left !important;" type="button"
                                      name="action">
                                      +
                                  </button>
                              @endif
                            </td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                            <td>
                              <input type="text" name="attribute[]" class="form-control"
                                  placeholder="Attribute" required data-parsley-required-message="Attribute is required"/>
                              <span id="quantity_error"></span>
                            </td>
                            <td>
                                  <input type="text" name="value[]" class="form-control"
                                      placeholder="Value" required data-parsley-required-message="Value is required"/>
                                  <span id="value_error"></span>
                            </td>
                            <td>
                                  <button class="btn btn-success cyan waves-effect waves-light right add_new"
                                      style="float: left !important;" type="button" name="action">
                                      +
                                  </button>
                            </td>
                          </tr>
                          @endif
                        </tbody>
                    </table>
                        

                        <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                            <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                role="status" aria-hidden="true"></span>
                            <span id="btn-text">Create Banner</span>
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
        // const img = document.querySelector('#cropper-img');
        // const fileInput = document.getElementById('img-file');
        // let cropper;


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
        //         const croppedImage = document.createElement('a');
        //         const bannerImg = document.querySelector('#main_img');
        //         croppedImage.href = croppedCanvas.toDataURL();
        //         croppedImage.textContent = "View";
        //         croppedImage.setAttribute('target','_blank');
        //         bannerImg.value = croppedCanvas.toDataURL();
        //         const result = document.querySelector('.result');
        //         result.innerHTML = '';
        //         result.appendChild(croppedImage);
        //     }
        //   $('#cropperModal').modal('hide');

        // })

        $("#product-form").submit(function(e) {
            $("#product-form").parsley().validate();
            if (!$("#product-form").parsley().isValid()) {
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
                            window.location.href = "{{route('product.view')}}"
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
        let count = @json($product->getProductAttr->count());

          $(".add_new").on("click", function() {
              let newRow = `<tr class="removeTr${count}" id="removeTr${count}">
                              <td>
                                  <input type="text" name="attribute[]" class="form-control"
                                      placeholder="Attribute" required data-parsley-required-message="Attribute is required"/>
                                  <span id="quantity_error"></span>
                                </td>
                                <td>
                                      <input type="text" name="value[]" class="form-control"
                                          placeholder="Value" required data-parsley-required-message="Value is required" />
                                      <span id="value_error"></span>
                                </td>
                                <td>
                                    <button class="btn btn-danger cyan waves-effect waves-light right" style="float: left!important;" type="button" onclick="remove(${count})" >-</button>
                                </td>
                            </tr>`;

              $(".add_new_body").append(newRow);

              count++;
          });
    });
    function remove(index) {
        $(".removeTr" + index).remove();
    }
</script>
@endsection

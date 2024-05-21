@extends('admin.layout.app') 
@section('title', 'Create Products') 
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
                <h1 class="page-title">Products</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services_.view') }}">Service</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Edit Product
                    </div>

                    {{-- <div class="prism-toggle"></div> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('service.product.update',$product->id)}}" method="POST"
                        id="product-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <label for="title">Title<b class="text-danger">*</b></label>
                                <input type="text" name="title" class="form-control" placeholder="Title" required
                                    data-parsley-required-message="Title is required" value="{{$product->title}}" />
                                <span id="title_error"></span>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                              <label for="description">Description</label>
                              <textarea name="description" class="editor">
                                {!!$product->description!!}
                              </textarea>
                              <span id="description_error"></span>
                          </div>
                      </div>
                      <div style="margin-top: 1rem">
                        <h4>
                          Max 3 Images
                        </h4>
                      </div>
                        <table class="responsive-table display table-bordered" style="width: 100%;"
                        id="table">
                        <thead>
                            <th>Image (Max 5MB)</th>
                            <th>Img Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="add_new_body">
                          @foreach($product->getProducts as $key => $data)
                          <tr @if($key > 0) class="removeTr{{ $key }}" @endif>
                            <td>
                              <input type="file" name="img[]" accept="Image/*" class="form-control file" id="img1">
                              <input type="hidden" value="{{$data->img}}" name="old_img[]">
                              @if($data->img)
                                <i>(Old) </i><a href="{{asset('storage').'/'.$data->img}}">View</a>
                              @endif
                              <span id="img_error"></span>
                            </td>
                            <td>
                              <textarea name="img_desc[]" id="description" class="form-control" required data-parsley-required-message="Description is required">{{$data->img_desc}}</textarea>
                              <span id="img_desc_error"></span>
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
                        </tbody>
                    </table>

                        

                        <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                            <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                role="status" aria-hidden="true"></span>
                            <span id="btn-text">Edit Banner</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script>
<script>
    $(function() {
        var editor_config = {
                  selector: '.editor',
                  directionality: document.dir,
                  path_absolute: "/",
                  menubar: '',
                  plugins: [
                      "advlist autolink lists  charmap preview hr anchor pagebreak",
                      "searchreplace wordcount visualblocks visualchars code fullscreen",
                      "insertdatetime save table contextmenu directionality",
                      "paste textcolor colorpicker textpattern"
                  ],
                  toolbar: "insertfile undo redo | formatselect styleselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen code",
                  relative_urls: false,
                  language: document.documentElement.lang,
                  height: 200,
                  branding: false
              }
          tinymce.init(editor_config);
        $("#product-form").submit(function(e) {
            document.querySelectorAll('.editor').forEach(function(editorElement) {
                    tinymce.init({
                        target: editorElement,
                    });
                });
                document.querySelectorAll('.editor').forEach(function(editorElement) {
                    var editor = tinymce.get(editorElement.id);
                    if (editor) {
                        editor.save();
                    }
                });
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
                            window.location.href = "{{route('services_.view')}}"
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
        var count = @json($product->getProducts->count());

        $(".add_new").on("click", function() {
          if($('#table tr').length < 4){

            let newRow = `<tr class="removeTr${count}" id="removeTr${count}">
                              <td>
                                <input type="file" name="img[]" accept="Image/*" class="form-control file" id="img1" required data-parsley-required-message="Image is required">
                                <span id="img_error"></span>
                              </td>
                              <td>
                                <textarea name="img_desc[]" id="description" class="form-control" required data-parsley-required-message="Description is required"></textarea>
                                <span id="img_desc_error"></span>
                              </td>
                              <td>
                                  <button class="btn btn-danger cyan waves-effect waves-light right" style="float: left!important;" type="button" onclick="remove(${count})" >-</button>
                              </td>
                            </tr>`;

            $(".add_new_body").append(newRow);

            count++;
          }
        });
    });

    function remove(index) {
        $(".removeTr" + index).remove();
    }
</script>
@endsection

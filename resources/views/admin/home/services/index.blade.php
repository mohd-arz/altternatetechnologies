@extends('admin.layout.app') 
@section('title', 'Home About') 
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" integrity="sha512-UtLOu9C7NuThQhuXXrGwx9Jb/z9zPQJctuAgNUBK3Z6kkSYT9wJ+2+dh6klS+TDBCV9kNPBbAxbVD+vCcfGPaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection 
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Services</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('banner.view') }}">Banner</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{-- <h2>{{ $site }}</h2> --}}
                    </div>

                    <div class="prism-toggle">
                      <a href="{{route('service.product.create')}}">
                        <button class="btn btn-primary">Upload Products</button>
                      </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('services.store')}}" method="POST"
                        id="home-about-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" required
                                    data-parsley-required-message="Title is required" @if($service) value="{{$service->title}}" @endif/>
                                <span id="title_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="description">Description</label>
                                <textarea name="description" class="editor">
                                    @if($service)
                                    {{$service->description}}
                                    @endif
                                </textarea>
                                <span id="description_error"></span>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-4">
                            <label for="title">Image 1<small>(Max 2MB)</small> </label>
                              <input type="file" name="img1" accept="Image/*" class="form-control-file" id="img1">
                              <div class="result1"> 
                                @if($service)
                                <i>(Old) </i><a href="{{asset('storage').'/'.$service->img1}}">View</a>
                                @endif
                              </div>
                              <span id="img1_error"></span>
                          </div>
                          <div class="col-4">
                            <label for="title">Image 2<small>(Max 2MB)</small> </label>
                              <input type="file" name="img2"  accept="Image/*" class="form-control-file" id="img2">
                              <div class="result1"> 
                                @if($service)
                                <i>(Old) </i><a href="{{asset('storage').'/'.$service->img2}}">View</a>
                                @endif
                              </div>
                              <span id="img2_error"></span>
                          </div>
                        <div class="col-4">
                          <label for="title">Image 3<small>(Max 2MB)</small> </label>
                            <input type="file" name="img3" accept="Image/*" class="form-control-file" id="img3">
                            @if($service)
                            <i>(Old) </i><a href="{{asset('storage').'/'.$service->img3}}">View</a>
                            @endif
                            <span id="img3_error"></span>
                        </div>
                        </div>

                        <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                            <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                role="status" aria-hidden="true"></span>
                            <span id="btn-text">Save</span>
                        </button>
                        <span id="message" class="alert"></span>
                    </form>
                    <table id='table' class="table table-bordered">
                      <thead>
                          <th>SI No</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                          @foreach($products as $index => $product)
                          <tr>
                              <td>{{$index + 1}}</td>
                              <td>{{$product->title}}</td>
                              <td>{!!$product->description!!}</td>
                              <td>
                                  <div style="display: flex;gap:.5rem;">
                                      <a href="{{ route('service.product.edit', $product->id) }}" class='btn btn-success btn-sm'><i class='fa fa-edit'></i>View/Edit</a>
                                      <form action="{{ route('service.product.delete', $product->id) }}" method='POST' class='delete_form'>
                                          @csrf
                                          @method('DELETE')
                                          <button type='submit' class='btn btn-danger btn-sm'>
                                              <i class='fa fa-trash'></i>
                                          </button>
                                      </form>
                                  </div>                                    
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
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

        $("#home-about-form").submit(function(e) {
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
                            window.location.href = "{{route('services.view')}}"
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

        $('#table').on('submit', '.delete_form', function(e) {
            e.preventDefault();
            let form = $(this);
            let formData = new FormData(this);
            swal({
                    title: "Confirm",
                    text: "Are you sure want to Delete ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {

                    if (isConfirm) {
                        $.ajax({
                            url: form.attr('action'),
                            method: form.attr('method'),
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                console.log(response);
                                if (response.status) {
                                    swal("Deleted!", response.message, "success");
                                    setTimeout(() => {
                                        window.location.href =
                                            "{{ route('services.view') }}";
                                    }, 1000)
                                } else {
                                    swal("Cancelled!", response.message, "error");
                                }
                            },
                        })
                    } else {
                        swal("Cancelled", "Your Deletion is cancelled", "error");
                    }
                })
        })

    });
</script>
@endsection

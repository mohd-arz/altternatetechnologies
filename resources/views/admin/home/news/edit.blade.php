@extends('admin.layout.app') 
@section('title', 'Edit News') 
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
                <h1 class="page-title">News</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news_.view') }}">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit News</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                       Edit News
                    </div>

                    {{-- <div class="prism-toggle"></div> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('news.update',$news->id)}}" method="POST"
                        id="home-banner-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="col-4">
                              <label for="title">Image<b class="text-danger">*</b><small>(Max 5MB)</small> </label>
                                <input type="file" name="img" accept="Image/*" class="form-control file" id="img-file">
                                <div  style="width:250px;margin-top:.5rem;">
                                  <i>(Old) </i><a href="{{asset('storage').'/'.$news->img}}">View</a>
                                </div>
                                <span id="img_error"></span>
                          </div>
                          <div class="col-12">
                            <label for="description">Description<b class="text-danger">*</b></label>
                            <textarea name="description" class="editor">
                              {!!$news->description!!}
                            </textarea>
                            <span id="description_error"></span>
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

        $("#home-banner-form").submit(function(e) {
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
                            window.location.href = "{{route('news_.view')}}"
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

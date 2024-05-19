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
                <h1 class="page-title">Social Media</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('banner.view') }}">Banner</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Social Media</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                      Upload Social Media
                    </div>

                    {{-- <div class="prism-toggle"></div> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('iconBox.store')}}" method="POST"
                        id="home-about-form" data-parsley-validate="true" enctype="multipart/form-data">
                        @csrf
                <table class="responsive-table display table-bordered" style="width: 100%; margin-top: 3rem;"
                id="table">
                <thead>
                    <th>Icon</th>
                    <th>Text</th>
                    <th>Action</th>
                  </thead>
                <tbody class="add_new_body">
                @if($icon_box && $icon_box->count() > 0)
                  @foreach ($icon_box as $key => $medium)
                  <tr @if($key>0) class="removeTr{{$key}}" id="removeTr{{$key}}" @endif>
                    <td>
                        <input type="text" id="font_awesome_class" name="icon[]" value="{{$medium->icon}}" class="cat_inp form-control icon-picker iconpicker-element iconpicker-input" autocomplete="off" data-parsley-trigger="change" required data-parsley-required-message="Select Icon">
                           <span id="icon_error" class="text-danger"></span>
                    </td>
                    <td>
                          <input type="text" name="text[]" class="form-control"
                              placeholder="Text" required data-parsley-required-message="text is required" value="{{$medium->text}}"/>
                          <span id="text_error"></span>
                    </td>
                    <td>
                      @if($key == 0)
                          <button class="btn btn-success cyan waves-effect waves-light right add_new"
                              style="float: left !important;" type="button" name="action">
                              +
                          </button>
                      @else
                          <button class="btn btn-danger cyan waves-effect waves-light right" style="float: left!important;" type="button" onclick="remove({{$key}})" >-</button>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td>
                        <input type="text" id="font_awesome_class" name="icon[]" class="cat_inp form-control icon-picker iconpicker-element iconpicker-input" autocomplete="off" data-parsley-trigger="change" required data-parsley-required-message="Select Icon">
                           <span id="icon_error" class="text-danger"></span>
                    </td>
                    <td>
                          <input type="text" name="text[]" class="form-control"
                              placeholder="Text" required data-parsley-required-message="Text is required" />
                          <span id="text_error"></span>
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
      $('.icon-picker').iconpicker();
       
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
                            window.location.href = "{{route('iconBox.view')}}"
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

    var iconBox = @json($icon_box);
    var count = iconBox ? iconBox.length : 1;

  $(".add_new").on("click", function() {
      let newRow = `<tr class="removeTr${count}" id="removeTr${count}">
                      <td>
                        <input type="text" id="font_awesome_class" name="icon[]" class="cat_inp form-control icon-picker iconpicker-element iconpicker-input" autocomplete="off" data-parsley-trigger="change" required data-parsley-required-message="Select Icon">
                        <span id="icon_error" class="text-danger"></span>
                        </td>
                        <td>
                          <input type="text" name="text[]" class="form-control"
                                placeholder="Text" required data-parsley-required-message="Text is required" />
                            <span id="text_error"></span>
                        </td>
                        <td>
                            <button class="btn btn-danger cyan waves-effect waves-light right" style="float: left!important;" type="button" onclick="remove(${count})" >-</button>
                        </td>
                    </tr>`;

      $(".add_new_body").append(newRow);
      $('.icon-picker').iconpicker();


      count++;
  });
  });

  function remove(index) {
  $(".removeTr" + index).remove();
  }
</script>
@endsection


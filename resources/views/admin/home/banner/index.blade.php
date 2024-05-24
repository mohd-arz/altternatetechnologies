@extends('admin.layout.app') 
@section('title', 'Edit Monthly Planner') 
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" integrity="sha512-UtLOu9C7NuThQhuXXrGwx9Jb/z9zPQJctuAgNUBK3Z6kkSYT9wJ+2+dh6klS+TDBCV9kNPBbAxbVD+vCcfGPaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection 
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Banner</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Banner</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                    </div>

                    <div class="prism-toggle">
                      <a href="{{route('banner.create')}}">
                        <button class="btn btn-primary">Create Banner</button>
                      </a>
                      <button class="btn btn-primary" id="import-brochure">
                        Import Brochure
                      </button>

                      <div class="modal fade" id="cropperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Upload Brochure</h5>
                              <button type="button" id="close-modal"  class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('banner.brochureStore')}}" method="POST" id="brochure-form" data-parsley-validate>
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="title">Brochure</label>
                                            <input type="file" name="file" class="form-control file" accept="application/pdf" required  data-parsley-required-message="Brochure is required">
                                            @if ($brochure)
                                                <i>(Old)</i>
                                                <a href="{{asset('storage').'/'.$brochure->brochure}}">View</a>
                                            @endif
                                            <span id="file_error"></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" id="save-crop" class="btn btn-primary">Save changes</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id='table' class="table table-bordered">
                        <thead>
                            <th>SI No</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Slogan</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($banners as $index => $banner)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->sub_title}}</td>
                                <td>
                                    {{$banner->slogan}}
                                </td>
                                <td>
                                    <a href="{{asset('storage').'/'.$banner->banner_img}}" target="_blank">
                                        <img loading="lazy" src="{{asset('storage').'/'.$banner->banner_img}}" width="200px" alt="">
                                    </a>
                                </td>
                                <td>
                                    <div style="display: flex;gap:.5rem;">
                                        <a href="{{ route('banner.edit', $banner->id) }}" class='btn btn-success btn-sm'><i class='fe fe-edit'></i></a>
                                        <form action="{{ route('banner.delete', $banner->id) }}" method='POST' class='delete_form'>
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit' class='btn btn-danger btn-sm'>
                                                <i class='fe fe-trash'></i>
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
<script>
    $(function() {
        $('#import-brochure').on('click',function(){
            $('#cropperModal').modal('show');
        })
        $('#close-modal').on('click',function(){
             $('#cropperModal').modal('hide');
        });


        $("#brochure-form").submit(function(e) {
            $("#brochure-form").parsley().validate();
            if (!$("#brochure-form").parsley().isValid()) {
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
                            window.location.href = "{{route('banner.view')}}"
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
                                            "{{ route('banner.view') }}";
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

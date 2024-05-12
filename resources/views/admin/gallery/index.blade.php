@extends('admin.layout.app') 
@section('title', 'Gallery Planner') 
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" integrity="sha512-UtLOu9C7NuThQhuXXrGwx9Jb/z9zPQJctuAgNUBK3Z6kkSYT9wJ+2+dh6klS+TDBCV9kNPBbAxbVD+vCcfGPaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .video_play{
        position: relative;
    }
    .video_play .video_icon{
        position: absolute;
        top: 30%;
        /* left: 50%; */
        width: 100%;
        text-align: center;
        font-size: 2rem;
    }
</style>
@endsection 
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Gallery</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                    </div>

                    <div class="prism-toggle">
                      <a href="{{route('gallery.create')}}">
                        <button class="btn btn-primary">Create Gallery</button>
                      </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id='table' class="table table-bordered">
                        <thead>
                            <th>SI No</th>
                            <th>Type</th>
                            <th>File</th>
                            <th>Home</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($galleries as $index => $gallery)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$gallery->type == 'img' ? 'Image':'Video'}}</td>
                                <td>
                                    <div style="display: flex;flex-direction:column">
                                        @if($gallery->type == 'vid')
                                            <div class="gallery-item video_play" style="width:200px;">
                                                <a data-fancybox="images" href="{{asset('storage').'/'.$gallery->file}}" >
                                                    <div class="video_icon"><i class="fa fa-play-circle"></i></div>
                                                    <video class="img-fluid home_img" width="200px" src="{{asset('storage').'/'.$gallery->file}}">
                                                </a>
                                            </div>
                                        @else
                                            <a href="{{asset('storage').'/'.$gallery->file}}" target="_blank">
                                                <img src="{{asset('storage').'/'.$gallery->file}}" width="200px" alt="">
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if($gallery->type == 'img')
                                    <label class="custom-switch form-switch mb-0">
                                        <input type="checkbox" name="custom-switch-radio" data-id="{{$gallery->id}}" class="custom-switch-input" @if($gallery->is_home)checked @endif>
                                        <span class="custom-switch-indicator custom-switch-indicator-md"></span>
                                    </label>
                                    @else
                                    --
                                    @endif
                                </td>
                                <td>
                                    <div style="display: flex;gap:.5rem;">
                                        <form action="{{ route('gallery.delete', $gallery->id) }}" method='POST' class='delete_form'>
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
<script>
    $(function() {
        $('.custom-switch-input').on('change',function(){
            let id = $(this).data('id');
            let isChecked = $(this).prop('checked');
            $.ajax({
                url:"{{route('galleryIsHome')}}",
                method:'GET',
                dataType:'JSON',
                data:{
                    id:id,
                    isChecked:isChecked,
                },
                success:function(response){
                    console.log(response);
                },
                error:function(error){
                    console.log(error);
                }
            })
        })
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
                                            "{{ route('gallery_.view') }}";
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

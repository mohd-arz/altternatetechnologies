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
                <h1 class="page-title">Products</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                    </div>

                    <div class="prism-toggle">
                      <a href="{{route('product.create')}}">
                        <button class="btn btn-primary">Create Product</button>
                      </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id='table' class="table table-bordered">
                        <thead>
                            <th>SI No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Img 1</th>
                            <th>Img 2</th>
                            <th>Img 3</th>
                            <th>Home</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $product)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>
                                    <a href="{{asset('storage').'/'.$product->img1}}" target="_blank">
                                        <img src="{{asset('storage').'/'.$product->img1}}" width="200px" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{asset('storage').'/'.$product->img2}}" target="_blank">
                                        <img src="{{asset('storage').'/'.$product->img2}}" width="200px" alt="">
                                    </a>
                                  {{-- <div style="display: flex;flex-direction:column">
                                      <img src="{{asset('storage').'/'.$product->img2}}" width="200px" alt="">
                                      <a href="{{asset('storage').'/'.$product->img2}}" target="_blank">Full View</a>
                                  </div> --}}
                              </td>
                                <td>
                                    <a href="{{asset('storage').'/'.$product->img3}}" target="_blank">
                                        <img src="{{asset('storage').'/'.$product->img3}}" width="200px" alt="">
                                    </a>
                              </td>
                              <td>{{$product->is_home==1 ? 'True':'False'}}</td>
                                <td>
                                    <div style="display: flex;gap:.5rem;">
                                        <a href="{{ route('product.edit', $product->id) }}" class='btn btn-success btn-sm'><i class='fe fe-edit'></i>View/Edit</a>
                                        <form action="{{ route('product.delete', $product->id) }}" method='POST' class='delete_form'>
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
                                            "{{ route('products.view') }}";
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

@extends('admin.layout.app')
@section('title', 'Profile')
@section('DSR', 'active')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="page-header">
                    <h1 class="page-title">Profile</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </div>
                </div>
                <div class="card">

                    <div class="card-header">
                        <div class="card-title" style="width: 100%">

                        </div>
                        <div class="prism-toggle">
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update') }}" method="POST" id="update-user-form"
                            data-parsley-validate="true">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-6 my-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control name" placeholder="Name"
                                        required data-parsley-required-message="Name is required" autocomplete="off" value="{{$user->name}}" />
                                </div>
                                <div class="col-6 my-2">
                                  <label for="email">Email</label>
                                  <input type="email" name="email" class="form-control email" placeholder="Email"
                                      required data-parsley-required-message="email is required" parsley-trigger="change" data-parsley-email autocomplete="off" value="{{$user->email}}" />
                                </div>
                                <div class="col-6 my-2">
                                  <label for="password">Password</label>
                                  <input type="password" name="password" class="form-control password" data-parsley-checkpass id="password" placeholder="Password"/>
                                </div>
                                <div class="col-6 my-2">
                                  <label for="con-password">Confirm Password</label>
                                  <input type="password" name="con-password" class="form-control con-password" parsley-trigger="change" placeholder="Confirm Password" data-parsley-equalto=".password" data-parsley-equalto-message="Confirm Password should match with Password" data-parsley-required-if="#password:filled"/>
                                </div>
                            </div>
                            <button type="submit" id="submitbtn" class="btn btn-primary mt-2" style="min-width:85px">
                                <span class="spinner-border spinner-border-sm" style="display: none" id="btn-loader"
                                    role="status" aria-hidden="true"></span>
                                <span id="btn-text">Update</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
  window.Parsley.addValidator('checkpass', {
  validateString: function(value) {
    if($('.password').val() && (!$('.con-password').val())){
      return false;
    }
  },
  messages: {
    en: 'Confirm Password is required',
  }
  });

  $(function(){
    $('#update-user-form').on('submit',function(e){
      $("#update-user-form").parsley().validate();
      if (!$("#update-user-form").parsley().isValid()) {
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
                      window.location.href = '{{ route('dashboard') }}';
                  }, 1000);

              } else {
                  toastr.options.positionClass = "toast-top-right";
                  toastr.warning(response.message, {
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
    })
  })
</script>
@endsection
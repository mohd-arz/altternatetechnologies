<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Allternate Technologies">
    <meta name="author" content="Allternate Technologies">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client') }}/image/logo-short-dark.png">

    <!-- TITLE -->
    <title>Altternate Technologies</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('admin') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('admin') }}/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('admin') }}/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('admin') }}/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{ asset('admin') }}/switcher/demo.css" rel="stylesheet">

    <style>
        .spinner-border {
            display: none;
        }
    </style>

</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img loading="lazy" src="{{ asset('admin') }}/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- Theme-Layout -->

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <a href="index.html"><img loading="lazy" src="{{ asset('client') }}/image/logo.svg"
                                height="70" width="70" class="header-brand-img" alt=""></a>
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form role="form" class="login100-form validate-form" method="POST"
                            action="{{ route('login') }}" id="login-form">
                            @csrf
                            <span class="login100-form-title pb-5">
                                Login
                            </span>
                            <div class="panel panel-primary">
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="wrap-input100 validate-input input-group"
                                                data-bs-validate="Email is required">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="text"
                                                    name="email" value="{{ old('email') }}"
                                                    placeholder="Email">
                                            </div>
                                            <span id="email_error" style="display: block; color:red"
                                                role="alert"></span>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="password"
                                                    name="password" placeholder="Password">
                                            </div>
                                            <span id="password_error" style="display: block;  color:red"
                                                role="alert"></span>
                                            {{-- <div class="text-end pt-4">
                                                <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot Password?</a></p>
                                            </div> --}}
                                            <div class="container-login100-form-btn">
                                                <!-- <input type="Submit" class="form-control btn btn-primary" id="input-button" value="Submit"> -->
                                                <button class="btn btn-primary btn-block" id="login-btn" type="submit">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Login
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('admin') }}/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('admin') }}/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ asset('admin') }}/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('admin') }}/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('admin') }}/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin') }}/js/custom.js"></script>

    <!-- Custom-switcher -->
    <script src="{{ asset('admin') }}/js/custom-swicher.js"></script>

    <!-- Switcher js -->
    <script src="{{ asset('admin') }}/switcher/js/switcher.js"></script>
    <script src="{{ asset('admin') }}/js/toastr/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/toastr.min.css">
    <script>
        @if (Session::has('message'))
            $type = "{{ Session::get('alert-type') }}";
            switch ($type) {

                case 'success':
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.success("{{ Session::get('message') }}", {
                        timeOut: 5000
                    });

                    break;
                case 'warning':
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.warning("{{ Session::get('message') }}", {
                        timeOut: 5000
                    });

                    break;
            }
        @endif

        $(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault();
                console.log('hello')
                $('#login-btn').attr('disabled', true);
                $('.spinner-border').css('display', 'inline-block');
                const formData = new FormData($(this)[0]);
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#login-btn').attr('disabled', false);
                            $('.spinner-border').css('display', 'none');
                            $('#signin_error').text('Login Success');
                            toastr.options.positionClass = 'toast-top-right';
                            toastr.success(response.message, {
                                timeOut: 5000
                            });
                            setTimeout(() => {
                                window.location.href = "{{ route('dashboard') }}";
                            }, 1000);
                        } else if (response.success == false) {
                            $('#login-btn').attr('disabled', false);
                            $('.spinner-border').css('display', 'none');
                            toastr.options.positionClass = 'toast-top-right';
                            toastr.warning(response.message, {
                                timeOut: 5000
                            });
                            $('#signin_error').text('Wrong credentials');
                        }
                    },
                    error: function(error) {
                        $('#login-btn').attr('disabled', false);
                        $('.spinner-border').css('display', 'none');
                        var message = error.responseJSON.message
                        toastr.options.positionClass = 'toast-top-right';
                        toastr.warning(message, {
                            timeOut: 5000
                        });
                        $.each(error.responseJSON.errors, function(key, value) {
                            $("#" + key + "_error").text(value[0]);
                        });
                    }
                })
            })
        })
    </script>

</body>

</html>

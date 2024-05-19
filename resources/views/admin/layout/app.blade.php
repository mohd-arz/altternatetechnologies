<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client') }}/image/logo-short-dark.png"> <!-- TITLE -->
    <title>Altternate Technologies - @yield('title')</title> <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('admin') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- STYLE CSS -->
    <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet"> <!-- Plugins CSS -->
    <link href="{{ asset('admin') }}/css/plugins.css" rel="stylesheet">
    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('admin') }}/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('admin') }}/switcher/css/switcher.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="{{ asset('admin') }}/css/parsley.css" rel="stylesheet"> --}}

    {{-- Clock Picker CSS (CDN) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.css"
        integrity="sha512-BB0bszal4NXOgRP9MYCyVA0NNK2k1Rhr+8klY17rj4OhwTmqdPUQibKUDeHesYtXl7Ma2+tqC6c7FzYuHhw94g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="{{ asset('admin') }}/switcher/demo.css" rel="stylesheet"> @yield('css')
    <style>
        li>.active {
            background-color: rgba(212, 212, 246, 1);
        }
        .parsley-errors-list{
          color: red !important;
        }
    </style>
</head>

<body class="app sidebar-mini ltr light-mode">
    <!-- GLOBAL-LOADER -->
    <div id="global-loader"> <img src="{{ asset('admin') }}/images/loader.svg" class="loader-img" alt="Loader"> </div>
    <!-- /GLOBAL-LOADER -->
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex"> <a aria-label="Hide Sidebar" class="app-sidebar__toggle"
                            data-bs-toggle="sidebar" href="javascript:void(0)"></a> <!-- sidebar-toggle--> <a
                            class="logo-horizontal " href="{{ route('dashboard') }}"> <img
                                src="{{ asset('client') }}/image/logo.svg"
                                class="header-brand-img desktop-logo" alt="logo" style="width:100px;"> <img
                                src="{{ asset('client') }}/image/logo.svg"
                                class="header-brand-img light-logo1" alt="logo" style="width:100px;"> </a>
                        <!-- LOGO -->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <!-- SEARCH --> <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto"
                                type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation"> <span
                                    class="navbar-toggler-icon fe fe-more-vertical"></span> </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex"> <a href="javascript:void(0)"
                                                class="nav-link icon" data-bs-toggle="dropdown"> <i
                                                    class="fe fe-search"></i> </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2"> <input type="text"
                                                        class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary"> <i
                                                            class="fa fa-search" aria-hidden="true"></i> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex"> <a
                                                class="nav-link icon theme-layout nav-link-bg layout-setting"> <span
                                                    class="dark-layout"><i class="fe fe-moon"></i></span> <span
                                                    class="light-layout"><i class="fe fe-sun"></i></span> </a> </div>
                                        <div class="dropdown d-flex"> <a
                                                class="nav-link icon full-screen-link nav-link-bg"> <i
                                                    class="fe fe-minimize fullscreen-button"></i> </a> </div>
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1"> <a href="javascript:void(0)"
                                                data-bs-toggle="dropdown" class="nav-link leading-none d-flex"> <img
                                                    src="{{ asset('admin') }}/images/users/default-profile.png"
                                                    alt="profile-user"
                                                    class="avatar  profile-user brround cover-image"> </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold">
                                                            {{ auth()->user()->name }}</h5> 
                                                            <small
                                                            class="text-muted">{{ auth()->user()->email }}</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div> 
                                                <a class="dropdown-item" href="{{route('user.edit')}}"> 
                                                  <i class="dropdown-icon fe fe-user"></i> 
                                                  Profile
                                                 </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="get"
                                                    style="display: none;"> @csrf </form> <a class="dropdown-item"
                                                    href=""
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="dropdown-icon fe fe-alert-circle"></i> Sign out </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /app-Header -->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header"> <a class="header-brand1" href="#"> <img
                                src="{{ asset('client') }}/image/logo-dark.png"" width="50"
                                height="50" class="header-brand-img desktop-logo" alt="logo"> <img
                                src="{{ asset('client') }}/image/logo-short-dark.png"
                                width="50" height="50" class="header-brand-img toggle-logo" alt="logo">

                            <img src="{{ asset('client') }}/image/logo-short.png"
                                width="50" height="50" class="header-brand-img light-logo" alt="logo">
                            <img src="{{ asset('client') }}/image/logo.svg" width="50"
                                height="50" class="header-brand-img light-logo1" alt="logo"> </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Main</h3>
                            </li>
                        
                                {{-- Home --}}
                                <li class="slide {{ Request::is('dashboard/home/*') ? 'is-expanded' : '' }}">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                            class="side-menu__icon fe fe-home"></i><span
                                            class="side-menu__label">Home</span><i
                                            class="angle fe fe-chevron-right"></i>
                                    </a>
                                    <ul class="slide-menu">
                                        <li class="panel sidetab-menu">
                                            <div class="panel-body tabs-menu-body p-0 border-0">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="side9">
                                                        <ul class="sidemenu-list">
                                                                <li><a href="{{ route('banner.view') }}"
                                                                        class="slide-item {{ Request::is('*/banner*') ? 'active' : '' }} ">
                                                                        Banner</a></li>

                                                                <li><a href="{{ route('services_.view') }}"
                                                                    class="slide-item {{ Request::is('*/services*') ? 'active' : '' }} ">
                                                                    Services</a></li>
                                                                    
                                                                <li><a href="{{ route('about.view') }}"
                                                                    class="slide-item {{ Request::is('*/about*') ? 'active' : '' }} ">
                                                                    About</a></li>

                                                                <li><a href="{{ route('certificate.view') }}"
                                                                    class="slide-item {{ Request::is('*/certificate*') ? 'active' : '' }} ">
                                                                    Certificate</a></li>

                                                                <li><a href="{{ route('video.view') }}"
                                                                    class="slide-item {{ Request::is('*/video*') ? 'active' : '' }} ">
                                                                    Video</a></li>
                                                                
                                                                <li><a href="{{ route('news_.view') }}"
                                                                    class="slide-item {{ Request::is('*/news*') ? 'active' : '' }} ">
                                                                    News</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                {{-- Products --}}
                                <li class="slide"> <a
                                    class="side-menu__item has-link {{ Request::is('dashboard/product*') ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="{{ route('product.view') }}"><i
                                        class="side-menu__icon fe fe-shopping-bag"></i><span
                                        class="side-menu__label">Products</span></a> 
                                </li>

                                {{-- Gallery  --}}
                                <li class="slide"> <a
                                    class="side-menu__item has-link {{ Request::is('dashboard/gallery*') ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="{{ route('gallery_.view') }}"><i
                                        class="side-menu__icon fe fe-image"></i><span
                                        class="side-menu__label">Gallery</span></a> 
                                </li>

                                {{-- Clients --}}
                                <li class="slide"> <a
                                    class="side-menu__item has-link {{ Request::is('dashboard/clients*') ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="{{ route('clients_.view') }}"><i
                                        class="side-menu__icon fe fe-users"></i><span
                                        class="side-menu__label">Clients</span></a> 
                                </li>

                                {{-- About --}}
                                <li class="slide"> <a
                                class="side-menu__item has-link {{ Request::is('dashboard/about*') ? 'active' : '' }}"
                                data-bs-toggle="slide" href="{{ route('about_.view') }}"><i
                                    class="side-menu__icon fe fe-info"></i><span
                                    class="side-menu__label">About</span></a> 
                                </li>

                                {{-- FAQ --}}
                                <li class="slide"> <a
                                    class="side-menu__item has-link {{ Request::is('dashboard/faq*') ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="{{ route('faq_.view') }}"><i
                                        class="side-menu__icon fe fe-help-circle"></i><span
                                        class="side-menu__label">FAQ</span></a> 
                                </li>
                                    
                                {{-- Why Choose Us --}}
                                <li class="slide"> <a
                                    class="side-menu__item has-link {{ Request::is('dashboard/why-choose-us*') ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="{{ route('whyChooseUs_.view') }}"><i
                                        class="side-menu__icon fe fe-check-circle"></i><span
                                        class="side-menu__label">Why Choose Us</span></a> 
                                </li>

                                {{-- Privacy Policy --}}
                                <li class="slide"> <a
                                    class="side-menu__item has-link {{ Request::is('dashboard/privacy-policy*') ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="{{ route('privacyPolicy_.view') }}"><i
                                        class="side-menu__icon fe fe-lock"></i><span
                                        class="side-menu__label">Privacy Policy</span></a> 
                                </li>

                                {{-- Settings  --}}
                                <li class="slide {{ Request::is('dashboard/settings/*') ? 'is-expanded' : '' }}">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                            class="side-menu__icon fe fe-settings"></i><span
                                            class="side-menu__label">Settings</span><i
                                            class="angle fe fe-chevron-right"></i>
                                    </a>
                                    <ul class="slide-menu">
                                        <li class="panel sidetab-menu">
                                            <div class="panel-body tabs-menu-body p-0 border-0">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="side9">
                                                        <ul class="sidemenu-list">
                                                                <li><a href="{{ route('address.view') }}"
                                                                    class="slide-item {{ Request::is('*/address*') ? 'active' : '' }} ">
                                                                        Address</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                

                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
            </div>
            {{-- Content  --}}
            @yield('content')
            <!-- Sidebar-right -->

            <!--/Sidebar-right-->
            <!-- Country-selector modal-->
            <!-- FOOTER -->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center"> Copyright © <span id="year"></span> <a
                                href="javascript:void(0)">Altternate Technologies</a>
                    </div>
                </div>
            </footer> <!-- FOOTER END -->
            <!-- BACK-TO-TOP --> <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
            <!-- JQUERY JS -->
            <script src="{{ asset('admin') }}/js/jquery.min.js"></script> <!-- BOOTSTRAP JS -->
            <script src="{{ asset('admin') }}/plugins/bootstrap/js/popper.min.js"></script>
            <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.min.js"></script> <!-- SPARKLINE JS-->
            <script src="{{ asset('admin') }}/js/jquery.sparkline.min.js"></script> <!-- Sticky js -->
            <script src="{{ asset('admin') }}/js/sticky.js"></script> <!-- SIDEBAR JS -->
            <script src="{{ asset('admin') }}/plugins/sidebar/sidebar.js"></script> <!-- Perfect SCROLLBAR JS-->
            <script src="{{ asset('admin') }}/plugins/p-scroll/perfect-scrollbar.js"></script>
            <script src="{{ asset('admin') }}/plugins/p-scroll/pscroll.js"></script>
            <script src="{{ asset('admin') }}/plugins/p-scroll/pscroll-1.js"></script> <!-- INTERNAL SELECT2 JS -->
            <script src="{{ asset('admin') }}/plugins/select2/select2.full.min.js"></script> <!-- INTERNAL Data tables js-->
            <script src="{{ asset('admin') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>
            <script src="{{ asset('admin') }}/plugins/datatable/js/dataTables.bootstrap5.js"></script>
            <script src="{{ asset('admin') }}/plugins/datatable/dataTables.responsive.min.js"></script> <!-- INTERNAL Flot JS -->
            <script src="{{ asset('admin') }}/plugins/flot/jquery.flot.js"></script>
            <script src="{{ asset('admin') }}/plugins/flot/jquery.flot.fillbetween.js"></script>
            <script src="{{ asset('admin') }}/plugins/flot/chart.flot.sampledata.js"></script>
            <script src="{{ asset('admin') }}/plugins/flot/dashboard.sampledata.js"></script> <!-- INTERNAL Vector js -->
            <script src="{{ asset('admin') }}/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
            <script src="{{ asset('admin') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> <!-- SIDE-MENU JS-->
            <script src="{{ asset('admin') }}/plugins/sidemenu/sidemenu.js"></script> <!-- TypeHead js -->
            <script src="{{ asset('admin') }}/plugins/bootstrap5-typehead/autocomplete.js"></script>
            <script src="{{ asset('admin') }}/js/typehead.js"></script> <!-- INTERNAL INDEX JS -->
            <script src="{{ asset('admin') }}/js/index1.js"></script> <!-- Color Theme js -->
            <script src="{{ asset('admin') }}/js/themeColors.js"></script> <!-- CUSTOM JS -->
            <script src="{{ asset('admin') }}/js/custom.js"></script> <!-- Custom-switcher -->
            <script src="{{ asset('admin') }}/js/custom-swicher.js"></script> <!-- Switcher js -->
            <script src="{{ asset('admin') }}/switcher/js/switcher.js"></script> <!-- Sweet alert-->
            <script src="{{ asset('admin') }}/plugins/treeview/treeview.js"></script>
            <script src="{{ asset('admin') }}/plugins/sweet-alert/sweetalert.min.js"></script>
            <script src="{{ asset('admin') }}/js/toastr/toastr.min.js"></script>

            {{-- Date picker and Data parsely CDN --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
                integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
                integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/toastr.min.css">
            {{-- clock picker CDN --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.js"
                integrity="sha512-x0qixPCOQbS3xAQw8BL9qjhAh185N7JSw39hzE/ff71BXg7P1fkynTqcLYMlNmwRDtgdoYgURIvos+NJ6g0rNg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
                @if (Session::has('message'))
                    var alertType = '{{ Session::get('alert-type', 'success') }}';
                    var message = '{{ Session::get('message') }}';

                    toastr[alertType](message);
                @endif
                $(function() {
                    $("input[name='contact_phone']").on('input', function(e) {
                        var phoneNumber = $(this).val().replace(/[^0-9]/g, '');
                        if (phoneNumber.length > 15) {
                            phoneNumber = phoneNumber.slice(0, 15);
                        }
                        $(this).val(phoneNumber);
                    });
                    $("input[name='contact_number']").on('input', function(e) {
                        var phoneNumber = $(this).val().replace(/[^0-9]/g, '');
                        if (phoneNumber.length > 15) {
                            phoneNumber = phoneNumber.slice(0, 15);
                        }
                        $(this).val(phoneNumber);
                    });
                });

                function submitBtn(status) {
                    if (status) {
                        $('button[type="submit"]').prop('disabled', true);
                        $('#btn-loader').show();
                        $('#btn-text').hide();
                    } else {
                        $('button[type="submit"]').prop('disabled', false);
                        $('#btn-loader').hide();
                        $('#btn-text').show();
                    }
                }
            </script>
            @yield('script')
            {{-- Auto focus into input when OPEN --}}
            <script>
                $(document).on('select2:open', e => {
                    const select2 = $(e.target).data('select2');
                    if (!select2.options.get('multiple')) {
                        select2.dropdown.$search.get(0).focus();
                    }
                });
            </script>

</body>

</html>

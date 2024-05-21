<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Altternate Technologies - @yield('title')</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		
         <!-- favicon -->
         <link rel="shortcut icon" type="{{ asset('client') }}/image/favicon" href="{{ asset('client') }}/image/favicon.svg">
         <!-- bootstrap -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/bootstrap.min.css">
         <!-- simple-line icon -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/simple-line-icons.css">
         <!-- font-awesome icon -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/font-awesome.min.css">
         <!-- themify icon -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/themify-icons.css">
         <!-- ion icon -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/ionicons.min.css">
         <!-- owl slider -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/owl.carousel.min.css">
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/owl.theme.default.min.css">
         <!-- swiper -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/swiper.min.css">
         <!-- animation -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/animate.css">
         <!-- gallery light box -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/simple-lightbox.css">
         <!-- style -->
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/altternate-styl.css">
         <link rel="stylesheet" type="text/css" href="{{ asset('client') }}/css/altternate-responsive.css">
 
         @yield('css')

    </head>
    <body style="display:flex;flex-direction:column">
        <!-- header start -->
         <header class="header-area">
            <div class="header-main-area">
                <div class="container">
                    <div class="row">
                        <div class="div">
                            <div class="header-main">
                                <!-- logo start -->
                                <div class="col header-element logo">
                                    <a href="index.html">
                                        <img src="{{ asset('client') }}/image/logo.svg" alt="logo-image" class="logo_m img-fluid">
                                    </a>
                                </div>
                                <!-- logo end -->
                                <!-- main menu start -->
                                <div class="header-element megamenu-content d-flex justify-content-center">
                                    <div class="mainwrap">
                                        <ul class="main-menu">
                                            <li class="menu-link parent active">
                                                <a href="{{route('home.view')}}" class="link-title">
                                                    <span class="sp-link-title">Home</span>
                                                </a>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="{{route('products.view')}}" class="link-title">
                                                    <span class="sp-link-title">Products</span>
                                                </a>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="{{route('gallery.view')}}" class="link-title">
                                                    <span class="sp-link-title">Gallery</span>
                                                </a>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="{{route('aboutUs.view')}}" class="link-title">
                                                    <span class="sp-link-title">About</span>
                                                </a>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="{{route('whyChooseUs.view')}}" class="link-title">
                                                    <span class="sp-link-title">Why Choose Us</span>
                                                </a>
                                            </li>
                                            <li class="menu-link parent">
                                                <a href="{{route('contact.view')}}" class="link-title">
                                                    <span class="sp-link-title">Contact</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- main menu end -->
                                <div class="search-area col d-flex justify-content-end">
                                    <!-- search start -->
                                    <!-- <div class="header-element search-wrap">
                                        <input type="text" name="search" placeholder="Search products">
                                        <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                                    </div> -->
                                    <!-- search end -->

                                    <div class="header-element right-block-box">
                                        <ul class="shop-element">
                                            <li class="side-wrap nav-toggler">
                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                                                <span class="line"></span>
                                                </button>
                                            </li>
                                           
                                            <li class="side-wrap user-wrap">
                                                
                                            </li>
                                            <li class="side-wrap user-wrap">
                                              
                                            </li>
                                            @php
                                                $social_media = App\Models\SocialMedia::get();
                                            @endphp
                                            @foreach ($social_media as $medium)
                                            <li class="side-wrap">
                                                <div class="shopping-widget">
                                                    <div class="shopping-cart">
                                                        <a href="{{$medium->link}}" target="_blank">
                                                            <span class="cart-icon-wrap">
                                                                <!-- <span class="cart-icon"><i class="icon-handbag"></i></span> -->
                                                                <span class="cart-icon d-flex justify-content-center pt-2">
                                                                    <i class="{{$medium->icon}}" style="font-size: larger"></i>
                                                                </span>
                                                                <!-- <span id="cart-total" class="bigcounter">5</span> -->
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <!-- mobile menu start -->
            <div class="header-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="main-menu-area">
                                <div class="main-navigation navbar-expand-xl">
                                    <div class="box-header menu-close">
                                        <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                                    </div>
                                    <div class="navbar-collapse" id="navbarContent">
                                        <!-- main-menu start -->
                                        <div class="megamenu-content">
                                            <div class="mainwrap">
                                                <ul class="main-menu">
                                                    <li class="menu-link parent">
                                                        <a href="{{route('home.view')}}" class="link-title link-title-lg">
                                                            <span>Home</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="{{route('products.view')}}" class="link-title link-title-lg">
                                                            <span>Products</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="{{route('gallery.view')}}" class="link-title link-title-lg">
                                                            <span>Gallery</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="{{route('aboutUs.view')}}" class="link-title link-title-lg">
                                                            <span>About</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="{{route('whyChooseUs.view')}}" class="link-title link-title-lg">
                                                            <span>Why Choose Us</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-link parent">
                                                        <a href="{{route('contact.view')}}" class="link-title link-title-lg">
                                                            <span>Contact</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- main-menu end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile menu end -->
            <!-- mobile search start -->
            <div class="modal fade" id="r-search-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="m-drop-search">
                                <input type="text" name="search" placeholder="Search products">
                                <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal"><i class="ion-close-round"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile search end -->
        </header>

        <!--header end-->
  
        <section class="blog-page nutritional_values">
            <div class="container">
                <div class="row">
                    <div class="section-title5 section-t-padding">
                        <h1>FAQ</h1>
                    </div>
                </div>
            </div>
        </section>

       <section class="faq-collapse section-b-padding" style="flex:1;">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-4 mb-4">About Altternate Technologies</h2>
                @foreach ($faqs as $key => $faq)
                    <div class="faq-start">
                        <a href="#collapse-{{$key}}" data-bs-toggle="collapse" class="collapse-title d-flex justify-content-between">{{$faq->question}} 
                            <div class="d-flex justify-content-end">
                                <i class="fas fa-arrow-down align-self-center"></i>
                            </div>
                        </a>
                        <div class="collapse collapse-content" id="collapse-{{$key}}">
                            <p>{{$faq->answer}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

        <!-- footer start -->
        @php
            $address = App\Models\Address::first();
        @endphp
        <section class="footer-7 section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-bottom">
                            <div class="footer-link">
                                <div class="f-info footer-logo">
                                    <!-- <h2 class="h-footer">Altternate Technologies</h2> -->
                                    <a href="{{route('home.view')}}"><img src="{{ asset('client') }}/image/logo.svg"></a>
                                    @if($address)
                                    <ul class="footer-first">
                                        <li class="logo-content footer-details">
                                            <ul class="f-map">
                                                <li class="map-icn">
                                                    <i class="fas fa-home"></i>
                                                </li>
                                                <li class="map-text">
                                                    <p>{{$address->addr1}}</p>
                                                    <p>{{$address->addr2}}</p>
                                                </li>
                                            </ul>
                                            <ul class="f-map">
                                                <li class="map-icn">
                                                    <i class="fas fa-envelope-open-text"></i>
                                                </li>
                                                <li class="map-text">
                                                    <p>{{$address->email}}</p>
                                                </li>
                                            </ul>
                                            <ul class="f-map">
                                                <li class="map-icn">
                                                    <i class="fas fa-mobile-alt"></i>
                                                </li>
                                                <li class="map-text">
                                                    <p>{{$address->main_phno}}</p>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                                <div class="f-link">
                                    <h2 class="h-footer">Privacy & terms</h2>
                                    <a href="#services" data-bs-toggle="collapse" class="h-footer">
                                        <span>Privacy & terms</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="services" data-bs-parent="#footer-accordian">
                                      <li class="f-link-ul-li"><a href="{{route('faq.view')}}">FAQ</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('contact.view')}}">Contact Us</a></li>
                                        <li class="f-link-ul-li"><a href="privacy_policy.html">Privacy Policy</a></li>
                                    </ul>
                                </div>
                                <div class="f-link">
                                    <h2 class="h-footer">Company</h2>
                                    <a href="#" data-bs-toggle="collapse" class="h-footer">
                                        <span>Company</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="privacy" data-bs-parent="#footer-accordian">
                                        <li class="f-link-ul-li"><a href="{{route('whyChooseUs.view')}}">Why Choose Us</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('aboutUs.view')}}">About Us</a></li>
                                    </ul>
                                </div>

                                <div class="f-link footer-deal footer-search">
                                    <h2 class="h-footer">Get in touch</h2>
                                    <a href="#account" data-bs-toggle="collapse" class="h-footer">
                                        <span>Get in touch</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-bottom" id="account" data-bs-parent="#footer-accordian">
                                        <li class="f-social">
                                        @foreach ($social_media as $medium)
                                            <a href="{{$medium->link}}" class="f-icn-link"><i class="{{$medium->icon}}"></i></a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer end -->
        <!-- copyright start -->
        <section class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="f-bottom">
                            <p>Copyright <i class="fa fa-copyright"></i> {{now()->format('Y')}} Altternate Technologies</p>
                            <!-- <img src="{{ asset('client') }}/image/payment.png" class="img-fluid" alt="p-image"> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter pop-up end -->
        <!-- back to top start -->
        <a class="scroll" id="top">
            <span><i class="fa fa-angle-double-up"></i></span>
        </a>
        <!-- back to top end -->
        <div class="mm-fullscreen-bg"></div>
        <!-- jquery -->
        <!-- <script src="{{ asset('client') }}/js/modernizr-2.8.3.min.js"></script> -->
        <script src="{{ asset('client') }}/js/jquery-3.6.0.min.js"></script>
        <!-- bootstrap -->
        <script src="{{ asset('client') }}/js/bootstrap.min.js"></script>
        <!-- popper -->
        <script src="{{ asset('client') }}/js/popper.min.js"></script>
        <!-- fontawesome -->
        <script src="{{ asset('client') }}/js/fontawesome.min.js"></script>
        <!-- owl carousal -->
        <script src="{{ asset('client') }}/js/owl.carousel.min.js"></script>
        <!-- swiper -->
        <script src="{{ asset('client') }}/js/swiper.min.js"></script>
        <!-- Altternate Technologies -->
        <script src="{{ asset('client') }}/js/altternate_custom.js"></script>
        <!-- gallery js-->
        <script src="{{ asset('client') }}/js/simple-lightbox.js"></script>
        <script>
            (function() {
                var $gallery = new SimpleLightbox('.gallery a', {});
            })();
        </script>
        @yield('script')
    </body>
</html>
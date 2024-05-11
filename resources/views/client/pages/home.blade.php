@extends('client.layout.app')
@section('title', 'Home')
{{-- @section('DSR', 'active') --}}
@section('content')
<!--home page slider start-->
<section class="slider">
  <div class="home-slider7 owl-carousel owl-theme owl-loaded owl-drag"> 
  <div class="owl-stage-outer">
    <div class="owl-stage" style="transform: translate3d(-1903px, 0px, 0px); transition: all 0s ease 0s; width: 3806px;">
  @foreach ($banners as $banner)
    <div class="owl-item" style="width: 1903px;">
        <div class="items">
            <div class="img-back" style="background-image:url({{asset('storage').'/'.$banner->banner_img}});">
                <div class="h-s-content">
                    <h1>{{$banner->title}}</h1>
                    @if($banner->sub_title)
                    <h1 class="banner_head">{{$banner->sub_title}}</h1>
                    @endif
                    <span class="slider-slogan">{{$banner->slogan}}</span><br>
                    <a href="services.html" class="btn btn-style1"><span>Our Services</span></a>
                    <a href="{{ asset('client') }}/image/altternate_brochure_common.pdf" target="_blank" class="btn btn-style4"><span>Download Brochure</span></a>
                </div>
            </div>
        </div>
    </div>   
    @endforeach

</div>
</div>
<div class="owl-nav">
<button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></button>
<button type="button" role="presentation" class="owl-next disabled"><i class="fa fa-angle-right"></i></button>
</div>
<div class="owl-dots disabled"></div></div>
</section>
<section class="service-7">
  <div class="container">
      <div class="row">
          <div class="service">
              <div class="col-md-2 service-box">
                  <div class="s-box">
                      <div class="service-image icon-slider">
                          <a href="#">
                              <i class="fa fa-archive"></i>
                          </a>
                      </div>
                      <div class="service-content">
                          <h3>Solid & Liquid Waste</h3> 
                          <!--Treatment-->
                      </div>
                  </div>
              </div>
              <div class="col-md-3 service-box">
                  <div class="s-box">
                      <div class="service-image icon-slider">
                          <a href="#">
                              <i class="fa fa-leaf"></i>
                          </a>
                      </div>
                      <div class="service-content">
                          <h3>Generates Clean Energy</h3>
                              <!--<p>Steam, Fuel, Electricity</p>-->
                      </div>
                  </div>
              </div>
              <div class="col-md-3 service-box">
                  <div class="s-box">
                      <div class="service-image icon-slider">
                          <a href="#">
                              <i class="fa fa-heartbeat"></i>
                          </a>
                      </div>
                      <div class="service-content">
                          <h3>Zero Residue</h3>
                              <!--<p>Advanced Discharge Treatment Technology-->
                              <!--    Convest Discharge Into Useful By Products</p>-->
                      </div>
                  </div>
              </div>
              <div class="col-md-2 service-box">
                  <div class="s-box">
                      <div class="service-image icon-slider">
                          <a href="#">
                              <i class="fa fa-money-bill"></i>
                          </a>
                      </div>
                      <div class="service-content">
                          <h3>Small Budget</h3>
                      </div>
                  </div>
              </div>
              <div class="col-md-2 service-box">
                  <div class="s-box">
                      <div class="service-image icon-slider">
                          <a href="#">
                              <i class="fa fa-puzzle-piece"></i>
                          </a>
                      </div>
                      <div class="service-content">
                          <h3>Customized Designs</h3>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


<section class="section-t-padding blog1">
  <div class="container">
      <div class="row altternate_section">
          <div class="col-md-3 col-lg-4 mb-4">
              <img src="{{ asset('client') }}/image/services_bg3.jpg" class="home_img">
          </div>
          <div class="col-md-8">
              <div class="altternate_about">
                  <!-- <p>What is</p> -->
                  <h1>Altternate Technologies</h1>
                      <div class="div mt-3">
                          <p>
                              We Alternate Technologies manufacture and supply Zero Residue Solid & Liquid Waste Treatment Equipment, Waste to Energy CORTIFIERS, Advanced Bioreactors to Convert food waste in to Biofuel, Electricity and Biomanure. 
                              There are various capacity Equipments starting from Small scale Home products up to Heavy duty plants of 10-25 metric ton per day and a lot more. 
                              The products of our company are manufactured under the guidance of experts and professionals. 
                              The products are made with the use of good quality raw materials.
                          </p>
                          <br>
                          <p>
                              The products are tested at every stage to ensure that it works well and fulfil the needs and requirements of our customers and clients.
                          </p>
                                  <br>
                          <p>Our infrastructure has different departments that take care of the overall process of manufacturing and supplying good quality products. 
                              We use good quality packaging to ensure that our products reach safely to the destination. 
                              For us, the safety of the products and our customers getting the right ones matters the most.</p>
                          <a href="about.html" class="btn btn-style2">View More</a>
                      </div>
                      
              </div>
          </div>
      </div>
  </div>
</section>

<!--home page slider start-->



<section class="home-countdown1 section-t-padding">
  <div class="back-img" style="background-image: url({{ asset('client') }}/image/advance_bg.jpg);">
      <div class="container">
          <div class="row">
              <div class="col">
                  <div class="deal-content">
                      <h2>Advanced Scientific WtE Cortifier For MSW Management</h2>
                      <!-- <span class="deal-c">Need Zùsto</span><br> -->
                      <a href="why_choose_us.html" class="btn btn-style1">View More</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


<!-- Blog start -->
<section class="blog-page nutritional_values section-tb-padding">
<div class="container">
<div class="row">
  <div class="section-title5">
      <h1>Products</h1>
      <div class="Latest_text">Fuel Free Solid Waste Management System</div>
  </div>
</div>
</div>
</section>

<section class="special-pro-7 section-b-padding">
<div class="container">
<div class="row">
  <div class="col">
      <div class="special-7 owl-carousel owl-theme owl-loaded owl-drag">
      <div class="owl-stage-outer">
          <div class="owl-stage">
              <div class="owl-item active">
                  <div class="items">
              <div class="h-t-pro">
                  <div class="tred-pro">
                      <div class="tr-pro-img">
                          <a href="product-details.html">
                              <img src="{{ asset('client') }}/image/product/pr3.jpg" alt="blog-image" class="img-fluid">
                          </a>
                      </div>
                      <!-- <div class="Pro-lable">
                          <span class="p-text">New</span>
                      </div> -->
                  </div>
                  <div class="caption">
                      <!-- <div class="rating">
                          <i class="fa fa-star b-star"></i>
                          <i class="fa fa-star b-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                      </div> -->
                      <h3><a href="product-details.html"><b>Small-scale Scientific Cortifier</b></a></h3>
                      <div class="pro-price">
                          <p class="new-price">Model : ALT-15  ALT-25</p>
                          <p class="new-price">Capacity : 15kg/d    25kg/d</p>
                          <p class="new-price">Customized Design for Ground level & Rooftop level installation</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="owl-item active">
          <div class="items">
            <div class="h-t-pro">
              <div class="tred-pro">
                  <div class="tr-pro-img">
                      <a href="product-details.html">
                          <img src="{{ asset('client') }}/image/product/pr22.jpg" alt="blog-image" class="img-fluid">
                      </a>
                  </div>
              </div>
              <div class="caption">
                  <h3><a href="product-details.html">Medium Scale Cortifiers</a></h3>
                  <div class="pro-price">
                      <p class="new-price">Model : ALT-40 - ALT-60</p>
                      <p class="new-price">Capacity : 40Kg/h - 60Kg/h</p>
                      <p class="new-price">Rooftop Installation, Provision to attach Emission Cleansing Device</p>
                  </div>
              </div>
          </div>
       </div>
    </div>
      <div class="owl-item active">
          <div class="items">
            <div class="h-t-pro">
              <div class="tred-pro">
                  <div class="tr-pro-img">
                      <a href="product-details.html">
                          <img src="{{ asset('client') }}/image/product/pr33.jpg" alt="blog-image" class="img-fluid">
                      </a>
                  </div>
              </div>
              <div class="caption">
                  <h3><a href="product-details.html">Heavy Duty Cortifiers</a></h3>
                  <div class="pro-price">
                      <p class="new-price">Model : ALT-100 - ALT-150</p>
                      <p class="new-price">Capacity : 100 Kg/h - 150Kg/h</p>
                      <p class="new-price">Rooftop Installation, Provision to attach Emission Cleansing Device</p>
                  </div>
              </div>
          </div>
       </div>
    </div>
      <div class="owl-item active">
          <div class="items">
            <div class="h-t-pro">
              <div class="tred-pro">
                  <div class="tr-pro-img">
                      <a href="product-details.html">
                          <img src="{{ asset('client') }}/image/product/pr44.jpg" alt="blog-image" class="img-fluid">
                      </a>
                  </div>
              </div>
              <div class="caption">
                  <h3><a href="product-details.html">Advanced Anaerobic Bioreactors For Residue-Free Biodegradable Waste Treatment</a></h3>
                  <div class="pro-price">
                      <!-- <p class="new-price">Model : ALT-100 FSWSS</p> -->
                      <p class="new-price">Capacity : 50kg/h</p>
                      <!-- <p class="new-price">Features : Dual Combustion Chamber</p> -->
                  </div>
              </div>
          </div>
       </div>
    </div>
      <div class="owl-item active">
          <div class="items">
            <div class="h-t-pro">
              <div class="tred-pro">
                  <div class="tr-pro-img">
                      <a href="product-details.html">
                          <img src="{{ asset('client') }}/image/product/pr55.jpg" alt="blog-image" class="img-fluid">
                      </a>
                  </div>
              </div>
              <div class="caption">
                  <h3><a href="product-details.html">Advanced Anaerobic Bioreactors For Residue-Free Biodegradable Waste Treatment</a></h3>
                  <div class="pro-price">
                      <!-- <p class="new-price">Model : ALT-100 FSWSS</p> -->
                      <p class="new-price">Capacity : 100kg/h</p>
                      <!-- <p class="new-price">Features : Dual Combustion Chamber</p> -->
                  </div>
              </div>
          </div>
       </div>
    </div>
      <div class="owl-item active">
          <div class="items">
            <div class="h-t-pro">
              <div class="tred-pro">
                  <div class="tr-pro-img">
                      <a href="product-details.html">
                          <img src="{{ asset('client') }}/image/product/pr66.jpg" alt="blog-image" class="img-fluid">
                      </a>
                  </div>
              </div>
              <div class="caption">
                  <h3><a href="product-details.html">Advanced Anaerobic Bioreactors For Residue-Free Biodegradable Waste Treatment</a></h3>
                  <div class="pro-price">
                      <!-- <p class="new-price">Model : ALT-100 FSWSS</p> -->
                      <p class="new-price">Capacity : 500kg/h</p>
                      <!-- <p class="new-price">Features : Dual Combustion Chamber</p> -->
                  </div>
              </div>
          </div>
       </div>
    </div>
  </div>
  </div>
  <div class="owl-nav">
      <button type="button" role="presentation" class="owl-prev">
          <i class="fa fa-angle-left"></i>
      </button>
          <button type="button" role="presentation" class="owl-next">
              <i class="fa fa-angle-right"></i>
          </button>
          </div>
          <div class="owl-dots disabled"></div>
      <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></button></div><div class="owl-dots disabled"></div></div>
  </div>
</div>
</div>
</section>

<section class="blog-page nutritional_values mb-5">
<div class="container">
<div class="row">
  <div class="col-lg-12">      
  <video controls="" autoplay="" muted="" loop="" id="myVideo" style="border-radius: 8px;">
      <source src="{{ asset('client') }}/image/altternatetechnologies_video.mp4" type="video/mp4">
      <source src="{{ asset('client') }}/image/altternatetechnologies_video.mp4" type="video/ogg">
 </video>
</div>
</div>
</div>
</section>

<!-- home brand start -->
<section class="blog-page nutritional_values mb-5">
<div class="container">
<div class="row">
  <div class="section-title5">
      <h1>Certificate</h1>
  </div>
</div>
</div>
</section>
<section class="home4-barnd-logo mt-3">
<div class="container">
<div class="row">
  <div class="col d-flex text-center">
      <div class="home4-brand owl-carousel owl-theme d-flex justify-content-center">
          <div class="items">
              <img src="{{ asset('client') }}/image/certificate/crt1.png" class="img-fluid brand-3" alt="brand-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/certificate/crt2.png" class="img-fluid brand-3" alt="brand-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/certificate/crt3.png" class="img-fluid brand-3" alt="brand-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/certificate/crt4.png" class="img-fluid brand-3" alt="brand-image">
          </div>
      </div>
  </div>
</div>
</div>
</section>
<!-- home brand end -->


<section class="gallery_bg blog-page nutritional_values section-tb-padding">
<div class="container">
<div class="gallery">
 <div class="container-fluid">
  <div class="section-title5 mb-5">
      <h1>Our Gallery</h1>
  </div>
  <div class="row">
      <div class="col-md-3 col-lg-4 gallery_slider">
          <a href="{{ asset('client') }}/image/gallery/g11.jpg"><img src="{{ asset('client') }}/image/gallery/g1.jpg" alt="" title="Advanced Anaerobic Bioreactors For Residue-Free Biodegradable Waste Treatment" /></a>
      </div>
      <div class="col-md-3 col-lg-4 gallery_slider">
          <a href="{{ asset('client') }}/image/gallery/g22.jpg"><img src="{{ asset('client') }}/image/gallery/g2.jpg" alt="" title="Heavy Duty Cortifiers" /></a>
      </div>
      <div class="col-md-3 col-lg-4 gallery_slider">
          <a href="{{ asset('client') }}/image/gallery/g44.jpg"><img src="{{ asset('client') }}/image/gallery/g4.jpg" alt="" title="Medium Scale Cortifiers" /></a>
      </div>
      <div class="col-md-3 col-lg-4 gallery_slider">
          <a href="{{ asset('client') }}/image/gallery/g33.jpg"><img src="{{ asset('client') }}/image/gallery/g3.jpg" alt="" title="Heavy Duty Cortifiers" /></a>
      </div>

     </div>
 </div>
  <div class="clear"></div>
</div>
</div>
</section>


<!-- home brand start -->
<section class="blog-page nutritional_values section-tb-padding">
<div class="container">
<div class="row">
  <div class="section-title5">
      <h1>clients</h1>
  </div>
</div>
</div>
</section>
<section class="home4-barnd-logo mb-3">
<div class="container">
<div class="row">
  <div class="col d-flex text-center">
      <div class="home4-brand owl-carousel owl-theme d-flex justify-content-center">
          <div class="items">
              <img src="{{ asset('client') }}/image/clients/c1.png" alt="client-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/clients/c2.png" class="img-fluid brand-4" alt="clients-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/clients/c3.png" class="img-fluid brand-4" alt="clients-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/clients/c4.png" class="img-fluid brand-4" alt="clients-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/clients/c5.png" class="img-fluid brand-4" alt="clients-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/clients/c6.png" class="img-fluid brand-4" alt="clients-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/clients/c7.png" class="img-fluid brand-4" alt="clients-image">
          </div>
          <div class="items">
              <img src="{{ asset('client') }}/image/clients/c8.png" class="img-fluid brand-4" alt="clients-image">
          </div>
      </div>
  </div>
</div>
<div class="div justify-content-center d-flex">
  <a href="clients.html" class="btn btn-style2">View More</a>
</div>
</div>
</section>
<!-- home brand end --> 

<section class="home-countdown1 section-t-padding">
<div class="back-img" style="background-image: url({{ asset('client') }}/image/about-bg_m1.jpg);">
<div class="container">
  <div class="row">
      <div class="col d-flex justify-content-center">
          <div class="deal-content text-center">
              <h2>WASTE IS NOT WASTE UNTIL<br>IT IS WASTED</h2>
              <!-- <a href="#" class="btn btn-style1">Try Now</a> -->
          </div>
      </div>
  </div>
</div>
</div>
</section>



<!-- News Letter end -->
<section class="blog-page nutritional_values section-t-padding">
<div class="container">
<div class="row">
  <div class="section-title5">
      <h1>latest news</h1>
  </div>
</div>
</div>
</section>
<!-- blog start -->
<section class="testimonial-6 section-b-padding">
<div class="container">
<div class="row">
  <div class="col">
      <!-- <div class="section-title4">
          <h2><span>latest News</span></h2>
      </div> -->
      <div class="testi-6 owl-carousel owl-theme mt-4">
          <div class="items">
              <div class="testimonial-content">
                  <img src="{{ asset('client') }}/image/news/news1.jpg" class="img-responsive">
                  <div class="testimonial-area">
                      <div class="testi-name">
                          <!-- <span class="tsti-title text-center">Loram Ipsum</span> -->
                          <p>In September 2021, Altternate Technologies implemented 25 cum capacity Cow dung to Electricity plants at Bancharoda Gram Panchayat, 
                              Raipur District  and 10 cum capcity plant at Rakhi gram Panchayat, Bemetara District in the state of Chhattisgarh
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="items">
              <div class="testimonial-content">
                  <img src="{{ asset('client') }}/image/news/news2.jpg" class="img-responsive">
                  <div class="testimonial-area">
                      <div class="testi-name">
                          <!-- <span class="tsti-title text-center">Loram Ipsum</span> -->
                          <p>10 APRIL 2022 Commissioning of  1.0 metric ton capacity scientific CORTIFIER at Makthal Municipality - Telangana State
                      </div>
                  </div>
              </div>
          </div>
          <div class="items">
              <div class="testimonial-content">
                  <img src="{{ asset('client') }}/image/news/news3.jpg" class="img-responsive">
                  <div class="testimonial-area">
                      <div class="testi-name">
                          <p>2022 April 30 - 2.0 TPD Capacity Advanced Solid Waste CORTIFIER Commissioned at Someshwara Town Municipal Corporation, Mangalore, Karnataka
                          </p>
                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</section>
@endsection
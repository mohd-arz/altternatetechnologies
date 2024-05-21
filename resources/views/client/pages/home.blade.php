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
                    <a href="{{route('services.view')}}" class="btn btn-style1"><span>Our Services</span></a>
                    @if ($brochure)
                        <a href="{{ asset('storage').'/'.$brochure->brochure }}" target="_blank" class="btn btn-style4"><span>Download Brochure</span></a>
                    @endif
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
            @foreach ($icon_box as $medium)
                <div class="col-md-2 service-box">
                    <div class="s-box">
                        <div class="service-image icon-slider">
                            <a href="#">
                                <i class="{{$medium->icon}}" style="font-size:xx-large"></i>
                            </a>
                        </div>
                        <div class="service-content">
                            <h3>{{$medium->text}}</h3> 
                            <!--Treatment-->
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
      </div>
  </div>
</section>


<section class="section-t-padding blog1">
  <div class="container">
      <div class="row altternate_section">
          <div class="col-md-3 col-lg-4 mb-4">
            @if(isset($about->home_img))
              <img src="{{ asset('storage').'/'.$about->home_img }}" class="home_img">
            @else
                Image Placeholder
            @endif
          </div>
          <div class="col-md-8">
              <div class="altternate_about">
                  <!-- <p>What is</p> -->
                  @if (isset($about->home_title))
                    <h1>{{$about->home_title}}</h1>
                  @else
                    Title Placeholder
                  @endif
                      <div class="div mt-3">
                        @if (isset($about->home_description))
                          {!!$about->home_description!!}
                        @else
                          description Placeholder
                        @endif
                          <a href="{{route('aboutUs.view')}}" class="btn btn-style2">View More</a>
                      </div>
                      
              </div>
          </div>
      </div>
  </div>
</section>

<!--home page slider start-->



<section class="home-countdown1 section-t-padding">
  <div class="back-img" @if($bannerImage) style="background-image: url({{ asset('storage').'/'.$bannerImage->image1}});" @endif>
      <div class="container">
          <div class="row">
              <div class="col">
                  <div class="deal-content">
                      <h2>{{$bannerImage->title1  ?? '' }}</h2>
                      <!-- <span class="deal-c">Need Zùsto</span><br> -->
                      <a href="{{route('whyChooseUs.view')}}" class="btn btn-style1">View More</a>
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
              

    @foreach($products as $product)
    <div class="owl-item active">
        <div class="items">
          <div class="h-t-pro" style="min-height:500px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
            <div class="tred-pro">
                <div class="tr-pro-img">
                    <a href="{{route('product-details.view',$product->id)}}">
                        <img src="{{ asset('storage').'/'.$product->img1}}" style="aspect-ratio:17/22;object-fit:cover" alt="blog-image" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="caption" style="text-wrap:wrap;">
                <h3><a href="{{route('product-details.view',$product->id)}}">{{$product->title}}</a></h3>
                <div class="pro-price">
                  @if($product && $product->getProductAttr->count() > 0)
                    @foreach ($product->getProductAttr as $item)
                        <p class="new-price">{{$item->attribute}} : {{$item->value}}</p>
                    @endforeach
                  @endif
                </div>
            </div>
        </div>
     </div>
    </div>
    @endforeach


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
    @if(isset($video->video))
      <source src="{{ asset('storage').'/'.$video->video}}">
    @else
        Video Placeholder
    @endif
      {{-- <source src="{{ asset('client') }}/image/altternatetechnologies_video.mp4" type="video/ogg"> --}}
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
        @foreach ($certificates as $certificate)
            <div class="items">
                <img src="{{ asset('storage').'/'.$certificate->img }}" style="aspect-ratio:1/1;object-fit:cover;" class="img-fluid brand-3" alt="brand-image">
            </div>
        @endforeach
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
    @foreach ($galleries as $gallery)
        <div class="col-md-3 col-lg-4 gallery_slider">
            <a href="{{ asset('storage').'/'.$gallery->file}}">
                <img src="{{ asset('storage').'/'.$gallery->file}}" alt="" style="aspect-ratio:4/3;object-fit:cover;" title="Advanced Anaerobic Bioreactors For Residue-Free Biodegradable Waste Treatment"/>
            </a>
        </div> 
    @endforeach
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
          @foreach ($clients as $client)
            <div class="items px-2">
                <img src="{{ asset('storage').'/'.$client->img}}" style="aspect-ratio:3/2;object-fit:cover;" class="img-fluid brand-4" alt="clients-image">
            </div>
          @endforeach
      </div>
  </div>
</div>
<div class="div justify-content-center d-flex">
  <a href="{{route('clients.view')}}" class="btn btn-style2">View More</a>
</div>
</div>
</section>
<!-- home brand end --> 

<section class="home-countdown1 section-t-padding">
<div class="back-img" @if($bannerImage) style="background-image: url({{ asset('storage').'/'.$bannerImage->image2}});" @endif>
<div class="container">
  <div class="row">
      <div class="col d-flex justify-content-center">
          <div class="deal-content text-center">
              <h2>{{$bannerImage->title2  ?? ''}}</h2>
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
        @foreach ($news as $news)
        <a href="{{route('news.view',$news->id)}}">
            <div class="items">
                <div class="testimonial-content">
                    <img src="{{ asset('storage').'/'.$news->img}}" style="object-fit: cover;aspect-ratio:389/211" class="img-responsive">
                    <div class="testimonial-area">
                        <div class="testi-name" style="max-height: 150px; overflow: hidden; text-overflow: ellipsis;">
                            {!! $news->description !!}
                        </div>                        
                    </div>
                </div>
            </div>
        </a>
        @endforeach
      </div>
  </div>
</div>
</div>
</section>
@endsection
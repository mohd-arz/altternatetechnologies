@extends('client.layout.app')
@section('title', 'Products Details')
@section('content')
<!-- product info start -->
<section class="section-tb-padding pro-page">
  <div class="container">
      <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 pro-image">
              <div class="row">
                  <div class="col-lg-5 col-xl-5 col-md-5 col-12 col-xs-12 larg-image">
                      <div class="tab-content">
                          <div class="tab-pane fade show active" id="image-11">
                            @if($product && $product->img1)
                              <a href="" class="long-img">
                                  <figure class="zoom" onmousemove="zoom(event)" style="background-image: url({{asset('storage').'/'.$product->img1 ?? ''}})">
                                      <img loading="lazy" src="{{asset('storage').'/'.$product->img1 ?? ''}}" class="img-fluid" style="aspect-ratio:17/22;object-fit:cover" alt="image">
                                  </figure>
                              </a>
                              @endif
                          </div>
                          <div class="tab-pane fade" id="image-22">
                            @if($product && $product->img2)
                              <a href="" class="long-img">
                                  <figure class="zoom" onmousemove="zoom(event)" style="background-image: url({{asset('storage').'/'.$product->img2 ?? ''}})">
                                      <img loading="lazy" src="{{asset('storage').'/'.$product->img2 ?? ''}}" style="aspect-ratio:17/22;object-fit:cover" class="img-fluid" alt="image">
                                  </figure>
                              </a>
                              @endif
                          </div>
                          <div class="tab-pane fade" id="image-33">
                            @if($product && $product->img3)
                              <a href="" class="long-img">
                                  <figure class="zoom" onmousemove="zoom(event)" style="background-image: url({{asset('storage').'/'.$product->img3 ?? ''}})">
                                      <img loading="lazy" src="{{asset('storage').'/'.$product->img3 ?? ''}}" style="aspect-ratio:17/22;object-fit:cover" class="img-fluid" alt="image">
                                  </figure>
                              </a>
                              @endif
                          </div>
                      </div>
                      <ul class="nav nav-tabs pro-page-slider owl-carousel owl-theme">
                          <li class="nav-item items">
                            @if($product && $product->img1)
                              <a class="nav-link active" data-bs-toggle="tab" href="#image-11"><img loading="lazy" src="{{asset('storage').'/'.$product->img1 ?? ''}}" style="aspect-ratio:17/22;object-fit:cover" class="img-fluid" alt="image"></a>
                            @endif
                            </li>
                          <li class="nav-item items">
                            @if($product && $product->img2)
                              <a class="nav-link" data-bs-toggle="tab" href="#image-22"><img loading="lazy" src="{{asset('storage').'/'.$product->img2 ?? ''}}" style="aspect-ratio:17/22;object-fit:cover" class="img-fluid" alt="iamge"></a>
                            @endif
                            </li>
                          <li class="nav-item items">
                            @if($product && $product->img3)
                              <a class="nav-link" data-bs-toggle="tab" href="#image-33"><img loading="lazy" src="{{asset('storage').'/'.$product->img3 ?? ''}}" style="aspect-ratio:17/22;object-fit:cover" class="img-fluid" alt="iamge"></a>
                            @endif
                            </li>
                      </ul>
                  </div>
                  <!-- <div class="col-lg-1 col-xl-1 col-md-1 col-12 col-xs-12"></div> -->
                  <div class="col-lg-5 col-xl-5 col-md-5 col-12 col-xs-12 pro-info">
                      <h2 class="product_head">{{$product->title ?? ''}}</h2>
                      <p>
                          {{$product->description ?? ''}}                     
                      </p>
                      <!-- <div class="pro-availabale">
                          <span class="available">Availability:</span>
                          <span class="pro-instock">In stock</span>
                      </div> -->
                      <div class="pro-price">
                          <!-- <span class="new-price">€ 9,99</span> -->
                          <!-- <span class="old-price"><del>$200.00 CAD</del></span>
                          <div class="Pro-lable">
                              <span class="p-discount">-8%</span>
                          </div> -->
                      </div>
                        @if($product && $product->getProductAttr->count() > 0)
                            @foreach ($product->getProductAttr as $item)
                            <span class="pro-details mt-3"><i class="fa fa-circle"></i>{{$item->attribute}} : {{$item->value}}</span>
                            @endforeach
                        @endif
                      <!-- <div class="pro-qty">
                          <span class="qty">Quantity:</span>
                          <div class="plus-minus">
                              <span>
                                  <a href="#" class="minus-btn text-black">-</a>
                                  <input type="text" name="name" value="1">
                                  <a href="#" class="plus-btn text-black">+</a>
                              </span>
                          </div>
                      </div> -->
                      <div class="pro-btn">
                          <!-- <a href="wishlist.html" class="btn btn-style1"><i class="fa fa-heart"></i></a> -->
                          <!-- <a href="cart.html" class="btn btn-style2"><i class="fa fa-shopping-bag"></i> Add to cart</a> -->
                          <!-- <a href="checkout-1.html" class="btn btn-style1">Buy now</a> -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- product info end -->

<section class="blog-page nutritional_values section-b-padding">
  <div class="container">
      <div class="row">
          <div class="section-title5 mt-3">
              <h1>Explore More Products</h1>
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
            <div class="h-t-pro" style="min-height:525px;overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" >
              <div class="tred-pro">
                  <div class="tr-pro-img">
                      <a href="{{route('product-details.view',$product->id)}}">
                          <img loading="lazy" src="{{asset('storage').'/'.$product->img1}}" style="aspect-ratio:17/22;object-fit:cover" alt="blog-image" class="img-fluid">
                      </a>
                  </div>
              </div>
              <div class="caption">
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
@endsection
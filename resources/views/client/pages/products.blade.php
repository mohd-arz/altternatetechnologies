@extends('client.layout.app')
@section('title', 'Products')
@section('content')
<section class="page-header clearfix" style="background-image: url({{ asset('storage').'/'.$bannerImg->image1 }});">
  <div class="container">
      <div class="row">
          <div class="col-xl-12 text-center">
              <div class="page-header__wrapper_p clearfix">
                  <div class="course-header-wrap_p">
                      <h1 class="title">{{$bannerImg->title1}}</h1>
                  </div>
              </div>
          </div>

      </div>
  </div>
</section>

<section class="special-pro-7 section-b-padding">
  <div class="container">
      <div class="row mt-5 mb-4">
           @foreach($products as $product)
           <div class="col-md-4 mt-4">
            <div class="items">
              <div class="h-t-pro" style="height: 635px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                <div class="tred-pro">
                    <div class="tr-pro-img">
                        <a href="{{route('product-details.view',$product->id)}}">
                            <img loading="lazy" src="{{ asset('storage').'/'.$product->img1}}" style="aspect-ratio:17/22;object-fit:cover" alt="blog-image" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="caption" style="text-wrap:wrap;">
                    <h3><a href="product-details.html">{{$product->title}}</a></h3>
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
</section>
@endsection
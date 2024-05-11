@extends('client.layout.app')
@section('title', 'Products')
@section('content')
<section class="page-header clearfix" style="background-image: url({{ asset('client') }}/image/advance_bg.jpg);">
  <div class="container">
      <div class="row">
          <div class="col-xl-12 text-center">
              <div class="page-header__wrapper_p clearfix">
                  <div class="course-header-wrap_p">
                      <h1 class="title">Advanced Scientific Wte Incinerators For Msw Management</h1>
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
              <div class="h-t-pro" style="min-height:635px">
                <div class="tred-pro">
                    <div class="tr-pro-img">
                        <a href="{{route('product-details.view',$product->id)}}">
                            <img src="{{ asset('storage').'/'.$product->img1}}" style="aspect-ratio:17/22;object-fit:cover" alt="blog-image" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="caption">
                    <h3><a href="product-details.html">{{$product->title}}</a></h3>
                    <div class="pro-price">
                        @if($product->model)
                            <p class="new-price">Model : {{$product->model}}</p>
                        @endif
                        @if($product->capacity)
                            <p class="new-price">Capacity : {{$product->capacity}}</p>
                        @endif
                        @if($product->description)
                            <p class="new-price">{{strlen($product->description) > 95 ? substr($product->description, 0, 95) . '...' : $product->description}}</p>
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
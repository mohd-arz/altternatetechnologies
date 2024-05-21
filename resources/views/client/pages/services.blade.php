@extends('client.layout.app')
@section('title', 'Products')
@section('content')
<section class="blog-page nutritional_values">
  <div class="container">
      <div class="row">
          <div class="section-tb-padding">
              <h2 class="mb-3">{{$service->title ?? ''}}</h2>
                {!!$service->description ?? ''!!}
          </div>
      </div>
  </div>
</section>

<section class="section-b-padding blog-page">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-md-4">
              <img src="{{asset('storage').'/'.$service->img1 ?? ''}}" style="aspect-ratio:406/593;object-fit:cover" alt="services">
          </div>
          <div class="col-md-4">
              <img src="{{asset('storage').'/'.$service->img2 ?? ''}}" style="aspect-ratio:406/593;object-fit:cover" alt="services">
          </div>
          <div class="col-md-4">
              <img src="{{asset('storage').'/'.$service->img3 ?? ''}}" style="aspect-ratio:406/593;object-fit:cover" alt="services">
          </div>
      </div>
  </div>  
</section>

<section class="section-b-padding blog-page">
  <div class="container">
      <div class="row">
          <h1 class="mb-3">Products</h1>
          @foreach ($service->getSub as $key => $sub)
            <h5>{{$key + 1}}) {{$sub->title}}</h5>
            {!!$sub->description!!}
            @foreach ($sub->getProducts as $product)
                <div class="col-md-4 mt-4">
                    <img src="{{asset('storage').'/'.$product->img}}" style="aspect-ratio:203/150;object-fit:cover" class="mb-3">
                    {!!$product->img_desc!!}
                </div>
            @endforeach
          @endforeach
      </div>
  </div>
</section>        
@endsection
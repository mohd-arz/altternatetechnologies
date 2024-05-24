@extends('client.layout.app')
@section('title', 'Why Choose us')
@section('content')
<section class="blog-page">
  <div class="container">
      <div class="row">
          <div class="section-title55 section-tb-padding">
            @if(isset($wca->title))
              <h5>{{$wca->title}}</h5>
              @endif
              @if(isset($wca->description))
              {!!$wca->description!!}
              @endif
          </div>
      </div>
  </div>
</section>

<section>
  <div class="container">
      <div class="row section-b-padding">
            @foreach ($imageBox as $item)
                <div class="col-md-3">
                <div class="altternate-m d-flex">
                    <div class="altternate-icon">
                        <img loading="lazy" src="{{ asset('storage').'/'.$item->image }}" style="aspect-ratio:1/1;object-fit:cover">
                    </div>
                    <div class="altternate-content">
                        <h3>{{$item->title}}</h3>
                        <p>{{$item->description}}/p>
                    </div>
                </div>
                </div>
            @endforeach
          </div>
      </div>
</section>

<section class="section-b-padding health-well blog-page">
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="about blog-style-1-full-grid">
                  <div class="health-well-img blog-start">
                      <div class="blog-post">
                          <div class="blog-image1">
                            @if(isset($wca->img1))
                              <img loading="lazy" src="{{ asset('storage').'/'.$wca->img1 }}" style="aspect-ratio:67/58;object-fit:cover" alt="blog-image" class="img-fluid">
                            @endif
                           </div>
                      </div>
                  </div>
                  <div class="health-well-img blog-start">
                      <div class="blog-post">
                          <div class="blog-image1">
                            @if(isset($wca->img2))
                              <img loading="lazy" src="{{ asset('storage').'/'.$wca->img2 }}" style="aspect-ratio:67/58;object-fit:cover" alt="blog-image" class="img-fluid">
                            @endif
                           </div>
                      </div>
                  </div>
                  <div class="health-well-img blog-start">
                      <div class="blog-post">
                          <div class="blog-image1">
                            @if(isset($wca->img3))
                              <img loading="lazy" src="{{ asset('storage').'/'.$wca->img3 }}" style="aspect-ratio:67/58;object-fit:cover" alt="blog-image" class="img-fluid">
                            @endif
                            </div>
                      </div>
                  </div>
                  
                 
              </div>
              
          </div>
      </div>
  </div>  
</section>
@endsection
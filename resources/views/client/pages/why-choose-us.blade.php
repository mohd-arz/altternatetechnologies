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
              <div class="col-md-3">
               <div class="altternate-m d-flex">
                   <div class="altternate-icon">
                       <img src="{{ asset('client') }}/image/icons/wy1.png">
                   </div>
                   <div class="altternate-content">
                      <h3>Eco-Friendly</h3>
                       <p>Alternative hydrocarbon
                          fuel substitution
                          rates up to 100% </p>
                   </div>
               </div>
              </div>
              <div class="col-md-3">
               <div class="altternate-m d-flex">
                   <div class="altternate-icon">
                       <img src="{{ asset('client') }}/image/icons/wy2.png">
                   </div>
                   <div class="altternate-content">
                      <h3>High Quality</h3>
                       <p>Overall system guarantee
                          from production materials
                          to installation quality</p>
                   </div>
               </div>
              </div>
              <div class="col-md-3">
               <div class="altternate-m d-flex">
                   <div class="altternate-icon">
                       <img src="{{ asset('client') }}/image/icons/wy3.png">
                   </div>
                   <div class="altternate-content">
                      <h3>Customization</h3>
                       <p>Customized solutions,
                          from quick-start
                          to complex</p>
                   </div>
               </div>
              </div>
              <div class="col-md-3">
               <div class="altternate-m d-flex">
                   <div class="altternate-icon">
                       <img src="{{ asset('client') }}/image/icons/wy4.png">
                   </div>
                   <div class="altternate-content">
                      <h3>High Performance</h3>
                       <p>Research-based approach
                          to ensure state-of-the-art performance </p>
                   </div>
               </div>
              </div>
              <div class="col-md-3">
               <div class="altternate-m d-flex">
                   <div class="altternate-icon">
                       <img src="{{ asset('client') }}/image/icons/wy5.png">
                   </div>
                   <div class="altternate-content">
                      <h3>Heat</h3>
                       <p>There is high demand
                          for the heat generated from
                          Thermal Combustion
                          for Steam/ Electricity Production</p>
                   </div>
               </div>
              </div>
              <div class="col-md-3">
               <div class="altternate-m d-flex">
                   <div class="altternate-icon">
                       <img src="{{ asset('client') }}/image/icons/wy6.png">
                   </div>
                   <div class="altternate-content">
                      <h3>ASH</h3>
                       <p>Bottom inert and sterile
                          ash is used for ash
                          brick manufacturing</p>
                   </div>
               </div>
              </div>
              <div class="col-md-3">
               <div class="altternate-m d-flex">
                   <div class="altternate-icon">
                       <img src="{{ asset('client') }}/image/icons/wy7.png">
                   </div>
                   <div class="altternate-content">
                      <h3>Fuel Gas</h3>
                       <p>Purified for minimal
                          hazardous emission</p>
                   </div>
               </div>
              </div>
              <div class="col-md-3">
               <div class="altternate-m d-flex">
                   <div class="altternate-icon">
                       <img src="{{ asset('client') }}/image/icons/wy1.png">
                   </div>
                   <div class="altternate-content">
                       <h3>Drain</h3>
                       <p>Emission Cleansing Drain
                          is recycled & reclaimed
                          within the system.</p>
                   </div>
               </div>
              </div>
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
                              <img src="{{ asset('storage').'/'.$wca->img1 }}" style="aspect-ratio:67/58;object-fit:cover" alt="blog-image" class="img-fluid">
                            @endif
                           </div>
                      </div>
                  </div>
                  <div class="health-well-img blog-start">
                      <div class="blog-post">
                          <div class="blog-image1">
                            @if(isset($wca->img2))
                              <img src="{{ asset('storage').'/'.$wca->img2 }}" style="aspect-ratio:67/58;object-fit:cover" alt="blog-image" class="img-fluid">
                            @endif
                           </div>
                      </div>
                  </div>
                  <div class="health-well-img blog-start">
                      <div class="blog-post">
                          <div class="blog-image1">
                            @if(isset($wca->img3))
                              <img src="{{ asset('storage').'/'.$wca->img3 }}" style="aspect-ratio:67/58;object-fit:cover" alt="blog-image" class="img-fluid">
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
@extends('client.layout.app')
@section('title', 'About')
@section('css')
<style>
  .section-tb-padding{
    padding-top:1rem;
  }
</style>
@endsection
@section('content')
<section class="blog-page nutritional_values">
  <div class="container">
      <div class="row">
          <div class="section-title5 section-tb-padding">
              <h1>About</h1>
          </div>
      </div>
  </div>
</section>

<section class="section-b-padding blog-page">
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="about_zusto about blog-style-1-full-grid">
                  <div class="blog-start">
                      <div class="blog-post">
                          <div class="blog-image">
                            @if(isset($about->about_img))
                              <img src="{{ asset('storage').'/'.$about->about_img }}" alt="blog-image" class="img-fluid">
                            @endif
                          </div>
                          <div class="blog-content">
                              <div class="blog-title">
                                  @if(isset($about->about_title))
                                  <h4 class="mb-3">{{$about->about_title}}</h4>
                                  @endif
                                  @if(isset($about->about_description))
                                  <p>
                                      {!!$about->about_description!!}                                              
                                  </p>
                                  @endif
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
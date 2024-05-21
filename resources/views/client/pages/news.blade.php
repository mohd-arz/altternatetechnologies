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
              <h1>News</h1>
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
                            @if(isset($news->img))
                              <img src="{{ asset('storage').'/'.$news->img }}" alt="blog-image" class="img-fluid">
                            @endif
                          </div>
                          <div class="blog-content">
                              <div class="blog-title">
                                  <p>
                                      {!!$news->description ?? ''!!}                                              
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
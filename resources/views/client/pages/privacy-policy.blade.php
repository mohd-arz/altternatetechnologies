@extends('client.layout.app')
@section('title', 'Contact')
@section('css')
<style>
  h1,h2,h3,h4,h5,h6{
    margin:1rem 0;
  }
  p{
    text-align: justify;
  }
  em{
    margin: 1rem,0;
  }
</style>
@endsection
@section('content')
<section class="blog-page nutritional_values">
  <div class="container">
      <div class="row">
          <div class="section-title5 section-tb-padding">
              <h1>Privacy Policy</h1>
          </div>
      </div>
  </div>
</section>

<section class="contact section-b-padding">
  <div class="container">
      {!!$pp->privacy_policy ?? ''!!}
  </div>
</section>
@endsection
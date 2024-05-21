@extends('client.layout.app')
@section('title', 'Gallery')
@section('css')
<link rel="stylesheet" href="{{asset('client')}}/css/portfolio_gallery.css" />
@endsection
@section('content')
<!-- portfoilo -->

<section class="mb-80"  style="flex: 1">
  <div class="wrapper">
      <div class="container">
          <div class="section-title5 mt-5 mb-5">
              <h1></h1>
          </div>
          <div class="tab_menu justify-content-center d-flex mb-4">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item me-2" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Gallery</button>
                  </li>
                  <li class="nav-item me-2" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Video</button>
                  </li>
              </ul>
          </div>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div class="row">
                    @foreach ($images as $image)
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-5">
                            <div class="gallery-item">
                                <a data-fancybox="images" href="{{ asset('storage').'/'.$image->file}}" >
                                    <img class="img-fluid home_img" src="{{ asset('storage').'/'.$image->file}}" style="aspect-ratio:4/3;object-fit:cover;">
                                </a>
                            </div>
                        </div>
                    @endforeach                      
                  </div>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <div class="row">
                    @foreach ($videos as $video)
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-5">
                        <div class="gallery-item video_play">
                            <a data-fancybox="images" href="{{ asset('storage').'/'.$video->file}}" >
                                <div class="video_icon"><i class="fa fa-play-circle"></i></div>
                                <video class="img-fluid home_img" src="{{ asset('storage').'/'.$video->file}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                      
                  </div>
              </div>
            </div>
      </div>
  </div>
</section>

<!-- portfoilo end -->
@endsection
@section('script')
    <script src="{{asset('client')}}/js/fancybox_portfolio_gallery.js"></script>    
@endsection

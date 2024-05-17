@extends('client.layout.app')
@section('title', 'Contact')
@section('content')
<section class="blog-page nutritional_values">
  <div class="container">
      <div class="row">
          <div class="section-title5 section-tb-padding">
              <h1>Contact Us</h1>
          </div>
      </div>
  </div>
</section>

<section class="contact section-b-padding">
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="map-area">
                  <div class="map-details">
                      <div class="contact-info">
                          <div class="information">
                              <div class="contact-in">
                                  <h3><b>Altternate Technologies</b></h3>
                                  <ul class="info-details">
                                      <li><i class="fas fa-home"></i></li>
                                      <li>
                                          <p>{{$address->addr1 ?? ''}}</p>
                                            <p> {{$address->addr2 ?? ''}}</p>
                                      </li>
                                  </ul>
                                  <ul class="info-details">
                                      <li><i class="fa fa-envelope"></i></li>
                                      <li>
                                          <p>{{$address->email ?? ''}}</p>
                                      </li>
                                  </ul>
                                  <ul class="info-details">
                                      <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                                      <li>
                                          <p>{{$address->main_phno ?? ''}}</p>
                                      </li>
                                  </ul>
                                  <ul class="info-details">
                                      <li><i class="fas fa-mobile-alt"></i></li>
                                      <li>
                                          <p>{{$address->alter_phno1 ?? ''}}</p>
                                          <p>{{$address->alter_phno2 ?? ''}}</p>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="contact-info">
                          <div class="contact-details">
                              <h3><b>Leave us your message</b></h3>
                              <form>
                                  <label>Your name</label>
                                  <input type="text" name="name" placeholder="Enter your name">
                                  <label>Email</label>
                                  <input type="text" name="Email" placeholder="Enter your email address">
                                  <label>Message</label>
                                  <textarea rows="5" placeholder="Your message hare..."></textarea>
                              </form>
                              <a href="#" class="btn-style2">Submit <i class="fas fa-arrow-right"></i></a>
                          </div>
                      </div>
                     
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
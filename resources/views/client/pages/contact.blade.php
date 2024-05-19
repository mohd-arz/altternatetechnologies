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
                              <form action="{{route('sendMail')}}" method="POST" id="contact-form">
                                @csrf
                                  <label>Your name</label>
                                  <input type="text" name="name" placeholder="Enter your name" required>
                                  <span id="#name_error"></span>
                                  <label>Email</label>
                                  <input type="email" name="email" placeholder="Enter your email address" required>
                                  <span id="#email_error"></span>
                                  <label>Message</label>
                                  <textarea rows="5" name="message" placeholder="Your message hare..." required></textarea>
                                  <span id="#message_error"></span>
                                  <button type="submit" id="send-btn" class="btn btn-style2">Submit <i class="fas fa-arrow-right"></i></button>
                                </form>
                          </div>
                      </div>
                     
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
@section('script')
<script>
    $(function(){
        $("#contact-form").submit(function(e) {
                  e.preventDefault();
                  var data = new FormData($(this)[0]);
                  var url = $(this).attr("action");
                  var method = $(this).attr("method");
                  $('#send-btn').attr('disabled',true);
                  $.ajax({
                      url: url,
                      method: method,
                      data: data,
                      contentType: false,
                      processData: false,
                      success: function(response) {
                          $('#send-btn').attr('disabled',false)
                          if (response.status) {
                              toastr.options.positionClass = "toast-top-right";
                              toastr.success(response.message, {
                                  timeOut: 5000,
                              });
                              setTimeout(() => {
                                window.location.reload();
                              }, 1000);
                          } else {
                              toastr.options.positionClass = "toast-top-right";
                              toastr.warning(response.message, {
                                  timeOut: 5000,
                              });
                          }
                      },
                      error: function(error) {
                          $('#send-btn').attr('disabled',false)
                          $.each(error.responseJSON.errors, function(key, value) {
                              $("#" + key + "_error").text(value[0]);
                          });
                      },
                  });
              });
      })
</script>
@endsection
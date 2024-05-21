@extends('client.layout.app')
@section('title', 'Contact')
@section('content')
<section class="blog-page nutritional_values">
  <div class="container">
      <div class="row">
          <div class="section-title5 section-tb-padding">
              <h1>clients</h1>
          </div>
      </div>
  </div>
</section>



<section class="contact section-b-padding" style="flex: 1">
  <div class="container">
      <div class="row">
      <!-- clients page tab start -->
      <section class="section-b-padding pro-page-content">
          <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="pro-page-tab">
                          <ul class="nav nav-tabs">

                            @foreach ($types as $key =>$type)
                              <li class="nav-item">
                                  <a class="nav-link @if($key==0) active @endif" data-bs-toggle="tab" href="#tab-1" data-id={{$type->id}}>{{$type->title}}</a>
                              </li>
                            @endforeach
                          </ul>

                          <div class="tab-content">
                              <div class="tab-pane fade show active" id="tab-1">
                                  <div class="row" id="tab-1-row">
                                      @foreach ($clients as $client)
                                        <div class="col-md-2 mb-3">
                                            <img src="{{asset('storage').'/'.$client->img}}" alt="clients" class="clients_bg">
                                        </div>
                                        @endforeach
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- clients page tab end -->    
          
  </div>
  </div>
</section>
@endsection
@section('script')
<script>
  $('.nav-link').on('click',function(){
    let id = $(this).data('id');
    $.ajax({
        url:"{{route('clientsByType')}}",
        method:'GET',
        dataType:'JSON',
        data:{
            id:id,
        },
        success:function(response){
            $('#tab-1-row').html = '';
            const assetUrl = "{{ asset('storage') }}";
            let html = ``;
            response.clients.forEach(client => {
                html += `<div class="col-md-2 mb-3">
                            <img src="${assetUrl}/${client.img}" alt="clients" class="clients_bg">
                        </div>`;

            });
            $('#tab-1-row').html(html);
        },
        error:function(error){
            console.error(error);
        }
    })
  })
</script>
@endsection
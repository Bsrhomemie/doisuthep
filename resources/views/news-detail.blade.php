@extends('master')
@section('header')
<meta property="og:title" content="{{$content['post_name_'.__('message.lang_system')]}}"/>
<meta property="og:url" content="{{asset($files_content[0]['pic_path'])}}"/>
@endsection

@section('content')
  <div class="container pt-30px mb-5">
    <section id="box-publicize">
      <div class="header-selected pt-0">
        <h3>
          {{$content['post_name_'.__('message.lang_system')]}}
          <br>
          <p class="text-dark mt-2 mb-0 text-normal">
            <small><i class="fa fa-calendar"></i> 
              {{date('d/m/Y', strtotime($content['created_at']))}}
            </small>
          </p>
        </h3>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="gallery">
            <div class="container-fluid p-body">
              <div class="row no-gutters">
              @if($files_content) 
                <div class="col-12 col-lg-9 mx-auto">
                  <div class="slide-nav">
                      <div class="nav-prev btn-nav"><i class='fa fa-angle-left'></i></div>
                      <div class="nav-next btn-nav"><i class='fa fa-angle-right'></i></div>
                      <div class="img-16by9 holder " >
                      <img class="img-slide gallery image image-big col-12" src="{{asset($files_content[0]['pic_path'])}}" class="img-responsive image-preview" >
                      </div>
                  </div>
                </div>
              @endif
              <div class="col-12 col-lg-9 mt-4 mx-auto">
                @if($files_content) 
                  <div id="owl_carousel" class="owl-carousel">
                    @foreach ($files_content as $key => $files) 
                      @if($files['pic_path']) 
                        <div class="img-16by9 holder img-indicator {{ $key ==  0 ? 'active' : ''  }}" >
                          <img src="{{asset($files['pic_path'])}}" 
                          class="img-responsive  imagecon image-center">
                        </div>
                      @endif
                    @endforeach
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-4">
        {!!  $content['content_'.__('message.lang_system')] !!}

        <div class="mt-4">
          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="UHtkn8Nw"></script>
          <div class="fb-share-button" data-href="/news-detail/news/{{$content['id']}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">{{__('message.share')}}</a></div>
        </div>
        <br>
        <br>
        @if ($content['pdf']) 
        <div>
          ดาวน์โหลดไฟล์แนบ <a href="{{asset($content['pdf'])}}" target="_blank" class="text-link"><i class="fa fa-download ms-1 "></i> Download</a>
        </div>
        @endif 
      </div>
      <div class="col-12 mt-4">
        <div class="text-center">
          <a href="#" class="text-link" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> {{__('message.back')}}</a> |
          <a href="{{url('/')}}" class="text-link"><i class="fa fa-home"></i> {{__('message.main_page')}}</a>
        </div>
      </div>  
    </div>
  </section>
  </div>
@endsection
@section('footer')
<script type="text/javascript">
  $(document).ready(function () {
    var $owl_slide = $('#owl_carousel');

    $owl_slide.children().each( function( index ) {
      $(this).attr( 'data-position', index ); 
    });

    $owl_slide.owlCarousel({
      center: true,
      loop: true,
      items: 5,
    });

    $(document).on('click', '.owl-item>div', function() {
      $owl_slide.trigger('to.owl.carousel', $(this).data( 'position' ) ); 
    });

    $(document).on('click', '.nav-next', function(e) {
      $owl_slide.trigger('next.owl.carousel');
    });

    $(document).on('click', '.nav-prev', function(e) {
      $owl_slide.trigger('prev.owl.carousel');
    });

    $owl_slide.on('changed.owl.carousel', function(e) {
      let index = e.item.index;
      
      let $indicator = $('.img-indicator').eq(index);
      let caption = $indicator.data('caption');
      let datetime = $indicator.data('datetime');
      let $img_slide = $('.img-slide');

      $('.img-indicator').removeClass('active');
      $indicator.addClass('active');
      
      $('#caption').html(caption);
      $('#datetime').html(datetime);
      $img_slide.attr('src', $indicator.find('img').attr('src'));
      $img_slide.attr('data-index', index);
    });
  });
</script>
@endsection

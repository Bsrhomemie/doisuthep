@extends('master')
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
        <div class="col-md-6">
          <div class="img-16by9 holder " >
            <img src="{{asset($content['picture'])}}" class="img-responsive image-preview" >
          </div>
        </div>
        <div class="col-md-6">
          {!!  $content['content_'.__('message.lang_system')] !!}

          <div class="mt-4">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="UHtkn8Nw"></script>
            <div class="fb-share-button" data-href="https://doisuthep.herokuapp.com/news-detail/news/{{$content['id']}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">{{__('message.share')}}</a></div>
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

@extends('master')

@section('content')
  <div class="container pt-30px mb-5">
    <section >
      <div class="header-selected pt-20px">
        <h3> {{__('message.'.$type)}} </h3>
      </div>
      <div class="row wow fadeInDown">
        @foreach ($content_list as $content)
          <div class="col-md-4 pb-3">
            <div class="card card-box mb-3">
              <div class="highlight-hover">
                <div class="img-16by9 holder " >
                  <img src="{{asset($content['files'][0]['pic_path'])}}" class="img-responsive image-preview" >
                </div>
                <div class="show-hover">
                  <a href="{{asset($content['files'][0]['pic_path'])}}" class="me-3" data-lightbox="portfolio"  title="{{__('message.picture')}}">
                    <i class="far fa-image"></i>
                  </a>
                  <a href="{{url('news-detail/news/'.$content['id'])}}" title="{{__('message.detail')}}">
                    <i class="fas fa-eye"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text">{{$content['post_name_'.__('message.lang_system')]}}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
    
  </div>
@endsection

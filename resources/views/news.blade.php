@extends('master')

@section('content')
  <div class="container pt-30px mb-5">
    <section >
      <div class="header-selected pt-20px">
        <h3>{{$type_text}}</h3>
      </div>
      <div class="row wow fadeInDown">
        @foreach ($content_list as $content)
          <div class="col-md-4">
            <div class="card card-box mb-3">
              <div class="highlight-hover">
                <div class="img-16by9 holder " >
                  <img src="{{URL::asset('images/cover3.jpg')}}" class="img-responsive image-preview" >
                </div>
                <div class="show-hover">
                  <a href="{{URL::asset('images/cover3.jpg')}}" class="me-3" data-lightbox="portfolio"  title="ดูรูปภาพ">
                    <i class="far fa-image"></i>
                  </a>
                  <a href="{{url('news-detail/news/'.$content->id)}}" title="รายละเอียด">
                    <i class="fas fa-eye"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text">{{$content->post_name_th}}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
    
  </div>
@endsection

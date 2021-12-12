@extends('master')

@section('content')
  <div class="container pt-60px mb-5">
    @foreach($post_list as $key => $topic) 
    <section id="box-{{$key}}" class="wow fadeInDown " >
      <div class="header-selected ">
        <p><i class="fa fa-bullhorn"></i>{{__('message.'.$key)}} </p>
      </div>
      <div class="row">
        @if($topic['list']) 
        @foreach($topic['list'] as $list) 
          <div class="col-md-4">
            <div class="card card-box mb-3">
              <div class="highlight-hover">
                <div class="img-16by9 holder ">
                  <img src="{{URL::asset('images/cover3.jpg')}}" class="img-responsive image-preview" alt="...">
                </div>
                <div class="show-hover">
                  <a href="{{URL::asset('images/cover3.jpg')}}" class="me-3" data-lightbox="box_{{$key}}"  title="ดูรูปภาพ">
                    <i class="far fa-image"></i>
                  </a>
                  <a href="{{url('news-detail/news/'.$list['id'])}}" title="รายละเอียด">
                    <i class="fas fa-eye"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text">
                  {{$list['post_name_'.__('message.lang_system')]}}
                </p>
              </div>
            </div>
          </div>
        @endforeach
          <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{url('news/'.$key)}}" class="btn btn-main btn-sm mt-3"><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
          </div>
        @else 
          <div class="col-12">
            <div class="card card-box">
              <div class="card-body text-center">
                <h6>ไม่มีข้อมูล</h6>
              </div>  
            </div>
          </div>
        @endif
      </div>
    </section> 
    @endforeach
  </div>
@endsection


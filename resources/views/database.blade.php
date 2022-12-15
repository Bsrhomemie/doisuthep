@extends('master')
<div class="container pt-30px pb-5">
    <section id="box-databaes">
      <div class="header-selected pt-20px">
        <h3>
          <p class="text-secondary  mb-0 text-normal">{{__('message.databaes')}}</p>
        </h3>
      </div>
       <div class="row">
          @if($database_list) 
            @foreach ($database_list as $key => $data) 
              <div class="col-md-4 mb-3">
                <div class="card card-box mb-3">
                  <div class="highlight-hover">
                    <div class="img-16by9 holder " >
                      <img src="{{asset($data['img_path'])}}" class="img-responsive image-preview" >
                    </div>
                    <div class="show-hover">
                      <a href="{{asset($data['img_path'])}}" class="me-3" data-lightbox="box_news"  title="{{__('message.picture')}}">
                        <i class="far fa-image"></i>
                      </a>
                      <a href="{{url('/databasel/animal/1')}}" title="{{__('message.detail')}}">
                        <i class="fas fa-eye"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="card-text">{{$data['name_'.__('message.lang_system')]}}</p>
                  </div>
                </div>
              </div>
            @endforeach
            <div class="col-lg-12 d-flex justify-content-end">
              <a href="{{url('news/news')}}" class="btn btn-main btn-sm mt-3"><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
            </div>
           @else 
            <div class="col-12">
              <div class="card card-box">
                <div class="card-body text-center">
                  <h6>{{__('message.no_data')}}</h6>
                </div>  
              </div>
            </div>
          @endif
        </div>
      </section>
  </div>
@extends('master')
@section('content')
<div class="container pt-30px pb-5">
  <section id="box-databaes">
    <div class="header-selected pt-20px">
      <h3>
        <p class="text-secondary  mb-0 text-normal">{{__('message.databaes')}}</p>
      </h3>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mx-auto">
      <form>
        <div class="mb-3">
          <input name="search" value="{{isset($search['search']) ? $search['search'] : ''}}" class="form-control" placeholder="กรอกคำค้นหา">
        </div>
        <div class="mb-3">
          <select class="form-select" name="type">
            <option  value="" selected>เลือกประเภท</option>
            <option value="plant" {{(isset($search['type']) && $search['type'] == 'plant')? 'selected' : ''}}>
              {{__('message.plant')}}
            </option>
            <option value="animal" {{(isset($search['type']) && $search['type'] == 'animal')? 'selected' : ''}}>
              {{__('message.animal')}}
            </option>
          </select>
        </div>
          <input type="hidden" name="page" value="0">
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-main px-4">{{__('message.search')}}</button>
        </div>
      </form>
    </div>
    <hr/>
    <div class="row">
      @if($database_list) 
        @foreach ($database_list as $key => $data) 
          <div class="col-md-4 mb-3">
            <div class="card card-box mb-3">
              <div class="card-body">
                <div class="highlight-hover ">
                  <div class="img-16by9 holder bg-light" >
                    <img src="{{isset($data->files)? asset($data->files->pic_location) : ''}}" class="img-responsive image-preview">
                  </div>
                  <div class="show-hover">
                    <a href="{{isset($data->files)? asset($data->files->pic_location) : ''}}" class="me-3" data-lightbox="box_news" title="{{__('message.picture')}}">
                      <i class="far fa-image"></i>
                    </a>
                    <a href="{{url('/database/'.$data->type.'/'.$data->id)}}" title="{{__('message.detail')}}">
                      <i class="fas fa-eye"></i>
                    </a>
                  </div>
                </div>
                <p class="card-text pt-3">
                 {{$data->name}}
                </p>
              </div>
            </div>
          </div>
        @endforeach
        <div class="custom-pagination mt-2">
          {!! $database_list->appends(Request::capture()->except('page'))->render() !!}
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
@endsection
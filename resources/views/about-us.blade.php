@extends('master')

@section('content')
<div class="container pt-30px pb-5">
<section id="box-aboutDSNC" class="wow fadeInDown" >
<div class="header-selected pt-10px">
  <h3>{{__('message.aboutUs')}}</h3>
  <p><i class="fa fa-bullhorn"></i>{{__('message.aboutDSNC')}}</p>
</div>
<div class="mt-4">
  <p class="font-18px"><b>{{__('message.our_object')}}</b> </p>
  <p class="mb-2"> {{__('message.get_to_know_us_1')}}</p>
  <p class="mb-2">{{__('message.get_to_know_us_2')}}</p>
  <p class="mb-2">{{__('message.get_to_know_us_3')}}</p>
</div>
</section>
<div class="row">
<div class="col-md-6 col-lg-4 mt-5">
  <section id="box-vision" class="wow fadeInDown h-100" >
    <div class="card card-box">
      <div class="card-body custom">
        <div class="d-flex justify-content-center">
          <div class="w-120px mt-2">
            <div class="img-1by1 holder " >
              <img src="{{URL::asset('public/images/vision.png')}}" class="img-responsive image-preview" >
            </div>
          </div>
        </div>
        <p class="font-18px text-center mt-3"><b>{!!__('message.vision')!!}</b></p>
        <p class="text-center mb-0">
        {!!__('message.vision_description')!!} 
      </p>
      </div>
    </div>
  </section>
</div>
<div class="col-md-6 col-lg-4  mt-5">
  <section id="box-mission" class="wow fadeInDown h-100" >
    <div class="card card-box ">
      <div class="card-body custom">
        <div class="d-flex justify-content-center">
          <div class="w-120px mt-1">
            <div class="img-1by1 holder " >
              <img src="{{URL::asset('public/images/target.png')}}" class="img-responsive image-preview" >
            </div>
          </div>
        </div>
        <p class="font-18px text-center mt-3 pt-1"><b>{{__('message.mission')}}</b></p>
        <p class="mb-0 px-2">
          - {!!__('message.mission_description1')!!} <br>
          - {!!__('message.mission_description2')!!} <br>
          - {!!__('message.mission_description3')!!}
        </p>
      </div>
    </div>
  </section>
</div>
<div class="col-md-6 col-lg-4  mt-5">
  <section id="box-core_values" class="wow fadeInDown h-100" >
    <div class="card card-box">
      <div class="card-body custom">
        <div class="d-flex justify-content-center">
          <div class="w-120px mt-2">
            <div class="img-1by1 holder " >
              <img src="{{URL::asset('public/images/diamond.png')}}" class="img-responsive image-preview" >
            </div>
          </div>
        </div>
        <p class="font-18px text-center mt-3 "><b>{{__('message.core_values')}}</b></p>
        <div class="px-2">
          <div class="row">
            <div class="col-6 col-lg-7">
              D = Diversity 
            </div>
            <div class="col-6 col-lg-5">
              ความหลายหลาย
            </div>
            <div class="col-6 col-lg-7 mt-2">
              S = Services
            </div>
            <div class="col-6 col-lg-5 mt-2">
              บริการ
            </div>
            <div class="col-6 col-lg-7 mt-2">
              N = Networking 
            </div>
            <div class="col-6 col-lg-5 mt-2">
              สร้างเครือข่าย
            </div>
            <div class="col-6 col-lg-7 mt-2">
              C = Community 
            </div>
            <div class="col-6 col-lg-5 mt-2">
              ชุมชน
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>
<section id="box-logo" class="wow fadeInDown pt-40px">
<div class="header-selected pt-20px">
  <p class="mt-3"><i class="fa fa-bullhorn"></i>{{__('message.logo_mascots')}}</p>
</div>
<div class="row d-flex justify-content-center">
  <div class="col-lg-7 col-md-9">
    <div class="d-flex justify-content-center">
      <div class="img-product"> 
       <img src="{{URL::asset('public/images/thumbnail.png')}}">
      </div>
    </div>
    <table class="table table-bordered mt-3">
      <tr>
        <th style="width: 30%;">{!!__('message.plants')!!}</th>
        <td>{!!__('message.plants_description')!!}</td>
      </tr>
      <tr>
        <th style="width: 30%;">{!!__('message.pagoda')!!}</th>
        <td>{!!__('message.pagoda_description')!!}</td>
      </tr>
      <tr>
        <th style="width: 30%;">{!!__('message.staircase')!!}</th>
        <td>{!!__('message.staircase_description')!!}</td>
      </tr>
    </table>
  </div>
</div>
<div class="row">
<div class="col-md-6 col-lg-4  mt-4">
  <div class="card card-box">
    <div class="card-body custom">
      <div class="d-flex justify-content-center">
        <div class="mascot-img" >
          <img src="{{URL::asset('public/images/mascot/ndoi.png')}}">
        </div>
      </div>
      <p class="font-18px text-center mt-3"><b>{!!__('message.nong_doi')!!}</b></p>
      <p class="text-center mb-0 font-Medium">
      {!!__('message.nong_doi_description')!!}
      </p>
    </div>
  </div>
</div>
<div class="col-md-6 col-lg-4  mt-4">
  <div class="card card-box">
    <div class="card-body custom">
      <div class="d-flex justify-content-center">
        <div class="mascot-img" >
          <img src="{{URL::asset('public/images/mascot/ntonnum.png')}}">
        </div>
      </div>
      <p class="font-18px text-center mt-3 pt-1"><b>{!!__('message.nong_ton_nam')!!}</b></p>
      <p class="text-center mb-0 font-Medium">
      {!!__('message.nong_ton_nam_description')!!}
      </p>
    </div>
  </div>
</div>
<div class="col-md-6 col-lg-4  mt-4">
  <div class="card card-box">
    <div class="card-body custom">
      <div class="d-flex justify-content-center">
        <div class="mascot-img" >
          <img src="{{URL::asset('public/images/mascot/nguy.png')}}">
        </div>
      </div>
      <p class="font-18px text-center mt-3 pt-1"><b>{!!__('message.nong_guy')!!}</b></p>
      <p class="text-center mb-0 font-Medium">
      {!!__('message.nong_guy_description')!!}
      </p>
    </div>
  </div>
</div>
</div>
</section>
</div>
@endsection

@section('footer')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#page_about').attr("href", "#")
    });
  </script>
@endsection
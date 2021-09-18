@extends('master')

@section('content')

  <div class="container pt-30px pb-5">
    
    <section id="box-publicize">
      <div class="header-selected pt-0">
        <h3>
          @if($type == 'administrator') 
            {{__('message.administrator')}}
          @else 
            {{__('message.staff')}}
          @endif
          <br>
          <p class="text-secondary  mb-0 text-normal">Excutive</p>
        </h3>
      </div>
   
      <div class="row ">
        @for ($i = 0; $i < 7; $i++)
          <div class="col-md-4  mt-4 wow fadeInUp">
            <div class="card card-box  h-100 ">
              <div class="about-col">
                <div class="img-4by3-v  holder">
                  <img src="{{URL::asset('images/cover3.jpg')}}" class="img-responsive image-preview" alt="...">
                </div>
                <div class="icon"><i class="fas fa-user"></i></div>
              </div>
              <div class="card-body pt-40px text-center">
                <h4 class="title font-SemiBold">นายณัฐภูมิ เทพหินลัพ</h4>
                <p class="card-text font-Medium mb-0">พนักงานบริหารจัดการห้องปฏิบัติการนวัตกรรม</p>
                <p class="card-text text-14px">อีเมล nutthapoom@step.cmu.ac.th</p>
              </div>
            </div>
          </div>
        @endfor 
      </div >
    </section>
  </div>
@endsection


@extends('master')

@section('content')

  <div class="container pt-30px pb-5">
    <section id="box-administrator">
      <div class="header-selected pt-20px">
        <h3>
          <p class="text-secondary  mb-0 text-normal">{{__('message.administrator')}}</p>
        </h3>
      </div>
      <div class="row ">
        @foreach($employee_list as $employee) 
          <div class="col-md-3  mt-4 wow fadeInUp">
            <div class="card card-box  h-100 ">
              <div class="about-col">
                <div class="img-4by3-v  holder">
                  <img src="{{URL::asset($employee['img_path'])}}" class="img-responsive image-preview" alt="...">
                </div>
                <div class="icon"><i class="fas fa-user"></i></div>
              </div>
              <div class="card-body pt-40px text-center">
                <h4 class="title font-SemiBold">{{$employee['name_'.__('message.lang_system')]}}</h4>
                <p class="card-text font-Medium mb-3">{{$employee['position_'.__('message.lang_system')]}}</p>
                <!-- <p class="card-text text-14px">อีเมล nutthapoom@step.cmu.ac.th</p> -->
              </div>
            </div>
          </div>
        @endforeach 
      </div >
    </section>
    <section id="box-staff">
      <div class="header-selected pt-20px">
        <h3>
          <p class="text-secondary  mb-0 text-normal">{{__('message.staff')}}</p>
        </h3>
      </div>
      <div class="row ">
        @foreach($staff_list as $staf) 
          <div class="col-md-3  mt-4 wow fadeInUp">
            <div class="card card-box  h-100 ">
              <div class="about-col">
                <div class="img-4by3-v  holder">
                  <img src="{{URL::asset($employee['img_path'])}}" class="img-responsive image-preview" alt="...">
                </div>
                <div class="icon"><i class="fas fa-user"></i></div>
              </div>
              <div class="card-body pt-40px text-center">
                <h4 class="title font-SemiBold">{{$staf['name_'.__('message.lang_system')]}}</h4>
                <p class="card-text font-Medium mb-3">{{$staf['position_'.__('message.lang_system')]}}</p>
                <!-- <p class="card-text text-14px">อีเมล nutthapoom@step.cmu.ac.th</p> -->
              </div>
            </div>
          </div>
        @endforeach 
      </div >

    </section>
  </div>
@endsection

@section('footer')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#page_employee').attr("href", "#")
    });
  </script>
@endsection
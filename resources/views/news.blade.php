@extends('master')

@section('content')
  <div class="container pt-30px mb-5">
    <section >
      <div class="header-selected pt-20px">
        <h3>ข่าวประชาสัมพันธ์ทั้งหมด</h3>
      </div>
      <div class="row wow fadeInDown">
        @for ($i = 0; $i < 3; $i++)
          <div class="col-md-4">
            <div class="card card-box mb-3">
              <div class="highlight-hover">
                <div class="img-16by9 holder " >
                  <img src="{{URL::asset($list[$i])}}" class="img-responsive image-preview" >
                </div>
                <div class="show-hover">
                  <a href="{{URL::asset($list[$i])}}" class="me-3" data-lightbox="portfolio"  title="ดูรูปภาพ">
                    <i class="far fa-image"></i>
                  </a>
                  <a href="" title="รายละเอียด">
                    <i class="fas fa-eye"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text">STeP นำทัพนักศึกษา มช. กวาดรางวัล Startup Thailand League 2021 (ภาคเหนือ) คว้าชัยชนะแบบจัดเต็ม พร้อมเดินหน้าคว้าชัยเวทีระดับประเทศในเดือนสิงหาคมนี้</p>
              </div>
            </div>
          </div>
        @endfor
       
      </div>
    </section>
    
  </div>
@endsection

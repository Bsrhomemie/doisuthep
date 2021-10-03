@extends('master')

@section('content')
  <div class="container pt-30px mb-5">
    <section id="box-plants" class="wow fadeInDown" >
      <div class="header-selected pt-20px">
        <h3>{{__('message.doi_suthep')}}</h3>
      </div>
      <div class="row">
        <div class="col-12">
          &nbsp &nbsp &nbsp &nbsp อุทยานแห่งชาติดอยสุเทพ-ปุย เป็นอุทยานแห่งชาติลำดับที่ 24 ของประเทศไทย โดยประกาศเมื่อวันที่ 14 เมษายน 2524 ครอบคลุมพื้นที่ 100,662.50 ไร่ หรือ 161.06 ตารางกิโลเมตร มีพื้นที่ตั้งอยู่ในเขตอำเภอเมือง อำเภอหางดง อำเภอแม่ริม และอำเภอแม่แตง ของจังหวัดเชียงใหม่อ จุดสูงสุดของอุทยานฯ อยู่บริเวณที่เรียกว่า “ดอยปุย” ซึ่งสูงกว่าระดับน้ำทะเล 1,685 เมตร อุทยานแห่งชาติแห่งนี้ประกอบด้วยป่าที่อุดมสมบูรณ์ แม้ว่าที่ตั้งจะอยู่ใกล้ตัวเมืองเชียงใหม่มากเพียง 6 กิโลเมตร แต่ป่าส่วนใหญ่อยู่บนภูเขาสูงสลับซับซ้อน ภูเขาสำคัญได้แก่ ดอยสุเทพ ดอยปุย เป็นต้น
        </div>
      </div>
    </section>
    @foreach($post_list as $key => $topic) 
    <section id="box-{{$key}}" class="wow fadeInDown " >
      <div class="header-selected ">
        <p><i class="fa fa-bullhorn"></i>{{__('message.'.$key)}} </p>
      </div>
      <div class="row">
        <div class="col-12">
          <p class="mb-3">{!! $topic[__('message.suthep_detail')] !!}</p>
        </div>
        @foreach($topic['list'] as $list) 
          <div class="col-md-4">
            <div class="card card-box mb-3">
              <div class="highlight-hover">
                <div class="img-16by9 holder ">
                  <img src="{{URL::asset('images/cover3.jpg')}}" class="img-responsive image-preview" alt="...">
                </div>
                <div class="show-hover">
                  <a href="{{URL::asset('images/cover3.jpg')}}" class="me-3" data-lightbox="context"  title="ดูรูปภาพ">
                    <i class="far fa-image"></i>
                  </a>
                  <a href="" title="รายละเอียด">
                    <i class="fas fa-eye"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <p class="card-text">
                 sss
                </p>
              </div>
            </div>
          </div>
        @endforeach
          <div class="col-lg-12 d-flex justify-content-end">
            <a href="news.php" class="btn btn-main btn-sm mt-3"><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
          </div>
       
      </div>
    </section> 
    @endforeach
  </div>
@endsection


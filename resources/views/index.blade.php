@extends('master')
@section('content')
  <div id="owl-cover" class="owl-carousel cover-page owl-theme">
    <div class="item-cover" style="background-image:url({{asset('images/cover/cover1.jpg')}});">
      <div class="text-cover text-danger">
        <h1>Chiang Mai University</h1>
      </div>
    </div>
    <div class="item-cover" style="background-image:url({{asset('images/cover/cover2.jpg')}});">
      <div class="text-cover">
        <h1>นโยบายคุณภาพ</h1>
      </div>
    </div>
    <div class="item-cover" style="background-image:url({{asset('images/cover/cover3.jpg')}});">

    </div>
    <div class="item-cover" style="background-image:url({{asset('images/cover/cover4.jpg')}});">

    </div>
    <div class="item-cover" style="background-image:url({{asset('images/cover/cover5.jpg')}});">

    </div>
  </div>
  <div class="container">
    <selected  >
      <div class="row pt-76">
        <div class="col-lg-7" >
          <p class="mb-3 font-SemiBold">ศูนย์ธรรมชาติวิทยาดอยสุเทพเฉลิมพระเกียรติฯ มหาวิทยาลัยเชียงใหม่</p>
          <p class="mb-3 font-SemiBold">Doi Suthep Nature Center, Chiang Mai University </p>
          <p>
            เป็นแหล่งเรียนรู้ด้านธรรมชาติวิทยา นิเวศวิทยา ธรรมชาติและสิ่งแวดล้อม ผ่านการจัดแสดง
            นิทรรศการ กิจกรรม/โครงการ และการอบรมบริการวิชาการต่าง ๆ แก่กลุ่มเป้าหมายซึ่งเป็น
            เด็ก เยาวชน ครอบครัว และบุคคลทั่วไป อีกทั้งยังให้บริการข้อมูลด้านธรรมชาติวิทยา
            ดอยสุเทพ เพื่อถ่ายทอดความรู้ความเข้าใจตลอดจนสร้างความตระหนักแก่ชุมชนให้เห็นความ   สำคัญของการรักษาสิ่งแวดล้อม
            และอนุรักษ์ทรัพยากรธรรมชาติ โดยเฉพาะอย่างยิ่งในพื้นที่ดอยสุเทพ นอกจากนั้น
            ศูนย์ฯ ยังถือเป็นตัวกลางในการสร้างเครือข่ายและพื้นที่แลกเปลี่ยนเรียนรู้เพื่อส่งเสริม
            ชุมชนให้เป็นมิตรกับสิ่งแวดล้อม
          </p>
        </div>
        <div class="col-lg-5">
          <div class="ratio ratio-16x9">
            <iframe  src="https://www.youtube.com/embed/lm9-N4W-jWk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>
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
                    <img src="{{URL::asset('images/vision.png')}}" class="img-responsive image-preview" >
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
                    <img src="{{URL::asset('images/target.png')}}" class="img-responsive image-preview" >
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
                    <img src="{{URL::asset('images/diamond.png')}}" class="img-responsive image-preview" >
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
             <img src="{{URL::asset('images/thumbnail.png')}}">
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
                <img src="{{URL::asset('images/mascot/ndoi.png')}}">
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
                <img src="{{URL::asset('images/mascot/ntonnum.png')}}">
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
                <img src="{{URL::asset('images/mascot/nguy.png')}}">
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
    <hr class="mb-5">
  </div>
  <div class="bg-section">
    <div class="container">
      <!-- ประชาสัมพันธ์ -->
      <section id="box-news" class="wow fadeInDown" >
        <div class="header-selected pt-10px">
          <h3>{{__('message.news_menu')}}</h3>
          <p><i class="fa fa-bullhorn"></i>{{__('message.news')}}</p>
        </div>
        <div class="row">
          @if($post_list['news']) 
            @foreach ($post_list['news'] as $key => $news) 
              <div class="col-md-4">
                <div class="card card-box mb-3">
                  <div class="highlight-hover">
                    <div class="img-16by9 holder " >
                      <img src="{{URL::asset('images/cover3.jpg')}}" class="img-responsive image-preview" >
                    </div>
                    <div class="show-hover">
                      <a href="{{URL::asset('images/cover3.jpg')}}" class="me-3" data-lightbox="box_news"  title="{{__('message.picture')}}">
                        <i class="far fa-image"></i>
                      </a>
                      <a href="{{url('news-detail/news/'.$news['id'])}}" title="{{__('message.detail')}}">
                        <i class="fas fa-eye"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="card-text"> {{$news['post_name_'.__('message.lang_system')]}}</p>
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
      <section id="box-articles" class="wow fadeInDown " >
        <div class="header-selected ">
          <p><i class="fa fa-bullhorn"></i>{{__('message.articles')}}</p>
        </div>
        <div class="row">
          @if($post_list['articles']) 
            @foreach ($post_list['articles'] as $key => $articles) 
              <div class="col-md-4">
                <div class="card card-box mb-3">
                  <div class="highlight-hover">
                    <div class="img-16by9 holder " >
                      <img src="{{URL::asset('images/cover3.jpg')}}" class="img-responsive image-preview" >
                    </div>
                    <div class="show-hover">
                      <a href="{{URL::asset('images/cover3.jpg')}}" class="me-3" data-lightbox="box_articles"  title="{{__('message.picture')}}">
                        <i class="far fa-image"></i>
                      </a>
                      <a href="{{url('news-detail/news/'.$articles['id'])}}" title="{{__('message.detail')}}">
                        <i class="fas fa-eye"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="card-text">{{$articles['post_name_'.__('message.lang_system')]}}</p>
                  </div>
                </div>
              </div>
            @endforeach
            <div class="col-lg-12 d-flex justify-content-end">
              <a href="{{url('news/articles')}}" class="btn btn-main btn-sm mt-3"><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
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
      <section id="box-souvenirs" class="wow fadeInDown mt-5" >
        <div class="header-selected">
          <p><i class="fa fa-bullhorn"></i>{{__('message.souvenirs')}}</p>
        </div>
        <div class="col-12">
          <div id="owl_product" class="owl-carousel">
            <?php for($i=0; $i<5; $i++) { ?>
              <div class="col-12">
                <div class="card card-product ">
                  <div class="d-flex justify-content-center">
                    <div class="img-product">
                      <img src="{{URL::asset('images/product1.jpg')}}" >
                    </div>
                  </div>
                  <div class="card-body text-center pt-0">
                    <p class="font-SemiBold mb-1">Product</p>
                    <p class="text-secondary">500.00</p>

                  </div>
                </div>
              </div>
            <?php  } ?>
          </div>
        </div>
      </section>
      <section id="box-vedio" class="wow fadeInDown mt-5" >
        <div class="header-selected">
          <p><i class="fa fa-bullhorn"></i>{{__('message.video')}}</p>
        </div>
        <div class="row">
          @foreach ($youtube_list as $youtube) 
            <div class="col-md-6 mb-4">
              <div class="ratio ratio-21x9">
                <iframe  src="{{$youtube}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          @endforeach
        </div>
      </section>
      <section id="box-join" class="wow fadeInDown mt-5 pb-5" >
        <div class="header-selected">
          <p><i class="fa fa-bullhorn"></i> {{__('message.join')}}</p>
        </div>
        <div class="row">
          <div class="col-12">
            <table class="table table-striped">
              <tbody>
                @if($post_list['join']) 
                  @foreach ($post_list['join'] as $key => $join) 
                    <tr>
                      <td class="text-grey">
                        <span style="font-size:14px;">
                          <i class="far fa-calendar-alt"></i>
                          {{date('d/m/Y', strtotime($join['created_at']))}} | {{$join['post_name_'.__('message.lang_system')]}}
                          <a class="text-link" href="{{url('news-detail/news/'.$join['id'])}}">{{__('message.detail')}}</a>
                        </span>
                      </td>
                    </tr>
                  @endforeach
                @else 
                  <tr><td class="text-center">{{__('message.no_data')}}</td></tr>
                @endif  
              </tbody>
            </table>
          </div>
          <div class="col-lg-12 d-flex justify-content-end ">
            <a href="{{url('news/join')}}" class="btn btn-main btn-sm"><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection

@section('footer')
<script type="text/javascript">
  $(document).ready(function() {
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll >= 97) {
        $(".header-menu ").addClass("header-dark");
      } else {
        $(".header-menu ").removeClass("header-dark");
      }
    });

    $('#owl-cover').owlCarousel({
      loop:true,
      margin:0,
      nav:true,
      items:1,
      autoplay:true,
      autoplayTimeout:5000,
      animateOut: 'fadeOut'
    })
  });
</script>
@endsection

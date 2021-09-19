@extends('master')

@section('content')
  <div id="owl-cover" class="owl-carousel cover-page owl-theme">
    <div class="item-cover" style="background-image:url({{asset('images/cover1.jpg')}});">
      <div class="text-cover text-danger">
        <h1>Chiang Mai University</h1>
      </div>
    </div>
    <div class="item-cover" style="background-image:url({{asset('images/cover2.jpg')}});">
      <div class="text-cover">
        <h1>นโยบายคุณภาพ</h1>
      </div>
    </div>
    <div class="item-cover" style="background-image:url({{asset('images/cover3.jpg')}});">

    </div>
    <div class="item-cover" style="background-image:url({{asset('images/cover4.jpg')}});">

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
    <section id="box-dsnc" class="wow fadeInDown" >
      <div class="header-selected pt-10px">
        <h3>{{__('message.aboutUs')}}</h3>
        <p><i class="fa fa-bullhorn"></i>{{__('message.aboutDSNC')}}</p>
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
        @foreach ($content as $data) 
        <div class="col-md-4">
        $data['id']
        </div>
        @endforeach


          @for ($i = 0; $i < 3; $i++)
            <div class="col-md-4">
              <div class="card card-box mb-3">
                <div class="highlight-hover">
                  <div class="img-16by9 holder " >
                    <img src="{{URL::asset($list[$i])}}" class="img-responsive image-preview" >
                  </div>
                  <div class="show-hover">
                    <a href="{{URL::asset($list[$i])}}" class="me-3" data-lightbox="news"  title="ดูรูปภาพ">
                      <i class="far fa-image"></i>
                    </a>
                    <a href="{{url('news-detail/news/1')}}" title="รายละเอียด">
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
          <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{url('news/news')}}" class="btn btn-main btn-sm "><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
          </div>
        </div>
      </section>
      <section id="box-articles" class="wow fadeInDown " >
        <div class="header-selected ">
          <p><i class="fa fa-bullhorn"></i>{{__('message.articles')}}</p>
        </div>
        <div class="row">
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
          <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{url('news/articles')}}" class="btn btn-main btn-sm "><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
          </div>
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
            <?php for($i=0; $i<4; $i++) { ?>
            <div class="col-md-6 mb-4">
              <div class="ratio ratio-21x9">
                <iframe  src="https://www.youtube.com/embed/lm9-N4W-jWk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          <?php  } ?>
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
                <?php for($i=0; $i<4; $i++) { ?>
                  <tr>
                    <td class="text-grey">
                      <span style="font-size:14px;">
                        <i class="far fa-calendar-alt"></i> 16 ก.ค. 2564 | ประกาศรายชื่อผู้มีสิทธิ์สอบรอบแรกตำแหน่งพนักงานบริหารงานทรัพย์สินทางปัญญา
                        <a class="text-link" href="">{{__('message.detail')}}</a>
                      </span>
                    </td>
                  </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
          <div class="col-lg-12 d-flex justify-content-end ">
            <a href="news.php" class="btn btn-main btn-sm "><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
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

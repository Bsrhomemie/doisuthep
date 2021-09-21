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
      <div>
        <p class="font-18px"><b>วัตถุประสงค์การจัดตั้งศูนย์ฯ </b> </p>
        <p class="mb-2"> 1. เพื่อเป็นการเฉลิมพระเกียรติพระบาทสมเด็จพระเจ้าอยู่หัวในรัชกาลที่ 9 ในวโรกาสทรงครองราชย์ครบ 50 ปี ในปี พ.ศ. 2539 และเพี่อเทิดพระเกียรติพระบาทสมเด็จพระเจ้าอยู่หัวในรัชกาลที่ 9 ในวโรกาสทรงมีพระชนมายุครบ 72 พรรษา ในปี พ.ศ. 2542 </p>
        <p class="mb-2">2. เพื่อเป็นศูนย์จัดแสดงเรื่องราวเกี่ยวกับดอยสุเทพทั้งในด้านธรรมชาติวิทยา นิเวศวิทยา ประวัติศาสตร์ วัฒนธรรม และชุมชน สำหรับนักท่องเที่ยว ประชาชนทั่วไป นักวิจัย นักศึกษา ก่อนที่จะเดินทางไปท่องเที่ยวบนดอยสุเทพ อันเป็นประตูสำคัญต่อการท่องเที่ยวอย่างมีคุณภาพและมีจิตสำนึก </p>
        <p class="mb-2">3. เพื่อเป็นศูนย์ประสานงานและความร่วมมือระหว่างนักวิชาการ และหน่วยงานต่าง ๆ ที่เกี่ยวข้องกับการท่องเที่ยวและการอนุรักษ์ดอยสุเทพ เป็นแหล่งรวบรวมความรู้ และการเผยแพร่ข้อมูลทางด้านวิชาการเกี่ยวกับดอยสุเทพ </p>
      </div>
    </section>
    <section id="box-structure" class="wow fadeInDown" >
      <div class="row">
        <div class="col-md-6 col-lg-4 mt-5">
          <div class="card card-box">
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <div class="w-150px mt-2">
                  <div class="img-1by1 holder " >
                    <img src="{{URL::asset('images/vision.png')}}" class="img-responsive image-preview" >
                  </div>
                </div>
              </div>
              <p class="font-18px text-center mt-3"><b>{{__('message.vision')}}</b></p>
              <p class="text-center mb-0">
                “ชุมชนตระหนักถึงความสวยงาม <br> และความเชื่อมโยงกับธรรมชาติ” </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mt-5">
          <div class="card card-box">
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <div class="w-150px mt-1">
                  <div class="img-1by1 holder " >
                    <img src="{{URL::asset('images/target.png')}}" class="img-responsive image-preview" >
                  </div>
                </div>
              </div>
              <p class="font-18px text-center mt-3 pt-1"><b>{{__('message.mission')}}</b></p>
              <p class="mb-0 px-2">
                - จัดกิจกรรมและการอบรมที่ส่งเสริมการเรียนรู้ด้านธรรมชาติวิทยา <br>
                - ให้บริการข้อมูลด้านธรรมชาติวิทยาดอยสุเทพ <br>
                - สร้างเครือข่ายและพื้นที่แลกเปลี่ยนเรียนรู้เพื่อส่งเสริมชุมชนให้เป็นมิตรกับสิ่งแวดล้อม
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mt-5">
          <div class="card card-box">
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <div class="w-130px mt-2">
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
          @foreach ($post_list['news'] as $key => $news) 
            <div class="col-md-4">
              <div class="card card-box mb-3">
                <div class="highlight-hover">
                  <div class="img-16by9 holder " >
                    <img src="{{URL::asset($list[$key])}}" class="img-responsive image-preview" >
                  </div>
                  <div class="show-hover">
                    <a href="{{URL::asset($list[$key])}}" class="me-3" data-lightbox="box_news"  title="ดูรูปภาพ">
                      <i class="far fa-image"></i>
                    </a>
                    <a href="{{url('news-detail/news/'.$news->id)}}" title="รายละเอียด">
                      <i class="fas fa-eye"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <p class="card-text">{{$news->post_name_th}}</p>
                </div>
              </div>
            </div>
          @endforeach

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
          @foreach ($post_list['articles'] as $key => $articles) 
            <div class="col-md-4">
              <div class="card card-box mb-3">
                <div class="highlight-hover">
                  <div class="img-16by9 holder " >
                    <img src="{{URL::asset($list[$key])}}" class="img-responsive image-preview" >
                  </div>
                  <div class="show-hover">
                    <a href="{{URL::asset($list[$key])}}" class="me-3" data-lightbox="box_articles"  title="ดูรูปภาพ">
                      <i class="far fa-image"></i>
                    </a>
                    <a href="{{url('news-detail/news/'.$articles->id)}}" title="รายละเอียด">
                      <i class="fas fa-eye"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <p class="card-text">{{$articles->post_name_th}}</p>
                </div>
              </div>
            </div>
          @endforeach
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
                @foreach ($post_list['join'] as $key => $join) 
                  <tr>
                    <td class="text-grey">
                      <span style="font-size:14px;">
                        <i class="far fa-calendar-alt"></i>
                        {{date('d/m/Y', strtotime($join->created_at))}} | {{$join->post_name_th}}
                        <a class="text-link" href="{{url('news-detail/news/'.$join->id)}}">{{__('message.detail')}}</a>
                      </span>
                    </td>
                  </tr>
               @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-lg-12 d-flex justify-content-end ">
            <a href="{{url('news/join')}}" class="btn btn-main btn-sm "><i class="fa fa-arrow-right me-2"></i>{{__('message.more')}}</a>
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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/owlcarousel/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/owlcarousel/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/lightbox2/lightbox.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/fontawesome/css/all.css')}}" rel="stylesheet">  
    <link href="{{asset('vendor/WOW-master/css/libs/animate.css')}}" rel="stylesheet">  
    <link href="{{asset('vendor/WOW-master/css/site.css')}}" rel="stylesheet">  
    <title>Doisuthep</title>
  </head>
  
  <body>
    <div class="header-menu  fixed-top {{ request()->is('/') ? '' : 'header-dark' }}">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <div class="logo-img">
              <img src="{{asset('images/logo-logo1.jpg')}}" alt="">
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
              @if(Request::segment(1) === 'news' || Request::segment(1) === 'news-detail')
                <li class="me-lg-2"><a href="{{url('/#box-news')}}">
                  <i class="fa fa-arrow-left me-2 mt-1"></i> {{__('message.home')}}</a>
                </li>
              @else
                <li class="me-lg-2"><a href="{{url('/#box-news')}}">{{__('message.home')}}</a></li>
                <li class="dropdown me-lg-2">
                  <a href="{{url('/')}}" class="nav-link ">
                    <span>{{__('message.aboutUs')}}</span> <i class="fas fa-chevron-down"></i>
                  </a>
                  <ul>
                    <li><a href="#box-dsnc">{{__('message.aboutDSNC')}}</a></li>
                    <li><a href="#box-vision">{{__('message.vision')}}</a></li>
                    <li><a href="#box-mission">{{__('message.mission')}}</a></li>
                    <li><a href="#box-core_values">{{__('message.core_values')}}</a></li>
                    <li><a href="#box-logo">{{__('message.logo_mascots')}}</a></li>
                  </ul>
                </li>
                <li class="dropdown me-lg-2">
                  <a href="{{url('suthep')}}">
                    <span>{{__('message.doi_suthep')}}</span> <i class="fas fa-chevron-down"></i>
                  </a>
                  <ul>
                    <li><a href="suthep#box-plants">{{__('message.plants')}}</a></li>
                    <li><a href="suthep#box-animals">{{__('message.animals')}}</a></li>
                    <li><a href="suthep#box-fungus">{{__('message.fungus')}}</a></li>
                    <li><a href="suthep#box-geology">{{__('message.geology')}}</a></li>
                    <li><a href="suthep#box-culture">{{__('message.culture')}}</a></li>
                  </ul>
                </li>
                <li class="dropdown me-lg-2">
                  <a href="{{url('/#box-news')}}" class="nav-link">
                    <span>{{__('message.news_menu')}}</span> <i class="fas fa-chevron-down"></i>
                  </a>
                  <ul>
                    <li><a href="{{url('/#box-news')}}">{{__('message.news')}}</a></li>
                    <li><a href="{{url('/#box-articles')}}">{{__('message.articles')}}</a></li>
                    <li><a href="{{url('/#box-souvenirs')}}">{{__('message.souvenirs')}}</a></li>
                    <li><a href="{{url('/#box-vedio')}}">{{__('message.video')}}</a></li>
                    <li><a href="{{url('/#box-join')}}">{{__('message.join')}}</a></li>
                  </ul>
                </li>
                <li class="dropdown me-lg-2">
                  <a href="{{url('services')}}">
                    <span>{{__('message.services')}}</span> <i class="fas fa-chevron-down"></i>
                    </a>
                  <ul>
                    <li><a href="services#box-exhibition">{{__('message.exhibition')}}</a></li>
                    <li><a href="services#box-learning">{{__('message.learning')}}</a></li>
                    <li><a href="services#box-tree">{{__('message.tree')}}</a></li>
                    <li><a href="services#box-seed">{{__('message.seed')}}</a></li>
                    <li><a href="services#box-research">{{__('message.research')}}</a></li>
                    <li><a href="services#box-activities">{{__('message.activities')}}</a></li>
                  </ul>
                </li>
                <li class="dropdown me-lg-2">
                  <a href="{{url('empolyee/administrator')}}" class="nav-link ">
                    <span>{{__('message.team')}}</span> <i class="fas fa-chevron-down"></i>
                    </a>
                  <ul>
                    <li><a href="{{url('empolyee/administrator')}}">{{__('message.administrator')}}</a></li>
                    <li ><a href="{{url('empolyee/staff')}}">{{__('message.staff')}}</a></li>
                  </ul>
                </li>
                <li class="me-lg-2"><a href="#box-contact">{{__('message.contact')}}</a></li>
                <li class="dropdown">
                  <a class="nav-link ">
                    <span>{{ Config::get('languages')[App::getLocale()] }}</span> 
                    <i class="fas fa-chevron-down"></i>
                  </a>
                  <ul>
                    @foreach (Config::get('languages') as $lang => $language)
                      @if ($lang != App::getLocale())
                      <li>
                        <a href="{{route('lang.switch', $lang) }}"> {{$language}}</a>
                      </li>
                      @endif
                    @endforeach
                  </ul>
                </li>
              @endif  

            </ul>
          </div>
        </div>
      </nav>
    </div>
    @yield('content')
      <footer id="footer" class="bg-night-rider text-desciption  font-14">
        <section id="box-contact" class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-6 footer-contact pb-3">
                <h4>{{__('message.contact')}}</h4>
                <p class="mb-2">
                  {{__('message.organization_name')}} <br>
                  {{__('message.organization_adress')}} 
                </p>
                <div class="mb-2">
                  <i class="fa fa-phone-square"></i> {{__('message.organization_tel')}} 
                </div >
                <div class="mb-4">
                  <i class="fa fa-envelope"></i> </i> {{__('message.organization_email')}} 
                </div>
                <a href="https://www.facebook.com/DSNC.SciCMU" target="_blank" class="me-3">
                  <img src="{{URL::asset('images/Facebook_logo.png')}}" width="7%" alt=""> 
                </a> 
                <a href="https://www.instagram.com/dsnc_scicmu" target="_blank" class="me-3">
                  <img src="{{URL::asset('images/IG_logo.png')}}" width="7%" alt="">
                </a>
                <a href="https://twitter.com/DSNC_SciCMU" target="_blank" class=" me-3">
                  <img src="{{URL::asset('images/Twitter_logo.png')}}" width="8%" alt="">
                </a>
                <a href="https://cmu.to/DSNCyoutubechannel"  target="_blank" class="mb-3">
                  <img src="{{URL::asset('images/youtube_logo.png')}}" width="9%" alt="">
                </a>
              </div>
              <div class="col-lg-6 col-md-6 footer-contact">
                <h4>{{__('message.map')}}</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d143851.57676143872!2d100.09871861380977!3d18.657999844630783!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da3a423a146011%3A0x4c0b868e2a065bfd!2sDoi%20Suthep%20Nature%20Center!5e0!3m2!1sth!2sth!4v1630744884304!5m2!1sth!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>
        </section>
        <p class="mb-0 pt-30px text-center">© Doi Suthep Nature Center</p>
      </footer>
    </section>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center active">
      <i class="fas fa-chevron-up"></i> </a>
    <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('js/owl-custom.js')}}"></script>
    <script src="{{asset('vendor/lightbox2/lightbox.min.js')}}"></script>
    <script src="{{asset('vendor/WOW-master/dist/wow.js')}}"></script>
     @yield('footer')

  </body>
</html>
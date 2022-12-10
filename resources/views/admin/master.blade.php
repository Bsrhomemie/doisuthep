<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,  maximum-scale=1">
    <title>Doi Suthep Nature Center</title>
    <meta name="description"
    content="Doi Suthep Nature Center" />
     <meta name="keywords" content="Doi Suthep Nature Center">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet"> -->
    <link href="{{asset('vendor/fontawesome/css/all.css')}}" rel="stylesheet"> 
    <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/summernote/summernote-bs4.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  </head>
  
  <body>
    <div id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
        <div class="toggle-nav">
          <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="admin/content/news" class="logo">CMU <span class="lite">Doisuthep</span></a>
        <ul class="nav pull-right top-menu d-md-none  font-12px">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle  font-12px" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                </li>
            @endguest
          </ul>
        <!--logo end-->

        <div class="top-nav notification-row">
          <ul class="nav pull-right top-menu">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                </li>
            @endguest
          </ul>
        </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_document_alt"></i>
              <span>ประชาสัมพันธ์</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('/admin/content/news')}}">ข่าวประชาสัมพันธ์ </a></li>
              <li><a class="" href="{{url('/admin/content/articles')}}">บทความ</a></li>
              <li><a class="" href="{{url('/admin/product')}}">ของที่ระลึก</a></li>
              <li><a class="" href="{{url('/admin/vedio')}}">วิดีโอ</a></li>
              <li><a class="" href="{{url('/admin/content/join')}}">ร่วมงานกันเรา</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_document_alt"></i>
              <span>ดอยสุเทพ</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="{{url('/admin/content/plants')}}">พืช </a></li>
              <li><a class="" href="{{url('/admin/content/animals')}}">สัตว์</a></li>
              <li><a class="" href="{{url('/admin/content/fungus')}}">จุลินทรีย์และฟังไจ</a></li>
              <li><a class="" href="{{url('/admin/content/geology')}}">ธรณี</a></li>
              <li><a class="" href="{{url('/admin/content/culture')}}">ศิลปวัฒนธรรม</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_document_alt"></i>
              <span>การให้บริการ</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a href="{{url('/admin/content/exhibition')}}">นิทรรศการดอยสุเทพ</a></li>
              <li><a href="{{url('/admin/content/learning')}}">กิจกรรมเรียนรู้ธรรมชาติ</a></li>
              <li><a href="{{url('/admin/content/tree')}}">เรือนเพาะชำกล้าไม้ท้องถิ่น</a></li>
              <li><a href="{{url('/admin/content/seed')}}">ห้องปฏิบัติการธนาคารเมล็ด</a></li>
              <li><a href="{{url('/admin/content/research')}}">งานวิจัยและฐานข้อมูล</a></li>
              <li><a href="{{url('/admin/content/activities')}}">พื้นที่จัดกิจกรรม</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
      @yield('content')
 
    </div>
    <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- <script src="{{asset('vendor/summernote/summernote-bs4.min.js')}}"></script> -->
    <!-- <script src="{{asset('js/summernote-custom.js')}}"></script> -->
    <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}" ></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
      $(document).ready(function () {
        function readImage (fileInput, onSuccess) {
          if (!fileInput.files || !fileInput.files[0]) return false;
          var imgPath = $(fileInput)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof (FileReader) != "undefined") {
              var reader = new FileReader();
              reader.onload = function (e) {
                // get loaded data and render thumbnail.
                if (typeof (onSuccess) === 'function') onSuccess(e);
              };
              // read the image file as a data URL.
              reader.readAsDataURL(fileInput.files[0]);
              return 'success';
            } else {
              return 'not support';
            }
          } else {
            return 'invalid type';
          }
        }
        $(document).off('touchstart click', '.image-upload .btn-change-image');
          $(document).on('touchstart click', '.image-upload .btn-change-image', function(e) {
            var $container = $(this).parents('.image-upload');
            var $file_select = $container.find('.img-upload-file');
            $file_select.trigger('click');
          });

          $(document).off('change', '.image-upload .img-upload-file');
          $(document).on('change', '.image-upload .img-upload-file', function(e) {
            var $container = $(this).parents('.image-upload');
            var $btn_remove = $container.find('.btn-remove-image');
            var $img = $container.find('.image-preview');
            var $btn_change_image = $container.find('.btn-change-image');

             var status = readImage(this, function(file_event) {
              $img.attr('src', file_event.target.result);
              $btn_remove.removeClass('d-none');
              $btn_change_image.addClass('has-image');
            });

            if (status != 'success') {
              $img.attr('src', '');
              $btn_remove.addClass('d-none');
              $btn_change_image.removeClass('has-image');
            }
          })
      });
    </script>
     @yield('footer')

  </body>
</html>
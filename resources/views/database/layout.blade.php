<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  
  <body>
    <div class="header-menu  fixed-top ">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <div class="logo-img">
              <img src="asset/images/logo-logo1.jpg" alt="">
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#box-publicize" id="publicize" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ประชาสัมพันธ์
                </a>
                <ul class="dropdown-menu" aria-labelledby="publicize">
                  <li><a class="dropdown-item" href="#box-publicize">ข่าวประชาสัมพันธ์</a></li>
                  <li><a class="dropdown-item" href="#box-context">บทความ</a></li>
                  <li><a class="dropdown-item" href="#box-product">ของที่ระลึก</a></li>
                  <li><a class="dropdown-item" href="#box-vedio">วิดีโอ</a></li>
                  <li><a class="dropdown-item" href="#box-work">ร่วมงานกันเรา</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ดอยสุเทพ
                </a>
                <ul class="dropdown-menu" aria-labelledby="type">
                  <li><a class="dropdown-item" href="#">พืช</a></li>
                  <li><a class="dropdown-item" href="#">สัตว์</a></li>
                  <li><a class="dropdown-item" href="#">จุลินทรีย์และฟังไจ</a></li>
                  <li><a class="dropdown-item" href="#">ธรณี</a></li>
                  <li><a class="dropdown-item" href="#">ศิลปวัฒนธรรม</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  เกี่ยวกับเรา 
                </a>
                <ul class="dropdown-menu" aria-labelledby="type">
                  <li><a class="dropdown-item" href="#">รู้จักกับ DSNC</a></li>
                  <li><a class="dropdown-item" href="#">วิสัยทัศน์ พันธกิจ ค่านิยม</a></li>
                  <li><a class="dropdown-item" href="#">วิสัยทัศน์ พันธกิจ ค่านิยม</a></li>
                  <li><a class="dropdown-item" href="#">สัญลักษณ์</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  การให้บริการ 
                </a>
                <ul class="dropdown-menu" aria-labelledby="type">
                  <li><a class="dropdown-item" href="#">งานส่งเสริมการเรียนรู้</a></li>
                  <li><a class="dropdown-item" href="#">งานกิจกรรมโครงการ</a></li>
                  <li><a class="dropdown-item" href="#">งานบริการออนไลน์</a></li>
                  <li><a class="dropdown-item" href="#">สถานที่และห้องประชุม</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                บุคลากร 
                </a>
                <ul class="dropdown-menu" aria-labelledby="type">
                  <li><a class="dropdown-item" href="#">ผู้บริหาร</a></li>
                  <li><a class="dropdown-item" href="#">บุคลากร</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="container">
      @yield('content')
    </div>

    <script src="{{asset('vendor/js/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>
</html>
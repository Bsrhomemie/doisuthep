<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/owlcarousel/css/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/owlcarousel/css/owl.theme.default.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/lightbox2/lightbox.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/fontawesome/css/all.css')); ?>" rel="stylesheet"> 
    <title>Hello, world!</title>
  </head>
  
  <body>
    <div class="header-menu  fixed-top <?php echo e(request()->is('/') ? '' : 'header-dark'); ?>">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <div class="logo-img">
              <img src="<?php echo e(asset('images/logo-logo1.jpg')); ?>" alt="">
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="#box-publicize" id="publicize" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ประชาสัมพันธ์
                </a>
                <ul class="dropdown-menu" aria-labelledby="publicize">
                  <li><a class="dropdown-item " href="<?php echo e(route('home')); ?>#box-publicize">ข่าวประชาสัมพันธ์</a></li>
                  <li><a class="dropdown-item" href="#box-context">บทความ</a></li>
                  <li><a class="dropdown-item" href="#box-product">ของที่ระลึก</a></li>
                  <li><a class="dropdown-item" href="#box-vedio">วิดีโอ</a></li>
                  <li><a class="dropdown-item" href="#box-work">ร่วมงานกันเรา</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php echo e(request()->is('suthep*') ? 'active' : ''); ?>" href="#" id="type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ดอยสุเทพ
                </a>
                <ul class="dropdown-menu" aria-labelledby="type">
                  <li><a class="dropdown-item" href="<?php echo e(route('suthep')); ?>">พืช</a></li>
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
                <a class="nav-link dropdown-toggle <?php echo e(request()->is('knowledge*') ? 'active' : ''); ?>" href="#" id="type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  การให้บริการ 
                </a>
                <ul class="dropdown-menu" aria-labelledby="type">
                  <li><a class="dropdown-item" href="<?php echo e(route('knowledge')); ?>">งานส่งเสริมการเรียนรู้</a></li>
                  <li><a class="dropdown-item" href="#">งานกิจกรรมโครงการ</a></li>
                  <li><a class="dropdown-item" href="#">งานบริการออนไลน์</a></li>
                  <li><a class="dropdown-item" href="#">สถานที่และห้องประชุม</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php echo e(request()->is('staff*') ? 'active' : ''); ?>" href="#" id="type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                บุคลากร 
                </a>
                <ul class="dropdown-menu" aria-labelledby="type">
                  <li><a class="dropdown-item" href="<?php echo e(route('staff')); ?>">ผู้บริหาร</a></li>
                  <li><a class="dropdown-item" href="#">บุคลากร</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
    <footer id="footer" class="bg-night-rider text-desciption   font-14">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 footer-contact">
              <h4>ติดต่อเรา</h4>
              <p class="mb-2">
                อุทยานวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยเชียงใหม่ (CMU STeP) <br>
                ชั้น 2 (อาคาร A) อาคารอำนวยการอุทยานวิทยาศาสตร์ภาคเหนือ (จังหวัดเชียงใหม่) <br>
                155 หมู่ 2 ต.แม่เหียะ อ.เมือง จ.เชียงใหม่ 50100 
              </p>
              <div class="mb-2">
                <i class="fa fa-phone-square"></i> โทรศัพท์ : 0 5394 8678 
              </div >
              <div class="mb-2">
                <i class="fa fa-print"></i> โทรสาร : 0 5394 8679 
              </div>
              <div class="mb-4">
                <i class="fa fa-envelope"></i> อีเมล : info@step.cmu.ac.th
              </div>
              <a href="https://www.facebook.com/cmustep/" target="_blank" class="facebook">
                <img src="<?php echo e(URL::asset('images/Facebook_logo.png')); ?>" width="7%" alt=""> CMU STeP
              </a> 
              <a href="https://www.youtube.com/channel/UCoGMGF7Rqfnl5ysNbt3jCYw?view_as=subscriber" target="_blank" class="youtube px-3">
                <img src="<?php echo e(URL::asset('images/youtube_logo.png')); ?>" width="8%" alt=""> CMU STeP Channel
              </a>
              <a href="https://lin.ee/iDny26a"  target="_blank" class="line ">
                <img src="<?php echo e(URL::asset('images/line_logo.png')); ?>" width="6%" alt=""> @cmustep
              </a>
            </div>
            <div class="col-lg-6 col-md-6 footer-contact">
              <h4>แผนที่</h4>
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3777.7538819829083!2d98.9348371!3d18.7645274!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da30b994caf679%3A0x276bc591019cfd74!2z4Lit4Li44LiX4Lii4Liy4LiZ4Lin4Li04LiX4Lii4Liy4Lio4Liy4Liq4LiV4Lij4LmM4Lig4Liy4LiE4LmA4Lir4LiZ4Li34Lit!5e0!3m2!1sth!2sth!4v1603945845151!5m2!1sth!2sth" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div>
      </div>
      <p class="mb-0 pt-30px text-center">© Copyright CMU STeP . All Rights Reserved</p>
    </footer>
    <script src="<?php echo e(asset('js/jquery-3.6.0.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/lightbox2/lightbox.min.js')); ?>"></script>

     <?php echo $__env->yieldContent('footer'); ?>

  </body>
</html><?php /**PATH C:\xampp\htdocs\laravel\example-app\resources\views/master.blade.php ENDPATH**/ ?>
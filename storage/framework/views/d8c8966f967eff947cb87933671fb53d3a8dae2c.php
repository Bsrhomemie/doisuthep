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
    <title>Doisuthep</title>
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
              <?php if(Request::segment(1) === 'news'): ?>
                <li class="me-lg-2"><a href="<?php echo e(url('/#box-news')); ?>">
                  <i class="fa fa-arrow-left me-2 mt-1"></i> <?php echo e(__('message.home')); ?></a>
                </li>
              <?php else: ?>
                <li class="me-lg-2"><a href="<?php echo e(url('/#box-news')); ?>"><?php echo e(__('message.home')); ?></a></li>
                <li class="dropdown me-lg-2">
                  <a href="<?php echo e(url('/')); ?>" class="nav-link ">
                    <span><?php echo e(__('message.aboutUs')); ?></span> <i class="fas fa-chevron-down"></i>
                  </a>
                  <ul>
                    <li><a href="#box-dsnc"><?php echo e(__('message.aboutDSNC')); ?></a></li>
                    <li><a href="#box-vision"><?php echo e(__('message.vision')); ?></a></li>
                    <li><a href="#box-mission"><?php echo e(__('message.mission')); ?></a></li>
                    <li><a href="#box-core_values"><?php echo e(__('message.core_values')); ?></a></li>
                    <li><a href="#box-logo"><?php echo e(__('message.logo_mascots')); ?></a></li>
                  </ul>
                </li>
                <li class="dropdown me-lg-2">
                  <a href="<?php echo e(url('suthep')); ?>">
                    <span><?php echo e(__('message.doi_suthep')); ?></span> <i class="fas fa-chevron-down"></i>
                  </a>
                  <ul>
                    <li><a href="suthep#box-plants"><?php echo e(__('message.plants')); ?></a></li>
                    <li><a href="suthep#box-animals"><?php echo e(__('message.animals')); ?></a></li>
                    <li><a href="suthep#box-fungus"><?php echo e(__('message.fungus')); ?></a></li>
                    <li><a href="suthep#box-geology"><?php echo e(__('message.geology')); ?></a></li>
                    <li><a href="suthep#box-culture"><?php echo e(__('message.culture')); ?></a></li>
                  </ul>
                </li>
                <li class="dropdown me-lg-2">
                  <a href="<?php echo e(url('/#box-news')); ?>" class="nav-link">
                    <span><?php echo e(__('message.news_menu')); ?></span> <i class="fas fa-chevron-down"></i>
                  </a>
                  <ul>
                    <li><a href="<?php echo e(url('/#box-news')); ?>"><?php echo e(__('message.news')); ?></a></li>
                    <li><a href="<?php echo e(url('/#box-articles')); ?>"><?php echo e(__('message.articles')); ?></a></li>
                    <li><a href="<?php echo e(url('/#box-souvenirs')); ?>"><?php echo e(__('message.souvenirs')); ?></a></li>
                    <li><a href="<?php echo e(url('/#box-vedio')); ?>"><?php echo e(__('message.video')); ?></a></li>
                    <li><a href="<?php echo e(url('/#box-join')); ?>"><?php echo e(__('message.join')); ?></a></li>
                  </ul>
                </li>
                <li class="dropdown me-lg-2">
                  <a href="<?php echo e(url('services')); ?>">
                    <span><?php echo e(__('message.services')); ?></span> <i class="fas fa-chevron-down"></i>
                    </a>
                  <ul>
                    <li><a href="services#box-exhibition"><?php echo e(__('message.exhibition')); ?></a></li>
                    <li><a href="services#box-learning"><?php echo e(__('message.learning')); ?></a></li>
                    <li><a href="services#box-tree"><?php echo e(__('message.tree')); ?></a></li>
                    <li><a href="services#box-seed"><?php echo e(__('message.seed')); ?></a></li>
                    <li><a href="services#box-research"><?php echo e(__('message.research')); ?></a></li>
                    <li><a href="services#box-activities"><?php echo e(__('message.activities')); ?></a></li>
                  </ul>
                </li>
                <li class="dropdown me-lg-2">
                  <a href="<?php echo e(url('empolyee/administrator')); ?>" class="nav-link ">
                    <span><?php echo e(__('message.team')); ?></span> <i class="fas fa-chevron-down"></i>
                    </a>
                  <ul>
                    <li><a href="<?php echo e(url('empolyee/administrator')); ?>"><?php echo e(__('message.administrator')); ?></a></li>
                    <li ><a href="<?php echo e(url('empolyee/staff')); ?>"><?php echo e(__('message.staff')); ?></a></li>
                  </ul>
                </li>
                <li class="me-lg-2"><a href="#box-contact"><?php echo e(__('message.contact')); ?></a></li>
                <li class="dropdown">
                  <a class="nav-link ">
                    <span><?php echo e(Config::get('languages')[App::getLocale()]); ?></span> 
                    <i class="fas fa-chevron-down"></i>
                  </a>
                  <ul>
                    <?php $__currentLoopData = Config::get('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($lang != App::getLocale()): ?>
                      <li>
                        <a href="<?php echo e(route('lang.switch', $lang)); ?>"> <?php echo e($language); ?></a>
                      </li>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </li>
              <?php endif; ?>  

            </ul>
          </div>
        </div>
      </nav>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
      <footer id="footer" class="bg-night-rider text-desciption  font-14">
        <section id="box-contact" class="footer-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-6 footer-contact pb-3">
                <h4><?php echo e(__('message.contact')); ?></h4>
                <p class="mb-2">
                  <?php echo e(__('message.organization_name')); ?> <br>
                  <?php echo e(__('message.organization_adress')); ?> 
                </p>
                <div class="mb-2">
                  <i class="fa fa-phone-square"></i> <?php echo e(__('message.organization_tel')); ?> 
                </div >
                <div class="mb-4">
                  <i class="fa fa-envelope"></i> </i> <?php echo e(__('message.organization_email')); ?> 
                </div>
                <a href="https://www.facebook.com/DSNC.SciCMU" target="_blank" class="me-3">
                  <img src="<?php echo e(URL::asset('images/Facebook_logo.png')); ?>" width="7%" alt=""> 
                </a> 
                <a href="https://www.instagram.com/dsnc_scicmu" target="_blank" class="me-3">
                  <img src="<?php echo e(URL::asset('images/IG_logo.png')); ?>" width="7%" alt="">
                </a>
                <a href="https://twitter.com/DSNC_SciCMU" target="_blank" class=" me-3">
                  <img src="<?php echo e(URL::asset('images/Twitter_logo.png')); ?>" width="8%" alt="">
                </a>
                <a href="https://cmu.to/DSNCyoutubechannel"  target="_blank" class="mb-3">
                  <img src="<?php echo e(URL::asset('images/youtube_logo.png')); ?>" width="9%" alt="">
                </a>
              </div>
              <div class="col-lg-6 col-md-6 footer-contact">
                <h4><?php echo e(__('message.map')); ?></h4>
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
    <script src="<?php echo e(asset('js/jquery-3.6.0.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/lightbox2/lightbox.min.js')); ?>"></script>

     <?php echo $__env->yieldContent('footer'); ?>

  </body>
</html><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/master.blade.php ENDPATH**/ ?>
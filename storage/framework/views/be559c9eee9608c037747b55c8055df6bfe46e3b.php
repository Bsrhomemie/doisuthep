

<?php $__env->startSection('content'); ?>
  <div class="container pt-30px mb-5">
    <section id="box-plants" class="wow fadeInDown" >
      <div class="header-selected pt-20px">
        <h3><?php echo e(__('message.services')); ?></h3>
      </div>
      <div class="row">
        <div class="col-12">
      
        </div>
      </div>
    </section>
    <?php $__currentLoopData = $data_topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <section id="<?php echo e($topic_name[$key]); ?>" class="wow fadeInDown " >
      <div class="header-selected ">
        <p><i class="fa fa-bullhorn"></i><?php echo e(__('message.'.$topic["topic"])); ?> </p>
      </div>
      <div class="row">
        <div class="col-12">
          <p class="mb-3"><?php echo $topic['detail']; ?></p>
        </div>
        <div class="col-md-4">
          <div class="card card-box mb-3">
            <div class="highlight-hover">
              <div class="img-16by9 holder ">
                <img src="<?php echo e(URL::asset('images/cover3.jpg')); ?>" class="img-responsive image-preview" alt="...">
              </div>
              <div class="show-hover">
                <a href="<?php echo e(URL::asset('images/cover3.jpg')); ?>" class="me-3" data-lightbox="context"  title="ดูรูปภาพ">
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
        <div class="col-md-4">
          <div class="card card-box mb-3">
            <div class="highlight-hover">
              <div class="img-16by9 holder " style="background-image:url();">
                <img src="<?php echo e(URL::asset('images/image-5.jpg')); ?>" class="img-responsive image-preview" alt="...">
              </div>
              <div class="show-hover">
                <a href="<?php echo e(URL::asset('images/image-5.jpg')); ?>" class="me-3" data-lightbox="context"  title="ดูรูปภาพ">
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
        <div class="col-md-4">
          <div class="card card-box mb-3">
            <div class="highlight-hover">
              <div class="img-16by9 holder">
                <img src="<?php echo e(URL::asset('images/image-5.jpg')); ?>" class="img-responsive image-preview" alt="...">
              </div>
              <div class="show-hover">
                <a href="<?php echo e(URL::asset('images/image-5.jpg')); ?>" class="me-3" data-lightbox="context"  title="ดูรูปภาพ">
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
        <div class="col-lg-12 d-flex justify-content-end">
          <a href="news.php" class="btn btn-main btn-sm "><i class="fa fa-arrow-right me-2"></i><?php echo e(__('message.more')); ?></a>
        </div>
      </div>
    </section> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/services.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

  <div class="container pt-30px pb-5">
    
    <section id="box-publicize">
      <div class="header-selected pt-0">
        <h3>
          คณะผู้บริหาร <br>
          <p class="text-secondary  mb-0 text-normal">Excutive</p>
        </h3>
      </div>
      <!-- <div class="likeShareBtnmt-3">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="ccaa4s"></script>
        <div class="fb-share-button" 
        data-href="http://step.cmu.ac.th/news_specific.php?news_id=384" 
        data-layout="button">
        </div>
      </div> -->
      <div class="row ">
        <?php for($i = 0; $i < 7; $i++): ?>
          <div class="col-md-4  mt-4 wow fadeInUp">
            <div class="card card-box  h-100 ">
              <div class="about-col">
                <div class="img-4by3-v  holder">
                  <img src="<?php echo e(URL::asset('images/cover3.jpg')); ?>" class="img-responsive image-preview" alt="...">
                </div>
                <div class="icon"><i class="fas fa-user"></i></div>
              </div>
              <div class="card-body pt-40px text-center">
                <h4 class="title font-SemiBold">นายณัฐภูมิ เทพหินลัพ</h4>
                <p class="card-text font-Medium mb-0">พนักงานบริหารจัดการห้องปฏิบัติการนวัตกรรม</p>
                <p class="card-text text-14px">อีเมล nutthapoom@step.cmu.ac.th</p>
              </div>
            </div>
          </div>
        <?php endfor; ?> 
      </div >
    </section>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\example-app\resources\views/staff.blade.php ENDPATH**/ ?>
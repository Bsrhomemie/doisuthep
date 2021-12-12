

<?php $__env->startSection('content'); ?>
<div id="main-content">
  <div class="wrapper">
    <div class="col-12">
      <a href="<?php echo e(url('/admin/content?type=publicize')); ?>" class="btn btn-dark text-white font-12px p-1"> 
        <i class="fas fa-arrow-circle-left me-2"></i>Back
      </a>
      <div class="card">
        <div class="card-body ">
          <div class="col-12 px-3">
            <h2>เพิ่มร่วมงานกันเรา</h2>
            <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                <strong>Whoops!</strong>
                There  were sone
                <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($errors); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-12 px-3">
            <form action="<?php echo e(route('content.store')); ?>" method="post">
              <?php echo csrf_field(); ?>
                <div class="row">
                  
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>หัวข้อภาษาไทย</label>
                      <input type="text" name="title_th" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>รายละเอียดภาษาไทย</label>
                      <textarea name="description_th" class="summer-note summernote" > </textarea>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>หัวข้อภาษาอังกฤษ</label>
                      <input type="text" name="title_en" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>รายละเอียดภาษาอังกฤษ</label>
                      <textarea name="description_en" class="summer-note summernote" > </textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>ไฟล์</label>
                      <input type="file" name="file" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end pt-3">
                <button type="reset" class="btn btn-secondary  me-3 w-150px py-2">Reset</button>
                <button type="submit" class="btn btn-success  w-150px py-2">Submit</button>
              </div>
            </from>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  <script>
    $(document).ready(function () {
      $('.summernote').summernote({
        height: 250,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['para', ['ul', 'ol',]],
        ]
      });
    });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/work/create.blade.php ENDPATH**/ ?>
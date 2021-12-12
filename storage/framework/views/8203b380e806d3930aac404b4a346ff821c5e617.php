

<?php $__env->startSection('content'); ?>
<div id="main-content">
  <div class="wrapper">
    <div class="col-12">
      <a href="<?php echo e(url('/admin/content?type='.$type)); ?>" class="btn btn-dark text-white font-12px p-1"> 
        <i class="fas fa-arrow-circle-left me-2"></i>Back
      </a>
      <div class="card">
        <div class="card-body ">
          <div class="col-12 px-3">
            <h2><?php echo e($type_text); ?></h2>
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
            <form action="<?php echo e(route('addmin.content')); ?>" method="get">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>รูปภาพ</label>
                    <div class="image-upload files">
                      <div class="img-16by9 holder btn-change-image highlight-hover" >
                        <img src="" class="img-responsive image-preview">
                        <div class="icon-box">
                          <div class="icon-box-text">
                          </div>
                        </div>
                      </div>
                      <input type="file" name="profile_image" class="form-control hidden img-upload-file" data-files="true" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group mt-2">
                    <label>วันที่ลงประกาศ </label>
                    <input type="date" name="date" class="form-control">
                  </div>
                  <?php if($type == 'learning'): ?>
                  <div class="form-group mt-2">
                    <label>หมวดหมู่ </label>
                    <select name="type" class="form-control">
                      <option value="">นิทรรศการ (Exhibition)</option>
                      <option value="">นิทรรศการธรรมชาติบันดาลใจ (Mother Nature)</option>
                    </select>
                  </div>
                  <?php endif; ?>

                  <?php if($type == 'project'): ?>
                  <div class="form-group mt-2">
                    <label>หมวดหมู่ </label>
                    <select name="type" class="form-control" >
                      <option value="">ท่องเที่ยวพรรณไม้งาม มช.</option>
                      <option value=""> เรือนเพาะชำกล้าไม้ท้องถิ่น (Native Tree Species Nursery)</option>
                    </select>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group ">
                        <label>หัวข้อภาษาไทย</label>
                        <input type="text" name="title_th" value="<?php echo e($data['title_th']); ?>" class="form-control">
                      </div>
                      <div class="form-group mt-2">
                        <label>รายละเอียดภาษาไทย</label>
                        <textarea name="description_th" class="summer-note summernote" > </textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>หัวข้อภาษาอังกฤษ</label>
                        <input type="text" name="title_en" class="form-control">
                      </div>
                      <div class="form-group mt-2">
                        <label>รายละเอียดภาษาอังกฤษ</label>
                        <textarea name="description_en" class="summer-note summernote" > </textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end">
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


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/content/edit.blade.php ENDPATH**/ ?>
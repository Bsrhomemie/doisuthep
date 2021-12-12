

<?php $__env->startSection('content'); ?>
  <div id="main-content">
    <div class="wrapper">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-12">
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="p-2 ">
                  <h2>วิดีโอ</h2>
                </div>
              </div>
              <form action="">
                <div class="row">
                  <?php for($i = 0; $i < 4; $i++): ?>
                  <div class="col-md-6 form-group">
                    <label>วิดีโอ <?php echo e(($i+1)); ?></label>
                    <input type="text" name="vedio<?php echo e(($i+1)); ?>" class="form-control">
                  </div>  
                  <?php endfor; ?>    
                </div>
                <div class="col-12 d-flex justify-content-end pt-3">
                  <button type="reset" class="btn btn-secondary  me-3 w-150px py-2">Reset</button>
                  <button type="submit" class="btn btn-success  w-150px py-2">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
  


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/admin/vedio.blade.php ENDPATH**/ ?>
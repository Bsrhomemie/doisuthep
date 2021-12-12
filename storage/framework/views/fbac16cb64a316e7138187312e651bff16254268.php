;

<?php $__env->startSection('content'); ?>
  <div class="row">
    <h2>Show Post </h2>
    <a href="<?php echo e(route('content.index')); ?>" class="btn btn-dark w-25 my-3">Back</a>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-title">
            <strong>Title:</strong>
            <?php echo e($content->title); ?>

          </div>
          <div class="card-title">
            <strong>Description:</strong>
            <?php echo e($content->description); ?>

          </div>
        </div>

      </div>

    </div>

   
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('content.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/content/show.blade.php ENDPATH**/ ?>
;

<?php $__env->startSection('content'); ?>
  <div class="row">
    <h2>Edit new </h2>
    <a href="<?php echo e(route('content.index')); ?>" class="btn btn-dark w-25 my-3">Back</a>
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

    <form action="<?php echo e(route('content.update', $content->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>;

        <div class="row">
          <div class="col-12 form-group">
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo e($content->title); ?>" class="form-control">
          </div>
          <div class="col-12 form-group">
            <label>Description:</label>
            <textarea class="form-control" name="description"><?php echo e($content->description); ?></textarea>
          </div>  
          <div class="col-12 ">
            <button type="submit" class="btn btn-success my-3">Update</button>
          </div>
        </div>
    </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('content.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\example-app\resources\views/content/edit.blade.php ENDPATH**/ ?>
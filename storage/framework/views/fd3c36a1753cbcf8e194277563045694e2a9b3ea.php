;

<?php $__env->startSection('content'); ?>
  <div class="row">
    <h2>Laravel 8 </h2>
    <a href="<?php echo e(route('content.create')); ?>" class="btn w-50 btn-primary my-3">Create New</a>
    <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <?php echo e($message); ?>

      </div>
    <?php endif; ?>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th class="thin-cell">id</th>
          <th>Title</th>
          <th>Description</th>
          <th class="thin-cell"></th>
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e(++$i); ?></td>
          <td><?php echo e($value->id); ?></td>
          <td><?php echo e($value->title); ?></td>
          <td><?php echo e(Str::limit($value->description, 100)); ?></td>
          <td>
           
              <a href="<?php echo e(route('content.show', $value->id)); ?>" class="btn btn-light">
                show
              </a>
              <a href="<?php echo e(route('content.edit', $value->id)); ?>" class="btn btn-warning">
                edit
              </a>
             

            <form action="<?php echo e(route('content.destroy', $value->id)); ?>" method="post">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-danger"> Delete </button>
            </form> 
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <?php echo $data->links(); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('content.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\example-app\resources\views/content/index.blade.php ENDPATH**/ ?>
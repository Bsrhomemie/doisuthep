

<?php $__env->startSection('content'); ?>
  <!--main content start-->
  <div id="main-content">
    <div class="wrapper">
      
      <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
          <h2>Laravel AJAX Example</h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
          <button class="btn btn-success" id="btn-add" data-toggle="modal" data-target="#formModal">
            Add Todo
          </button>
        </div>
      </div>
      <div>
      <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="">
        </div>
        <div class="form-group">
          <label>Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="">
        </div>
        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
      </form>
      </div>
      <table class="table table-inverse">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody id="todos-list" name="todos-list">
            <?php $__currentLoopData = $todo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="todo<?php echo e($data['id']); ?>">
                <td><?php echo e($data['id']); ?></td>
                <td><?php echo e($data['title']); ?></td>
                <td><?php echo e($data['description']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>
  


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/admin/publicize.blade.php ENDPATH**/ ?>
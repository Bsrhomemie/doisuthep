

<?php $__env->startSection('content'); ?>
  <div id="main-content">
    <div class="wrapper">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-12">
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="p-2 ">
                  <h2>ร่วมงานกันเรา</h2>
                </div>
                <div>
                  <a href="<?php echo e(route('work.create','type='.$type)); ?>" class="btn btn-success px-3  py-2" id="btn-add" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus-circle me-2"></i>  เพิ่มข้อมูล 
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="w-250px">Title TH</th>
                    <th class="w-250px">Description TH</th>
                    <th class="w-250px">Title EN</th>
                    <th class="w-250px">Description EN</th>
                    <th class="thin-cell w-150px"></th>
                  </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    <?php $__currentLoopData = $todo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="todo<?php echo e($data['id']); ?>">
                      <td><?php echo e(Str::limit($data['title_th'], 200)); ?></td>
                      <td><?php echo e(Str::limit($data['description_th'], 200)); ?></td>
                      <td><?php echo e(Str::limit($data['title_en'], 200)); ?></td>
                      <td><?php echo e(Str::limit($data['description_en'], 200)); ?></td>
                      <td class="w-150px">
                        <div class="d-flex justify-content-center">
                          <a href="" class="btn btn-dark me-2">
                            <i class="fas fa-file-alt"></i>
                          </a>
                          <a href="" class="btn btn-warning me-2">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <form action="" method="post">
                            <!-- <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?> -->
                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt font-18px"></i> </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/admin/work.blade.php ENDPATH**/ ?>
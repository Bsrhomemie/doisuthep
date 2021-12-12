

<?php $__env->startSection('content'); ?>
  <div id="main-content">
    <div class="wrapper">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-12">
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="p-2 ">
                  <h2>ของที่ระลึก</h2>
                </div>
                <div>
                  <a href="<?php echo e(route('product.create','type='.$type)); ?>" class="btn btn-success px-3 py-2" id="btn-add" data-toggle="modal" data-target="#formModal">
                  <i class="fas fa-plus-circle me-2"></i>  เพิ่มข้อมูล 
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th nowrup class="w-100px">รูปภาพ</th>
                    <th >ชื่อ</th>
                    <th class="w-250px">ราคา</th>
                    <th class="w-250px ">สถานะ</th>
                    <td class="w-100px"></td>
                  </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    <?php $__currentLoopData = $todo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="todo<?php echo e($data['id']); ?>">
                        <td>
                          <div class="img-1by1 holder " >
                            <img src="<?php echo e(URL::asset('/images/image-5.jpg')); ?>" class="img-responsive image-preview" >
                          </div>
                        </td>
                        <td><?php echo e(Str::limit($data['name'], 200)); ?></td>
                        <td><?php echo e(number_format($data['price'],2)); ?></td>
                        <td><?php echo e(($data['status'] == 0) ? 'ปิดขาย' : 'เปิดขาย'); ?></td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="" class="btn btn-warning me-2">
                              <i class="far fa-edit font-18px"></i>
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
  


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/admin/product.blade.php ENDPATH**/ ?>
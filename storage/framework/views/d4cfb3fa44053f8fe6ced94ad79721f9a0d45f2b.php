<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    <title>Doisuthep</title>
  </head>
  
  <body class="bg-color-green">
    <div class="container">
      <div class="col-12 d-flex justify-content-center p-20per">
        <div class="col-md-8 col-lg-5">
          <form >
            <div class="card">
              <div class="card-body">
                <h2>เข้าสู่ระบบ</h2>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="mt-3">
                  <a  href="<?php echo e(url('/admin/content?type=publicize')); ?>" class="btn btn-main w-100">เข้าสู่ระบบ</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="<?php echo e(asset('js/jquery-3.6.0.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  </body>
</html><?php /**PATH C:\xampp\htdocs\doisuthep\resources\views/admin/index.blade.php ENDPATH**/ ?>
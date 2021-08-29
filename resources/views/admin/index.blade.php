<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css') }}" rel="stylesheet">
    <title>Doisuthep</title>
  </head>
  
  <body class="bg-color-green">
    <div class="container">
      <div class="col-12 d-flex justify-content-center p-5">
        <div class="col-5">
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
                <button class="btn btn-main w-100">เข้าสู่ระบบ</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>
@extends('admin.master')

@section('content')
<div id="main-content">
  <div class="wrapper">
    <div class="col-12">
      <a href="{{url('/admin/product')}}" class="btn btn-dark text-white font-12px p-1 "> 
        <i class="fas fa-arrow-circle-left me-2"></i>Back
      </a>
      <div class="card">
        <div class="card-body ">
          <div class="col-12 px-3">
            <h2>ของที่ระลึก</h2>
            @if($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong>
                There  were sone
                <ul>
                  @foreach($errors->all() as $errors)
                    <li>{{$errors}}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          </div>
          <div class="col-12 px-3">
            <form action="{{url('/product/add')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3">
                  <div class="form-group">
                    <label>รูปภาพ</label>
                    <div class="image-upload files">
                      <div class="img-1by1 holder btn-change-image highlight-hover" >
                        <img src="" class="img-responsive image-preview">
                        <div class="icon-box">
                          <div class="icon-box-text">
                          </div>
                        </div>
                      </div>
                      <input type="file" name="picture" class="form-control hidden img-upload-file" data-files="true" accept="image/*">
                    </div>
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>ชื่อภาษาไทย</label>
                        <input type="text" name="name_th" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>ชื่อภาษาอังกฤษ</label>
                        <input type="text" name="name_en" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>ราคาขาย</label>
                        <input type="number" step="any" name="price" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>สถานะ</label>
                        <select name="status" class="form-control">
                          <option value="1">เปิดการขาย</option>
                          <option value="0">ปิดการขาย</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end flex-wrap">
                <button type="reset" class="btn btn-secondary  me-3 w-150px  py-2">Reset</button>
                <button type="submit" class="btn btn-success  w-150px  py-2">Submit</button>
              </div>
            </from>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



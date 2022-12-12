@extends('admin.master')

@section('content')
<div id="main-content">
  <div class="wrapper">
    <div class="col-12">
      <a href="{{url('/admin/database/'.$type)}}" class="btn btn-dark text-white font-12px p-1">
        <i class="fas fa-arrow-circle-left me-2"></i>Back
      </a>
      <div class="card">
        <div class="card-body ">
          <div class="col-12 px-3">
            <h2>{{$type_text}}</h2>
            @if($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong>
              There were sone
              <ul>
                @foreach($errors->all() as $errors)
                <li>{{$errors}}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="col-12 px-3">
            <form action="{{url('/database/add')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>รูปภาพ</label>
                    @for($i = 1; $i <= 5; $i++) 
                    <div class="image-upload files mb-3">
                      <div class="img-16by9 holder btn-change-image highlight-hover">
                        <img src="" class="img-responsive image-preview">
                        <div class="icon-box">
                          <div class="icon-box-text">
                          </div>
                        </div>
                      </div>
                      <input type="file" name="picture_{{$i}}" class="form-control hidden img-upload-file" data-files="true" accept="image/*">
                    </div>
                  @endfor
                </div>
                <div class="form-group mt-2 mb-3">
                  <label>วันที่ลงประกาศ </label>
                  <input type="date" name="created_at" value="{{date('Y-m-d')}}" class="form-control">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-lg-12">
                    <h4 class="mb-0">หัวข้อ</h4>
                    <hr class="my-2">
                    <div class="form-group mb-2">
                      <label>ชื่อ ภาษาไทย</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อสามัญ ภาษาไทย</label>
                      <input type="text" name="common_name" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อสามัญ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อท้องถิ่น ภาษาไทย</label>
                      <input type="text" name="local_name" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อท้องถิ่น ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อวิทยาศาสตร์ ภาษาไทย</label>
                      <input type="text" name="scientific_name" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อวิทยาศาสตร์ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <h4 class="mb-0">อนุกรมวิธาน</h4>
                    <hr class="my-2">
                    <div class="form-group mb-2">
                      <label>อาณาจักร ภาษาไทย</label>
                      <input type="text" name="kingdom" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>อาณาจักร ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>หมวด ภาษาไทย</label>
                      <input type="text" name="division" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>หมวด ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชั้น ภาษาไทย</label>
                      <input type="text" name="class" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชั้น ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>อันดับ ภาษาไทย</label>
                      <input type="text" name="order" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>อันดับ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>วงศ์ ภาษาไทย</label>
                      <input type="text" name="family" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>วงศ์ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>สกุล ภาษาไทย</label>
                      <input type="text" name="genus" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>สกุล ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชนิด ภาษาไทย</label>
                      <input type="text" name="species" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชนิด ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">
                  <h4 class="mb-0">ลักษณะทางพฤกษศาตร์</h4>
                    <hr class="my-2">
                    <div class="form-group">
                      <label>ลำต้น ภาษาไทย</label>
                      <textarea name="stem_th" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>ลำต้น ภาษาอังกฤษ</label>
                      <textarea name="stem_en" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>ใบ ภาษาไทย</label>
                      <textarea name="leaf_th" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>ใบ ภาษาอังกฤษ</label>
                      <textarea name="leaf_en" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>ดอก ภาษาไทย</label>
                      <textarea name="flower_th" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>ดอก ภาษาอังกฤษ</label>
                      <textarea name="flower_en" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>ผล ภาษาไทย</label>
                      <textarea name="fruit_th" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>ผล ภาษาอังกฤษ</label>
                      <textarea name="fruit_en" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>การกระจายพันธุ์ ภาษาไทย</label>
                      <textarea name="distribution_th" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>การกระจายพันธุ์ ภาษาอังกฤษ</label>
                      <textarea name="distribution_en" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>การใช้ประโยชน์ ภาษาไทย</label>
                      <textarea name="utilization_th" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>การใช้ประโยชน์ ภาษาอังกฤษ</label>
                      <textarea name="utilization_en" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>อ้างอิง ภาษาไทย</label>
                      <textarea name="references_th" class="summer-note summernote"> </textarea>
                    </div>
                    <div class="form-group">
                      <label>อ้างอิง ภาษาอังกฤษ</label>
                      <textarea name="references_en" class="summer-note summernote"> </textarea>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-12 d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary  me-3 w-150px py-2">Reset</button>
            <button type="submit" class="btn btn-success  w-150px py-2">Submit</button>
          </div>
          </from>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
<script>
  $(document).ready(function() {
    $('.summernote').summernote({
      height: 100,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['para', ['ul', 'ol', ]],
      ]
    });
  });
</script>
@endsection
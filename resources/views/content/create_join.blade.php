@extends('admin.master')

@section('content')
<div id="main-content">
  <div class="wrapper">
    <div class="col-12">
      <a href="{{url('/admin/content/'.$type)}}" class="btn btn-dark text-white font-12px p-1"> 
        <i class="fas fa-arrow-circle-left me-2"></i>Back
      </a>
      <div class="card">
        <div class="card-body ">
          <div class="col-12 px-3">
            <h2>เพิ่มร่วมงานกันเรา</h2>
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
          <form action="{{url('/content/add')}}" method="post" enctype="multipart/form-data" >
             @csrf
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>วันที่ลงประกาศ </label>
                    <input type="date" name="created_at" value="{{date('Y-m-d')}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>ไฟล์</label>
                    <input type="file" name="pdf" class="form-control" accept="application/pdf,application/vnd.ms-excel">
                  </div>
                </div>
                <div class="col-lg-6">
             
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>หัวข้อภาษาไทย</label>
                    <input type="text" name="post_name_th" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>รายละเอียดภาษาไทย</label>
                    <textarea name="content_th" class="summer-note summernote" > </textarea>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>หัวข้อภาษาอังกฤษ</label>
                    <input type="text" name="post_name_en" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>รายละเอียดภาษาอังกฤษ</label>
                    <textarea name="content_en" class="summer-note summernote" > </textarea>
                  </div>
                </div>
               
              </div>
              <div class="col-12 d-flex justify-content-end pt-3">
                <input type="hidden" name="post_type" value="{{$type}}">
                <button type="reset" class="btn btn-secondary  me-3 w-150px py-2">Reset</button>
                <button type="submit" class="btn btn-success  w-150px py-2">Submit</button>
              </div>
            </from>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
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
@endsection


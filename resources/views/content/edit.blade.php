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
            <h2>{{$type_text}}</h2>
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
            <form action="{{url('/content/edit')}}" method="post" enctype="multipart/form-data">
             @csrf
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>รูปภาพ</label>  
                    @for($i = 1; $i <= 5; $i++) 
                    <div class="image-upload files mb-3 update_file">
                      <div class="img-16by9 holder btn-change-image highlight-hover has-image" >
                        <img src="{{$content->files[$i-1]->pic_path}}" class="img-responsive image-preview">
                        <div class="icon-box">
                          <div class="icon-box-text">
                          </div>
                        </div>
                      </div>
                      <input type="file" name="picture_{{$i}}" class="form-control hidden img-upload-file" data-files="true" accept="image/*">
                      <input type="hidden" name="old_file[picture_{{$i}}]"  value="{{$content->files[$i-1]->pic_path}}">
                      <input type="hidden" name="is_update[picture_{{$i}}]"  class="event_is_update" value="0">
                    </div>
                    @endfor
                  </div>
                  <div class="form-group mt-2">
                    <label>วันที่ลงประกาศ </label>
                    <input type="date" name="created_at" value="{{$content->created_at}}" class="form-control">
                  </div>
                  <input type="hidden" name="post_type" value="{{$type}}">
                  <input type="hidden" name="id"  value="{{$content->id}}">
                </div>
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>หัวข้อภาษาไทย</label>
                        <input type="text" name="post_name_th" value="{{$content->post_name_th}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>รายละเอียดภาษาไทย</label>
                        <textarea name="content_th"  class="summer-note summernote">{{$content->content_th}}</textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>หัวข้อภาษาอังกฤษ</label>
                        <input type="text" name="post_name_en" value="{{$content->post_name_en}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>รายละเอียดภาษาอังกฤษ</label>
                        <textarea name="content_en" class="summer-note summernote">{{$content->content_en}}</textarea>
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


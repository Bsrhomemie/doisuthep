@extends('admin.master')

@section('content')
<div id="main-content">
  <div class="wrapper">
    <div class="col-12">
      <a href="{{url('/admin/database/plants')}}" class="btn btn-dark text-white font-12px p-1">
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
            <form action="{{url('/database/edit/plants')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>รูปภาพ</label>
                    @for($i = 1; $i <= 5; $i++) 
                    <div class="image-upload files mb-3 update_file">
                      <?php
                        $class = '';
                        $image_path = '';
                        if(isset($data->files[$i-1]->pic_location)){
                          $class = 'has-image';
                          $image_path = $data->files[$i-1]->pic_location;
                        }
                      ?>
                      <div class="img-16by9 holder btn-change-image highlight-hover {{$class}}">
                        <img src="{{asset($image_path)}}" class="img-responsive image-preview">
                        <div class="icon-box">
                          <div class="icon-box-text">
                          </div>
                        </div>
                      </div>
                      <input type="file" name="picture_{{$i}}" class="form-control hidden img-upload-file" data-files="true" accept="image/*">
                      <input type="hidden" name="old_file[picture_{{$i}}]"  value="{{$image_path}}">
                      <input type="hidden" name="is_update[picture_{{$i}}]"  class="event_is_update" value="0">
                    </div>
                  @endfor
                </div>
                <div class="form-group mt-2 mb-3">
                  <label>วันที่ลงประกาศ </label>
                  <input type="date" name="created_at" value="{{date('Y-m-d', strtotime($data->created_at))}}" class="form-control">
                </div>
                <input type="hidden" name="post_type" value="{{$type}}">
                <input type="hidden" name="id"  value="{{$data->id}}">
                <input type="hidden" name="doisuthep_db_id"  value="{{$data->doisuthep_db_id}}">
              </div>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-lg-12">
                    <h4 class="mb-0">หัวข้อ</h4>
                    <hr class="my-2">
                    <div class="form-group mb-2">
                      <label>ชื่อ ภาษาไทย</label>
                      <input type="text" name="name" value="{{$data->name}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อสามัญ ภาษาไทย</label>
                      <input type="text" name="common_name" value="{{$data->common_name}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อสามัญ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อท้องถิ่น ภาษาไทย</label>
                      <input type="text" name="local_name" value="{{$data->local_name}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อท้องถิ่น ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชื่อวิทยาศาสตร์ ภาษาไทย</label>
                      <input type="text" name="scientific_name" value="{{$data->scientific_name}}" class="form-control">
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
                      <input type="text" name="kingdom"  value="{{$data->kingdom}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>อาณาจักร ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>หมวด ภาษาไทย</label>
                      <input type="text" name="division" value="{{$data->division}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>หมวด ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชั้น ภาษาไทย</label>
                      <input type="text" name="class" value="{{$data->class}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชั้น ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>อันดับ ภาษาไทย</label>
                      <input type="text" name="order" value="{{$data->order}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>อันดับ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>วงศ์ ภาษาไทย</label>
                      <input type="text" name="family" value="{{$data->family}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>วงศ์ ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>สกุล ภาษาไทย</label>
                      <input type="text" name="genus" value="{{$data->genus}}" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>สกุล ภาษาอังกฤษ</label>
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                      <label>ชนิด ภาษาไทย</label>
                      <input type="text" name="species" value="{{$data->species}}" class="form-control">
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
                      <textarea name="stem_th" class="form-control mb-2">{{$data->stem_th}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>ลำต้น ภาษาอังกฤษ</label>
                      <textarea name="stem_en" class="form-control mb-2">{{$data->stem_en}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>ใบ ภาษาไทย</label>
                      <textarea name="leaf_th" class="form-control mb-2">{{$data->leaf_th}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>ใบ ภาษาอังกฤษ</label>
                      <textarea name="leaf_en" class="form-control mb-2">{{$data->leaf_en}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>ดอก ภาษาไทย</label>
                      <textarea name="flower_th" class="form-control mb-2">{{$data->flower_th}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>ดอก ภาษาอังกฤษ</label>
                      <textarea name="flower_en" class="form-control mb-2">{{$data->flower_en}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>ผล ภาษาไทย</label>
                      <textarea name="fruit_th" class="form-control mb-2">{{$data->fruit_th}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>ผล ภาษาอังกฤษ</label>
                      <textarea name="fruit_en" class="form-control mb-2">{{$data->fruit_en}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>การกระจายพันธุ์ ภาษาไทย</label>
                      <textarea name="distribution_th" class="form-control mb-2">{{$data->distribution_th}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>การกระจายพันธุ์ ภาษาอังกฤษ</label>
                      <textarea name="distribution_en" class="form-control mb-2">{{$data->distribution_en}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>การใช้ประโยชน์ ภาษาไทย</label>
                      <textarea name="utilization_th" class="form-control mb-2">{{$data->utilization_th}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>การใช้ประโยชน์ ภาษาอังกฤษ</label>
                      <textarea name="utilization_en" class="form-control mb-2">{{$data->utilization_en}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>อ้างอิง ภาษาไทย</label>
                      <textarea name="references_th" class="form-control mb-2">{{$data->references_th}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>อ้างอิง ภาษาอังกฤษ</label>
                      <textarea name="references_en" class="form-control mb-2">{{$data->references_en}}</textarea>
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
@extends('admin.master')

@section('content')
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
                  <a href="{{route('product.create')}}" class="btn btn-success px-3 py-2" id="btn-add" data-toggle="modal" data-target="#formModal">
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
                    <th >ชื่อภาษาไทย</th>
                    <th >ชื่อภาษาอังกฤษ</th>
                    <th class="w-250px">ราคา</th>
                    <th class="w-250px ">สถานะ</th>
                    <td class="w-100px"></td>
                  </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    @if(!$products->isEmpty())
                    @foreach ($products as $data)
                    <tr id="todo{{$data['id']}}">
                        <td>
                          <div class="img-1by1 holder " >
                            <img src="{{URL::asset('/images/image-5.jpg')}}" class="img-responsive image-preview" >
                          </div>
                        </td>
                        <td>{{$data->name_th}}</td>
                        <td>{{$data->name_en}}</td>
                        <td>{{($data->status == 0) ? 'ปิดขาย' : 'เปิดขาย' }}</td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="" class="btn btn-warning me-2">
                              <i class="far fa-edit font-18px"></i>
                            </a>
                            <form action="" method="post">
                              <!-- @csrf
                              @method('DELETE') -->
                              <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt font-18px"></i> </button>
                            </form>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <tr><td class="text-center" colspan="6"> ไม่มีข้อมูล</td></tr>
                    @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  


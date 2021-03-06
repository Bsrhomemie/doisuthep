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
                  <a href="{{url('/product/form')}}" class="btn btn-success px-3 py-2" >
                  <i class="fas fa-plus-circle me-2"></i>  เพิ่มข้อมูล 
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12">
              @if ($message = Session::get('status'))
                <div class="alert alert-success">
                  {{$message}}
                </div>
              @endif
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
                    <tr id="todo{{$data->id}}">
                        <td>
                          <div class="img-1by1 holder " >
                            <img src="{{asset($data->picture)}}" class="img-responsive image-preview" >
                          </div>
                        </td>
                        <td>{{$data->name_th}}</td>
                        <td>{{$data->name_en}}</td>
                        <td>{{ number_format($data->price, 2) }}</td>
                        <td>
                          @if($data->status) 
                            เปิดการขาย
                          @else 
                            ปิดการขาย
                          @endif
                        </td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="{{url('product/form_edit/'.$data->id)}}" class="btn btn-warning me-2">
                              <i class="far fa-edit font-18px"></i>
                            </a>
                            <form action="{{url('/product/delete')}}" method="post">
                              @csrf
                              <input type="hidden" name="file" value="{{$data->picture}}">
                              <input type="hidden" name="id" value="{{$data->id}}">
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
              {!! $products->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  


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
                  <h2>{{$type_text}}</h2>
                </div>
                <div>
                  <a href="{{url('database/form/'.$type)}}" class="btn btn-success px-3  py-2" >
                  <i class="fas fa-plus-circle me-2"></i>  เพิ่มข้อมูล
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12">
              @if ($message = Session::get('status'))
                <div class="alert alert-success alert-dismissible fade show">
                  {{$message}}
                </div>
              @endif
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th nowrup class="w-150px" >รูปภาพ</th>
                    <th class="w-250px">หัวข้อภาษาไทย</th>
                    <th class="w-250px">หัวข้อภาษาอังกฤษ</th>
                    <th class="w-250px">วันที่ลงประกาศ</th>
                    <th class="thin-cell w-100px"></th>
                  </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    @if(!$list_data->isEmpty())
                    @foreach ($list_data as $data)
                    <tr>
                        <td>
                          <div class="img-16by9 holder " >
                            <img src="{{asset($data->files[0]->pic_location)}}" class="img-responsive image-preview" >
                          </div>
                        </td>
                        <td>{{Str::limit($data->name, 200)}}</td>
                        <td>{{Str::limit($data->common_name, 200)}}</td>
                        <td>{{date('d/m/Y', strtotime($data->created_at))}}</td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="{{url('database/form_edit/'.$type.'/'.$data->id)}}" class="btn btn-warning me-2">
                              <i class="far fa-edit font-18px"></i>
                            </a>
                            <form action="{{url('/database/delete/plants')}}" method="post">
                              @csrf
                              @method('DELETE') 
                              <input type="hidden" name="id" value="{{$data->id}}">
                              <input type="hidden" name="doisuthep_db_id" value="{{$data->doisuthep_db_id}}">
                              <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt font-18px"></i> </button>
                            </form>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <tr><td class="text-center" colspan="5"> ไม่มีข้อมูล</td></tr>
                    @endif
                </tbody>
              </table>
              {!! $list_data->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection



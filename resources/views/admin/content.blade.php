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
                  <a href="{{url('content/form/'.$type)}}" class="btn btn-success px-3  py-2" >
                  <i class="fas fa-plus-circle me-2"></i>  เพิ่มข้อมูล
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th nowrup class="w-150px" >รูปภาพ</th>
                    <th class="w-250px">หัวข้อภาษาไทย</th>
                    <th class="w-250px">หัวข้อภาษาอังกฤษ TH</th>
                    <th class="w-250px">วันที่ลงประกาศ</th>
                    <th class="thin-cell w-100px"></th>
                  </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    @if($content )
                    @foreach ($content as $data)
                    <tr id="todo{{$data['id']}}">
                        <td>
                          <div class="img-16by9 holder " >
                            <img src="{{ asset('storage/'.$data->picture)}}" class="img-responsive image-preview" >
                          </div>
                        </td>
                        <td>{{Str::limit($data->post_name_th, 200)}}</td>
                        <!-- <td>{!! Str::limit($data->content_th, 200) !!}</td> -->
                        <td>{{Str::limit($data->post_name_en, 200)}}</td>
                        <td>{{date('d/m/Y', strtotime($data->created_at))}}</td>
                        <!-- <td>{!! Str::limit($data->content_en, 200) !!}</td> -->
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="{{url('content/form_edit/'.$type.'/'.$data->id)}}" class="btn btn-warning me-2">
                              <i class="far fa-edit font-18px"></i>
                            </a>
                            <form action="{{url('/content/delete/'.$data->id)}}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt font-18px"></i> </button>
                            </form>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <tr><td class="text-center" colspan="5"></td> ไม่มีข้อมูล </tr>
                    @endif
                </tbody>
              </table>
              {!! $content->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection



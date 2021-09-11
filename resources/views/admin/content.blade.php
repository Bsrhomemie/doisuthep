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
                  <a href="{{url('content/'.$type)}}" class="btn btn-success px-3  py-2" id="btn-add" data-toggle="modal" data-target="#formModal">
                  <i class="fas fa-plus-circle me-2"></i>  เพิ่มข้อมูล 
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th nowrup class="w-150px" >Image</th>
                    <th class="w-250px">Title TH</th>
                    <th class="w-250px">Description TH</th>
                    <th class="w-250px">Title EN</th>
                    <th class="w-250px">Description EN</th>
                    <th class="thin-cell w-100px"></th>
                  </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    @foreach ($todo as $data)
                    <tr id="todo{{$data['id']}}">
                        <td>
                          <div class="img-16by9 holder " >
                            <img src="{{URL::asset('/images/image-5.jpg')}}" class="img-responsive image-preview" >
                          </div>
                        </td>
                        <td>{{Str::limit($data['title_th'], 200)}}</td>
                        <td>{{Str::limit($data['description_th'], 200)}}</td>
                        <td>{{Str::limit($data['title_en'], 200)}}</td>
                        <td>{{Str::limit($data['description_en'], 200)}}</td>
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
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  


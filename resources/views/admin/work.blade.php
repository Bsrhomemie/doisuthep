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
                  <h2>ร่วมงานกันเรา</h2>
                </div>
                <div>
                  <a href="{{url('content/form/'.$type)}}" class="btn btn-success px-3  py-2" id="btn-add" data-toggle="modal" data-target="#formModal">
                    <i class="fas fa-plus-circle me-2"></i>  เพิ่มข้อมูล 
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12">
              <form action="{{url('/content/add_type')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="type_name_en">
                <input type="text" name="type_name_th">
                <button type="submit">Subtmit</button>
              </form>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="w-250px">Title TH</th>
                    <th class="w-250px">Description TH</th>
                    <th class="w-250px">Title EN</th>
                    <th class="w-250px">Description EN</th>
                    <th class="thin-cell w-150px"></th>
                  </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    @foreach ($todo as $data)
                    <tr id="todo{{$data['id']}}">
                      <td>{{Str::limit($data['title_th'], 200)}}</td>
                      <td>{{Str::limit($data['description_th'], 200)}}</td>
                      <td>{{Str::limit($data['title_en'], 200)}}</td>
                      <td>{{Str::limit($data['description_en'], 200)}}</td>
                      <td class="w-150px">
                        <div class="d-flex justify-content-center">
                          <a href="" class="btn btn-dark me-2">
                            <i class="fas fa-file-alt"></i>
                          </a>
                          <a href="" class="btn btn-warning me-2">
                            <i class="fas fa-pencil-alt"></i>
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
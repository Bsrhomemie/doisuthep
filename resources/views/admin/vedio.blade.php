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
                  <h2>วิดีโอ</h2>
                </div>
              </div>
              <form action="">
                <div class="row">
                  @for ($i = 0; $i < 4; $i++)
                  <div class="col-md-6 form-group mb-3">
                    <label>วิดีโอ {{($i+1)}}</label>
                    <input type="text" name="vedio{{($i+1)}}" class="form-control">
                  </div>  
                  @endfor    
                </div>
                <div class="col-12 d-flex justify-content-end pt-3">
                  <button type="submit" class="btn btn-success  w-150px py-2">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  


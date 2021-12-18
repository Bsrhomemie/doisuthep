@extends('content.layout');

@section('content')
  <div class="row">
    <h2>Laravel 8 </h2>
    <a href="{{route('content.create')}}" class="btn w-50 btn-primary my-3">Create New</a>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
    @endif

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th class="thin-cell">id</th>
          <th>Title</th>
          <th>Description</th>
          <th class="thin-cell"></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($data as $key => $value)
        <tr>
          <td>{{++$i}}</td> 
          <td>{{$value->id}}</td>
          <td>{{$value->title}}</td>
          <td>{{ Str::limit($value->description, 100)}}</td>
          <td>
           
              <a href="{{route('content.show', $value->id)}}" class="btn btn-light">
                show
              </a>
              <a href="{{route('content.edit', $value->id)}}" class="btn btn-warning">
                edit
              </a>
             

            <form action="{{route('content.destroy', $value->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"> Delete </button>
            </form> 
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    {!! $data->links() !!}
  </div>
@endsection

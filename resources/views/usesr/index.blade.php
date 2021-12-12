<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">

    <title>Hello, world!</title>
  </head>
  <body>
  <h1 class="text-danger">Hello Uesr {{$name}}</h1>
  {{$user}}
  <a href="{{route('admin')}}">knowledge</a>
  @if($name == "homemie") 
    Yes
  @else
    No
  @endif

  @foreach($list as $data)
      <p> {{$data['name']}} </p>
  @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>
@extends('backend.master')

@section('content')




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<div class="container">
  <h2 style="text-align: center;">Edite form</h2>
  <form action="{{route('categoryesupdate',$dataedi->id)}}" method="post">
  	@csrf


      <div>
      @if(count($errors)>0)
           <ul>
            @foreach($errors->all() as $row)
             <li>
              {{$row}}
             </li>
            @endforeach
           </ul>
      @endif

      @if(Session::has('success'))
           <div class="alert alert-success">
            {{Session::get('success')}}
           </div>
      @endif
    </div>
    <div class="form-group">
      <label for="category_name">category_name:</label>
      <input type="text" class="form-control" id="category_name" value="{{$dataedi->category_name}}" placeholder="Enter category_name" name="category_name">
    </div>
   
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>


@endsection
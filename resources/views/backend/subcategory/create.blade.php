@extends('backend.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 style="text-align: center;">Sub category form</h2>
  <form action="{{route('subcategorpost')}}" method="post">
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
      <label for="sub_name">Sub catergory Name:</label>
      <input type="text" class="form-control" id="sub_name" placeholder="Enter sub_name" name="sub_name">
    </div>


      <div class="form-group">
      <label for="sub_name">catergory:</label>

      <select name="category_id" class="form-control">
        <option value="">Select Onece</option>
          @foreach($data as $row)
        <option value="{{$row->id}}">{{$row->category_name}}</option>
 
        @endforeach
        
      </select>
      
    </div>
   
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>


@endsection
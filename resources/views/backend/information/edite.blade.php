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
  <h2 style="text-align: center;background: silver;padding: 8px;">Information form</h2>
  <form action="{{route('infoupdate')}}" method="post">
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
      <label for="email">Email:</label>
      <input type="email" class="form-control" value="{{$edite->email}}" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="phone_number">Phone/Telephone:</label>
      <input type="text" class="form-control" id="phone_number" value="{{$edite->phone_number}}" placeholder="Enter phone_number" name="phone_number">
    </div>

       <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" value="{{$edite->address}}" placeholder="Enter address" name="address">
    </div>



  
   
  
    <button type="submit" style="font-weight: bold;" class="form-control btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>


@endsection
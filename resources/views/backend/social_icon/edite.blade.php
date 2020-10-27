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
  <h2 style="text-align: center;background: silver;padding: 8px;">Social form</h2>
  <form action="{{route('socila_iconeupdate')}}" method="post">
  	@csrf

  	
    
    <div class="form-group">
      <label for="icon_name">Social_Icon name:</label>
      <input type="text" class="form-control" id="icon_name" value="{{$edite->social_icon}}" placeholder="Enter icon_name" name="social_icon">
    </div>

    <div class="form-group">
      <label for="social_link">Your Social LInk:</label>
      <input type="text" class="form-control" id="social_link" value="{{$edite->social_link}}" placeholder="Enter social_link" name="social_link">
    </div>

  
   
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>


@endsection
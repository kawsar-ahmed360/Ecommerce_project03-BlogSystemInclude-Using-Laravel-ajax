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
  <h2 style="text-align: center;background: silver;padding: 8px;">Coupon form</h2>
  <form action="{{route('couponpost')}}" method="post">
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
      <label for="coupon_code">Coupon Code:</label>
      <input type="text" class="form-control" id="coupon_code" placeholder="Enter coupon_code" name="coupon_code">
    </div>

    <div class="form-group">
      <label for="coupon_discount">coupon_discount:</label>
      <input type="text" class="form-control" id="coupon_discount" placeholder="Enter %" name="coupon_discount">
    </div>

    <div class="form-group">
      <label for="coupon_discount">Validity date:</label>
      <input type="date" class="form-control" id="coupon_discount" placeholder="Enter validaty" name="validaty">
    </div>
   
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>


@endsection
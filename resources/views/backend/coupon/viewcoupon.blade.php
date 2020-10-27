@extends('backend.master')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>

<div class="container">
  <h2 style="text-align: center;background: silver;padding: 4px;">view coupon</h2>
           
  <table class="table table-striped">

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

  		@if(Session::has('delted'))
           <div class="alert alert-danger">
           	{{Session::get('delted')}}
           </div>
  		@endif
  	</div>
    <thead>
      <tr>
      	<th>DB</th>
        <th>Coupon code</th>
        <th>Discount</th>
        <th>Validity date</th>
       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@php
         $sl = 1;
         use carbon\carbon;
    	@endphp
     @foreach($couponview as $row)

       <tr>
       	<td>{{$sl++}}</td>
        <td>{{$row->coupon_code}}</td>
        <td>{{$row->coupon_discount}}%</td>
        
        @if($row->validaty>=carbon::now())
        <td>{{$row->validaty}}</td>

        @else
        <td style="color: red;font-weight: bold;">Expired date  X</td>

        @endif
        
        <td>
        	
        	<a class="btn btn-danger btn-sm" href="{{route('coupondelted',$row->id)}}">Delete</a>
        </td>
      </tr>

     @endforeach
    
    </tbody>
  </table>
</div>

</body>
</html>

@endsection
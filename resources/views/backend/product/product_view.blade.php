@extends('backend.master')

@section('content')

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Account Overview</h4>

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

<div class="">
  <h2 style="text-align: center;">view product</h2>
           
  <table class="table table-striped">

  	<div>
  		

  		@if(Session::has('deleted'))
           <div class="alert alert-danger">
           	{{Session::get('deleted')}}
           </div>
  		@endif
  	</div>
    <thead>
      <tr style="text-align: center;">
      	<th>DB</th>
      	<th>Product_Title</th>
        <th>category_id</th>
        <th>subcategory_id</th>
      <!--   <th>product_summery</th>
        <th>product_description</th> -->
        <th>product_price</th>
        <th>slug</th>
        <th>product_quentity</th>
        <th>product_thummel</th>
        <th>Action</th>
        
     
      </tr>
    </thead>
    <tbody>
    	@php
         $sl = 1;
    	@endphp
     @foreach($datatow as $row)

       <tr style="text-align: center;">
       	<td width="5px">{{$sl++}}</td>
       	<td>{{$row->product_title}}</td>
        <td>{{$row->AddCatergory['category_name']}}</td>
        <td>{{$row->subcategory['sub_name']}}</td>
      <!--   <td  style="text-align: justify;">{{Str::limit($row->product_summery, 160)}}</td>
        <td  style="text-align: justify;">{{ Str::limit($row->product_description, 160)}}</td> -->
        <td>{{$row->product_price}}</td>
        <td>{{$row->slug}}</td>
        <td>{{$row->product_quentity}}</td>
        <td><img style="border-radius: 15px; margin-top: 15px" src="{{URL::to('public/image/product_image/'.$row->product_thummel)}}"></td>
       
        
        <td width="290px" >
        	
        	<a style="margin-top: 150px" class="btn btn-success btn-sm" href="{{route('edites-product',$row->id)}}">Edite</a>
        	<a style="margin-top: 150px" class="btn btn-danger btn-sm" href="{{route('productdete',$row->id)}}">Delete</a>
        </td>
      </tr>

     @endforeach
    
    </tbody>
  </table>
</div>



</body>
</html>

        </div>
                            
                        </div>
                    </div> <!-- container -->

                </div>

                @endsection
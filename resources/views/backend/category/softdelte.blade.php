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
  <h2 style="text-align: center;">view Rows</h2>
           
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


    @if(Session::has('perde'))
           <div class="alert alert-danger">
            {{Session::get('perde')}}
           </div>
      @endif
    <thead>
      <tr>
      	<th>DB</th>
        <th>Category Name</th>
       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@php
         $sl = 1;
    	@endphp
     @foreach($softda as $row)

       <tr>
       	<td>{{$sl++}}</td>
        <td>{{$row->category_name}}</td>
        
        <td>
        	
        	<a class="btn btn-success btn-sm" href="{{route('categoryrestoreses',$row->id)}}">Restore</a>
        	<a class="btn btn-danger btn-sm" href="{{route('forceDelete',$row->id)}}">Delete</a>
        </td>
      </tr>

     @endforeach
    
    </tbody>
  </table>
</div>

</body>
</html>

@endsection
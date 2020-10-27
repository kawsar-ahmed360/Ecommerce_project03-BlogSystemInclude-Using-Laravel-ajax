@extends('backend.master')

@section('content')

 <div class="content">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 style="text-align: center;background: silver;padding: 8px;">Replay Message Client form</h2>
  <form action="{{route('aboutpostreplaypost')}}" method="post">
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
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" value="{{$replay->fname}}" placeholder="Enter name" name="name">
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="{{$replay->email}}" placeholder="Enter email" name="email">
    </div>

   

       <div class="form-group">
      <label for="address">Message:</label>
    <textarea name="message" class="form-control" placeholder="enter your message........"></textarea>
    </div>



  
   
  
    <button type="submit" style="font-weight: bold;" class="form-control btn btn-primary">Send</button>
  </form>
</div>

</body>
</html>

 </div>
                            </div>
                        </div>
                    </div> <!-- container -->

 </div> 



@endsection
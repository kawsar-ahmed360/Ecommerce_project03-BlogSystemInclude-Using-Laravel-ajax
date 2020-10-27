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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 style="text-align: center;background: silver;padding: 8px;">Slider form</h2>
  <form action="{{route('createsliderpost')}}" method="post" enctype="multipart/form-data">
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
      <label for="slider_name">slider_name:</label>
      <input type="text" class="form-control" id="slider_name" placeholder="Enter slider_name" name="slider_name">
    </div>

    <div class="form-group">
      <label for="slider_summery">slider_summery:</label>
      <input type="text" class="form-control" id="slider_summery" placeholder="Enter slider_summery" name="slider_summery">
    </div>


    <div class="form-group">
      <label for="slider_image">slider_image:</label>
      <input type="file" class="form-control" id="slider_image" placeholder="Enter slider_image" name="slider_image" onchange="readURL(this);">
    </div>

       <div class="form-group">
      <label for="product_quentity">product_Preview:</label>
       <img id="ShowImage"  />
    
    </div>


  
   
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script type="text/javascript">
   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#ShowImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>

  </div>
                            </div>
                        </div>
                    </div> 


@endsection
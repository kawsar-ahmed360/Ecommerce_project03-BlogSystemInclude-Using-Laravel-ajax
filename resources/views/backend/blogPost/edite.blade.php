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
  <h2 style="text-align: center;background: silver;padding: 8px;">Update Blog Post</h2>
  <form action="{{route('blogupdate')}}" method="post" enctype="multipart/form-data">
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
      <label for="question">Category:</label>
        <select class="form-control" name="blog_category">
         
          @foreach($category as $cate)

          <option @if($cate->id == $edite->blog_category) selected @endif value="{{$cate->id}}">{{$cate->category_name}}</option>

          @endforeach
        </select>
    </div>

    <div class="form-group">
      <label for="blog_title">Blog Title:</label>
      <input type="text" class="form-control" id="blog_title" value="{{$edite->blog_title}}" placeholder="Enter blog_title" name="blog_title">
    </div>

    <div class="form-group">
      <label for="blog_description">Blog Description:</label>
      <textarea class="form-control" name="blog_description" placeholder="Ans........">{{$edite->blog_description}}</textarea>
    </div>


     <div class="form-group">
      <span>Old Image</span><br>
      <img src="{{url('public/image/blog_image/'.$edite->blog_image)}}" width="100px"> <br>
      <label for="blog_image">new image:</label>
      <input type="file" class="form-control" id="blog_image" placeholder="Enter question" name="blog_image" onchange="readURL(this);" >
    </div>

     <div class="form-group">
      <label for="product_quentity">product_Preview:</label> <br>
       <img id="ShowImage"  />
    
    </div>





    <button type="submit" class="btn btn-primary form-control">Update</button>
  </form>

</div>




</body>

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
</html>

     </div>
                            </div>
                        </div>
                    </div> <!-- container -->

 </div> 


@endsection
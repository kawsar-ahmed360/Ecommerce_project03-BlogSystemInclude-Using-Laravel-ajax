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
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>

<div class="container">
  <h2 style="text-align: center;background: black;color:white;padding: 7px;border-radius: 7px;">Product form</h2>
  <form action="{{route('productuppdsate')}}" method="post" enctype="multipart/form-data">
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
      <label for="sub_name">product_title:</label>
      <input type="text" class="form-control" value="{{$dataedite->product_title}}" id="product_title" placeholder="Enter product_title" name="product_title">
    </div>


      <div class="form-group">
      <label for="sub_name">catergory:</label>
 
      <select name="category_id"  class="form-control">
        
    @foreach($addcategoy as $row)
    
        <option @if($row->id == $dataedite->category_id)  selected @endif value="{{$row->id}}">{{$row->category_name}}</option>
 
  @endforeach
        
      </select>
      
    </div>


  <div class="form-group">
      <label for="sub_name">Sub Category:</label>
 
      <select name="subcategory_id"  class="form-control">
   
    @foreach($addsub as $rows)
        <option @if($rows->id == $dataedite->subcategory_id)  selected @endif value="{{$rows->id}}" >{{$rows->sub_name}}</option>
 
     @endforeach
        
      </select>
      
    </div>



     <div class="form-group">
      <label for="sub_name">product_summery:</label>
     <textarea class="form-control" name="product_summery"  placeholder="Enter your product_summery........">{{$dataedite->product_summery}}</textarea>
    </div>


     <div class="form-group">
      <label for="sub_name">product_description:</label>
     <textarea class="form-control" name="product_description"  placeholder="Enter your product_description.....">{{$dataedite->product_description}}</textarea>
    </div>


     <div class="form-group">
      <label for="product_price">product_price:</label>
      <input type="text" class="form-control" id="product_price" value="{{$dataedite->product_price}}" placeholder="Enter product_price" name="product_price">
    </div>

     <div class="form-group">
      <label for="product_quentity">product_quentity:</label>
      <input type="text" class="form-control" id="product_quentity" value="{{$dataedite->product_quentity}}" placeholder="Exam: 10" name="product_quentity">
    </div>


 

      <div class="form-group">
        <p>Old Image</p>
       <img style="border-radius: 15px; margin-top: 15px" src="{{URL::to('public/image/product_image/'.$dataedite->product_thummel)}}" width="100px"><br>
      <label for="productImage">product_thummel:</label>
      <input type="file"  id="productImage"   name="product_thummel" onchange="readURL(this);" >
    </div>


    



      <div class="form-group">
      <label for="product_quentity">New Image_Preview:</label><br>
       <img id="ShowImage"  />
    </div>



      <div class="form-group">
        <p>Old Image</p>
        @foreach($multiple as $items)
        
       <img style="border-radius: 15px; margin-top: 15px" src="{{url('public/image/product_gellary/'.$items->product_gellary)}}" width="100px">
       @endforeach
       <br>
      <label for="productImage">Product Gallery:</label><br>
      <input type="file"  id="productImage"  multiple name="product_gellary[]">
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


@endsection
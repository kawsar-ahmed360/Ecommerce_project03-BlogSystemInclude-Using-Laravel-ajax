@extends('backend.master')


@section('content')


                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

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


  <h2 style="text-align: center;background: silver;padding: 5px">blog page view</h2>
           
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

    @if(Session::has('update'))
           <div class="alert alert-success">
            {{Session::get('update')}}
           </div>
      @endif

    </div>
    <thead>
      <tr align="center">
        <th>DB</th>
        <th>blog_category</th>
        <th>blog_title</th>
        <th>blog_description</th>
        <th>blog_image</th>
        
      
    
    
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
         $sl = 1;
      @endphp
     @foreach($allvoiew as  $row)

   
       <tr align="center">
        <td>{{$sl++}}</td>
        <td>{{$row->AddCatergory['category_name']}}</td>
        <td>{{$row->blog_title}}</td>
         <td>{{Str::limit($row->blog_description,100)}}</td>
         <td><img src="{{url('public/image/blog_image/'.$row->blog_image)}}" width="100px"></td>
        
        
       
        
        <td>
          
 
          <a class="btn btn-danger btn-sm" href="{{route('blogdelete',$row->id)}}">delete</a>
          <a class="btn btn-success btn-sm" href="{{route('blogedite',$row->id)}}">Edite</a>
        </td>
      </tr>



       @endforeach


    
    </tbody>

  </table>
   {{$allvoiew->links()}}

</body>
</html>

       </div>
                            </div>
                        </div>
                    </div>

@endsection
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
 <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>

<div class="container">
  <h2 style="text-align: center;background: silver;padding: 5px">view Information</h2>
           
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
      <tr>
        <th>DB</th>
        <th>Email</th>
        <th>Phone\Telephone</th>
        <th>Address</th>
    
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
         $sl = 1;
      @endphp
     @foreach($allviw as $row)
  @endforeach
       <tr>
        <td>{{$sl++}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->phone_number}}</td>
        <td>{{$row->address}}</td>
       
        
        <td>
          
          <a class="btn btn-success btn-sm" href="{{route('infoedite',$row->id)}}">Edite</a>
          <a class="btn btn-primary btn-sm" href="{{route('createinformation')}}">create</a>
        </td>
      </tr>

   
    
    </tbody>
  </table>
</div>

</body>
</html>

 </div>
                            </div>
                        </div>
                    </div> <!-- container -->

 </div> 


@endsection
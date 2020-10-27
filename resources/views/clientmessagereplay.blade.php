

              


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


  <h2 style="text-align: center;background: red;padding: 5px;color:white;border-radius: 20%">Tohenney Ecoomerce site</h2>
           
  <table class="table table-striped">

     @foreach($clientmail as $item)

     @endforeach

      <h3>Hello {{$item->name}}</h3>

      <span style="font-size: 27px;color: green">Message:</span> <br>

      <span>{{$item->message}}</span>
  
  </table>


</body>
</html>

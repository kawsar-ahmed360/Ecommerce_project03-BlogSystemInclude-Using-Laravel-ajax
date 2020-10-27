

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
  <h2 style="text-align: center; background: #30B9ED;padding: 11px;color: #8CC3E1; text-shadow: 2px 2px black;">Basic Data view Table</h2>
  <p></p>            
  <table id="myTable" class="table table-hover" style="background: #30B9ED;">
    <thead>
      <tr>
        <th>DB SL:</th>
      
        <th>Images</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($images as $row)
          <tr style="text-align: center">
        <td style="background: #C0DCF3">{{$row->id}}</td>
       
        <td>

          <img src="{{$row->image}}" width="100px">



        </td>
        <td style="background: #C0DCF3">
      

     
        </td>
      </tr>
      @endforeach
      
     
    </tbody>
  </table>
</div>

</body>


</html>

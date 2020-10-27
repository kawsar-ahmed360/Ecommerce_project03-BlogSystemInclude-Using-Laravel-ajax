

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
  <h2 style="text-align: center;">Create Record form</h2>
  <form action="{{route('postimage')}}" method="POST" enctype="multipart/form-data">

  @csrf

    <div class="form-group">
      <label for="name">Muitiple:</label>
      <input type="file" class="form-control" id="name" placeholder="Enter password" multiple name="image[]">
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
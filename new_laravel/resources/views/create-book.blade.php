<!DOCTYPE html>
<html lang="en">
<head>
  <title>create book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    nav{
      margin-right: 17px;
    }
    </style>
</head>
<body>
  <form method="POST" action="{{ route('books.store') }}">
  @csrf
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Books store</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Settings</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="price">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="des" id="description">
      </div>
      <div class="form-group">
        <label for="pic">Picture</label>
        <input type="text" class="form-control" name="picture" id="pic">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-danger">Submit</button>
    </div>
  </form>
</body>
</html>
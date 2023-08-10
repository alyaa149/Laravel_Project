<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
      table {
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid black;
    padding: 8px;
    max-width: 200px; /* Set the maximum width for cells */
    white-space: nowrap; /* Prevent line breaks within cells */
    overflow: hidden; /* Hide overflowing content */
    text-overflow: ellipsis;
  }
    /* Custom Styles */
    .book-list {
      margin-top: 20px;
    }
    .book-list th {
      background-color: #f8f8f8;
    }
    .book-list .btn {
      margin-top: 5px;
    }
    
  /* Custom Styles */
  .book-list .btn-group {
    display: flex;
  }

  .book-list .btn-group .btn {
    margin-right: 5px;
  }
.center{
  margin-left: 700px;
 
}

</style>

  </style>
</head>
<body>
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
    <div class="row">
      <div class="col-md-3">
        <br><br><br> <br><br><br>
        <div class="list-group">
          <a href="#" class="list-group-item active">Menu</a>
          <a href="#" class="list-group-item">Books</a>
          <a href="{{ route('create-book') }}" class="list-group-item">Create Book</a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="page-header">
          <h1>Books</h1>
        </div>
        @if ($books)
          <table class="table table-striped book-list">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
                <th>picture</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $index => $book)
                <tr>
                  <td>{{ $book['id'] }}</td>
                  <td>{{ $book['title'] }}</td> 
                  <td>{{ $book['price'] }}</td>
                  <td>{{ $book['des'] }}</td>
                  <td>{{ $book['pic'] }}</td>
                  <td>
                  <form action="{{ route('books.destroy', $book['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                  <div class="btn-group" role="group">
            <button type="submit" class="btn btn-danger"   onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
            
</form>

<form action="{{ route('edit_book', $book['id']) }}" class="d-inline">
                                    @csrf
                  <div class="btn-group" role="group">
            <button type="submit" class="btn btn-primary">Edit</button>
            
</form>
<form action="{{ route('books.show', $book['id']) }}" method="GET" class="d-inline">
                                    @csrf              
                  <div class="btn-group" role="group">
            <button type="submit" class="btn btn-info">Info</button>
            
</form>



          </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        
      </div>
    </div>
  </div>
  <div class="containter center">
            {{ $books->links() }}
        </div>
       
  @else
          <p>No Books</p>
        @endif
  <!-- <ul class="pagination center">
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul> -->

</body>
</html>
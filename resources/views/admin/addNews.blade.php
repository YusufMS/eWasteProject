<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add News</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/admin.css" />

        <style >
           form {
            font-size: 16px;
          }
        </style>

</head>


<body>

<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">E-Waste Management</a>
        </div>
          <ul class="nav navbar-nav">
           <li class="active"><a href="{{route('addnews')}}">Add News</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
           <li><a href="{{route('adminProfile')}}">Profile</a></li>
           <li><a href="#">LogOut</a></li>
          </ul>
      </div>
  </nav>  

<div class="sidenav">

  <div id="" style="">
    <img src="img/logo.png" class="logo" style="width: 180px; height: 180px; top: 10px" >
  </div>

  <br>
  <br>
  <a href="{{route('adminpage')}}">Home</a>
  <a href="/maincat/create">Add Main Category</a>
  <a href="/wastes/create">Add Sub Category</a>
  <a href="{{route('addnews')}}">Add News</a>
  <a href="{{route('viewusers')}}">View Users</a>
  <a href="{{route('viewbuyers')}}">View Buyers</a>
  <a href="{{route('viewsellers')}}">View Sellers</a>
</div>


<div class="main">

  <br>
  <br>
  <br>

<form>
  <div class="form-group">
    <label for="title">News Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="news_title" placeholder="News Tiltle">
  </div>
  <div class="form-group">
    <label for="ategory">Select Category</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>option1</option>
      <option>option2</option>
      <option>option3</option>
      <option>option4</option>
      <option>option5</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="description">Description Here</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="image">Insert Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>

  <button type="submit" class="btn btn-primary">Publish</button>
</form>

</div>    



<footer class="footer font-small blue pt-4 mt-4">
 <!-- Copyright -->
  <div class="footer-copyright text-right py-3">© 2018 Copyright:
    <a href="#"> E-Waste Management</a>
  </div>
  <!-- Copyright -->
</footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html> 

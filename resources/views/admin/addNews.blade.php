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
           <li class="active"><a href="{{route('addnews')}}">Site Informations</a></li>
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
    <a href="{{route('addnews')}}">Add News</a>
    <a href="{{route('viewbuyers')}}">View Buyers</a>
    <a href="{{route('viewsellers')}}">View Sellers</a>
    <a href="{{route('addcategory')}}">Add Category</a>
    <a href="{{route('configurations')}}">Configurations</a>
</div>


<div class="main">


  <br>
  <br>
  <br>

<div class="container">
    <div class="row">
    <div class="col-md-12">

      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li class="active">
              <a href="#addinfo" data-toggle="tab">
              Add Info </a>
            </li>
            <li>
              <a href="#updateinfo" data-toggle="tab">
              Update Info </a>             
            </li>
            <li>
               <a href="#deleteinfo" data-toggle="tab">
              Delete Info </a>              
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="addinfo">
            
            <div class="container">
        <h1 style="margin-top: 20px; font-size: 25px; ">Add Site Informations</h1><br>
        <br><br>

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @include('partials.messages')
                {!! Form::open(['action' => 'AdminController@addSiteInformations', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title', ['class' => 'form-label'] )}}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Give a Title', 'id' => 'title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Description ', ['class' => 'form-label'] )}}
                    {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Give a Description', 'id' => 'body']) }}
                </div>   
                <br>
                <div class="form-group">
                    {{ Form::label('select', 'select guest or author ', ['class' => 'form-label'] )}}
                    {{Form::select('type', ['1' => 'guest', '0' => 'author'])}}
                </div> 
                
                {{ Form::submit('Post', ['class' => 'btn btn-primary']) }}     
                {!! Form::close() !!}
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>  

            </div>

            <div class="tab-pane" id="updateinfo">

              

            </div>



            <div class="tab-pane" id="deleteinfo">
              
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    

</div>

<br>
<br>
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

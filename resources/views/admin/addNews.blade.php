<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Informations</title>
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
           <li class="active"><a href="{{route('viewnews')}}">Site Informations</a></li>
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
    <a href="{{route('viewnews')}}">Informations</a>
    <a href="{{route('addcategory')}}">Categories</a>
    <a href="{{route('viewusers')}}">System Users</a>
    <a href="{{route('viewreportedposts')}}">Reported Posts</a>
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
     <!--  <li>
               <a href="#deleteinfo" data-toggle="tab">
              Delete Info </a>              
            </li> -->
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
              <br>

              @if(count($news) > 0)
                @foreach($news as $newnews)

                <div class="bs-calltoaction bs-calltoaction-primary">
                    <div class="row">
                        <div class="col-md-10 cta-contents">
                            <h1 class="cta-title">{{ $newnews->title }}</h1>
                            <div class="cta-desc">
                                <p>{{ $newnews->description }}</p>
                               
                            </div>
                        </div>
                        <div class="col-md-1 button">
                            <a href="#" class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#editModal1{{$newnews->id}}" >Edit</a>
                            <a href='deletenews/{{ $newnews->id }}' class="btn btn-sm btn-block btn-danger" onclick="return confirm('Are you sure you want to delete this news?');" >Delete</a>
                        </div>
                     </div>
                </div>




<div class="modal fade" id="editModal1{{$newnews->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('partials.messages')
        {!! Form::open(['action' => ['AdminController@updateSiteInformations',$newnews->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

        
          <div class="form-group">
            {{ Form::label('title', 'Edit Title', ['class' => 'form-label'] )}}
            {{ Form::text('title', $newnews->title , ['class' => 'form-control', 'id' => 'title']) }}


          </div>
          <div class="form-group">
            {{ Form::label('body', 'Edit Description ', ['class' => 'form-label'] )}}
            {{ Form::textarea('description', $newnews->description , ['class' => 'form-control', 'id' => 'body']) }}

          </div>

          <div class="form-group">
       
          {{ Form::label('select', 'select guest or author ', ['class' => 'form-label'] )}}
          {{Form::select('type', ['1' => 'guest', '0' => 'author'])}}

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::submit('Post', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
        
      </div>
    </div>
  </div>
</div>







                 @endforeach
                @endif

               

            </div>




         <!--   <div class="tab-pane" id="deleteinfo">
              
            </div>   -->



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

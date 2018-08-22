<!DOCTYPE html>
<html>
<head>
<meta name="viewport" >
<title>View Buyers</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/admin.css" />

        <style>
          table {
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
           <li class="active"><a href="{{route('viewbuyers')}}">Reported Posts</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
           <li><a href="{{route('adminProfile')}}">Profile</a></li>
           <li><a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form></li>
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
  <h3>Reported Posts!</h3>
  <br>
  


 <div class="row">
            <div class="col-lg-12">

              <div class="table-responsive table-bordered">
                <table class="table">

                <tr>
                    <th>User Name</th>
                    <th>Complain</th>
                    <th>Post Title</th>
                    <th>Reported On</th>
                    <th>View Post</th>
                </tr>

                @if(count($complains) > 0)

                  @foreach($complains as $complain)

                    <tr>
                        <td>{{ $complain->user->first_name}}</td>
                        <td>{{ $complain->content}}</td>
                        <td>{{ $complain->post->title}}</td>
                        <td>{{ date('h: i a', strtotime($complain->created_at) )}} on {{ date('F j, Y', strtotime($complain->created_at) )}}</td>
                        
                        <td>
                          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#reportModal2{{$complain->post->id}}" >View</a>
                        </td>

                    </tr>


<div class="modal fade" id="reportModal2{{$complain->post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $complain->post->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('partials.messages')
        

        
          <div class="form-group">
            {{ Form::label('title', $complain->post->content, ['class' => 'form-label'] )}}
            
          </div>

          <div class="form-group">
          
             <img id="image-gallery-image" class="img-responsive" src="/storage/attachment/{{$complain->post->attachment}}">
            
          </div>

           <div class="form-group">
            {{ Form::label('title', 'Posted by' , ['class' => 'form-label'] )}}
           {{ Form::label('title', ($users->find($complain->post->publisher_id)->first_name), ['class' => 'form-label'] )}}
                    

          </div>

          <div class="form-group inline">
            {{ Form::label('title', 'Posted at' , ['class' => 'form-label'] )}}
           {{ Form::label('title', $complain->post->created_at, ['class' => 'form-label'] )}}
               
         
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href='' class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?');" >Delete</a>
    
        
      </div>
    </div>
  </div>
</div>


                  

                  @endforeach
                @endif
                      
            </table>



            </div>
            <br>
         
          </div>
        </div>
     




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

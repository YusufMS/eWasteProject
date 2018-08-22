<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/admin.css" />

        <style>
          main{
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
           <li class="active"><a href="{{route('adminpage')}}">All Posts</a></li>
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





        <div class="card mb-3">

            <div class="card-body">
                @include('partials.messages')

                <hr>
                <div class="card-header">
                    <h4 class="d-inline">{{ $post->title }}</h4>
                    <span class="float-right"><kbd class="bg-info">{{$post->sub_waste_category->category}} Category</kbd></span>
                    <h6 class="card-subtitle my-2 text-muted">
                        <div class="row">
                            <div class="col-sm-5">
                                Published by : {{ $post->user->full_name }}
                                
                            </div>
                            <div class="col-sm-7">
                                    
                                <span class="float-right">
                                
                                Created On: {{ date('F d, Y', strtotime($post->created_at)) }}
                                at {{ Carbon\Carbon::parse($post->created_at)->format('g:i A') }}
                                ( {{ Carbon::createFromTimestampUTC(strtotime($post->created_at))->diffForHumans() }})
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2"><div class="col"><span class="text-dark">{{$post->view_count}} Views</span></div></div>
                    </h6>
                </div>

                <br>
                <div>
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="img-fluid img-thumbnail img-responsive"
                                 src="/storage/attachment/{{ $post->attachment }}"
                                 style="max-height: 400px; width:450px">
                        </div>
                        <div class="col-sm-6">
                            @if(!is_null($post->buyer_post))
                                <p><strong>Quantity : </strong>{{$post->buyer_post->no_of_items . ' ' . $post->buyer_post->item_unit}}</p>
                                @if(!is_null($post->buyer_post->model))    
                                <p><strong>Model Number : </strong>{{$post->buyer_post->model}}</p>
                                @endif
                            @elseif(!is_null($post->seller_post))
                                <div>
                                    <strong>Preferred Buyer Categories</strong>
                                    <ul>
                                    @foreach(explode(',', $post->seller_post->buyer_category) as $buyer_type)
                                    <li>{{$buyer_type}}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <p class="card-text"><strong>Description :</strong><br>{{ $post->content }}</p>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="row float-right">
                    {{--<a type="button" class="btn btn-info" href="/contactDetails/{{ $post->publisher_id }}"><i class="fa fa-address-book" style="font-size:30px;padding-right: 10px"></i>Contact Details</a>--}}

                    {{-- tooltip added buttons --}}
                    <a href="{{url()->previous()}}" class="btn btn-primary" data-toggle="tooltip" title="Go Back"><i class="fa fa-arrow-left"></i></a>
                    @if(Auth::id() == $post->publisher_id)
                        @if(Session::has('user_role') && Session::get('user_role') == 'buyer' && $post->has('buyer_post'))
                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'delete' ]) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <button type="submit" class="btn btn-danger mx-1" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></button>
                        {!! Form::close() !!}
                        {{-- <a type="button" href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></a> --}}
                        <a type="a" href="{{route('posts.edit', $post->id)}}" class="btn btn-success" data-toggle="tooltip" title="Edit Post"><i class="fa fa-edit"></i></a>
                        @elseif(Session::has('user_role') && Session::get('user_role') == 'seller' && $post->has('seller_post'))
                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'delete' ]) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <button type="submit" class="btn btn-danger mx-1" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></button>
                        {!! Form::close() !!}
                        {{-- <a type="button" href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></a> --}}
                        <a type="a" href="{{route('posts.edit', $post->id)}}" class="btn btn-success" data-toggle="tooltip" title="Edit Post"><i class="fa fa-edit"></i></a>
                        @else
                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'delete' ]) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <a type="submit" class="btn btn-danger mx-1" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></a>
                        {!! Form::close() !!}
                        {{-- <a type="button" href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></a> --}}
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success" data-toggle="tooltip" title="Edit Post"><i class="fa fa-edit"></i></a>
                        @endif
                    @else
                    <span data-toggle="modal" data-target="#myModal">
                        <a href="#" class="btn btn-info mx-1" data-toggle="tooltip" title="Contact Details" ><i class="fa fa-address-card"></i></a>
                    </span>
                    <a href="#" class="btn btn-success" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                    <span data-toggle="modal" data-target="#reportModal">
                        <a href="#" class="btn btn-danger mx-1" data-toggle="tooltip" title="Report this Post"><i class="fa fa-comment-alt"></i></a>
                    </span>
                    @endif
                    {{--<span data-toggle="modal" data-target="#live-chat-form">--}}
                    {{--<a type="button" href="#"  id="addClass" class="btn btn-success" data-toggle="tooltip" title="Send Message"><i--}}
                                {{--class="fa fa-envelope"></i></a>--}}
                                {{--</span>--}}


                </div>

            </div>
            <br>
            <br>

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

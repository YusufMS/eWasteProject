@extends('layouts.main')
@section('title', 'Posts')
@section('style')



    @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);
    body
    {
    font-family: 'Open Sans', sans-serif;
    }
    .popup-box {
    background-color: #ffffff;
    border: 1px solid #b0b0b0;
    bottom: 0;
    display: none;
    height: 415px;
    position: fixed;
    right: 70px;
    width: 300px;
    font-family: 'Open Sans', sans-serif;
    }
    .round.hollow {
    margin: 40px 0 0;
    }
    .round.hollow a {
    border: 2px solid #ff6701;
    border-radius: 35px;
    color: red;
    color: #ff6701;
    font-size: 23px;
    padding: 10px 21px;
    text-decoration: none;
    font-family: 'Open Sans', sans-serif;
    }
    .round.hollow a:hover {
    border: 2px solid #000;
    border-radius: 35px;
    color: red;
    color: #000;
    font-size: 23px;
    padding: 10px 21px;
    text-decoration: none;
    }
    .popup-box-on {
    display: block !important;
    }
    .popup-box .popup-head {
    background-color: #fff;
    clear: both;
    color: #7b7b7b;
    display: inline-table;
    font-size: 21px;
    padding: 7px 10px;
    width: 100%;
    font-family: Oswald;
    }
    .bg_none i {
    border: 1px solid #ff6701;
    border-radius: 25px;
    color: #ff6701;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
    }
    .bg_none:hover i {
    border: 1px solid #000;
    border-radius: 25px;
    color: #000;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
    }
    .bg_none {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    }
    .popup-box .popup-head .popup-head-right {
    margin: 11px 7px 0;
    }
    .popup-box .popup-messages {
    }
    .popup-head-left img {
    border: 1px solid #7b7b7b;
    border-radius: 50%;
    width: 44px;
    }
    .popup-messages-footer > textarea {
    border-bottom: 1px solid #b2b2b2 !important;
    height: 34px !important;
    margin: 7px;
    padding: 5px !important;
    border: medium none;
    width: 95% !important;
    }
    .popup-messages-footer {
    background: #fff none repeat scroll 0 0;
    bottom: 0;
    position: absolute;
    width: 100%;
    }
    .popup-messages-footer .btn-footer {
    overflow: hidden;
    padding: 2px 5px 10px 6px;
    width: 100%;
    }
    .simple_round {
    background: #d1d1d1 none repeat scroll 0 0;
    border-radius: 50%;
    color: #4b4b4b !important;
    height: 21px;
    padding: 0 0 0 1px;
    width: 21px;
    }





    .popup-box .popup-messages {
    background: #3f9684 none repeat scroll 0 0;
    height: 275px;
    overflow: auto;
    }
    .direct-chat-messages {
    overflow: auto;
    padding: 10px;
    transform: translate(0px, 0px);

    }
    .popup-messages .chat-box-single-line {
    border-bottom: 1px solid #a4c6b5;
    height: 12px;
    margin: 7px 0 20px;
    position: relative;
    text-align: center;
    }
    .popup-messages abbr.timestamp {
    background: #3f9684 none repeat scroll 0 0;
    color: #fff;
    padding: 0 11px;
    }

    .popup-head-right .btn-group {
    display: inline-flex;
    margin: 0 8px 0 0;
    vertical-align: top !important;
    }
    .chat-header-button {
    background: transparent none repeat scroll 0 0;
    border: 1px solid #636364;
    border-radius: 50%;
    font-size: 14px;
    height: 30px;
    width: 30px;
    }
    .popup-head-right .btn-group .dropdown-menu {
    border: medium none;
    min-width: 122px;
    padding: 0;
    }
    .popup-head-right .btn-group .dropdown-menu li a {
    font-size: 12px;
    padding: 3px 10px;
    color: #303030;
    }

    .popup-messages abbr.timestamp {
    background: #3f9684  none repeat scroll 0 0;
    color: #fff;
    padding: 0 11px;
    }
    .popup-messages .chat-box-single-line {
    border-bottom: 1px solid #a4c6b5;
    height: 12px;
    margin: 7px 0 20px;
    position: relative;
    text-align: center;
    }
    .popup-messages .direct-chat-messages {
    height: auto;
    }
    .popup-messages .direct-chat-text {
    background: #dfece7 none repeat scroll 0 0;
    border: 1px solid #dfece7;
    border-radius: 2px;
    color: #1f2121;
    }

    .popup-messages .direct-chat-timestamp {
    color: #fff;
    opacity: 0.6;
    }

    .popup-messages .direct-chat-name {
    font-size: 15px;
    font-weight: 600;
    margin: 0 0 0 49px !important;
    color: #fff;
    opacity: 0.9;
    }
    .popup-messages .direct-chat-info {
    display: block;
    font-size: 12px;
    margin-bottom: 0;
    }
    .popup-messages  .big-round {
    margin: -9px 0 0 !important;
    }
    .popup-messages  .direct-chat-img {
    border: 1px solid #fff;
    background: #3f9684  none repeat scroll 0 0;
    border-radius: 50%;
    float: left;
    height: 40px;
    margin: -21px 0 0;
    width: 40px;
    }
    .direct-chat-reply-name {
    color: #fff;
    font-size: 15px;
    margin: 0 0 0 10px;
    opacity: 0.9;
    }

    .direct-chat-img-reply-small
    {
    border: 1px solid #fff;
    border-radius: 50%;
    float: left;
    height: 20px;
    margin: 0 8px;
    width: 20px;
    background:#3f9684;
    }

    .popup-messages .direct-chat-msg {
    margin-bottom: 10px;
    position: relative;
    }

    .popup-messages .doted-border::after {
    background: transparent none repeat scroll 0 0 !important;
    border-right: 2px dotted #fff !important;
    bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
    display: inline;
    z-index: -2;
    }

    .popup-messages .direct-chat-msg::after {
    background: #fff none repeat scroll 0 0;
    border-right: medium none;
    bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
    display: inline;
    z-index: -2;
    }
    .direct-chat-text::after, .direct-chat-text::before {

    border-color: transparent #dfece7 transparent transparent;

    }
    .direct-chat-text::after, .direct-chat-text::before {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: transparent #d2d6de transparent transparent;
    border-image: none;
    border-style: solid;
    border-width: medium;
    content: " ";
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
    }
    .direct-chat-text::after {
    border-width: 5px;
    margin-top: -5px;
    }
    .popup-messages .direct-chat-text {
    background: #dfece7 none repeat scroll 0 0;
    border: 1px solid #dfece7;
    border-radius: 2px;
    color: #1f2121;
    }
    .direct-chat-text {
    background: #d2d6de none repeat scroll 0 0;
    border: 1px solid #d2d6de;
    border-radius: 5px;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
    }




@endsection
@section('body')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">


        <div class="card mb-3">

            <div class="card-body">
                @include('partials.messages')

                <hr>
                <div class="card-header"><h4>{{ $post->title }}</h4>
                    <br>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <div class="row">
                            <div class="col-sm-7">
                                Published by : {{ $post->user->full_name }}
                            </div>
                            <div class="col-sm-5">
                                Created on: {{ date('F d, Y', strtotime($post->created_at)) }}
                                at {{ Carbon\Carbon::parse($post->created_at)->format('g:i A') }}
                                ( {{ Carbon::createFromTimestampUTC(strtotime($post->created_at))->diffForHumans() }})

                            </div>
                        </div>
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
                            <p class="card-text">{{ $post->content }}</p>
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
                        <a href="#" class="btn btn-info mx-1" data-toggle="tooltip" title="Contact Details"><i class="fa fa-address-card"></i></a>
                    </span>
                    <a href="#" class="btn btn-success" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                    <span data-toggle="modal" data-target="#reportModal">
                        <a href="#" class="btn btn-danger mx-1" data-toggle="tooltip" title="Report this Post"><i class="fa fa-comment-alt"></i></a>
                    </span>
                    @endif
                    {{--<span data-toggle="modal" data-target="#live-chat-form">--}}
                    <a type="button" href="#"  id="addClass" class="btn btn-success" data-toggle="tooltip" title="Send Message"><i
                                class="fa fa-envelope"></i></a>
                                {{--</span>--}}


                </div>

            </div>
            <br>
            <br>

        </div>

        {{-- Modal for complain/report --}}
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Report this post</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('complains.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="content" class="col-form-label">Complain / Report Content</label>
                          <textarea class="form-control" id="content" name="content"></textarea>
                          <small class="text-muted">Include the details of your complains here. Please make it specific and concise.</small>
                        </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Report</button>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
              {{--  --}}
    

        {{--  --}}
        <div class="card my-4">
            <div class="card-header lead font-weight-normal">Comments</div>
            <div class="card-body">
                <div class="media bg-light border p-3 mb-3">
                    {{-- <img class="rounded-circle mr-3" src="{{asset('storage/images/profilePhoto/' . $current_commentor_photo)}}" alt="" style="width:50px;"> --}}


                    {!! Form::open(['action' => ['CommentController@store', 'post_id' => $post->id], 'method' => 'POST', 'class' => 'form-control-range']) !!}
                    <div class="form-group m-0">
                        {{Form::label('comment', 'Enter your Comment')}}
                        {{Form::text('comment', '', ['class' => 'form-control'])}}
                    </div>
                    <div>
                        {{Form::submit('Comment', ['class' => 'btn btn-primary float-right mt-2'])}}
                    </div>
                    {!! Form::close() !!}


                </div>
                @foreach($comments as $comment)
                    <div class="media border p-3">

                        {{-- <img class="rounded-circle mr-3" src="{{asset('storage/images/profilePhoto/' . $commentors->find($comment->user_id)->profileImage)}}" alt="" style="width:50px;"> --}}

                        <div>
                            <h6 class="font-weight-bold m-0 text-primary">{{$commentors->find($comment->user_id)->full_name}}</h6>
                            <hr class="p-0 m-0">
                            <div>
                                <div>{{$comment->comment_text}}</div>
                                <small class="text-muted ">{{$comment->formatted_created_date}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{--  --}}
    </div>
    </div>


    

    <div class="modal" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form role="form">
                        <div class="form-group form-inline">
                            <i class="fa fa-phone" style="margin-right: 10px" data-toggle="tooltip"
                               title="Contact Number"></i>
                            <div id="contactno" style="margin-left: 40px; color: darkgreen"
                                 data-last={{substr($seller->phone,3,7)}}><b> {{substr($seller->phone,0,3)}}<span>XXXXXXX</span></b>
                            </div>
                            {{--<input type="text" readonly class="form-control" id="contactno" data-last= substr($seller->phone,7) value= substr($seller->phone,3)><span>XXXXXXX</span>--}}
                            <span class="show-number" style="margin-left: 20px; font-size: small">(Click to show phone number)</span>
                        </div>

                        <div class="form-group form-inline">
                            <i class="fa fa-envelope" style="margin-right: 10px" data-toggle="tooltip"
                               title="E-mail"></i>
                            {{--<input type="text" readonly class="form-control" id="address" value="{{ $seller->address }}" >--}}
                            <div id="address" style="margin-left: 40px; color: darkgreen"><b>{{ $seller->email }}</b>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <i class="fa fa-location-arrow" style="margin-right: 10px" data-toggle="tooltip"
                               title="Address"></i>
                            {{--<input type="text" readonly class="form-control" id="address" value="{{ $seller->address }}" >--}}
                            <div id="address" style="margin-left: 40px; color: darkgreen"><b>{{ $seller->address }}</b>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


























































    <div class="popup-box chat-popup" id="qnimate">
        <div class="popup-head">
            <div class="popup-head-left pull-left">
                <div class="popup-head-right pull-right">
                {{--<div class="btn-group">--}}
                    {{--<button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">--}}
                        {{--<i class="fa fa-cog"></i> </button>--}}

                {{--</div>--}}

                <button data-widget="remove" id="removeClass" class="chat-header-button  " type="button" style="allign:rightk"> <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="popup-messages mt-3">




            <div class="direct-chat-messages">


                <div class="chat-box-single-line">
                    <abbr class="timestamp">October 8th, 2015</abbr>
                </div>


                <!-- Message. Default to the left -->
                <div class="direct-chat-msg doted-border">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img alt="message user image" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
                    </div>
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                    </div>
                    <div class="direct-chat-info clearfix">
						<span class="direct-chat-img-reply-small pull-left">

						</span>
                        <span class="direct-chat-reply-name">Singh</span>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->


                <!-- /.direct-chat-msg -->






            </div>









        </div>
        <div class="popup-messages-footer ">
            {{--<form method="POST" action='/message/store/{{  $post->id }}'>--}}
            <div class="row mt-3">
                <div class="col-sm-9 ">
            <textarea  id="status_message" placeholder="Type a message..."  name="message"></textarea>
                </div>
                <div class="col-sm-3">

                <button class="btn-primary small mr-0" type="submit" id="messagebtn">Send </button>
                </div>
                {{--<button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>--}}
                {{--<button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>--}}
                {{--<button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button>--}}
            </div>
            {{--</form>--}}
        </div>
    </div>






</div>




    <script type="text/javascript">
        $('#contactno').click(function () {
            $(this).find('span').text($(this).data('last'));
        });


        $(function(){
            $("#addClass").click(function () {
                $('#qnimate').addClass('popup-box-on');
            });

            $("#removeClass").click(function () {
                $('#qnimate').removeClass('popup-box-on');
            });
        })






            $(document).ready(function(){
                $('#messagebtn').click(function(){
                    $.ajax({
                        url: '/message/store',
                        type: "post",
                        data: {'sender':'auth()->user()->id', 'receiver':'$post->id','message_body': $('input[name=message]').val(),'_token': '{{csrf_token()}}'},
                        dataType: 'JSON',
                        success: function (data) {
                            console.log(data);

                        }
                    error :function (data){
                            console.log($data);
                    }
                    });
                });
            });





    </script>
    <script>
        $(".delete").on("submit", function(){
            return confirm("This will delete your post from the portal. Proceed to DELETE?");
        });
    </script>


@endsection




            
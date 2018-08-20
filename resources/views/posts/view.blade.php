@extends('layouts.main')
@section('title', 'Posts')
@section('body')
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
                                <small class="text-muted ">{{$comment->formatted_created_date}}</small class="text-muted ">
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








    {{--@endforeach--}}


    </div>
    </div>

    </div>


    <script type="text/javascript">
        $('#contactno').click(function () {
            $(this).find('span').text($(this).data('last'));
        });

    </script>
    <script>
        $(".delete").on("submit", function(){
            return confirm("This will delete your post from the portal. Proceed to DELETE?");
        });
    </script>


@endsection
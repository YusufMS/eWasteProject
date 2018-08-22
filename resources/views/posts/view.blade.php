@extends('layouts.main')
@section('title', 'Posts')
@section('style')






@endsection
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
                    <a href="{{url()->previous()}}" class="btn btn-primary" data-toggle="tooltip" title="Go Back"><i
                                class="fa fa-arrow-left"></i></a>
                    @if(Auth::id() == $post->publisher_id)
                        @if(Session::has('user_role') && Session::get('user_role') == 'buyer' && $post->has('buyer_post'))
                            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'delete' ]) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            <button type="submit" class="btn btn-danger mx-1" data-toggle="tooltip" title="Delete Post">
                                <i class="fa fa-trash-alt"></i></button>
                            {!! Form::close() !!}
                            {{-- <a type="button" href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></a> --}}
                            <a type="a" href="{{route('posts.edit', $post->id)}}" class="btn btn-success"
                               data-toggle="tooltip" title="Edit Post"><i class="fa fa-edit"></i></a>
                        @elseif(Session::has('user_role') && Session::get('user_role') == 'seller' && $post->has('seller_post'))
                            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'delete' ]) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            <button type="submit" class="btn btn-danger mx-1" data-toggle="tooltip" title="Delete Post">
                                <i class="fa fa-trash-alt"></i></button>
                            {!! Form::close() !!}
                            {{-- <a type="button" href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></a> --}}
                            <a type="a" href="{{route('posts.edit', $post->id)}}" class="btn btn-success"
                               data-toggle="tooltip" title="Edit Post"><i class="fa fa-edit"></i></a>
                        @else
                            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'delete' ]) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            <a type="submit" class="btn btn-danger mx-1" data-toggle="tooltip" title="Delete Post"><i
                                        class="fa fa-trash-alt"></i></a>
                            {!! Form::close() !!}
                            {{-- <a type="button" href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-alt"></i></a> --}}
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success" data-toggle="tooltip"
                               title="Edit Post"><i class="fa fa-edit"></i></a>
                        @endif
                    @else
                        <span data-toggle="modal" data-target="#myModal">
                        <a href="#" class="btn btn-info mx-1" data-toggle="tooltip" title="Contact Details"><i
                                    class="fa fa-address-card"></i></a>
                    </span>
                        <a href="#" class="btn btn-success" data-toggle="tooltip" title="Send Message"><i
                                    class="fa fa-envelope"></i></a>
                        <span data-toggle="modal" data-target="#reportModal">
                        <a href="#" class="btn btn-danger mx-1" data-toggle="tooltip" title="Report this Post"><i
                                    class="fa fa-comment-alt"></i></a>
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
        {{-- Modal for complain/report --}}
        @include('posts.reportForm')
        {{--  --}}


        {{--  --}}
        @include('posts.comment')
        {{--  --}}
    </div>


    @include('posts.contactDetails')








    <script type="text/javascript">
        $('#contactno ').click(function () {
            $(this).find('span').text($(this).data('last'));
        });


//        function reply(that) {
//
//            document.getElementById("replyView").style.display = "block";
//
//        }


    </script>
    <script>
        $(".delete").on("submit", function () {
            return confirm("This will delete your post from the portal. Proceed to DELETE?");
        });
    </script>


@endsection




            
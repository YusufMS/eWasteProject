@extends('layouts.main')
@section('title', 'View Posts')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>

    <div class="container" style="padding-top: 30px; padding-bottom: 50px">
        <div class="row">
            <div class="col-md-8">
                <div class="container">
                    <h3 class="card-header font-up font-bold text-center py-2">{{ $post->title }}</h3>
                    <br>
                    <!--Panel-->
                    <div class="card card-body">
                        <p class="card-text"><b>Topic: </b>{{ $post->title }}</p>
                        <p class="card-text"><b>Description: </b>{{ $post->description }}</p>
                        <p class="card-text"><b>Asked by: </b>{{ $post->user->first_name }}</p>
                        <p class="card-text"><b>Asked
                                at: </b>{{ \Carbon\Carbon::parse($post->created_at)->format('Y M d g:i A')}}</p>
                        <div class="row">
                            <span class="badge badge-pill red"
                                  style="width: 80px; padding: 5px; margin: 5px;"><b>Views: </b>{{ $post->view_count }}</span>
                            <span class="badge badge-pill blue"
                                  style="width: 80px; padding: 5px; margin: 5px;"><b>Replies: </b>{{ count($post->replies) }}</span>
                        </div>
                        <br>

                        <div class="row">
                            @auth
                                @if($post->user->id == auth()->user()->id)
                                    <a href="{{ route('post.destroy', $post->id) }}" type="button" target="_blank"
                                       class="btn btn-outline-elegant waves-effect btn-sm">Delete</a>

                                @endif
                                @if(count($post->replies))
                                    <a data-toggle="collapse" href="#reply" aria-expanded="false"
                                       aria-controls="collapseExample"
                                       class="btn btn-outline-elegant waves-effect btn-sm">Show Replies</a>
                                @endif
                                <div class="container">
                                    <div class="card">
                                        <div class="collapse" id="reply">

                                            @foreach($post->replies as $reply)
                                                <p style="margin-left: 20px; margin-top: 10px;">
                                                    <span class="font-weight-bold">{{$reply->user->first_name}}: </span>
                                                    {{$reply->reply}} <br>at
                                                    <span class="font-italic">{{ \Carbon\Carbon::parse($reply->created_at)->format('Y M d g:i A')}}</span>
                                                </p>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endauth
                        </div>
                        {{--{{ \Carbon\Carbon::parse($reply->created_at)->format('Y M d g:i A')}}--}}
                        <br>
                        <form action="{{ route('reply.store') }}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Your Reply" name="reply">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-outline-elegant waves-effect btn-sm">Reply</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                    </div>
                    <br>
                    <!--/.Panel-->
                </div>
            </div>
            <div class="col-md-4">
            @foreach($posts as $post)
                <!--Card-->
                    <div class="card">
                        <!--Card image-->
                        <img class="img-fluid" src="{{$post->attachment}}" alt="Card image cap" style="max-height: 300px">
                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">{{$post->title}}</h4>
                            <!--Text-->
                            <p class="card-text" style="text-transform: capitalize">{{$post->description}}</p>
                            <a href="{{ route('advertisement.show',$post->id) }}" target="_blank"
                               class="btn btn-outline-elegant waves-effect btn-sm">View</a>
                        </div>
                    </div>
                    <!--/.Card-->
                @endforeach
            </div>
        </div>
    </div>

@endsection




x
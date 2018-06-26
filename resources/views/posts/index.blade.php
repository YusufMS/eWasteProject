@extends('layouts.main')
@section('title', 'View Posts')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">






            </div>
            <div class="col-sm-8">


                @if(count($posts) > 0)

                    @foreach($posts as $post)

                        <div class="card mb-3">
                            <div class="card-body">
                                {{--<h4 class="card-header">{{ $post->title }}</h4>--}}
                                <br>
                                <div class="row">
                                    <div class="col-sm-4"><img class="img-fluid" src="storage/attachment/{{ $post->attachment }}"  style="max-height: 100px">
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="card-text">
                                            <h4 style="color: blue">{{ $post->title }}</h4>
                                            {{ $post->content }}
                                        </p>
                                    </div>
                                    <br>


                                </div>
                                <br>
                                <br>
                                {{--<a href="/posts/{{ $post->id }}" style="margin-left: 630px;" class="btn btn-info btn-sm">View</a>--}}

                                <a href="/posts/{{ $post->id }}" style="margin-left: 900px;" class="btn btn-info btn-sm">View</a>
                            </div>
                        </div>


                    @endforeach

                @else
                    <h3 class="text-center">No posts in Database</h3>
                @endif


                <div class="row">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                        {{ $posts->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





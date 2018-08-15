@extends('layouts.main')
@section('title', 'View Posts')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
        <div class="row">



            <div class="col-sm-3">





                <div class="card mb-3">
                <div class="card-body">





                <div class="btn-group dropright">

                    @foreach($maincategories as $main_waste_category)
                        @if($main_waste_category->waste->count() > 0)
                            <li class="dropdown">
                                <a href="#">{{ $main_waste_category->$main_category }} <span class="caret"></span></a>
                                <ul>
                                    @foreach($main_waste_category->waste as $submenu)
                                        <li><a href="/{{ $submenu->category }}">{{ $submenu->category }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="/{{ $main_waste_category->category }}">{{ $main_waste_category->category }}</a></li>
                        @endif
                    @endforeach


                {{--<ul>--}}
                {{--@foreach($maincategories as $maincategory)--}}


                {{--<li class="dropdown-toggle dropdown-toggle-split mt-3"--}}
                {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--{{$maincategory->main_category}}--}}
                {{--<div class="dropdown-menu">--}}

                {{--</div>--}}
                {{--</li>--}}
                        {{--{{$maincategory->category}}--}}
                {{--@endforeach--}}
                {{--</ul>--}}



                {{--</div>--}}

                </div>
                </div>





















            </div>


            <div class="col-sm-6">


                @if(count($posts) > 0)

                    @foreach($posts as $post)

                        <div class="card mb-3">
                            <div class="card-body">
                                {{--<h4 class="card-header">{{ $post->title }}</h4>--}}
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img class="img-fluid" src="storage/attachment/{{ $post->attachment }}" style="max-height: 100px">
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="card-text">
                                        <h4 style="color: blue">{{ $post->title }}</h4>
                                        {{ $post->content }}
                                        </p>
                                        <a href="/posts/{{ $post->id }}" style="margin-left: 10px;"  class="btn btn-info btn-sm">View</a>
                                    </div>
                                    <br>

                                </div>
                                    <br>
                                    <br>


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
        <div class="col-sm-3"></div>
    </div>

@endsection





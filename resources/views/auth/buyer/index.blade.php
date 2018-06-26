@extends('layouts.main')
@section('title', 'View Posts')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
        <div class="row">
            {{--<div class="col-sm-4">--}}
                {{--<div class="card mb-3">--}}
                    {{--<div class="card-body">--}}


                        {{--<div class="dropdown-toggle dropdown-toggle-spli dropright" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--<span class="sr-only">Toggle Dropright</span>>--}}
                        {{--<li  data-toggle="dropdown">--}}
                        {{--Dropright--}}
                        {{--</li>--}}
                        {{--<div class="dropdown-menu">--}}
                        {{--<!-- Dropdown menu links --><li>1</li>--}}
                        {{--<li>2</li>--}}
                        {{--</div></div>--}}


                        {{--<div class="btn-group dropright">--}}


                            {{--                            @foreach($maincategories as $maincategory)--}}
                            {{--<a href="/category/{{ $maincategory->id }}">{{ $maincategory->name }}</a>--}}
                            {{--@endforeach--}}



                            {{--<ul>--}}
                            {{--@foreach($maincategories as $maincategory)--}}


                                {{--<li class="dropdown-toggle dropdown-toggle-split mt-3"--}}
                                        {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                    {{--{{$maincategory->main_category}}--}}
                                    {{--<div class="dropdown-menu">--}}
                                        {{--<ul>--}}
                                            {{--<br>--}}
                                            {{--<li>--}}

                                                {{--{{$maincategory->waste->category}}--}}
{{--                                                {{ category }}--}}
                                            {{--</li>--}}


                                            {{--                                    @foreach($subcategories as $subcategory)--}}
                                            {{--<a href="/category/{{ $maincategory->id }}">{{$subcategor->category}}</a></li>--}}

                                            {{--@endforeach--}}

                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</li>--}}


                                {{--@endforeach--}}
                             {{--</ul>--}}



                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
            <div class="col-sm-12">


                @if(count($posts) > 0)

                    @foreach($posts as $post)

                        <div class="card mb-3">
                            <div class="card-body">
                                {{--<h4 class="card-header">{{ $post->title }}</h4>--}}
                                <br>
                                <div class="row">
                                    <div class="col-sm-4"><img class="img-fluid"
                                                               src="storage/attachment/{{ $post->attachment }}"
                                                               style="max-height: 100px">
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
                                <a href="/posts/{{ $post->id }}" style="margin-left: 1000px;"
                                   class="btn btn-info btn-sm">View</a>

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





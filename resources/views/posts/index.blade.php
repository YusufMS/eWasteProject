@extends('layouts.main')
@section('title', 'View Posts')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">

                {{--category selection--}}
                    <ul>
                    @foreach($maincategories as $category)
                        @if($category->has('sub_waste_category'))
                            <br>
                                <div class="btn-group dropright">

                            <button type="button" class="btn btn-secondary dropdown-toggle my-1 px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $category->main_category }}
                            </button>

                            <div class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                @foreach($category->sub_waste_category as $subcategory)
                                    <li><a href="#">{{$subcategory->category}}</a></li>
                                @endforeach
                            </div>
                                </div>
                        @else
                            <button type="button" class="btn btn-secondary" aria-haspopup="true" aria-expanded="false">
                                {{ $category->main_category }}
                            </button>

                        @endif

                    @endforeach
                    </ul>

{{--/category selection--}}



            </div>
            <div class="col-sm-9">


                @if(count($posts) > 0)

                    @foreach($posts as $postDetails)

                        <div class="card mb-3">

                            <div class="card-body">




                                {{--<h4 class="card-header">{{ $post->title }}</h4>--}}
                                <br>
                                <div class="row">
                                    <div class="col-sm-4"><img class="img-fluid"
                                                               src="/storage/attachment/{{ $postDetails->attachment }}"
                                                               style="max-height: 100px">
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="card-text">
                                        <h4 style="color: blue">{{ $postDetails->title }}</h4>
{{--                                        {{category add krnna oni}}--}}
{{--                                        {{ $posts->sub_waste_category->category }}--}}
                                        </p>


                                        <a href="/posts/{{ $postDetails->id }}"
                                           class="btn btn-info btn-sm float-right">View</a>

                                        {{--{{ dd($postDetails)}}--}}
                                    </div>
                                    <br>


                                </div>
                                <br>
                                <br>
                                {{--<a href="/posts/{{ $post->id }}" style="margin-left: 630px;" class="btn btn-info btn-sm">View</a>--}}


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





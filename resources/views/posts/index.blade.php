@extends('layouts.main')
@section('title', 'View Posts')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
            @include('partials.messages')
            <h2 class="text-center font-weight-bold">{{$view_title}}</h2>
            <hr>
        <div class="row">
            
            <div class="col-sm-3">

                {{--category selection--}}
                <ul>
                    @foreach($maincategories as $category)
                        @if($category->has('sub_waste_category'))
                            <br>
                            <div class="btn-group dropright">

                                <button type="button" class="btn btn-secondary dropdown-toggle my-1 px-5"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $category->main_category }}
                                </button>

                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->
                                    @foreach($category->sub_waste_category as $subcategory)
                                        <li>
                                            <a href="/postByCategory/{{ $subcategory->id }}">{{$subcategory->category}}</a>
                                        </li>
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
                @if(isset($resultsForCat))
                <div class="text-muted text py-2"><em>Showing results for <strong>{{$resultsForCat}}</strong></em></div>
                @endif
                @if(count($posts) > 0)

                    @foreach($posts as $postDetails)
                    <div class="card mb-4" >
                        
                        <div class="row">
                            <div class="col-sm-4 pr-0">
                                <img class="img-fluid"
                                     src="/storage/attachment/{{ $postDetails->attachment }}"
                                     style="min-height: 70px; min-width: 80px">
                            </div>
                            <div class="col-sm-8 p-0">
                                <div class="card-header">
                                    <h4 class="card-title d-inline">{{$postDetails->title}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-text"><strong>Post Category : </strong>{{  $postDetails->category }}</div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="card-text text-muted">Posted <strong>{{ Carbon::createFromTimestampUTC(strtotime($postDetails->created_at))->diffForHumans() }}</strong> by <strong>{{App\User::where('id',$postDetails->publisher_id)->first()->full_name}}</strong></span>
                            <a href="/posts/{{ $postDetails->id }}" class="btn btn-info btn-sm float-right">View</a>
                        </div>


                    </div>
                    @endforeach
                @else
                    <h3 class="text-center">No posts in Database</h3>
                @endif
            </div>

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





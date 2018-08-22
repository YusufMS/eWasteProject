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

                    {{-- <aside class="col-12 col-md-2 p-0 bg-dark">
            <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start">
                <div class="collapse navbar-collapse">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="#">Link</a>
                        </li>
                        ..
                    </ul>
                </div>
            </nav>
        </aside> --}}
            

                {{--category selection--}}
                <nav class="navbar navbar-expand navbar-dark bg-dark p-0">
                    <div class="collapse navbar-collapse">
                        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                            <div class="lead text-white text-center py-2 bg-primary">CATEGORIES</div>
                            @foreach($maincategories as $category)
                                @if($category->has('sub_waste_category'))
                                    <br>
                                    <div class="btn-group dropright">
                                        
                                        <button type="button" class="btn btn-secondary w-100  py-2 dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ $category->main_category }}
                                        </button>
                                        
                                        <div class="dropdown-menu p-0 bg-dark">
                                            <!-- Dropdown menu links -->
                                            {{-- <ul> --}}
                                            @foreach($category->sub_waste_category as $subcategory)
                                                <li class="nav-link w-100 text-center p-0">
                                                    <a class="btn btn-dark py-1 rounded-0 w-100" href="/postByCategory/{{ $subcategory->id }}">{{$subcategory->category}}</a>
                                                </li>
                                            @endforeach
                                        {{-- </ul> --}}
                                        </div>
                                    </div>
                                @else
                                    <button type="button" class="btn btn-secondary" aria-haspopup="true" aria-expanded="false">
                                        {{ $category->main_category }}
                                    </button>

                                @endif

                            @endforeach
                        </ul>
                    </div>
                </nav>

                {{--/category selection--}}


            </div>

            <div class="col-sm-9">
                @if(isset($resultsForCat))
                    <div class="text-muted text py-2"><em>Showing results for <strong>{{$resultsForCat}}</strong></em>
                    </div>
                @endif
                @if(count($posts) > 0)

                    @foreach($posts as $postDetails)
                        <div class="card mb-4">

                            <div class="row">
                                <div class="col-sm-4 pr-0">
                                    <img class="img-fluid"
                                         src="/storage/attachment/{{ $postDetails->attachment }}"
                                         style="min-height: 90px; min-width: 80px; max-width: 200px; max-height: 220px">
                                </div>
                                <div class="col-sm-8 p-0">
                                    <div class="card-header">
                                        <h4 class="card-title d-inline">{{$postDetails->title}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text"><strong>Post Category
                                                : </strong>{{  $postDetails->category }}</div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <span class="card-text text-muted">Posted <strong>{{ Carbon::createFromTimestampUTC(strtotime($postDetails->created_at))->diffForHumans() }}</strong> by <strong>{{App\User::where('id',$postDetails->publisher_id)->first()->full_name}}</strong></span>
                                <a href="/posts/{{ $postDetails->id }}" class="btn btn-info btn-sm pb-0 float-right" data-toggle="tooltip" title="View Post"><i class="fa fa-eye"></i></a>
                            </div>


                        </div>
                    @endforeach
                @else
                    <h3 class="text-center">No posts in Database</h3>
                @endif
            </div>

            


        </div>

                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>


    </div>

@endsection





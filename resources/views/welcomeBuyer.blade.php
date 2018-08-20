@extends('layouts.main')
@section('title', 'E-Waste Portal')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
    <!--Panel-->
    <div class="jumbotron">

        <h1 class="">Welcome {{ Auth::user()->full_name }},</h1>
        <h1 class="display-3">E-Waste Buyer Portal</h1>
        <p class="lead">
            This is a place where you can get to know about one of the major 
            problems in the modern world, E-Waste...
            <br>
            Get to know about E-Waste, connect with sellers of e-waste and make your purchases easier.
        </p>
        <hr class="my-4">
        <p class="lead font-weight-light">You are <span class="font-weight-bold">Logged In</span> as a <span>Buyer</span></p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/showMyPosts/{{Auth::user()->id}}" role="button">Your Posts</a>
            <a class="btn btn-primary btn-lg" href="/posts" role="button">Portal</a>
            <a class="btn btn-success btn-lg" href="/posts/create" role="button">Create A Post</a>
        </p>
    </div>
    <div class="card">
        <div class="card-header"><h4 class="m-0">Browse our Categories</h4></div>
        <div class="card-group">
            @foreach($main_categories as $main_category)
                <div class="card">
                    <img class="card-img-top" src="{{URL::asset('/storage/category_icon_images/laptops.png')}}">
                    <div class="card-body py-1">
                        {{-- query to take posts for categories should be added to the link --}}
                        <a style="text-decoration:none;" class="" href="#">
                            <h5 class="card-title text-center">{{$main_category->main_category}}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>
    <br>

    {{-- Add footer with laws, methods, standards and other information --}}
              
    </div>
    <!--/.Panel-->
    <hr>
    <footer class="footer">
            
        <div class="container">
                <h3 class="text-info">Site Information</h3>
            <div class="row">
                <div class="col">
                    <h4 class="pt-2 text-dark">Info Topic</h4>
                    <div class="text-muted text-center pb-2">Yusuf@Yusuf-HP MINGW64 /c/wamp64/www/eWasteProject (Ravihansa)
                            $ git checkout Yusuf
                            Switched to branch 'Yusuf'
                            Your branch is up to date with 'origin/Yusuf'.</div>
                    <a href="#" class="btn btn-info float-right mt-2">Read More</a>
                    <br>
                </div>
                <div class="col">
                        <h4 class="pt-2 text-dark">Info Topic</h4>
                        <div class="text-muted text-center pb-2">Yusuf@Yusuf-HP MINGW64 /c/wamp64/www/eWasteProject (Ravihansa)
                                $ git checkout Yusuf
                                Switched to branch 'Yusuf'
                                Your branch is up to date with 'origin/Yusuf'.</div>
                        <a href="#" class="btn btn-info float-right mt-2">Read More</a>
                        <br>
                    </div>
                    <div class="col">
                            <h4 class="pt-2 text-dark">Info Topic</h4>
                            <div class="text-muted text-center pb-2">Yusuf@Yusuf-HP MINGW64 /c/wamp64/www/eWasteProject (Ravihansa)
                                    $ git checkout Yusuf
                                    Switched to branch 'Yusuf'
                                    Your branch is up to date with 'origin/Yusuf'.</div>
                            <a href="#" class="btn btn-info float-right mt-2">Read More</a>
                            <br>
                        </div>
                        <div class="col">
                                <h4 class="pt-2 text-dark">Info Topic</h4>
                                <div class="text-muted text-center pb-2">Yusuf@Yusuf-HP MINGW64 /c/wamp64/www/eWasteProject (Ravihansa)
                                        $ git checkout Yusuf
                                        Switched to branch 'Yusuf'
                                        Your branch is up to date with 'origin/Yusuf'.</div>
                                <a href="#" class="btn btn-info float-right mt-2">Read More</a>
                                <br>
                            </div>
                            <div class="col">
                                    <h4 class="pt-2 text-dark">Info Topic</h4>
                                    <div class="text-muted text-center pb-2">Yusuf@Yusuf-HP MINGW64 /c/wamp64/www/eWasteProject (Ravihansa)
                                            $ git checkout Yusuf
                                            Switched to branch 'Yusuf'
                                            Your branch is up to date with 'origin/Yusuf'.</div>
                                    <a href="#" class="btn btn-info float-right mt-2">Read More</a>
                                    <br>
                                </div>
            </div>
            <br>
        </div>
    </footer>
@endsection
       
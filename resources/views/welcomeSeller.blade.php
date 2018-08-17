@extends('layouts.main')
@section('title', 'E-Waste Portal')
@include('layouts.navbar')
@section('body')

    <br>
    <br>
    <div class="container">
        <!--Panel-->
        <div class="jumbotron">

            <h1 class="">Welcome {{ Auth::user()->full_name }},</h1>

            <h1 class="display-3">E-Waste Seller Portal</h1>
            <p class="lead">
                This is a place where you can get to know about one of the major 
                problems in the modern world, E-Waste...
                <br>
                Get to know about E-Waste, connect with buyers of e-waste and make maximum out of disposing your waste.
            </p>
            <hr class="my-4">
            <p class="lead font-weight-light">You are <span class="font-weight-bold">Logged In</span> as a <span>Buyer</span></p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">View Own Posts</a>
                <a class="btn btn-primary btn-lg" href="#" role="button">View All Posts</a>
                <a class="btn btn-success btn-lg" href="#" role="button">Create A Post</a>
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
            </div>
        @endsection
               
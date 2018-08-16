@extends('layouts.main')
@section('title', 'E-Waste Portal')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
    <!--Panel-->
    <div class="jumbotron">
        <h1 class="display-3">E-Waste Portal</h1>
        <p class="lead">
            This is a place where you can get to know about one of the major 
            problems in the modern world, E-Waste...
            <br>
            Get to know about E-Waste, connect with buyers and sellers of e-waste here.
        </p>
        <hr class="my-4">
        <p>Register as a buyer or seller to start managing your e-waste and getting into e-waste transactions</p>
        <p>Login if you already have an account</p>
        {{-- <p class="lead"> --}}
            {{-- <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register as a Seller</a> --}}
            {{-- <a class="btn btn-primary btn-lg" href="{{ route('regBuyer') }}" role="button">Register as a Buyer</a> --}}
            {{-- <a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Login</a> --}}
        {{-- </p> --}}
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
       
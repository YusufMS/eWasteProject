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
                Get to know about E-Waste, connect with buyers and sellers here.
            </p>
            <hr class="my-4">
            <p>Register as a buyer or seller to start managing your e-waste and getting into e-waste transactions</p>
            <p>Login if you already have an account</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Add an Advertisement</a>
                {{--<a class="btn btn-primary btn-lg" href="#" role="button">Register as a Buyer</a>--}}
                {{--<a class="btn btn-success btn-lg" href="#" role="button">Login</a>--}}
            </p>
        </div>
        <div class="card ">
            <div class="card-header black white-text">
                <h5>E-Waste Portal</h5>
            </div>
            <div class="card-body">
                {{-- @include('partials.messages') --}}
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </div>
        </div>
        <br>
        <div class="card-deck">
            <div class="row">

                <div class="col-md-4">
                    <div class="card text-white bg-dark h-200">
                        <div class="card-header">WEEE Standards</div>
                        <img class="card-img-top" src="{{URL::asset('/post_images/homeImage1.jpeg')}}">
                        <div class="card-body">
                            <h4 class="card-title">Light card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-dark h-200">
                        <div class="card-header">International E-Waste Day</div>
                        <img class="card-img-top" src="{{URL::asset('/post_images/homeImage2.jpg')}}">
                        <div class="card-body">
                            <h4 class="card-title">Light card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-dark">
                        <div class="card-header">Header</div>
                        <img class="card-img-top" src="{{URL::asset('/post_images/homeImage3.jpg')}}">
                        <div class="card-body">
                            <h4 class="card-title">Dark card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--/.Panel-->
    </div>
@endsection

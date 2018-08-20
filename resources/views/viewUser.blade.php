@extends('layouts.main')
@section('title','Profile')
@section('style')
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    {{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">--}}

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />--}}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>--}}

    {{--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}

    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">--}}

    {{--<link href="{{ asset('css/preview.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="styles/5star.css">

    .rate-area {
    float: left;
    border-style: none;
    }

    .rate-area:not(:checked) > input {
    position: absolute;
    top: -9999px;
    clip: rect(0,0,0,0);
    }

    .rate-area:not(:checked) > label {
    float: right;
    width: 1em;
    padding: 0 .1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 400%;
    line-height: 1.2;
    color: lightgrey;
    text-shadow: 1px 1px #bbb;
    }

    .rate-area:not(:checked) > label:before { content: '★ '; }

    .rate-area > input:checked ~ label {
    color: gold;
    text-shadow: 1px 1px #c60;
    font-size: 450% !important;
    }

    .rate-area:not(:checked) > label:hover, .rate-area:not(:checked) > label:hover ~ label { color: gold; }

    .rate-area > input:checked + label:hover, .rate-area > input:checked + label:hover ~ label, .rate-area > input:checked ~ label:hover, .rate-area > input:checked ~ label:hover ~ label, .rate-area > label:hover ~ input:checked ~ label {
    color: gold;
    text-shadow: 1px 1px goldenrod;
    }

    .rate-area > label:active {
    position: relative;
    top: 2px;
    left: 2px;
    }


@endsection



@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
    @include('partials.messages')
    <!--Panel-->


        <div class="row">
            <div class="col-lg-12">


                {{--<div class="row">--}}
                {{--<i class="fas fa-star"></i>--}}


                <div class="table-responsive table-bordered">
                    <table class="table">
                        {{--<tbody>--}}
                        <tr>

                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>

                            @if(auth()->user()->_usertype == "seller")
                                <th>Buyer Category</th>
                                <th> Web Site URL</th>
                                <th>Ratings</th>
                                <th>Joined On</th>
                                <th>Rate</th>

                            @elseif(auth()->user()->_usertype == "buyer/seller")

                                @if(Session::has('user_role'))

                                    @if(Session::get('user_role') == 'seller')
                                        <th>Buyer Category</th>
                                        <th> Web Site URL</th>
                                        <th>Ratings</th>
                                        <th>Joined On</th>
                                        <th>Rate</th>

                                    @elseif(Session::get('user_role') == 'buyer')
                                        <th>Joined On</th>

                                    @endif

                                @endif
                            @endif


                        </tr>

                        @if(count($users) > 0)

                            @foreach($users as $usr)


{{--                                {{ dd($users) }}--}}

                                <tr>
                                    <td>{{ $usr->first_name . $usr->last_name }}</td>
                                    <td>{{ $usr->address }}</td>
                                    <td>{{ $usr->phone }}</td>


                                    @if(auth()->user()->_usertype == "seller")

                                        <td>{{ $usr->type }}</td>
                                        <td> {{ $usr->website }}</td>
                                        <td> {{ $usr->rating }}</td>
                                        <td>{{ date('h: i a', strtotime($usr->created_at) )}}
                                            on {{ date('F j, Y', strtotime($usr->created_at) )}}</td>
                                        <td>
                                         <span data-toggle="modal" data-target="#myModal">
                                        <button type='submit' class='btn btn-primary' id="ratebtn">Rate</button>
                                         </span>
                                            @include('rate')
                                        </td>


                                    @elseif(auth()->user()->_usertype == "buyer/seller")

                                        @if(Session::has('user_role'))

                                            @if(Session::get('user_role') == 'seller')

                                                <td>{{ $usr->type }}</td>
                                                <td> {{ $usr->website }}</td>
                                                <td> {{ $usr->rating }}</td>

                                                <td>{{ date('h: i a', strtotime($usr->created_at) )}}
                                                    on {{ date('F j, Y', strtotime($usr->created_at) )}}</td>
                                                <td>


                                                <button type='submit' class='btn btn-primary'   data-toggle="modal" data-target="#myModal{{ $usr->buyer_id }}" name="rate" >Rate</button>
                                                    @include('rate')
                                                </td>


                                            @else
                                                <td>{{ date('h: i a', strtotime($usr->created_at) )}}
                                                    on {{ date('F j, Y', strtotime($usr->created_at) )}}</td>


                                            @endif


                                        @endif


                                    @endif


                                </tr>









                                {{--@php $rating = 3.1; @endphp--}}
                                {{--<div class="placeholder" style="color: lightgray;">--}}
                                {{--<i class="far fa-star"></i>--}}
                                {{--<i class="far fa-star"></i>--}}
                                {{--<i class="far fa-star"></i>--}}
                                {{--<i class="far fa-star"></i>--}}
                                {{--<i class="far fa-star"></i>--}}
                                {{--<span class="small">({{ $rating }})</span>--}}
                                {{--</div>--}}

                                {{--<div class="overlay" style="position: relative;top: -22px;">--}}

                                {{--@while($rating>0)--}}
                                {{--@if($rating >0.5)--}}
                                {{--<i class="fas fa-star"></i>--}}
                                {{--@else--}}
                                {{--<i class="fas fa-star-half"></i>--}}
                                {{--@endif--}}
                                {{--@php $rating--; @endphp--}}
                                {{--@endwhile--}}

                                {{--</div>--}}




                                {{--rate--}}





                            @endforeach
                        @endif
                        {{--</tbody>--}}
                    </table>
                </div>
                <br>

            </div>
        </div>









    </div>





















    </div>


@endsection
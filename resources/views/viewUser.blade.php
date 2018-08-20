@extends('layouts.main')
@section('title','Profile')
@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <link href="{{ asset('css/preview.css') }}" rel="stylesheet">
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
                                        <th>Web Site URL</th>
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
                                        <td style="width: 120px">

                                            {{--display ratings--}}
                                            @if($usr->no_of_raters != 0)


                                            @php $rating = $usr->rating /$usr->no_of_raters; @endphp
                                            @foreach(range(1,5) as $i)
                                                <span class="fa-stack" style="width:1em">
                                                        <i class="far fa-star fa-stack-1x"></i>

                                                    @if($rating >0)
                                                        @if($rating >0.5)
                                                            <i class="fas fa-star fa-stack-1x"></i>
                                                        @else
                                                            <i class="fas fa-star-half fa-stack-1x"></i>
                                                        @endif
                                                    @endif
                                                    @php $rating--; @endphp
                                                        </span>
                                            @endforeach
                                            <br>
                                               ( {{number_format($usr->rating /$usr->no_of_raters, 2, '.', ',')}} )


                                            @else
                                                Still Not Rated.
                                            @endif
                                            {{--end display ratings--}}

                                        </td>

                                        <td>{{ date('h: i a', strtotime($usr->created_at) )}}
                                            on {{ date('F j, Y', strtotime($usr->created_at) )}}</td>
                                        <td>
{{--                                         <span data-toggle="modal" data-target="#myModal{{ $usr->buyer_id }}">--}}
                                        <button type='submit' class='btn btn-primary' id="ratebtn{{ $usr->buyer_id }}" class='btn btn-primary' data-toggle="modal"
                                                data-target="#myModal{{ $usr->buyer_id }}" name="rate"  >Rate</button>
                                         {{--</span>--}}
                                            @include('rate')
                                        </td>


                                    @elseif(auth()->user()->_usertype == "buyer/seller")

                                        @if(Session::has('user_role'))

                                            @if(Session::get('user_role') == 'seller')

                                                <td>{{ $usr->type }}</td>
                                                <td> {{ $usr->website }}</td>

                                                <td style="width: 120px">

                                                    {{--display ratings--}}
                                                    @if($usr->no_of_raters != 0)


                                                        @php $rating = $usr->rating /$usr->no_of_raters; @endphp
                                                        @foreach(range(1,5) as $i)
                                                            <span class="fa-stack" style="width:1em">
                                                        <i class="far fa-star fa-stack-1x"></i>

                                                                @if($rating >0)
                                                                    @if($rating >0.5)
                                                                        <i class="fas fa-star fa-stack-1x"></i>
                                                                    @else
                                                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                                                    @endif
                                                                @endif
                                                                @php $rating--; @endphp
                                                        </span>
                                                        @endforeach

<br>
                                                        ( {{number_format($usr->rating /$usr->no_of_raters, 2, '.', ',')}} )

                                                    @else
                                                        Still Not Rated.
                                                    @endif
                                                    {{--end display ratings--}}

                                                </td>






                                                {{--                                                <td> {{ $usr->rating }}</td>--}}

                                                <td>{{ date('h: i a', strtotime($usr->created_at) )}}
                                                    on {{ date('F j, Y', strtotime($usr->created_at) )}}</td>
                                                <td>


                                                    <button type='submit' class='btn btn-primary rateIt' data-toggle="modal"
                                                                data-target="#myModal{{ $usr->buyer_id }}" name="rate" id="ratebtn{{ $usr->buyer_id }}" value="ratebtn{{ $usr->buyer_id }}">Rate
                                                    </button>

                                                    @include('rate')
                                                </td>


                                            @else
                                                <td>{{ date('h: i a', strtotime($usr->created_at) )}}
                                                    on {{ date('F j, Y', strtotime($usr->created_at) )}}</td>


                                            @endif


                                        @endif


                                    @endif


                                </tr>




                            @endforeach
                        @endif
                        {{--</tbody>--}}
                    </table>
                </div>
                <br>

            </div>
        </div>


    </div>







    <script>

        $(function() {

            $(document).ready(function () {
                $("form").submit(function () {
                    $("submitBtn<?php $usr->buyer_id; ?>").attr("disabled", true);
                    alert("<?php $usr->buyer_id; ?>");
                    return true;
                });
            });


        })
    </script>






@endsection
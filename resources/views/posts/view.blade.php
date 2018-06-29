@extends('layouts.main')
@section('title', 'Posts')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">


        <div class="card mb-3">
            
            <div class="card-body">
            
                <hr>
                <div class="card-header"><h4>{{ $post->title }}</h4>
                    <br>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <div class="row">
                            <div class="col-sm-7">
                                Published by : {{ $post->publisher_id }}
                            </div>
                            <div class="col-sm-5">
                                Created on: {{ date('F d, Y', strtotime($post->created_at)) }}
                                at {{ Carbon\Carbon::parse($post->created_at)->format('g:i A') }}
                                ( {{ Carbon::createFromTimestampUTC(strtotime($post->updated_at))->diffForHumans() }})

                            </div>
                        </div>
                    </h6>
                </div>

                <br>
                <div>
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="img-fluid img-thumbnail img-responsive" src="/storage/attachment/{{ $post->attachment }}" style="max-height: 400px; width:450px">
                        </div>
                        <div class="col-sm-6">
                            <p class="card-text">{{ $post->content }}</p>
                           </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="float-right">
                    {{--<a type="button" class="btn btn-info" href="/contactDetails/{{ $post->publisher_id }}"><i class="fa fa-address-book" style="font-size:30px;padding-right: 10px"></i>Contact Details</a>--}}

                    {{-- tooltip added buttons --}}
                    <a href="/posts" class="btn btn-primary" data-toggle="tooltip" title="Go Back"><i class="fa fa-arrow-left"></i></a>
                    <span data-toggle="modal" data-target="#myModal">
                        <button type="button" class="btn btn-info" data-toggle="tooltip" title="Contact Details"><i class="fa fa-address-card"></i></button>
                    </span>
                    <button type="button" class="btn btn-success" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></button>
                    
                </div>

            </div>
            <br>
            <br>
        </div>
        <br>


    </div>
    </div>




    {{-- <div class="modal fade" id="myModal" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title">Modal Header</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<p>Some text in the modal.</p>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div> --}}




    <div class="modal" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form role="form">
                        <div class="form-group">
                            <label for="contactno"><i class="fa fa-phone" style="margin-right: 10px"></i>Contact Number</label>
                            <input type="text" readonly class="form-control" id="contactno" value="{{ $seller->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address"><i class="fa fa-location-arrow" style="margin-right: 10px"></i>Address</label>
                            <input type="text" readonly class="form-control" id="address" value="{{ $seller->address }}" >
                        </div>
                        </form>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>








    {{--@endforeach--}}


    </div>
    </div>

    </div>
@endsection
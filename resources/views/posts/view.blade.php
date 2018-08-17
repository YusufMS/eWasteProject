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
                                Published by : {{ $post->user->full_name }}
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
                    <a href="{{url()->previous()}}" class="btn btn-primary" data-toggle="tooltip" title="Go Back"><i class="fa fa-arrow-left"></i></a>
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
                        <div class="form-group form-inline">
                            <i class="fa fa-phone" style="margin-right: 10px" data-toggle="tooltip" title="Contact Number"></i>
                            <div id="contactno" style="margin-left: 40px; color: darkgreen" data-last={{substr($seller->phone,3,7)}}><b> {{substr($seller->phone,0,3)}}<span>XXXXXXX</span></b></div>
                            {{--<input type="text" readonly class="form-control" id="contactno" data-last= substr($seller->phone,7) value= substr($seller->phone,3)><span>XXXXXXX</span>--}}
                            <span class="show-number" style="margin-left: 20px; font-size: small">(Click to show phone number)</span>
                        </div>

                      <div class="form-group form-inline">
                          <i class="fa fa-envelope" style="margin-right: 10px" data-toggle="tooltip" title="E-mail"></i>
                          {{--<input type="text" readonly class="form-control" id="address" value="{{ $seller->address }}" >--}}
                          <div id="address" style="margin-left: 40px; color: darkgreen"><b>{{ $seller->email }}</b> </div>
                      </div>

                        <div class="form-group form-inline">
                            <i class="fa fa-location-arrow" style="margin-right: 10px" data-toggle="tooltip" title="Address"></i>
                            {{--<input type="text" readonly class="form-control" id="address" value="{{ $seller->address }}" >--}}
                            <div id="address" style="margin-left: 40px; color: darkgreen"><b>{{ $seller->address }}</b> </div>
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


    <script type="text/javascript">
        $('#contactno').click(function() {
            $(this).find('span').text( $(this).data('last') );
        });

    </script>


@endsection
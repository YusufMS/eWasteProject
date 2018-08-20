<div class="modal" id="myModal{{ $usr->buyer_id }}">
    <div class="container">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">Rate for Buyer:</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            data-toggle="tooltip">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--<div class="details col-md-10">--}}
                <div class="modal-body">

{{--//this submit same form --}}
                    <form method="POST" action="/rateBuyers/{{$usr->buyer_id}}">
                        {{ csrf_field() }}


                        {{ $usr->buyer_id }}
                        <div class="form-group  row mb-3">
                            <ul class="rate-area">
                                <input type="radio" id="5-star{{ $usr->buyer_id }}" name="rating" value="5"/><label for="5-star{{ $usr->buyer_id }}"
                                                                                                title="Amazing">5
                                    stars</label>
                                <input type="radio" id="4-star{{ $usr->buyer_id }}" name="rating" value="4"/><label for="4-star{{ $usr->buyer_id }}"
                                                                                                title="Good">4
                                    stars</label>
                                <input type="radio" id="3-star{{ $usr->buyer_id }}" name="rating" value="3"/><label for="3-star{{ $usr->buyer_id }}"
                                                                                                title="Average">3
                                    stars</label>
                                <input type="radio" id="2-star{{ $usr->buyer_id }}" name="rating" value="2"/><label for="2-star{{ $usr->buyer_id }}"
                                                                                                title="Not Good">2
                                    stars</label>
                                <input type="radio" id="1-star{{ $usr->buyer_id }}" name="rating" value="1"/><label for="1-star{{ $usr->buyer_id }}"
                                                                                                title="Bad">1
                                    star</label>
                            </ul>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right" name="submitBtn{{$usr->buyer_id}}">Submit</button>

                        </div>
                    </form>
                </div>
                {{--</div>--}}

            </div>


        </div>
    </div>
</div>


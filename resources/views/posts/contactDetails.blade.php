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
                        <i class="fa fa-phone" style="margin-right: 10px" data-toggle="tooltip"
                           title="Contact Number"></i>
                        <div id="contactno" style="margin-left: 40px; color: darkgreen"
                             data-last={{substr($seller->phone,3,7)}}><b> {{substr($seller->phone,0,3)}}<span>XXXXXXX</span></b>
                        </div>
                        {{--<input type="text" readonly class="form-control" id="contactno" data-last= substr($seller->phone,7) value= substr($seller->phone,3)><span>XXXXXXX</span>--}}
                        <span class="show-number" style="margin-left: 20px; font-size: small">(Click to show phone number)</span>
                    </div>

                    <div class="form-group form-inline">
                        <i class="fa fa-envelope" style="margin-right: 10px" data-toggle="tooltip"
                           title="E-mail"></i>
                        {{--<input type="text" readonly class="form-control" id="address" value="{{ $seller->address }}" >--}}
                        <div id="address" style="margin-left: 40px; color: darkgreen"><b>{{ $seller->email }}</b>
                        </div>
                    </div>

                    <div class="form-group form-inline">
                        <i class="fa fa-location-arrow" style="margin-right: 10px" data-toggle="tooltip"
                           title="Address"></i>
                        {{--<input type="text" readonly class="form-control" id="address" value="{{ $seller->address }}" >--}}
                        <div id="address" style="margin-left: 40px; color: darkgreen"><b>{{ $seller->address }}</b>
                        </div>
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
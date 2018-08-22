<div class="card my-4">
    <div class="card-header lead font-weight-normal">Comments</div>
    <div class="card-body">
        <div class="media bg-light border p-3 mb-3">
            {{-- <img class="rounded-circle mr-3" src="{{asset('storage/images/profilePhoto/' . $current_commentor_photo)}}" alt="" style="width:50px;"> --}}


            {!! Form::open(['action' => ['commentController@store', 'post_id' => $post->id] , 'method' => 'POST', 'class' => 'form-control-range']) !!}
            <div class="form-group m-0">
                {{Form::label('comment', 'Enter your Comment')}}
                {{Form::text('comment', '', ['class' => 'form-control'])}}
            </div>
            <div>
                {{Form::submit('Comment', ['class' => 'btn btn-primary float-right mt-2'], ['onclick' => "viewComments()"])}}
            </div>
            {!! Form::close() !!}


        </div>
        @foreach($comments as $comment)
            <div class="media border p-3">

                {{-- <img class="rounded-circle mr-3" src="{{asset('storage/images/profilePhoto/' . $commentors->find($comment->user_id)->profileImage)}}" alt="" style="width:50px;"> --}}

                <div>
                    <h6 class="font-weight-bold m-0 text-primary">{{$commentors->find($comment->user_id)->full_name}}</h6>
                    <hr class="p-0 m-0">
                    <div>
                        <div>{{$comment->comment_text}}</div>
                        <small class="text-muted ">{{$comment->formatted_created_date}}</small>

                        {{--<button id="replyBtn" onclick="reply(this)"> </button>--}}
                    </div>
                </div>





                {{--<div class="card-body" id="replyView" style="display:none">--}}
                    {{--<div class="media bg-light border p-3 mb-3">--}}
                        {{-- <img class="rounded-circle mr-3" src="{{asset('storage/images/profilePhoto/' . $current_commentor_photo)}}" alt="" style="width:50px;"> --}}


                        {{--{!! Form::open(['action' => ['commentController@store'], 'method' => 'POST', 'class' => 'form-control-range']) !!}--}}
                        {{--<div class="form-group m-0">--}}
                            {{--{{Form::label('comment', 'Enter your Comment')}}--}}
                            {{--{{Form::text('comment', '', ['class' => 'form-control'])}}--}}
                        {{--</div>--}}
                        {{--<div>--}}
                            {{--{{Form::submit('Comment', ['class' => 'btn btn-primary float-right mt-2'], ['onclick' => "viewComments()"])}}--}}
                        {{--</div>--}}
                        {{--{!! Form::close() !!}--}}


                    {{--</div>--}}
                {{--</div>--}}






            </div>
        @endforeach
    </div>
</div>



@extends('layouts.main')


@section('body')

    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    @include('layouts.navbar')
    <br>
    <br>


    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-5">--}}
                {{--<div class="panel panel-primary">--}}
                    {{--<div class="panel-heading" id="accordion">--}}
                        {{--<span class="glyphicon glyphicon-comment"></span> Chat--}}
                        {{--<div class="btn-group pull-right">--}}
                            {{--<a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">--}}
                                {{--<span class="glyphicon glyphicon-chevron-down"></span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel-collapse collapse" id="collapseOne">--}}
                        {{--<div class="panel-body">--}}

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Chats</div>

                                            <div class="panel-body">
                                                <chat-messages :messages="messages"></chat-messages>
                                            </div>
                                            <div class="panel-footer">
                                                <chat-form
                                                        v-on:messagesent="addMessage"
                                                        :user="{{ Auth::user() }}"
                                                ></chat-form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="panel-footer">--}}
                            {{--<div class="input-group">--}}
                                {{--<input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />--}}
                                {{--<span class="input-group-btn">--}}
                            {{--<a class="btn btn-warning btn-sm" id="btn-chat" href="/messages">--}}
                                {{--Send</a>--}}
                        {{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}






@endsection
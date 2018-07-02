@extends('layouts.main')
@section('title','Profile')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
            @include('partials.messages')
    <!--Panel-->
    <div class="card ">
        <div class="card-header black white-text">
            <h5>
                Personal Profile
            </h5>
        </div>
        <div class="card-body">
            <table class="table">
                {{-- <thead>
                  <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Column heading</th>

                  </tr>
                </thead> --}}
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">E-Mail</th>
                        <td>{{$userlog->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Profile Type</th>
                        <td>{{$userlog->_usertype}}</td>
                    </tr>
                    @if (isset($user->type))
                        @if ($user->type)
                            <tr>
                                <th scope="row">User Type</th>
                                <td>{{$user->type}}</td>
                            </tr>
                        @endif
                    @endif
                    @if ($user->address)
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{$user->address}}</td>
                        </tr>
                    @endif
                    @if ($user->phone)
                        <tr>
                            <th scope="row">Telephone Number</th>
                            <td>{{$user->phone}}</td>
                        </tr>
                    @endif
                    @if (isset($user->rating))
                        @if ($user->rating)
                            <tr>
                                <th scope="row">User ratings</th>
                                <td>{{$user->rating}}</td>
                            </tr>
                        @endif
                    @endif
                    @if ($user->description)
                        <tr>
                            <th scope="row">Description</th>
                            <td>{{$user->description}}</td>
                        </tr>
                    @endif
                    @if ($user->created_at)
                        <tr>
                            <th scope="row">Profile Created at</th>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    @endif

                </tbody>
            </table>
            <br>
            <div class="float-right">
                <a class="btn btn-primary" href="/home" data-toggle="tooltip" title="Go Back Home"><i class="fa fa-arrow-left"></i></a>
                <a class="btn btn-info" href="{{asset('profile/' . $userlog->id . '/edit')}}" data-toggle="tooltip" title="Edit Profile"><i class="fa fa-edit"></i></a>
            </div>
              
            </div>
    </div>
    <br><br>
    </div>


  
@endsection
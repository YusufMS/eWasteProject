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
                        <td>{{$common_user_info->full_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">E-Mail</th>
                        <td>{{$common_user_info->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Profile Type</th>
                        <td>{{$common_user_info->_usertype}}</td>
                    </tr>
                    @if (isset($specific_user_info->type))
                        @if ($specific_user_info->type)
                            <tr>
                                <th scope="row">User Type</th>
                                <td>{{$specific_user_info->type}}</td>
                            </tr>
                        @endif
                    @endif
                    @if ($common_user_info->address)
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{$common_user_info->address}}</td>
                        </tr>
                    @endif
                    @if ($common_user_info->phone)
                        <tr>
                            <th scope="row">Telephone Number</th>
                            <td>{{$common_user_info->phone}}</td>
                        </tr>
                    @endif
                    @if (isset($specific_user_info->rating))
                        @if ($specific_user_info->rating)
                            <tr>
                                <th scope="row">User ratings</th>
                                <td>{{$specific_user_info->rating}}</td>
                            </tr>
                        @endif
                    @endif
                    @if ($common_user_info->description)
                        <tr>
                            <th scope="row">Description</th>
                            <td>{{$common_user_info->description}}</td>
                        </tr>
                    @endif
                    @if ($common_user_info->created_at)
                        <tr>
                            <th scope="row">Profile Created at</th>
                            <td>{{$common_user_info->created_at}}</td>
                        </tr>
                    @endif

                </tbody>
            </table>
            <br>
            <div class="float-right">
                <a class="btn btn-primary" href="/home" data-toggle="tooltip" title="Go Back Home"><i class="fa fa-arrow-left"></i></a>
                <a class="btn btn-info" href="{{asset('profile/' . $common_user_info->id . '/edit')}}" data-toggle="tooltip" title="Edit Profile"><i class="fa fa-edit"></i></a>
            </div>
              
            </div>
    </div>
    <br><br>
    </div>


  
@endsection
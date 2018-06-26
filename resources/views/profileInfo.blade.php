@extends('layouts.main')
@section('title','Profile')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
    <!--Panel-->
    <div class="card ">
        <div class="card-header black white-text">
            <h5>
                Personal Profile
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                {{-- <thead>
                  <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Column heading</th>

                  </tr>
                </thead> --}}
                <tbody>
                    <tr class="table-hover">
                        <th scope="row">Name</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr class="table-hover">
                        <th scope="row">E-Mail</th>
                        <td>{{$userlog->email}}</td>
                    </tr>
                    <tr class="table-hover">
                        <th scope="row">Profile Type</th>
                        <td>{{$userlog->_usertype}}</td>
                    </tr>
                    @if (isset($user->type))
                        @if ($user->type)
                            <tr class="table-hover">
                                <th scope="row">User Type</th>
                                <td>{{$user->type}}</td>
                            </tr>
                        @endif
                    @endif
                    @if ($user->address)
                        <tr class="table-hover">
                            <th scope="row">Address</th>
                            <td>{{$user->address}}</td>
                        </tr>
                    @endif
                    @if ($user->phone)
                        <tr class="table-hover">
                            <th scope="row">Telephone Number</th>
                            <td>{{$user->phone}}</td>
                        </tr>
                    @endif
                    @if (isset($user->rating))
                        @if ($user->rating)
                            <tr class="table-hover">
                                <th scope="row">User ratings</th>
                                <td>{{$user->rating}}</td>
                            </tr>
                        @endif
                    @endif
                    @if ($user->description)
                        <tr class="table-hover">
                            <th scope="row">Description</th>
                            <td>{{$user->description}}</td>
                        </tr>
                    @endif
                    @if ($user->created_at)
                        <tr class="table-hover">
                            <th scope="row">Profile Created at</th>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    @endif

                </tbody>
              </table>
              <br>
              <a type="button" class="btn btn-secondary" href="/home">Go Back</a>
              <a class="btn btn-info" type="button" href="">Edit</a>
            </div>
    </div>
    <br><br>
    </div>


  
@endsection
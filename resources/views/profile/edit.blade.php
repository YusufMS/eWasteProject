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
                <form class="form-horizontal" method="POST" action="{{ route('profileUpdate', $userlog->id) }}"
                enctype="multipart/form-data">
              {{ csrf_field() }}
                {{form::hidden('_method', 'PUT')}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" value="{{$user->name}}" name="name" required>
                </div>

                {{-- Should Enable after fixing the login --}}
                {{-- <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input id="email" class="form-control" type="text" value="{{$userlog->email}}" name="email" required>
                </div> --}}

                {{-- should be added after fixing login
                <div class="form-group">
                    <label for="profileType">Profile Type</label>
                    <select class="form-control" name="profileType" required>
                        @if($userlog->_usertype == 'seller')
                            <option value="buyer" name="category">Buyer</option>
                            <option value="seller" name="category" selected>Seller</option>
                        @elseif($userlog->_usertype == 'buyer')
                            <option value="buyer" name="category" selected>Buyer</option>
                            <option value="seller" name="category">Seller</option>
                        @endif
                    </select>
                </div> --}}

                
                <div class="form-group">
                    <label for="address">Address</label>
                    @if (isset($user->address))
                    <input id="address" class="form-control" type="text" value="{{$user->address}}" name="address" required>
                    @else
                    <input id="address" class="form-control" type="text" value="" name="address" required>
                    @endif
                </div>
                

                
                <div class="form-group">
                    <label for="telephone">Contact Number</label>
                    @if (isset($user->phone))
                    <input id="telephone" class="form-control" type="text" value="{{$user->phone}}" name="telephone" required>
                    @else
                    <input id="telephone" class="form-control" type="text" value="" name="telephone" required>
                    @endif
                </div>
                

                {{-- @if (isset($user->rating)) 
                <div class="form-group">
                    <label for="ratings">Ratings</label>
                    <input id="ratings" class="form-control" type="text" value="{{$user->rating}}" name="rating" required>
                </div>
                @endif --}}
                
                
                <div class="form-group">
                    <label for="description">Description</label>
                    @if (isset($user->description))
                    <textarea id="description" class="form-control" name="description">{{$user->description}}</textarea>
                    @else
                    <textarea id="description" class="form-control" name="description"></textarea>
                    @endif
                </div>
                
              

              <div class="form-group float-right">
                  <a class="btn btn-primary" href="/home" data-toggle="tooltip" title="Go Back Home"><i class="fa fa-arrow-left"></i></a>
                  <button type="reset" class="btn btn-warning" data-toggle="tooltip" title="Reset Fields"><i class="fa fa-undo"></i></button>
                  <button type="submit" class="btn btn-success" name="submit" data-toggle="tooltip" title="Update Post"><i class="fa fa-edit"></i></button>
                  
              </div>
            </form>
              
            </div>
    </div>
    <br><br>
    </div>


  
@endsection
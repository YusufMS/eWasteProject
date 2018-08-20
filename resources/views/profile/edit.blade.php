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
            <h3 class="text-center font-weight-bold">
                Personal Profile
            </h3>
        </div>
        <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('profileUpdate', $common_user_info->id) }}"
                enctype="multipart/form-data">
              {{ csrf_field() }}
                {{form::hidden('_method', 'PUT')}}

                <div class="form-group">
                    <label for="name">First Name<span class="text-danger"> *</span></label>
                    <input id="name" class="form-control" type="text" value="{{$common_user_info->first_name}}" name="firstName" required>
                </div>
                <div class="form-group">
                        <label for="name">Last Name<span class="text-danger"> *</span></label>
                        <input id="name" class="form-control" type="text" value="{{$common_user_info->last_name}}" name="lastName" required>
                    </div>

                {{-- Should Enable after fixing the login --}}
                {{-- <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input id="email" class="form-control" type="text" value="{{$userlog->email}}" name="email" required>
                </div> --}}

                <div class="form-group">
                    <label for="profileType">Profile Type<span class="text-danger"> *</span></label>
                    <select class="form-control" name="profileType" required>
                        @if($common_user_info->_usertype == 'seller')
                            <option value="buyer" name="category">Buyer</option>
                            <option value="seller" name="category" selected>Seller</option>
                            <option value="buyer/seller" name="category">Buyer / Seller</option>
                        @elseif($common_user_info->_usertype == 'buyer')
                            <option value="buyer" name="category" selected>Buyer</option>
                            <option value="seller" name="category">Seller</option>
                            <option value="buyer/seller" name="category">Buyer / Seller</option>
                        @elseif($common_user_info->_usertype == 'buyer/seller')
                            <option value="buyer" name="category">Buyer</option>
                            <option value="seller" name="category">Seller</option>
                            <option value="buyer/seller" name="category" selected>Buyer / Seller</option>
                        @endif
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="address">Address<span class="text-danger"> *</span></label>
                    @if (isset($common_user_info->address))
                    <input id="address" class="form-control" type="text" value="{{$common_user_info->address}}" name="address" required>
                    @else
                    <input id="address" class="form-control" type="text" value="" name="address">
                    @endif
                </div>
                

                
                <div class="form-group">
                    <label for="telephone">Contact Number<span class="text-danger"> *</span></label>
                    @if (isset($common_user_info->phone))
                    <input id="telephone" class="form-control" type="text" value="{{$common_user_info->phone}}" name="telephone">
                    @else
                    <input id="telephone" class="form-control" type="text" value="" name="telephone">
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
                    @if (isset($common_user_info->description))
                    <textarea id="description" class="form-control" name="description">{{$common_user_info->description}}</textarea>
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
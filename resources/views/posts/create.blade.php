@extends('layouts.main')
@section('style')

@endsection

@section('title', 'Add Post')
@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
        <!--Panel-->
        <div class="card ">
            <div class="card-header text-center">
                <h3 class="font-weight-bold">Create Post</h3>
            </div>
            <div class="card-body">

                @include('partials.messages')

                <form class="form-horizontal" method="POST" action="{{ route('posts.store') }}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="topic">Post Title<span class="text-danger"> *</span></label>
                        <input id="title" class="form-control" type="text" name="title" placeholder="Ex: Mother Boards of Dell Computers in Bulk">
                        <small class="text-muted">Providing a clear title can make your post stand out and easy to understand. Provide within 100 charecters</small>
                    </div>

                    <div class="form-group">
                        <label for="category">E waste Category<span class="text-danger"> *</span></label>
                        <select class="form-control" name="category">
                            <option placeholder="Select" disabled selected>Select Category</option>

                            @foreach($cat as $category)
                                <option value="{{ $category->category}}"
                                        name="category">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Select a suitable category from the options. Your post will be found by users using Categories</small>
                    </div>

                    @if(Auth::user()->_usertype === "seller" || Session::get('user_role') == 'seller')
                        <div class="form-group">
                            <label for="buyerType">Buyer Category<span class="text-danger"> *</span></label>
                            <div class="form-check" style="margin-left:20px">
                                <label><input class="form-check-input" name="buyerType[]" id="buyerType"
                                       type="checkbox" value="Exporter">
                                Exporter</label><br>
                                <label><input class="form-check-input" name="buyerType[]" id="buyerType"
                                       type="checkbox" value="Government">
                                Government</label><br>
                                <label><input class="form-check-input" name="buyerType[]" id="buyerType"
                                       type="checkbox" value="Collecting Agent">
                                Collecting Agent</label><br>
                                <label><input class="form-check-input" name="buyerType[]" id="buyerType"
                                       type="checkbox" value="Local Company">
                                Local Company</label>
                            </div>
                            <small class="text-muted">The category of buyers that you are willing to sell your waste. Select atleast one.</small>
                            
                            

                        </div>

                    @elseif( Auth::user()->_usertype === "buyer" || Session::get('user_role') == 'buyer')

                        <div class="form-group">
                            <label for="topic">Number of Items</label>
                            <div class="row m-0">
                            <input id="noOfItems" class="col-10 form-control" type="text" name="noOfItems" placeholder="Ex: 10">
                            <select class="col-2 form-control" id="" name="item_unit">
                                <option name="item_unit" value="Pieces">Pieces</option>
                                <option name="item_unit" value="Kilograms">Kilograms</option>
                            </select>
                            </div>
                            <small class="text-muted">Amount of E-Waste that you have in pocession (in Kilograms). An approximate value is acceptable. </small>
                        </div>

                        <div class="form-group">
                            <label for="topic">Model Number</label>
                            <input id="modelNo" class="form-control" type="text" name="modelNo" placeholder="Ex: AT-23UE">
                            <small class="text-muted">Model Number will help users in searching your post easily</small>
                        </div>
                        {{-- remove if parent if works with no problem --}}
                    {{-- @else
                        @if (Session::has('user_role'))
                            @if (Session::get('user_role') == 'seller')
                                <div class="form-group">
                                        <label for="buyerType">Buyer Category</label>
                                        <div class="form-check" style="margin-left:20px">
                                            <label><input class="form-check-input" name="buyerType[]" id="buyerType"
                                                   type="checkbox" value="Exporter">
                                            Exporter</label><br>
                                            <label><input class="form-check-input" name="buyerType[]" id="buyerType"
                                                   type="checkbox" value="Government">
                                            Government</label><br>
                                            <label><input class="form-check-input" name="buyerType[]" id="buyerType"
                                                   type="checkbox" value="Collecting Agent">
                                            Collecting Agent</label><br>
                                            <label><input class="form-check-input" name="buyerType[]" id="buyerType"
                                                   type="checkbox" value="Local Company">
                                            Local Company</label>
                                        </div>
                                        <small class="text-muted">The category of buyers that you are willing to sell your waste.</small>
                                </div>


                            @else
                            <div class="form-group">
                                    <label for="topic">Number of Items</label>
                                    <input id="noOfItems" class="form-control" type="text" name="noOfItems" placeholder="Ex: 10">
                                    <small class="text-muted">Amount of E-Waste that you have in pocession (in Kilograms). An approximate value is acceptable. </small>
                                </div>
        
                                <div class="form-group">
                                    <label for="topic">Model Number</label>
                                    <input id="modelNo" class="form-control" type="text" name="modelNo" placeholder="Ex: AT-23UE">
                                    <small class="text-muted">Model Number will help users in searching your post easily</small>
                                </div>
                            @endif
                        @endif --}}
                    @endif

                    <div class="form-group ">
                        <label for="description">Post Content<span class="text-danger"> *</span></label>
                        <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                        <small class="text-muted">Any detail that you want to provide about the waste</small>
                    </div>
                    <div class="form-group ">
                        {{-- <label for="attachment">Image</label> --}}
                        {{-- if no errors for not using dropify delete this
                        <div class="dropify">
                            <input id="dropify" class="form-control " type="file" name="attachment">
                        </div> --}}
                        <div class="custom-file">
                            <input id="dropify" class="custom-file-input " type="file" name="attachment">
                            <label for="attachment" class="custom-file-label">Insert Image</label>
                        </div>
                        <small class="text-muted">An image for buyers to get a clear idea</small>
                    </div>

                    <br>


                    <div class="form-group float-right">
                        <a class="btn btn-primary" href="/home" data-toggle="tooltip" title="Go Back Home"><i
                                    class="fa fa-arrow-left"></i></a>
                        <button type="reset" class="btn btn-warning" data-toggle="tooltip" title="Reset Fields"><i
                                    class="fa fa-undo"></i></button>
                        <button type="submit" class="btn btn-success" name="submit" data-toggle="tooltip"
                                title="Create Post"><i class="fa fa-pen"></i></button>

                    </div>
                </form>
            </div>
        </div>
        <br><br>
        <!--/.Panel-->
    </div>
@endsection
       
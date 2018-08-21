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
            <div class="card-header black white-text">
                <h5>
                    Edit Post
                </h5>
            </div>
            <div class="card-body">

                @include('partials.messages')

                <form class="form-horizontal" method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="topic">E waste Name</label>

                        <input id="title" class="form-control" type="text" value = "{{$post->title}}" name="title" required placeholder="nokia 7 mobile phone">
                    </div>

                    <div class="form-group">
                        <label for="category">E waste Category</label>
                        <select class="form-control" name="category">
                            <option placeholder="<select>" disabled>select</option>

                            @foreach($cat as $category)
                            {{-- if should be checked using ID. not category. Look query of cat --}}
                            @if($post->sub_waste_category->category == $category->category)

                                <option value="{{ $category->category}}" name="category" selected>{{ $category->category }}</option>
                            @else
                                <option value="{{ $category->category}}" name="category">{{ $category->category }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    @if(Auth::user()->_usertype === "seller")
                        <div class="form-group">
                            <label for="buyerType">Buyer Category</label>
                            <div class="form-check" style="margin-left:20px">


                                <input class="form-check-input" name="buyerType[]" id="buyerType"
                                    type="checkbox" value="Exporter" {{in_array('Exporter', $buyer_category) ? 'checked' : ''}}>
                                Exporter
                                <br>
                                <input class="form-check-input" name="buyerType[]" id="buyerType"
                                       type="checkbox" value="Government" {{in_array('Government', $buyer_category) ? 'checked' : ''}}>
                                Government
                                <br>
                                <input class="form-check-input" name="buyerType[]" id="buyerType"
                                       type="checkbox" value="Collecting Agent" {{in_array('Collecting Agent', $buyer_category) ? 'checked' : ''}}>
                                Collecting Agent
                                <br>
                                <input class="form-check-input" name="buyerType[]" id="buyerType"
                                       type="checkbox" value="Local Company" {{in_array('Local Company', $buyer_category) ? 'checked' : ''}}>
                                Local Company

                            </div>

                        </div>






                    @elseif( Auth::user()->_usertype === "buyer")

                        <div class="form-group">
                            <label for="topic">No of Items</label>
                            <input id="noOfItems" value="{{$post->buyer_post->no_of_items}}" class="form-control" type="text" name="noOfItems">
                        </div>

                        <div class="form-group">
                            <label for="topic">Model Number</label>
                        <input id="modelNo" value="{{$post->buyer_post->model}}" class="form-control" type="text" name="modelNo">
                        </div>

                    @else


                        @if (Session::has('user_role'))
                            @if (Session::get('user_role') == 'seller')
                                <div class="form-group">
                                    <label for="buyerType">Buyer Category</label>
                                    <div class="form-check" style="margin-left:20px">


                                        <input class="form-check-input" name="buyerType[]" id="buyerType"
                                        type="checkbox" value="Exporter" {{in_array('Exporter', $buyer_category) ? 'checked' : ''}}>
                                        Exporter
                                        <br>
                                        <input class="form-check-input" name="buyerType[]" id="buyerType"
                                               type="checkbox" value="Government" {{in_array('Government', $buyer_category) ? 'checked' : ''}}>
                                        Government
                                        <br>
                                        <input class="form-check-input" name="buyerType[]" id="buyerType"
                                               type="checkbox" value="Collecting Agent" {{in_array('Collecting Agent', $buyer_category) ? 'checked' : ''}}>
                                        Collecting Agent
                                        <br>
                                        <input class="form-check-input" name="buyerType[]" id="buyerType"
                                               type="checkbox" value="Local Company" {{in_array('Local Company', $buyer_category) ? 'checked' : ''}}>
                                        Local Company
                                    </div>

                                </div>


                            @else
                                <div class="form-group">
                                    <label for="topic">No of Items</label>
                                    <input id="noOfItems" value="{{$post->buyer_post->no_of_items}}" class="form-control" type="text" name="noOfItems">
                                </div>
        
                                <div class="form-group">
                                    <label for="topic">Model Number</label>
                                <input id="modelNo" value="{{$post->buyer_post->model}}" class="form-control" type="text" name="modelNo">
                                </div>
                            @endif
                        @endif
                    @endif

                    <div class="form-group ">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" name="description" rows="3">{{$post->content}}</textarea>
                    </div>
                    

                    <div class="custom-file">
                            <input id="dropify" class="custom-file-input " type="file" name="attachment">
                            <label for="attachment" class="custom-file-label">Insert Image</label>
                        </div>
                        <small class="text-muted">An image for buyers to get a clear idea</small>
                    <br>

                    <div class="form-group float-right">
                        <a class="btn btn-primary" href="/home" data-toggle="tooltip" title="Go Back Home"><i
                                    class="fa fa-arrow-left"></i></a>
                        <button type="reset" class="btn btn-warning" data-toggle="tooltip" title="Reset Fields"><i
                                    class="fa fa-undo"></i></button>
                        <button type="submit" class="btn btn-success" name="submit" data-toggle="tooltip"
                                title="Update Post"><i class="fa fa-pen"></i></button>

                    </div>
                </form>
            </div>
        </div>
        <br><br>
        <!--/.Panel-->
    </div>
@endsection
       
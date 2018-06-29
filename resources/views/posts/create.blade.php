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
                Add a Posts
            </h5>
        </div>
        <div class="card-body">

            @include('partials.messages')

            <form class="form-horizontal" method="POST" action="{{ route('posts.store') }}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                        <option placeholder="<select>" disabled selected>select</option>

                        @foreach($cat as $category)
                            <option value="{{ $category->category}}" name="category">{{ $category->category }}</option>

                        @endforeach
                    </select>
                </div>
                {{-- topic--}}
                <div class="form-group">
                    <label for="topic">Title</label>
                    <input id="topic" class="form-control" type="text" name="title" required>
                </div>
                {{-- desc --}}
                <div class="form-group ">
                    <label for="description">Description</label>
                    <textarea id="description" class="form-control" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group ">
                    <label for="attachment">Attachment</label>
                    <div class="dropify">
                        <input id="dropify" class="form-control " type="file" name="attachment">
                    </div>
                </div>

                <br>

                <div class="form-group float-right">
                    <a class="btn btn-primary" href="/home" data-toggle="tooltip" title="Go Back Home"><i class="fa fa-arrow-left"></i></a>
                    <button type="reset" class="btn btn-warning" data-toggle="tooltip" title="Reset Fields"><i class="fa fa-undo"></i></button>
                    <button type="submit" class="btn btn-success" name="submit" data-toggle="tooltip" title="Create Post"><i class="fa fa-pen"></i></button>
                    
                </div>
            </form>
        </div>
    </div>
    <br><br>
    <!--/.Panel-->
    </div>
@endsection
       
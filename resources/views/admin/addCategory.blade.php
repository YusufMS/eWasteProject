@include('layouts.main')


@yield('body')

<br>
<br>

@include('partials.messages')

<div class="col-lg-12">
  <div class="row">
   <div class="col-lg-3"></div>
   <div class="col-lg-6">
    <h1 class="text-center">Add Waste Sub Category </h1><br>

    <div class="card">
     <div class="card-body">
         {!! Form::open(['action' => ['subCatController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}




         <div class="form-group">
        {!! Form::Label('maincatgeory', 'Main Category:') !!}
        <select class="form-control" name="category" placeholder="<select>" >

        <option placeholder="<select>" disabled selected >select</option>

        @foreach($maincat as $category)


            <option value="{{ $category->main_category}}" name="category">{{ $category->main_category }}</option>

        @endforeach


        </select>
        </div>




         <div class="form-group">
             {{ Form::label('subcategory', 'Sub Category:', ['class' => 'form-label'] )}}
             {{ Form::text('subcategory', null , ['class' => 'form-control', 'placeholder' => 'subWasteCategory', 'id' => 'type']) }}
         </div>


            <div class="form-group">
             {{ Form::label('description', 'Description:', ['class' => 'form-label'] )}}
             {{ Form::textarea('description', null , ['class' => 'form-control', 'placeholder' => 'subWasteCategory', 'id' => 'type']) }}
         </div>


       <div class="row" style="margin-left: -5px;">
                     <div style="float: left;">

                         {{ Form::submit('Add', ['class' => 'btn btn-success btn-md']) }}
                         <a href="/admin" class="btn btn-secondary btn-md">Back</a>
                         {!! Form::close() !!}
                     </div>
                  </div>
     </div>
    </div>
   </div>

  </div>
 </div>



<div class="form-group">


</div>
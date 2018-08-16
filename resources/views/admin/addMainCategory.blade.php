@include('layouts.main')


@yield('body')


<br>
<br>
@include('partials.messages')

<div class="col-lg-12">
  <div class="row">
   <div class="col-lg-3"></div>
   <div class="col-lg-6">
    <h1 class="text-center">Add Main Waste Category </h1><br>
  
    <div class="card">
     <div class="card-body">
         {!! Form::open(['action' => ['mainCatController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      


         <div class="form-group">
             {{ Form::label('Category', 'Waste Type', ['class' => 'form-label'] )}}
             {{ Form::text('category', null , ['class' => 'form-control', 'placeholder' => 'subWasteCategory', 'id' => 'type']) }}
         </div>
         
       <div class="row" style="margin-left: -5px;">
                     <div style="float: left;">
                        
                         {{ Form::submit('Add', ['class' => 'btn btn-success btn-md']) }}
                         {!! Form::close() !!}
                     </div>
           <a href="/admin" class="btn btn-secondary btn-md">Back</a>
                  </div>   
     </div>
    </div>
   </div>
  
  </div>
 </div>



<div class="form-group">


</div>
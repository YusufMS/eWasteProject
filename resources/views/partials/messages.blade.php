@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
                {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if(session('success'))
    
<div class="alert alert-success alert-dismissible" role="alert">
            {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
            {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- <script>
    var has_message = {{ session('success') ? 'true' : 'false' }};
    if (has_message){
        swal({
        title: 'Success',
        type: 'success',
        html: jQuery("#success_message").html(),
        showCloseButton: true,
        });
    }
</script> --}}
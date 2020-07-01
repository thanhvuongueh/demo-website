<div class="clearfix"></div>
@if(count($errors))
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            <div> {{$err}} </div>
        @endforeach
    </div>
    
@endif
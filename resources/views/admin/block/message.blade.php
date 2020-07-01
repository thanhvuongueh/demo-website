<div class="clearfix"></div>
@if(session('message'))
<div class="alert alert-{{session('type')?session('type'):'success'}}">
    {{session('message')}}
</div>
@endif
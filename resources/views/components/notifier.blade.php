@if($errors->has())
<div class="callout callout-danger">
    @foreach($errors->all() as $message)
        <p>{{$message}}</p>
    @endforeach
</div>
@endif

@if(Session::has('message'))
<div class="callout callout-success">
    {{Session::get('message')}}
</div>
@endif
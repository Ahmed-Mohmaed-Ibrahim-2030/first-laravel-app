 @extends('layouts.app')
@section('content')
    {!! Form::open(['route'=>'articles.store'])!!}
<div class="form-group my-5">
    <label for="exampleFormControlInput1" class="form-label">Enter Your Phone</label>
     {!! Form::text('phone',null ,['class'=>'form-control']) !!}
{{--    <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">--}}

</div>
    <button type="submit" class="btn btn-primary" >Add Phone</button>
    {!! Form::close()!!}
@endsection
@section('title')
    Add New Phone
    @endsection

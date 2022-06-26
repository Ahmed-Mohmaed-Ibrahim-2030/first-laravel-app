@extends('layouts.app')
@section('content')

    {!! Form::model($phone, ['route' => ['articles.update', $phone->phone]])!!}
    @method('put')
    <div class="form-group my-5">
        <label for="exampleFormControlInput1" class="form-label">Enter Your Phone</label>
        {!! Form::text('phone',null ,['class'=>'form-control']) !!}
        @foreach($errors->all() as $error)
            <div class="alert mt-2 alert-danger">
                {{

            $error


             }}
            </div>
        @endforeach
{{--            <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">--}}

    </div>
    <button type="submit" class="btn btn-primary" >update</button>
    {!! Form::close()!!}
@endsection
@section('title')
    Edit Your Phone
@endsection

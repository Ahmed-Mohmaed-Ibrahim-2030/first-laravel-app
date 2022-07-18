@extends('layouts.app')
@section('content')

    {!! Form::model($user, ['route' => ['updateUser', $user->id]])!!}
    @method('put')
    <div class="form-group my-5">
        <label for="exampleFormControlInput1" class="form-label"> Your Name</label>
        {!! Form::text('name',null ,['class'=>'form-control']) !!}
        <label for="exampleFormControlInput1" class="form-label"> Your Email</label>
        {!! Form::email('email',null ,['class'=>'form-control']) !!}
{{--        <label for="exampleFormControlInput1" class="form-label"> Your username</label>--}}
{{--        {!! Form::text('username',null ,['class'=>'form-control']) !!}--}}
{{--        <label for="exampleFormControlInput1" class="form-label"> Your Phone</label>--}}
{{--        {!! Form::text('phone',null ,['class'=>'form-control']) !!}--}}

        <label for="image" class="form-label my-2">
            <img src="{{asset('\assets\images\users'.($user->image?$user->image:'\default.jpg'))}}" class="img-thumbnail " width="300" height="300" alt="why not display it">
{{--            <img src="data:image/png;base64,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" class="img-thumbnail " width="300" height="300" alt="why not display it">--}}
            {!! Form::file('image',['class'=>'d-none','id'=>'image']) !!}
        </label>
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

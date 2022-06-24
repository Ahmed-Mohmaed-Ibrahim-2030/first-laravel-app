@extends('layouts.app')
@section('content')
    <div class=" row row-cols-1 row-cols-lg-4  row-cols-md-2 justify-content-between">
        @foreach($phones as $phone)
            <div class=" my-2  col">
                <div class=" card  ">
                    <div class="card-body">
                        <h5 class="card-title">My Phones</h5>
                        <p class="card-text">{{$phone->phone}}</p>

                        {!! Form::open(['route'=>['articles.destroy',$phone->phone]])!!}
                        @method('delete')
                        <div class="row justify-content-around">
                            <a href="{{route('articles.edit',$phone->phone)}}" class="btn btn-outline-info col-3 ">Edit</a>
                            {{--             <a href="#" class="btn btn-danger col-4">delete </a>--}}
                            <button type="submit" class="btn btn-outline-danger col-3" >Delete</button>

                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('title')
    All Pohnes
@endsection

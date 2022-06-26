@extends('layouts.app')
@section('content')
   <div class=" row row-cols-1 row-cols-lg-3  row-cols-md-2 justify-content-between">
    @foreach($phones as $phone)
<div class=" my-2  col" >
    <div class=" card p-1 " >
        <div class="card-body">
            <h5 class="card-title">{{$phone->user->name}}</h5>
            <p class="card-text">{{$phone->phone}}</p>

             {!! Form::open(['route'=>['articles.destroy',$phone->phone]])!!}
             @method('delete')
         <div class="row justify-content-between">
            @can('update',$phone)
             <a href="{{route('articles.edit',$phone->phone)}}" class="btn btn-outline-info col-3 ">Edit</a>
            @endcan
             {{--             <a href="#" class="btn btn-danger col-4">delete </a>--}}
                @can('delete',$phone)
             <button type="submit" class="btn btn-outline-danger col-3" >Delete</button>
@endcan
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

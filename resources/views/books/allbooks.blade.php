@extends('layouts.app')
@section('content')
    <div class=" row row-cols-1 row-cols-lg-3  row-cols-md-2 justify-content-between">
        @foreach($books as $book)
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <p class="card-text">{{$book->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('title')
     Books
@endsection

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Storefavorite_booksRequest;
use App\Http\Requests\Updatefavorite_booksRequest;
use App\Models\favorite_books;

class FavoriteBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function getUserFavouriteBooks($id){
return  \App\Models\User::find(1)->favorite_books()->join('books',function ($join){
  $join->on('book_id','=','books.id');})->select('books.*')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storefavorite_booksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storefavorite_booksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\favorite_books  $favorite_books
     * @return \Illuminate\Http\Response
     */
    public function show(favorite_books $favorite_books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favorite_books  $favorite_books
     * @return \Illuminate\Http\Response
     */
    public function edit(favorite_books $favorite_books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatefavorite_booksRequest  $request
     * @param  \App\Models\favorite_books  $favorite_books
     * @return \Illuminate\Http\Response
     */
    public function update(Updatefavorite_booksRequest $request, favorite_books $favorite_books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favorite_books  $favorite_books
     * @return \Illuminate\Http\Response
     */
    public function destroy(favorite_books $favorite_books)
    {
        //
    }
}

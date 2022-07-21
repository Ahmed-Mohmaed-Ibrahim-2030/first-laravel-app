<?php

namespace App\Http\Controllers;

use App\Models\book_categories;
use App\Http\Requests\Storebook_categoriesRequest;
use App\Http\Requests\Updatebook_categoriesRequest;

class BookCategoriesController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebook_categoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebook_categoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book_categories  $book_categories
     * @return \Illuminate\Http\Response
     */
    public function show(book_categories $book_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book_categories  $book_categories
     * @return \Illuminate\Http\Response
     */
    public function edit(book_categories $book_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebook_categoriesRequest  $request
     * @param  \App\Models\book_categories  $book_categories
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebook_categoriesRequest $request, book_categories $book_categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book_categories  $book_categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(book_categories $book_categories)
    {
        //destroy
    }
}

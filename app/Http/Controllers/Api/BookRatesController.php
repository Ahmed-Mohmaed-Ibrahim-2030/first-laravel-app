<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Storebook_ratesRequest;
use App\Http\Requests\Updatebook_ratesRequest;
use App\Http\Resources\book_rates;
//use App\Models\book_rates;
use Illuminate\Support\Facades\Auth;

class BookRatesController extends Controller
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
     * @param  \App\Http\Requests\Storebook_ratesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebook_ratesRequest $request)
    {
        //
//        dd($request->user()->rated_books());
        if ($request->user()->rated_books()->create($request->all()))
        {

//return $request->user()->rated_books();
//            return "success";
//            return Auth::user()->rated_books();
            return book_rates::Collection($request->user()->rated_books)->response()->setStatusCode(201);
//            return book_rates::Collection(Auth::user()->rated_books())->response()->setStatusCode(201);
        }
        return 'not added';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book_rates  $book_rates
     * @return \Illuminate\Http\Response
     */
    public function show(book_rates $book_rates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book_rates  $book_rates
     * @return \Illuminate\Http\Response
     */
    public function edit(book_rates $book_rates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebook_ratesRequest  $request
     * @param  \App\Models\book_rates  $book_rates
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebook_ratesRequest $request, book_rates $book_rates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book_rates  $book_rates
     * @return \Illuminate\Http\Response
     */
    public function destroy(book_rates $book_rates)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User_PhoneResource;
use App\Models\user_phone;
use Illuminate\Http\Request;

class UserPhonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
  //      dd(user_phone::all());
        return User_PhoneResource::Collection(user_phone::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_phone  $user_phone
     * @return \Illuminate\Http\Response
     */
    public function show(user_phone $user_phone,$phone)
    {
        //
       // dd(user_phone::where('phone',$phone)->first());
        return new User_PhoneResource(user_phone::where('phone',$phone)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_phone  $user_phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_phone $user_phone ,$phone)
    {
        //
        dd($request->all());
       if( user_phone::where('phone',$phone)->first()->update($request->only('phone'))) {
           return new User_PhoneResource(user_phone::where('phone', $phone)->first());
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_phone  $user_phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_phone $user_phone)
    {
        //
    }
}

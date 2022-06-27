<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User_PhoneResource;
use App\Models\user_phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if ($request->user()->user_phones()->create($request->all()))
          {

              return User_PhoneResource::Collection(user_phone::all())->response()->setStatusCode(201);
          }
        return 'not added';
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
     //   dd($phone);
//     dd(user_phone::where('phone',$phone)->first());
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
       // dd($phone);
  // dd(user_phone::where('phone','like',$phone)->first());
   //     dd($request->all());
       if(  Auth::user()->user_phones()->where('phone','=',$phone)->update($request->only('phone'))) {
           return User_PhoneResource::Collection(user_phone::all())->response()->setStatusCode(201);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_phone  $user_phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,user_phone $user_phone ,$phone)
    {
        //
//        return new User_PhoneResource(user_phone::where('phone',$phone)->first());
//        dd($phone);
//        dd(user_phone::where('phone',$phone)->first());
        if( Auth::user()->user_phones()->where('phone','=',$phone)->delete()) {
            return User_PhoneResource::Collection(user_phone::all())->response()->setStatusCode(201);
        }
    }
}

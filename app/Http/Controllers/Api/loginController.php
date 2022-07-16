<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Auth;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class loginController extends Controller
{
    //
    public function login(Request $request)
    {
if(Auth::attempt($request->only('username','password')))
{
$token=$request->user()->createToken('api');
return [
    'token'=>$token->plainTextToken];

}
    }
    public function logout(Request $request)
    {

        if (Auth::check()) {
            $request->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
        }
        return response()->json([
            'message' => 'Successfully logged out'
        ]);

    }

}

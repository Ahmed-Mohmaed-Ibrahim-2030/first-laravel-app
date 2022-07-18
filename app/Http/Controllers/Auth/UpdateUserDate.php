<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserDate extends Controller
{
    //
    public function  edit(){
        $user=Auth::user();
        return view('user.edit',['user'=>$user]);
    }
    public function update(){

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }
    function show($id , $name) {
    return view('welcomename',['id'=>$id,'name'=>$name]);
    }
}

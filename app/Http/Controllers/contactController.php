<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactController extends Controller
{
    //
    function create(Request $request) {
return " not Created ";
    }
    function update(Request $request) {
return " not upadated ";
    }
    function deleted($id) {
return " user id is$id ";
    }
    function index(){
        return view('show');
    }
    function edit($id)
    {
        return "User id is $id";
    }
}

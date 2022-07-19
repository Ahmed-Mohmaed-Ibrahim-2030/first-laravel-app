<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserDate extends Controller
{
    //
    public function  edit(){
        $user=Auth::user();
        return view('user.edit',['user'=>$user]);
    }
    public function update(Request $request){
//        dd($request->image);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
//            'unique:users,email_address,'.$user->id
            'email' => ['required', 'string', 'email', 'max:255',  'unique:users,email,'.Auth::id()],
            'balance' => ['required', 'string' , 'max:7'],
//            'username' => ['required', 'string', 'max:10','unique:users'],
            'address'=>['required', 'string', 'max:200'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('\assets\images\users'), $imageName);


//        Auth::user()->update([
//            'name' => $request->name,
//            'email' => $request->email,
//            'balance'=>$request->balance,
//            'address'=>$request->address,
////            'password' => Hash::make($request->password),
//        ]);
//if(Auth::user()->balance==0) {
//    Auth::user()->increment('balance', $request->balance, [
//        'name' => $request->name,
//        'email' => $request->email,
////            'balance'=>$request->balance,
//        'address' => $request->address,
////            'password' => Hash::make($request->password),
//    ]);
//}
//else
//{
//    Auth::user()->update([
//        'balance'=>0]);
         Auth::user()->increment('balance', -Auth::user()->balance);
         Auth::user()->increment('balance', $request->balance,[
             'name' => $request->name,
             'email' => $request->email,
//            'balance'=>$request->balance,
             'address'=>$request->address,
'image'=>$imageName
//            'password' => Hash::make($request->password),
         ]);

//}
        return redirect()->route('editUser');
    }

}

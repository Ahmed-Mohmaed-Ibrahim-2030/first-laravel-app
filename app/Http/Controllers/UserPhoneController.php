<?php

namespace App\Http\Controllers;


use App\Models\user_phone;
use Illuminate\Http\Request;
use Auth;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

//use Illuminate\Support\Facades\Auth;

class UserPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('articles/allphones',['phones'=>user_phone::All()]);
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

        return view('articles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'phone'=>['required', 'unique:user_phones','max:11','min:11','regex:/^(01)[012]{1}[0-9]{8}/'],
           // 'phone' => Rule::unique('user_phones')->where(fn ($query) => $query->whereNull('deleted_at'))
        ]);


        Auth::user()->user_phones()->create($request->all());
//        $phone=new user_phone();
//
//        $phone->user_id=Auth::id();
//        $phone->phone=$request->phone;
//        $phone->save();
  return redirect()->route('articles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function show(user_phone $userPhone,$id)
    {

        $yourPhone=user_phone::where('user_id','=',Auth::id())->get();
       return view('articles/show',['phones'=>$yourPhone]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function edit(user_phone $userPhone ,$phone )

    {
//        if(Auth::user()->cannot('update',$userPhone))
//        {
//            return abort(403);
//        }
      //  $this->authorize('update',$userPhone);
      //  dd($phone);
        $yourPhone=user_phone::where('phone','=',$phone)->first();
        if (! Gate::allows('update-user_phone', $yourPhone)) {
            abort(403);
        }

//        $yourPhone=user_phone::where('phone','=',$phone)->first();
       //  dd($yourPhone);

         return view('articles.edit', ['phone'=>$yourPhone ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,user_phone  $userPhone,$phone)
    {
        //
//        if (! Gate::allows('update-user_phone', $userPhone)) {
//            abort(403);
//        }
//        $this->authorize('update',$userPhone);
        $yourPhone=user_phone::where('phone','=',$phone)->first();
        if (! Gate::allows('update-user_phone', $yourPhone)) {
            abort(403);
        }

        $request->validate([
            'phone'=>['required', 'regex:/^(01)[012]{1}[0-9]{8}/','max:11','min:11'],
            'phone' => Rule::unique('user_phones')->where(fn ($query) => $query->where('phone','<>', $phone))
        ]);

//        $yourPhone=user_phone::where('phone','=',$phone)->update(['phone'=>$request->phone]);

        Auth::user()->user_phones()->where('phone','=',$phone)->update($request->only('phone'));
//        $yourPhone->phone = $request->phone;
//        //$yourPhone->save();
      //  dd($yourPhone->fill(['phone'=>$request->phone]));
//
//       $yourPhone->fill(['phone'=>$request->phone]);
     //  $yourPhone->save();
      //  dd($yourPhone);


      // dd(['phone'=>$request->phone]);
        return redirect()->route('articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userPhone  $userPhone
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_phone $userPhone,$phone)
    {
        //
        //

        $yourPhone=user_phone::where('phone','=',$phone)->first();
        if (! Gate::allows('delete-user_phone', $yourPhone)) {
            abort(403);
        }
        Auth::user()->user_phones()->where('phone','=',$phone)->delete();
//$this->authorize('delete',$userPhone);
       // $yourPhone=user_phone::where('phone','=',$phone)->delete();
        return redirect()->route('articles.index');
    }

    // ahmed
}

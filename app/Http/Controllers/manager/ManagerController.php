<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use App\Models\Manager;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
class ManagerController extends Controller
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
        return view('manager.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManagerRequest $request)
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:managers'],
            'username' => ['required', 'string', 'max:10','unique:managers'],
            'phone'=>['required', 'unique:managers','max:11','min:11','regex:/^(01)[012]{1}[0-9]{8}/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//dd($request);
        $user = Manager::create([
            'name' => $request->name,
            'email' => $request->email,
            'username'=>$request->username,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);

//        event(new Registered($user));
//
//        Auth::login($user);
//
//
//        return redirect(RouteServiceProvider::HOME);
        if($user)
return redirect('manager/dashboard');
        else
            dd("mission failed");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManagerRequest  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManagerRequest $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        //
    }
    public function login( Request $request){
     

 $request->validate([
           
            'username' => ['required', 'string', 'max:10'],
            
            'password' => ['required', Rules\Password::defaults()]
        ]);

        $manager=Manager::where('username',$request->username)->first();
        if (Hash::check($request->password,$manager->password)){
             session([
                'manager'=>$manager
            
             ]);
             return redirect ()->route('manager.dashboard');
        }
        
    }
    public function log(){
        return view ('manager.login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    

    // retrieve users who aren't registered yet 
    public function users(){
        $users = User::where('is_registered',0)->get();
        return view('users.index',compact('users'));

    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],


        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('users.index')->with('success','user was created successfully');
    }

    public function edit($uuid){
        $user = User::where('uuid',$uuid)->first();
        return view('users.edit',compact('user'));
    }

    public function update(Request $request,$uuid){
        $data = $request->validate(['name'=>'required']);
        $user = User::where('uuid',$uuid)->first();
        $user->update($data);
        return redirect()->route('users.index')->with('success','user was updated successfully');


    }

    // when user subscribe from landing page

    public function subscribe($userUUID){
        $user = User::where('uuid',$userUUID)->first();
        $user->is_registered = 1;
       

        $user->save();
        return redirect()->route('main')->with('success','subscription request was sent to admins');

    }

    public function unsubscribe($userUUID){
        $user = User::where('uuid',$userUUID)->first();

        $user->is_registered = 0;
        $user->has_free_days = 0;
        $user->register_date = null ;
        $user->save();
        return redirect()->route('users.index')->withErrors(['fail'=>'user is unsuscribed']);

    }

    // retrieve users who clicked subscribe

    public function registeredUsers(){

        $users = User::where('is_registered',1)->where('register_date',null)->get();
        return view('users.registeredUsers',compact('users'));

    }

    // retrieve users who are subscribed with free days

    public function freeDaysUsers(){

        $users = User::where('is_registered',1)->where('has_free_days',1)->whereNotNull('register_date')->get();
        return view('users.freeDaysUsers',compact('users'));

    }


    // retrieve users who are subscribed with NO free days

    public function nonFreeDaysUsers(){

        $users = User::where('is_registered',1)->where('has_free_days',0)->whereNotNull('register_date')->get();
        return view('users.nonFreeDaysUsers',compact('users'));

    }

    // register the user with free days
    public function registerFreeDays($userUUID){

        $user = User::where('uuid',$userUUID)->first();

    
        $user->register_date = Carbon::now();
        $user->is_registered=1; 
        $user->has_free_days = 1;
        $user->save();

        return redirect()->route('users.freeDaysUsers')->with('success','user was registered successfully');

    }

    // register the user for no free days
    public function registerUser($userUUID){

        $user = User::where('uuid',$userUUID)->first();
        $user->register_date = Carbon::now();
        $user->is_registered=1;
        $user->save();
        return redirect()->route('users.nonFreeDaysUsers')->with('success','user was registered successfully');



    }


}

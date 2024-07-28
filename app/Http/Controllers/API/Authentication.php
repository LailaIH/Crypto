<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class Authentication extends Controller
{

    public function register(Request $request){

        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
           
            'password'=>'required|string|confirmed'
            
            
        ]);

      
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
       
        $user->password = bcrypt($request->input('password'));
        
        $user->save();

        $token = $user->createToken('myapptoken')->plainTextToken;
        
        return response(['user'=>$user , 'token'=>$token] , 201);

    }


    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user  || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken( 'myapptoken', ['*'], now()->addHour())->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request){
        //$user = Auth::user();
       $request->user()->tokens()->delete();
       // $request->user()->currentAccessToken()->delete();


        return [
            'message' => 'Logged out'
        ];
    }


    
}

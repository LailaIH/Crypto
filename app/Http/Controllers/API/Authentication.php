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

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = $image->getClientOriginalName();

            $destinationPath = public_path('userImages'); 
            if (!file_exists($destinationPath . '/' . $imageName)) {

            $image->move(public_path('userImages'), $imageName);
            }

            $user->img = $imageName;
           
           }

      

        
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

    // change password

    public function changePassword(Request $request){
        $data = $request->validate( [
            'old_password'=>'required',
            'password'=>'required|string|confirmed'
            
        ]);


        $user=$request->user();
        if(Hash::check($request->old_password,$user->password)){
            $user->update([
                'password'=>Hash::make($request->password)
            ]);
            return response()->json([
                'message'=>'Password successfully updated',
            ],200);
        }else{
            return response()->json([
                'message'=>'Old password does not matched',
            ],400);
        }

    }


    
}

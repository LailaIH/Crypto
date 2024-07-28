<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;


class APISubscribe extends Controller
{

   

  // when user wants to subscribe 
 

  public function subscribe(Request $request){

    $request->validate(['uuid'=>'required']);


    // get the user that has logged in and get their token , pass it with the request , if the logged user is the same as the uuid user then continue
    $userUUID = $request->input('uuid');
    $authUser = $request->user(); // Get the authenticated user (this ispossible with sanctum or other middleware like auth , we can get the auth user)

    if ($authUser->uuid !== $userUUID) {
        return response()->json(['error' => 'Unauthorized action'], 403);
    }

    $user = User::where('uuid',$request->uuid)->first();
    if($user){
        if(!$user->is_registered){
            $user->is_registered = 1;
            $user->save();

            return response(['message'=>'subscription request was sent to admins successfully'],202);
        }
        else{
            return response(['message'=>'user is already registered']);

        }
    }

    else{

        return response(['message'=>'user not found']);
    }
  }

}
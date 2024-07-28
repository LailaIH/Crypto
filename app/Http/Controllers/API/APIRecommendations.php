<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Recommendation;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;


class APIRecommendations extends Controller
{

   

    // check token's validation 

    public function me(Request $request){
        return response([
            
        'is expired'=>PersonalAccessToken::findToken($request->bearerToken())->isExpired(),
        'user'=>$request->user(),
        
        ]
    
    
    );

    }

    // get the recommendations
    public function recommendations(Request $request, $userUUID){


              


        $user = User::where('uuid',$userUUID)->first();
        if($user->is_registered){

       

        $recommendations = Recommendation::where('is_online',1)->get();

            if(count($recommendations)==0){
                return response(['message'=>'there are no recommendations yet']);
            }

        return response($recommendations);
        }

        else{

            return response(['message'=>'user is not registered for recommndations']);
        }
    }


}
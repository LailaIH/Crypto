<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Option;
use App\Models\Recommendation;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;


class APITermsAndConditions extends Controller
{

   

    // retrieve terms and conditions
    public function termsAndConditions(){

        $option = Option::where('key','terms and conditions')->first();
        if($option){

            return response(['terms and conditions content'=>$option->value]);
        }

        else{
            return response(['message'=>'terms and conditions are not set yet']);
        }

    }

}
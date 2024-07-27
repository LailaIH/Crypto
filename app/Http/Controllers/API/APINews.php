<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class APINews extends Controller
{

    // get the news
    public function news(){

        $news = News::where('is_online',1)->get();

            if(count($news)==0){
                return response(['message'=>'there are no news yet']);
            }

        return response($news);
    }


}
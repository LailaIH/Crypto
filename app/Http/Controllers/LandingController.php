<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Recommendation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionExpiredMail;

class LandingController extends Controller
{


    // public function test(){
    //     $subject = 'expired subscription';
    //     $body = 'your free 5 days has expired , please re subscribe';
    //     Mail::to('')->send(new SubscriptionExpiredMail($subject,$body));
       
    // }
    public function index(){

        $news = News::where('is_online',1)->get();
        $recommendations = Recommendation::where('is_online',1)->get();

        return view('landing.index',compact('news','recommendations'));
    }



}

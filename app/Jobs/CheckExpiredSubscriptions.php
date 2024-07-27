<?php

namespace App\Jobs;

use App\Models\News;
use App\Models\Option;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionExpiredMail;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

class CheckExpiredSubscriptions implements ShouldQueue
{

    // for free days expiration 


    
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void 
    {
        

        $option = Option::where('key','number of free days')->first();
        $number_of_free_days = intval($option->value);

        $subject = 'expired subscription';
        $body = 'your free 5 days has expired , please re subscribe';

    if($option && is_int($number_of_free_days)){

        $users = User::where('is_registered',1)->where('has_free_days',1)->whereNotNull('register_date')->get();
   

        foreach($users as $user){
            $registerDate = $user->register_date;
            $newDate = Carbon::parse($registerDate)->addDays($number_of_free_days);
            if($newDate <= Carbon::now()){
                $user->is_registered = 0;
                $user->has_free_days = 0;
                $user->register_date=null;
                $user->save();
                
                Mail::to($user->email)->send(new SubscriptionExpiredMail($subject,$body));

            }
        }
    
    
   } 

else{

            throw new NotFoundHttpException();

            }


    }
}

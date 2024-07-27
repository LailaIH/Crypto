<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionExpiredMail;
use App\Models\Option;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CheckMonthlyExpiredSubscribtion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // check for monthly subscriptions expiration

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
        $option = Option::where('key','number of registering days')->first();
        $number_of_days = intval($option->value);

        $subject = 'expired subscription';
        $body = 'your '.$number_of_days.' subscription has expired , please re subscribe';

    if($option && is_int($number_of_days)){

        $users = User::where('is_registered',1)->where('has_free_days',0)->whereNotNull('register_date')->get();
        

        
        

        foreach($users as $user){
            $registerDate = $user->register_date;
            $newDate = Carbon::parse($registerDate)->addDays($number_of_days);
            if($newDate <= Carbon::now()){
                $user->is_registered = 0;
               
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

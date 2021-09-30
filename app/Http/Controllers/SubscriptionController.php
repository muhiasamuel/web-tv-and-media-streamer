<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Auth;
use DB;
use Session;
class SubscriptionController extends Controller
{
    

    //cancel subscription
    public function Cancel($id){
       
        $subscription_data = Flutterwave::subscriptions()->cancel($id);
       $subscription_data = $subscription_data['data'];
       $userSubscription_id = $subscription_data['id'];
       $userSubscription_status = $subscription_data['status'];
        DB::table('users')
        ->where('id', Auth::user()->id)
        ->update(['status'=>$userSubscription_status,'subscription_id' => $userSubscription_id,]);
        session::flash('alert1',' You have successifully Cancelled your subscription. You will not be able to access the content after your subscription period expires. You can resume your subscription any time. Hope you will visit again. We regret to see you go.');
        return redirect()->route('view.subscription');    
        
    }
    
    //resume cancelled subscription

    public function resume($id){
        $subscription_data = Flutterwave::subscriptions()->activate($id);
        $subscription_data = $subscription_data['data'];
        $userSubscription_id = $subscription_data['id'];
        $userSubscription_status = $subscription_data['status'];
         DB::table('users')
         ->where('id', Auth::user()->id)
         ->update(['status'=>$userSubscription_status,'subscription_id' => $userSubscription_id,]);
         session::flash('alert',' You have successifully resumed your subscription. Enjoy Watching');
         return redirect()->route('client.landing-page'); 
       
    }
}

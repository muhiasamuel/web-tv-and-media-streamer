<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Auth;
use DB;

class SubscriptionController extends Controller
{
    //cancel subscription
    public function Cancel(){
        $id = DB::table('users')->where('id', Auth::user()->id)->get('subscription_id');
        $subscription_data = Flutterwave::subscriptions()->cancel($id);
        foreach ($subscription_data as $data){
            $userSubscription_status=$data['status'];   
        }
        DB::table('users')
        ->where('id', Auth::user()->id)
        ->update(['status'=>$userSubscription_status]);
        return redirect()->route('activate', ['parameterKey' => 'value']);    
        
    }


    //resume cancelled subscription

    public function resume(){
        $id = DB::table('users')->where('id', Auth::user()->id)->get('subscription_id');
        $subscription_data = Flutterwave::subscriptions()->activate($id);
        foreach ($subscription_data as $data){
            $userSubscription_status=$data['status'];   
        }
        DB::table('users')
        ->where('id', Auth::user()->id)
        ->update(['status'=>$userSubscription_status]);
        return redirect()->route('landing', ['parameterKey' => 'value']);    
        
    }
}

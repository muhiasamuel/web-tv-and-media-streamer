<?php

namespace App\Http\Middleware;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Closure;
use Auth;
class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   
    public function handle($request, Closure $next)
    {
        if (auth()->user()->status == 'active') {
            return $next($request);
        }
          
          /*$Current = $customers->filter(function ($value, $key) {
            return data_get($value, 'customer_email') == Auth::user()->email;
        });
        $myfilterArray = $Current->filter()->all();
        $customer_id = ($myfilterArray[0]['id']);
        
       
        $result = array_merge($users, $plan_ids);
        $customer_data = Flutterwave::subscriptions()->getone($customer_id);
        $filtred = array();
       array_walk_recursive($users, function($val, $key) use(&$filtred){
           if(strpos($key, 'customer_email') === 0){
               $filtred[$key]=$val;
           }
       });*/
       echo('You Are Not Subscribed To Any Plan. Subscribe Here');
       return redirect()->route('plan');
 
    }
}

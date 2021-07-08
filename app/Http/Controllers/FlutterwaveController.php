<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Auth;
use DB;
class FlutterwaveController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
           $plans = Flutterwave::Plans()->fetchAll();
           $data = $plans['data'];
           return view('Client.landing.plan',['data'=>$data]);
       


    }

    public function plan($id){
        $plans = Flutterwave::Plans()->fetch($id);
        dd($plans);
    }
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize($id)
    {
        //fetch users plan data
        $plans = Flutterwave::Plans()->fetch($id);
        $plan = $plans['data'];
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer,mpesa,ussd',
            'amount' => $plan['amount'],
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "KES",
            'payment_plan'=>$plan['id'],
            'redirect_url' => route('callback'),
            'customer' => [
                'email' =>  Auth::user()->email,
                "phone_number" =>  request()->phone,
                "name" => Auth::user()->name ,
            ],

            "customizations" => [
                "title" => 'streetceos tv subscription',
                "description" => "20th October"
            ]
        ];

        $payment = Flutterwave::initializePayment($data);
       


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
        
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);
        
        $rave_id= $data['data']['id'];
        $rave_code=$data['data']['flw_ref'];
        $status=$data['data']['status'];
        $card_brand=$data['data']['card']['type']; 
        $card_last_four=$data['data']['card']['last_4digits']
        ;
        //getting Auth user subscription id 
        $plans = Flutterwave::subscriptions()->getall();
        $users = collect($plans['data']);
       
        $users=collect($users);
        $person = $users->filter(function ($value, $key) {
            return collect($value)->contains('customer_email', Auth::user()->email);
        });
        $person=$person->filter()->all();
        foreach($person as $persons){
            $userSubscription_id=$persons['id'];
            $userSubscription_amount=$persons['amount'];
            $userrave_id=$persons['customer']['id'];
            $userRave_Email=$persons['customer']['customer_email'];
            $userSubscription_plan=$persons['plan'];
            $userSubscription_status=$persons['status'];

        }
        //insert payment data into users table
        DB::table('users')
            ->where('email', $data['data']['customer']['email'])
            ->update(['rave_id' => $rave_id, 'rave_code' => $rave_code,'status' => $userSubscription_status,'subscription_id' => $userSubscription_id, 'card_brand' => $card_brand, 'card_last_four' => $card_last_four ]);
            echo('User subscription succesifully updated ');  
            
            
             //insert user subscription data into users subscription
        DB::table('subscriptions')
        ->where('user_email', $data['data']['customer']['email'])
        ->update(['rave_id' => $rave_id, 'rave_code' => $rave_code,'user_id' => $userrave_id,'subscription_id' => $userSubscription_id, 'rave_plan_id' => $userSubscription_plan, 'user_email' => $userRave_Email,'payment_status' => $status ]);
        echo('User subscription succesifully updated ');
        return redirect()->route('client.landing-page', ['parameterKey' => 'value']);
              
        }
        
       
        elseif ($status ==  'cancelled'){
            return redirect()->route('plan');
            //Put desired action/code after transaction has been cancelled here
        }
        else{
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here
        $this->redirectTo = \route('client.landing-page');
        return $this->redirectTo;
    }
}

<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function logout(Request $request)
{
    $this->performLogout($request);
    return redirect()->route('login');
}

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectTo(){

        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        $status = $user->status;
        if ($status == 'successful') {
            $this->redirectTo = \route('client.landing-page');
            return $this->redirectTo;
        }

        $this->redirectTo = \route('plan');
        return $this->redirectTo;
     }
         
}

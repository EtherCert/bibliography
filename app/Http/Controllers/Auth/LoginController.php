<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
      protected $username;
    
      protected function redirectTo()
      {
        $userType = \Auth::user()->type;
          
        if($userType == 1 || $userType == 2 || $userType == 3){
            
            $this->redirectTo = '/admin/dashboard';

        } else if($userType == 0) {
            
             $this->redirectTo = '/member/dashboard';
            
        }else{
         $this->redirectTo = '/';
        }

            return $this->redirectTo;
      }
    
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = 'username';
    }
    
     public function username()
    {
        return $this->username;
    }
    
}

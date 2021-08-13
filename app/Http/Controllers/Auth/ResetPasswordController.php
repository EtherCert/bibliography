<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\Setting;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
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
          public function changePassword(Request $request){

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            $siteName = Setting::select('siteName')->where('id','=','1')->get()->first()->siteName;
              
           alert()->error('الكلمات غير متطابقة', $siteName);
           
           return redirect()->back()->with('message_flash');
        }

        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
            $siteName = Setting::select('siteName')->where('id','=','1')->get()->first()->siteName;
            
            alert()->error('لا يجوز ان تكون كالسابقة', $siteName);
            
            return redirect()->back()->with('message_flash');
        }
    
       $request->validate([
            'current_password' => 'required',
            'password' => 'min:8|required|same:password',
           'password_confirmation' => 'required|same:password',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        $siteName = Setting::select('siteName')->where('id','=','1')->get()->first()->siteName;
       
        alert()->success('تم التغيير بنجاح', $siteName);
        
        return redirect()->back()->with('message_flash');
    }
}

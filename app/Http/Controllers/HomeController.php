<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\Models\Study;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
   public function noAccess(){
     return view('admin.home.no-access');
   }   

   public function bloked(){
     return view('admin.home.blocked');
   } 

    public function dashboard(){
        /*$app_count_r = Application::select('id')->where('isReplied', 'تم الرد')->count();
        $app_count_n_r = Application::select('id')->where('isReplied', 'لم يتم الرد')->count();  
        
        $user_count_a = User::select('id')->whereNotNull('email_verified_at')->count();
        $user_count_n_a = User::select('id')->whereNull('email_verified_at')->count();
        
        $count_services =Blog::whereHas('tags', function (Builder $query) {
        $query->where('tags.name_ar', '=', 'خدمة');
        })->count();
        
        $count_news =Blog::whereHas('tags', function (Builder $query) {
        $query->where('tags.name_ar', '=', 'خبر');
        })->count();*/
            
        return view('admin.home.dashboard');
       
   }
  public function profile()
    {
        $user = Auth::user();
        return view('admin.users.profile')->with('user', $user);
     }
    
     public function updateProfile(UserRequest $request){
        $user = Auth::user();
        if($user->email !== $request->email) {
           $user->email = $request->email;
           $user->email_verified_at = null;    
        }
        $user->name = $request->name;        
        
        
        
        $user->save();
        
        return back()->with(
                [
                    'message_flash'=> sprintf('تم تعديل بياناتك بنجاح! '),
                    'alert' => 'alert-solid-success'
                ]); 
    }
    
    public function updatePassword(Request $request){

    if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
        // The passwords matches

       return redirect()->back()->with(
                [
                    'message_flash'=> sprintf('الكلمات غير متطابقة'),
                    'alert' => 'alert-solid-danger'
                ]);
    }

    if(strcmp($request->get('current_password'), $request->get('password')) == 0){
        //Current password and new password are same

        return redirect()->back()->with(
                [
                    'message_flash'=> sprintf('لا يجوز ان تكون كلمة المرور القديمة كالسابقة'),
                    'alert' => 'alert-solid-danger'
                ]);
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

    return redirect()->back()->with(
                [
                    'message_flash'=> sprintf('!تم التغيير كلمة المرور بنجاح'),
                    'alert' => 'alert-solid-success'
                ]);
}
}

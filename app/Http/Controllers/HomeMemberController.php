<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;
use App\Models\Study;
use App\Models\Setting;
use App\Models\Info;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\MemberRequest;

class HomeMemberController extends Controller
{
   private $settings;
    
   public function __construct()
    {
        $this->settings = Setting::findOrFail(1);
    } 
    
   public function noAccess(){
     return view('admin.home.no-access');
   }   

   public function bloked(){
     return view('admin.home.blocked');
   } 

    public function dashboard(){
      return view('site.member.home.dashboard');
   }
  public function profile()
    {
        $user = Auth::user();
        return view('site.home.dashboard')->with('user', $user);
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
                    'message_flash'=> sprintf('تم التغيير كلمة المرور بنجاح'),
                    'alert' => 'alert-solid-success'
                ]);
}
    public function publicHome(){
      $studies = Study::orderBy('id', 'desc')->where('study_state' , '=' , 'منشورة')->take(3)->get(); 
      $infos = Info::all();
      $p_sc_studies_counter = count(Study::select('id')->where('study_type', '=' , 'دراسة علمية')->where('study_state' , '=' , 'منشورة')->get());
      $p_st_studies_counter = count(Study::select('id')->where('study_type', '=' , 'دراسة في مرحلة دراسات عليا')->where('study_state' , '=' , 'منشورة')->get());
      $studies_counter = count(Study::select('id')->where('study_state' , '=' , 'منشورة')->get());
        
      $members_counter = count(User::select('id')->where('type', '=' , '0')->get());    
        
      return view('site.index')->with([
          'settings'              => $this->settings,
          'studies'               => $studies,
          'infos'                 => $infos,
          'p_sc_studies_counter'  => $p_sc_studies_counter,
          'p_st_studies_counter'  => $p_st_studies_counter,
          'studies_counter'       => $studies_counter,
          'members_counter'       => $members_counter,
      ]);  
    }
    
        public function editMember()
    {
        if(Auth::check()){
            $user = Auth::user();
        return view('site.member.home.edit')->with('user', $user);
        }else{
            abort(404);
        }
    }    
    public function editMemberByAdmin($id)
    {
        $user = User::findOrFail($id);
        
        if($user->type == 0){
           return view('admin.members.edit')->with('user', $user);
        }else{
            abort(404);
        }
    }
      public function memeberUpdate(MemberRequest $request, $id){
        $user = User::findOrFail($id);
        
        if($user->type == 0){   
        $name = $request->f_name .' '. $request->s_name .' '.$request->t_name . ' ' . $request->fo_name;
        $user->name = $name;        
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->identity = $request->identity;   
        $user->degree = $request->degree;   
        $user->workplace = $request->workplace;   
        $user->job_title = $request->job_title;   
        $user->country = $request->country;   
        $user->city = $request->city;   
        
        $user->save();
        
        return back()->with(
                [
                    'message_flash'=> sprintf('تم التعديل بنجاح! '),
                    'alert' => 'alert-solid-success'
                ]); 
        }else{
            abort(404);
        }
    }
}

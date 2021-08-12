<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Notifications\General;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $settings;
    
    public function __construct()
    {
        $this->settings = Setting::findOrFail(1);
    }  
    public function index()
    {
        $name = request()->query('name', '');
        $email = request()->query('email', '');
        $status = request()->query('status', '');
        $auth_user = Auth::user();
        
         $users = User::
         when($name, function($query, $name) {
                        return $query->where('name', 'LIKE', '%' . $name . '%');
                    })
                    ->when($status, function($query, $status) {
                        return $query->where('status', '=', $status);
                    })
                    ->when($email, function($query, $email) {
                        return $query->where('email',  'LIKE', '%'.$email . '%');
                    })->where('id', '!=', $auth_user->id)
                      ->orderBy('id', 'desc')->paginate($this->settings->num_of_elements);
        
        	return view('admin.users.index', [
            'users' => $users,
            'name' => $name,
            'status' => $status,
            'email' => $email,
    	]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.member.home.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $user = new User();
        
        $user->name = $request->f_name . ' ' . $request->s_name . ' ' . $request->t_name . ' ' . $request->fo_name . ' '; 
        $user->username = $request->username; 
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->birthday = $request->birthday;
        $user->identity = $request->identity;
        $user->degree = $request->degree;
        $user->major = $request->major;
        $user->workplace = $request->workplace;
        $user->job_title = $request->job_title;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->type = 0;
        $user->password = bcrypt($request->password);
   
        $user->save();
        
        $users =  User:: where('type', '!=', '0')->get();
        
        $msg  = 'تم إضافة مستخدم جديد '. $user->name . ' ' . 'بنجاح';
        $icon = 'fas fa-user-plus kt-font-success';
        $url  = route('admin.members.details', ['id' => $user->id]);
        
        foreach($users as $u)
          {  
            $u->notify(new General($msg, $icon, $url));
          }
        
        alert()->success('تم إنشاء حساب جديد بنجاح، أهلًا بك', $this->settings->siteName);
        
        return redirect(route('login'));
    }
    
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(Auth::check()){
            $user = Auth::user();
        return view('admin.users.my-edit')->with('user', $user);
        }else{
            abort(404);
        }
    }
    
    public function details($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.details')->with([
            'user'        => $user,
        ]);
    }

    public function myUpdate(Request $request){
        if(Auth::check()){
         $user = Auth::user();
         $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|min:10|max:14',
            'email' => 'required|email',
            'birthday' => 'required|date',
            'identity' => 'required|string',
            ]);

        $user->name = $request->name;        
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->identity = $request->identity;   
        
        $user->save();
        
        return back()->with(
                [
                    'message_flash'=> sprintf('تم تعديل بياناتك بنجاح! '),
                    'alert' => 'alert-solid-success'
                ]); 
        }else{
            abort(404);
        }
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
       
        return view('admin.users.edit')->with(
            [
                'user'=> $user,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {  
        $user = User::findOrFail($id);
        
       $user->name = $request->name; 
        $user->username = $request->username; 
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->identity = $request->identity;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;
   
        if($request->has('status')){
             $user->status = 'مفعل';
        }else{
             $user->status = 'غير مفعل';
        }
        if($request->has('verify')){
            $now = Carbon::now();
            $user->email_verified_at = $now;
        }else{
            $user->email_verified_at = null; 
        } 
        
        $user->save();
        
        return redirect(route('admin.users.index'))->with(
                [
                    'message_flash'=> sprintf('تم تعديل المستخدم  "%s" بنجاح!', $user->name),
                    'alert' => 'alert-solid-success',
                ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();

    	return redirect(route('admin.users.index'))
            ->with(
                [
                    'message_flash'=> sprintf('تم حذف المستخدم  "%s" بنجاح!', $user->name),
                    'alert' => 'alert-solid-success'
                ]);
    }
    
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
              
           alert()->error('الكلمات غير متطابقة');
           
           return redirect()->back()->with('message_flash');
        }

        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
            //Current password and new password are same
            
            alert()->error('لا يجوز ان تكون كالسابقة');
            
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
       
        alert()->success('تم التغيير كلمة المرور بنجاح');
        
        return redirect()->back()->with('message_flash');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
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
                      ->where('type', '!=', '0')
                      ->orderBy('id', 'desc')->paginate($this->settings->num_of_elements);
        
        	return view('admin.users.index', [
            'users' => $users,
            'name' => $name,
            'status' => $status,
            'email' => $email,
    	]);
    }
    
    public function indexMembers()
    {
        $name = request()->query('name', '');
        $email = request()->query('email', '');
        $mobile = request()->query('mobile', '');
        $auth_user = Auth::user();
        
         $users = User::
         when($name, function($query, $name) {
                        return $query->where('name', 'LIKE', '%' . $name . '%');
                    })
                    ->when($mobile, function($query, $mobile) {
                        return $query->where('mobile', '=', $mobile);
                    })
                    ->when($email, function($query, $email) {
                        return $query->where('email',  'LIKE', '%'.$email . '%');
                    })->where('type', '=', '0')
                      ->orderBy('id', 'desc')->paginate($this->settings->num_of_elements);
        
        	return view('admin.members.index', [
            'users' => $users,
            'name' => $name,
            'mobile' => $mobile,
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
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        
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
        } 
        
        $user->save();
        
        return redirect(route('admin.users.index'))->with(
                [
                    'message_flash'=> sprintf('تم إنشاء المستخدم  "%s" بنجاح!', $user->name),
                    'alert' => 'alert-solid-success'
                ]); 
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
    public function detailsMember($id)
    {
        $user = User::findOrFail($id);
        
        $title_ar = request()->query('title_ar', '');
        $study_state = request()->query('study_state', '');
        
        $studies = $user->memberStudies()
                   ->when($title_ar, function($query, $title_ar) {
                        return $query->where('title_ar', 'LIKE', '%' . $title_ar . '%');
                    })
                    ->when($study_state, function($query, $study_state) {
                        return $query->where('study_state', '=', $study_state);
                    })->orderBy('id', 'desc')->paginate($this->settings->num_of_elements);


        return view('admin.members.details')->with([
            'user'        => $user,
            'studies'     => $studies,
            'title_ar'    => $title_ar,
            'study_state' => $study_state,
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
        
        if($user->type == 0)
         
    	return redirect(route('admin.members.index'))
            ->with(
                [
                    'message_flash'=> sprintf('تم حذف المشترك  "%s" بنجاح!', $user->name),
                    'alert' => 'alert-solid-success'
                ]);
        
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
     public function changePasswordByAdmin(Request $request){

       $request->validate([
           'password'              => 'min:8|required|same:password',
           'password_confirmation' => 'required|same:password',
           'member_id'               => 'required|integer',
        ]);

        //Change Password
        $user = User::findOrFail($request->member_id);
        $user->password = bcrypt($request->password);
        $user->save();
       $siteName = Setting::select('siteName')->where('id','=','1')->get()->first()->siteName;
       
        alert()->success('تم تغيير كلمة المرور بنجاح', $siteName);
        
        return redirect()->back()->with('message_flash');
    }  
}

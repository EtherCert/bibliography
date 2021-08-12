<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class NotificationsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $notifications = $user->notifications()->paginate(20);
        return view('admin.notifications.notification')->with('notifications',$notifications);
    }
    
    public function delete($id){
      $noti =  DB::table('notifications')->where('id','=',$id); 
        if(!$noti)
            abort(404);
      $noti->delete();
        return back()->with([
                    'message_flash'=> sprintf('تم حذف الإشعار بنجاح!'),
                    'alert' => 'alert-solid-success'
                ]);
    }

	public function deleteAll(){
    $user = Auth::user();
    $user->notifications()->delete();
    return back()->with([
                    'message_flash'=> sprintf('تم حذف الإشعارات بنجاح!'),
                    'alert' => 'alert-solid-success'
                ]);
	}    
}

<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\NewChat;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin($id)
    {
        $user = Auth::user();
        $from_user = User::findOrFail($id);
        $chatsU = Chat::where('member_id', '=' , $id);
        $chats = $chatsU->orderBy('id', 'DESC')->paginate(20);
        $chatsU->where('from_user_id', '!=', $user->id)->where('member_id', '=' , $id)->update(['read_at' => Carbon::now()]);

        return view('admin.chats.index')->with([
            'user'         => $user,
            'from_user'    => $from_user,
            'chats'        => $chats,
            ]);
    }
     public function indexMember()
    {
        $user = Auth::user();
        $chatsU = Chat::where('member_id', '=' , $user->id);
        $chats = $chatsU->orderBy('id', 'DESC')->paginate(20);
                
        $chatsU->where('from_user_id', '!=', $user->id)->update(['read_at' => Carbon::now()]);

        return view('site.member.chats.index')->with([
            'user'         => $user,
            'chats'        => $chats,
            ]);
    }
    
    public function storeAdmin(Request $request){
       $request->validate([
            'member_id'       => 'required',
            'to_user_id'      => 'required',
            'from_user_id'    => 'required',
            'body'            => 'required',
          ]);
        $chat = new Chat();
        
        $chat->member_id  = $request->member_id;
        $chat->to_user_id = $request->to_user_id;
        $chat->from_user_id = $request->from_user_id;
        $chat->body = $request->body;
        
        $notification_message = 'تم إرسال رسالة جديدة من الإدارة ';  
        $noti_user =  User::findOrFail($request->member_id);
         
        $noti_user->notify(new NewChat($notification_message, $request->member_id, $chat->id));
        
        $chat->save();
        return back();  
    }
    
      public function storeMember(Request $request){
       $request->validate([
            'member_id'       => 'required',
            'from_user_id'    => 'required',
            'body'            => 'required',
          ]);
        $chat = new Chat();
        
        $chat->member_id  = $request->member_id;
        $chat->from_user_id = $request->from_user_id;
        $chat->body = $request->body;
        
        
        $chat->save();
        
        $member = User::findOrFail($request->member_id);
        $notification_message = 'تم إرسال رسالة جديدة من العضو '.$member->name;  
        $noti_users =  User:: where('type', '=', '1')
        ->orWhere('type', '=', '2')
        ->orWhere('type', '=', '3')
        ->get();
        foreach($noti_users as $noti_user)
         {  
          $noti_user->notify(new NewChat($notification_message, $request->member_id, $chat->id));
         }
        return back();  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}

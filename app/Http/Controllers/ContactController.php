<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Setting;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
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
        $contacts = Contact::latest('id')->paginate($this->settings->num_of_elements);
        
        return view('admin.contacts.index')->with('contacts',$contacts);
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
    public function store(ContactRequest $request)
    {    
        
        $contact = new Contact();
        $contact->subject = $request->input('subject');
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->mobile = $request->input('mobile');
        $contact->details = $request->input('details');
       
        $contact->save();
        $siteName = Setting::select('siteName')->where('id','=','1')->get()->first()->siteName;
        
        alert()->success('شكرًا لتفاعلك سنتواصل معك قريبًا',$siteName);
        
        return redirect(route('index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect(route('admin.contacts.index'))->with([
                    'message_flash'=> sprintf('تم حذف الرسالة "%s" بنجاح!', $contact->subject),
                    'alert' => 'alert-solid-success'
                ]);
        
    } 
    public function markRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 'تم الرد';
        $contact->save();
        
        return redirect(route('admin.contacts.index'))->with([
                    'message_flash'=> sprintf('تم تعيين الرسالة "%s" كرسالة مقروءة بنجاح!', $contact->subject),
                    'alert' => 'alert-solid-success'
                ]); 
    }
    
    public function deleteAll(){
    Contact::truncate();

    return back()->with('message_flash', sprintf('تم حذف  صندوق الوارد بنجاح!'));
}  
}

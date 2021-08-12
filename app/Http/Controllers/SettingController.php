<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use Illuminate\Database\Eloquent\Builder;
use Auth;
use DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::findOrFail('1');
        
        return view('admin.settings.index')->with('settings',$settings);
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
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $settings = Setting::findOrFail($id);
    return view('admin.settings.edit')->with('settings',$settings);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        // validate incoming request
        $settings = Setting::findOrFail($id);
        
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('images' , 'public');
            $settings->logo =  $path;
        } 
        
        if ($request->hasFile('seal')) {
            $seal = $request->file('seal');
            $path = $seal->store('images' , 'public');
            $settings->seal =  $path;
        }
        $settings->email = $request->input('email');
        $settings->siteName = $request->input('siteName');
        $settings->siteNameEng = $request->input('siteNameEng');
        $settings->manager = $request->input('manager');
        $settings->subName1 = $request->input('subName1');
        $settings->subName2 = $request->input('subName2');
        $settings->subName3 = $request->input('subName3');
        //$settings->accountNum = $request->input('accountNum');
        //$settings->color = $request->input('color');
        $settings->mobile = $request->input('mobile');
        $settings->address = $request->input('address');
        $settings->facebook = $request->input('facebook');
        $settings->whatsapp = $request->input('whatsapp');
        $settings->twitter = $request->input('twitter');
        $settings->instegram = $request->input('instegram');
        $settings->snapchat = $request->input('snapchat');
        $settings->num_of_elements = $request->input('num_of_elements');
        $settings->privacy = $request->input('privacy');
        
        $settings->save();
        return redirect(route('admin.settings.index'))->with([
                    'message_flash'=> sprintf('تمت تعديل الإعدادات بنجاح!'),
                    'alert' => 'alert-solid-success'
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(settings $settings)
    {
        //
    }
    
     public function privacy()
     {
        $settings = Setting::findOrFail('1');
        
        return view('site.members.privacies.index')->with('settings',$settings);
     }
     
      public function editPrivacy()
    {
    $settings = Setting::findOrFail(1);
    return view('advices-admin.advices.privacy')->with('settings',$settings);    
    }
    
     public function updatePrivacy(Request $request)
     {
          $request->validate([
            'privacy'  => 'required|string',
            ]);

        $settings = Setting::findOrFail(1);
        $settings->privacy = $request->input('privacy');
        $settings->save();
        return redirect(route('advice-admin.privacy.edit'))->with('message_flash', sprintf('تمت تعديل الإعدادات بنجاح ! ')); 
    }
 }

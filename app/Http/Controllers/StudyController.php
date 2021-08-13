<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StudyRequest;
use Auth;
use Response;
use App\Notifications\General;

class StudyController extends Controller
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
    
    public function indexAdmin($study_state)
    {
     
        $auth_user = Auth::user();
        
        $title_ar = request()->query('title_ar', '');
        $study_type = request()->query('study_type', '');
        
        $studies = $auth_user->adminStudies()
                   ->when($title_ar, function($query, $title_ar) {
                        return $query->where('title_ar', 'LIKE', '%' . $title_ar . '%');
                    })
                    ->when($study_type, function($query, $study_type) {
                        return $query->where('study_type', '=', $study_type);
                    })->where('study_state' , '=' , $study_state)->orderBy('id', 'desc')->paginate($this->settings->num_of_elements);


        return view('admin.studies.index')->with([
            'studies'     => $studies,
            'title_ar'    => $title_ar,
            'study_state' => $study_state,
            'study_type' => $study_type,
            ]);
    } 
    
    public function indexMember($study_state)
    {
        $auth_user = Auth::user();
        
        $title_ar = request()->query('title_ar', '');
        $study_type = request()->query('study_type', '');
        
        $studies = $auth_user->memberStudies()
                   ->when($title_ar, function($query, $title_ar) {
                        return $query->where('title_ar', 'LIKE', '%' . $title_ar . '%');
                    })
                    ->when($study_type, function($query, $study_type) {
                        return $query->where('study_type', '=', $study_type);
                    })->where('study_state' , '=' , $study_state)->orderBy('id', 'desc')->paginate($this->settings->num_of_elements);

        return view('site.member.studies.index')->with([
            'studies'     => $studies,
            'title_ar'    => $title_ar,
            'study_state' => $study_state,
            'study_type' => $study_type,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($study_type)
    {
        return view('site.member.studies.create', [
            'study_type'   => $study_type,
            'settings'   => $this->settings,
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudyRequest $request)
    {
        $study = new Study();
        $auth_user = Auth::user();
        
         if ($request->hasFile('summary_ar_file')) {
            $summary_ar_file = $request->file('summary_ar_file');
            $path = $summary_ar_file->store('images' , 'public');
            $study->summary_ar_file =  $path;
        } 
        if ($request->hasFile('summary_en_file')) {
            $summary_en_file = $request->file('summary_en_file');
            $path = $summary_en_file->store('images' , 'public');
            $study->summary_en_file =  $path;
        }  
        if ($request->hasFile('main_img')) {
            $main_img = $request->file('main_img');
            $path = $main_img->store('images' , 'public');
            $study->main_img =  $path;
        }  
        if ($request->hasFile('study_file')) {
            $study_file = $request->file('study_file');
            $path = $study_file->store('images' , 'public');
            $study->study_file =  $path;
        } 
        if ($request->hasFile('search_leave_file')) {
            $search_leave_file = $request->file('search_leave_file');
            $path = $search_leave_file->store('images' , 'public');
            $study->search_leave_file =  $path;
        } 
        
        $study->title_ar = $request->title_ar;
        $study->title_en = $request->title_en;
        $study->researcher_name = $request->researcher_name;
        $study->supervisor_name = $request->supervisor_name;
        $study->major = $request->major;
        $study->phase = $request->phase;
        $study->summary_ar = $request->summary_ar;
        $study->summary_en = $request->summary_en;
        $study->department_name = $request->department_name;
        $study->publisher = $request->publisher;
        $study->publish_place = $request->publish_place;
        $study->number_of_pages = $request->number_of_pages;
        $study->accept_conditions = $request->accept_conditions;
        $study->member_id = $auth_user->id;
        $study->publish_date = $request->publish_date;
        
        $keys = '';
        foreach($request->keywords as $k){
          $keys .=$k.',';  
        }
        $study->keywords = $keys;
        $study->study_type = $request->study_type;
        
          if($request->has('accept_conditions')){
             $study->accept_conditions = '1';
           }else{
             $study->accept_conditions = '0';
           }
        
        $study->save();
        //////الاشعارات
         $users =  User:: where('type', '!=', '0')->get();
        
        $msg  = 'تم إضافة دراسة جديدة '. $study->name;
        $icon = 'fa fa-blog kt-font-info';
        $url  = route('admin.study.details' , ['id' => $study->id]);
        
        foreach($users as $u)
          {  
            $u->notify(new General($msg, $icon, $url));
          }
        
        //////
        return redirect()->back()->with(
                [
                    'message_flash'=> sprintf('تم إضافة الدراسة  "%s" بنجاح!', $study->title_ar),
                    'alert' => 'alert-solid-success'
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth_user = Auth::user();
        $study = Study::findOrFail($id);
         
         if(($study->member_id == $auth_user->id &&  $auth_user->type == 0) && $study->study_state != 'منشورة')
         return view('site.member.studies.edit')->with([
            'study'        => $study,
            'settings'     => $this->settings,
         ]);
         return view('site.member.home.no-access');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $study = Study::findOrFail($id);
        $auth_user = Auth::user();
        if($study->study_state != 'منشورة'){
        
         if ($request->hasFile('summary_ar_file')) {
            $summary_ar_file = $request->file('summary_ar_file');
            $path = $summary_ar_file->store('images' , 'public');
            $study->summary_ar_file =  $path;
        } 
        if ($request->hasFile('summary_en_file')) {
            $summary_en_file = $request->file('summary_en_file');
            $path = $summary_en_file->store('images' , 'public');
            $study->summary_en_file =  $path;
        }  
        if ($request->hasFile('main_img')) {
            $main_img = $request->file('main_img');
            $path = $main_img->store('images' , 'public');
            $study->main_img =  $path;
        }  
        if ($request->hasFile('study_file')) {
            $study_file = $request->file('study_file');
            $path = $study_file->store('images' , 'public');
            $study->study_file =  $path;
        } 
        if ($request->hasFile('search_leave_file')) {
            $search_leave_file = $request->file('search_leave_file');
            $path = $search_leave_file->store('images' , 'public');
            $study->search_leave_file =  $path;
        } 
        
        $study->title_ar = $request->title_ar;
        $study->title_en = $request->title_en;
        $study->researcher_name = $request->researcher_name;
        $study->supervisor_name = $request->supervisor_name;
        $study->major = $request->major;
        $study->phase = $request->phase;
        $study->summary_ar = $request->summary_ar;
        $study->summary_en = $request->summary_en;
        $study->department_name = $request->department_name;
        $study->publisher = $request->publisher;
        $study->publish_place = $request->publish_place;
        $study->number_of_pages = $request->number_of_pages;
        $study->accept_conditions = $request->accept_conditions;
        $study->member_id = $auth_user->id;
        $study->publish_date = $request->publish_date;
        $study->study_state = 'قيد المراجعة';
        
        $keys = '';
        foreach($request->keywords as $k){
          $keys .=$k.',';  
        }
        $study->keywords = $keys;
        $study->study_type = $request->study_type;
        
          if($request->has('accept_conditions')){
             $study->accept_conditions = '1';
           }else{
             $study->accept_conditions = '0';
           }
        
        $study->save();
  
        return redirect()->back()->with(
                [
                    'message_flash'=> sprintf('تم تعديل الدراسة  "%s" بنجاح!', $study->title_ar),
                    'alert' => 'alert-solid-success'
                ]);
        }
        return view('site.member.home.no-access');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        //
    }
    
     public function detailsAdmin($id)
     {
        $auth_user = Auth::user();
        $study = Study::findOrFail($id);
         
         if(($study->admin_id == $auth_user->id &&  $auth_user->type != 1) ||  $auth_user->type == 1)
         return view('admin.studies.details')->with([
            'study'        => $study,
         ]);
         return view('admin.home.no-access');
     }   
    
    public function detailsMember($id)
     {
        $auth_user = Auth::user();
        $study = Study::findOrFail($id);
         
         if(($study->member_id == $auth_user->id &&  $auth_user->type == 0))
         return view('site.member.studies.details')->with([
            'study'        => $study,
         ]);
         return view('site.member.home.no-access');
      } 
    
     public function detailsPublic($id)
     {
        $study = Study::findOrFail($id);
          
         if($study->study_state == 'منشورة')
            return view('site.studies.details')->with([
            'study'  => $study,
         ]);
         return abort(404);
     } 
    
    public function downloadSummaryAr($id){
    $study = Study::select('summary_ar_file')->findOrFail($id);

        //$filepath = public_path('storage/app/public/' . $course_tag->certImg);
        //$filepath = ('/home/socialwo/memberships_advices/storage/app/public/' . $study->study_img);
       
       $filepath = public_path('storage/'.$study->summary_ar_file);
       
        return Response::download($filepath);    
    } 
    
    public function downloadSummaryEn($id){
    $study = Study::select('summary_en_file')->findOrFail($id);

        //$filepath = public_path('storage/app/public/' . $course_tag->certImg);
        //$filepath = ('/home/socialwo/memberships_advices/storage/app/public/' . $study->study_img);
       
       $filepath = public_path('storage/'.$study->summary_en_file);
       
        return Response::download($filepath);    
    } 
    public function downloadStudyFile($id){
       $study = Study::select('study_file')->findOrFail($id);

       $filepath = public_path('storage/' . $study->study_file);
       
       return Response::download($filepath);    
    }  
    public function downloadSearchLeave_File($id){
      $study = Study::select('search_leave_file')->findOrFail($id);
       
      $filepath = public_path('storage/'.$study->search_leave_file);
       
      return Response::download($filepath);    
    }
    public function changeStatusOrTransfere(Request $request , $id){
      $study = Study::findOrFail($id);  
      
      $study->study_state = $request->study_state;  
      if($request->admin_id > 0)    
      $study->admin_id = $request->admin_id;       
      $study->admin_note = $request->admin_note;       
      $study->refuse_reason = $request->refuse_reason;   
        
      $study->save(); 
      
      return redirect()->back()->with(
                [
                    'message_flash'=> sprintf('تم تعديل الدراسة  "%s" بنجاح!', $study->title_ar),
                    'alert' => 'alert-solid-success'
                ]);    
    }
    
    public function indexPublicStudies()
    {
        
        $title_ar = request()->query('title_ar', '');
        
        $studies = Study::when($title_ar, function($query, $title_ar) {
                        return $query->where('title_ar', 'LIKE', '%' . $title_ar . '%');
                    })->where('study_state' , '=' , 'منشورة')->orderBy('id', 'desc')->paginate($this->settings->num_of_elements);

        return view('site.studies.index')->with([
            'studies'     => $studies,
            'title_ar'    => $title_ar,
            ]);
    }
}

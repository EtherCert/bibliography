<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\Setting;
use Illuminate\Http\Request;
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
    public function edit(Study $study)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study $study)
    {
        //
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
}

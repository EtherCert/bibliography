<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\Setting;
use Illuminate\Http\Request;
use Auth;

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
        $study = Study::findOrFail($id);

        return view('admin.studies.details')->with([
            'study'        => $study,
        ]);
    } 
}

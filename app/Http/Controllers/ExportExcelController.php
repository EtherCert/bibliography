<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AdminExport;
use App\Exports\MemberExport;
use App\Exports\ScientificStudyExport;
use App\Exports\StateStudyExport;
use Excel;

class ExportExcelController extends Controller
{
     public function exportAdmins(){
      return Excel::download(new AdminExport, 'بيانات المسؤولون.xlsx');        
     }
    
    public function exportMembers(){
      return Excel::download(new MemberExport, 'بيانات المشتركون.xlsx');        
     }
    
    public function exportScientificStudy($study_state){
      return Excel::download(new ScientificStudyExport($study_state), 'بيانات الدراسات.xlsx');        
     } 
    public function exportStateStudyExport($study_state){
      return Excel::download(new StateStudyExport($study_state), 'بيانات الدراسات.xlsx');        
     }
}

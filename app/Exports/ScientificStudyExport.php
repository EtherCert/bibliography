<?php

namespace App\Exports;

use App\Models\Study;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class ScientificStudyExport implements FromCollection, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function headings(): array {
      return [
          'عنوان الدراسة بالعربي','عنوان الدراسة بالإنجليزي','اسم الباحث ','التاريخ','التخصص العام',
          'ملخص الدراسة باللغة العربية','ملخص الدراسة باللغة الإنجليزية','الناشر/اسم الجامعة','مكان النشر','عدد الصفحات','الكلمات المفتاحية','الحالة','نوع الدراسة','سنة النشر',
          ];
      }
    
    public function collection()
    {
        $query = Study::select('title_ar','title_en','researcher_name','created_at','major','summary_ar','summary_en','publisher','publish_place','number_of_pages','keywords','phase','study_type','publish_date')
                       ->where('study_type','=','دراسة علمية')
                       ->where('study_state','=', $this->data);
        $auth_user = Auth::user();
        
        if($auth_user->type == 0)
           $query = $query->where('member_id','=', $auth_user->id);
        
        $query = $query->get();
        
        return collect($query);
    }
}

<?php

namespace App\Exports;

use App\Models\Study;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use RealRashid\SweetAlert\Facades\Alert;

class StateStudyExport implements FromCollection, WithHeadings 
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
          'عنوان الدراسة بالعربي','عنوان الدراسة بالإنجليزي','اسم الباحث ','اسم المشرف','التاريخ','التخصص العام','المرحلة ',
          'ملخص الدراسة باللغة العربية','ملخص الدراسة باللغة الإنجليزية','اسم القسم العلمي','الناشر/اسم الجامعة','مكان النشر','عدد الصفحات','الكلمات المفتاحية','الحالة','نوع الدراسة','سنة النشر','سنة النشر'
          ];
      }
    
    public function collection()
    {
        $query = Study::select('title_ar','title_en','researcher_name','supervisor_name','created_at','major','summary_ar','summary_en','department_name','publisher','publish_place','number_of_pages','keywords','phase','study_type','publish_date')
                           ->where('study_type','=','دراسة في مرحلة دراسات عليا')
                           ->where('study_state','=', $this->data)
                           ->get();
        
        return collect($query);
    }
}

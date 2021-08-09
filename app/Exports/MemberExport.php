<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use RealRashid\SweetAlert\Facades\Alert;

class MemberExport implements FromCollection, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function headings(): array {
       return [
		'الإسم','إسم المستخدم','البريد الإلكتروني','تاريخ الميلاد','رقم الجوال','رقم السجل المدني','الدرجة العلمية',
		'التخصص','مكان العمل','المسمى الوظيفي','الدولة','المدينة',
       ];
      }
    
   public function collection()
    {
     $query= User::select('name','username','email','birthday','mobile','identity','degree','major','workplace','job_title','country','city')->where('type','=','0')->get();
    
        return collect($query);   
    }
}

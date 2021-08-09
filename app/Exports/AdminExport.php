<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use RealRashid\SweetAlert\Facades\Alert;

class AdminExport implements FromCollection, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function headings(): array {
      return [
		'الإسم','إسم المستخدم','البريد الإلكتروني','تاريخ الميلاد','رقم الجوال','رقم السجل المدني'
       ];
      }
    
    public function collection()
    {
     $query =  User::select('name','username','email','birthday','mobile','identity')->where('type','!=','0')->get();   

        return collect($query);
    }
}

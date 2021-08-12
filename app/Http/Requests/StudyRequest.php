<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         $valid = [
            'title_ar'              => 'required|string|max:200',
            'title_en'              => 'required|string|max:200',
            'researcher_name'       => 'required|string|max:200',
            'supervisor_name'       => 'max:200',
            'major'                 => 'required|string|max:200',
            'phase'                 => 'max:200',
            'summary_ar'            => 'required',
            'summary_en'            => 'required',
            'department_name'       => 'max:200',
            'publisher'             => 'required|string|max:200',
            'publish_place'         => 'required|string|max:200',
            'number_of_pages'       => 'required|numeric|min:1', 
            'accept_conditions'     => 'boolean',
            'member_id'             => 'numeric',
            'study_state'           => '',
            'refuse_reason'         => 'string',
            'admin_id'              => 'numeric',
            'study_type'            => 'required|string',
            'accept_conditions'     => 'required',
            'publish_date'          => 'required',
        ];
            if ($this->isMethod('post')) {

            $valid['summary_ar_file'] = 'required|max:10000|mimes:jpeg,jpg,png,gif,pdf';
            $valid['summary_en_file'] = 'required|max:10000|mimes:jpeg,jpg,png,gif,pdf';
            $valid['study_file'] = 'required|max:10000|mimes:jpeg,jpg,png,gif,pdf';
            $valid['search_leave_file'] = 'required|max:10000|mimes:jpeg,jpg,png,gif,pdf';
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {

            $valid['summary_ar_file'] = 'max:10000|mimes:jpeg,jpg,png,gif,pdf';
            $valid['summary_en_file'] = 'max:10000|mimes:jpeg,jpg,png,gif,pdf';
            $valid['study_file'] = 'max:10000|mimes:jpeg,jpg,png,gif,pdf';
            $valid['search_leave_file'] = 'max:10000|mimes:jpeg,jpg,png,gif,pdf';
        }
        
        return $valid;
    }
}

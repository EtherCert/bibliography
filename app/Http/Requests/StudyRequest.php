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
        return [
            'title_ar'              => 'required|string|max:200',
            'title_en'              => 'required|string|max:200',
            'researcher_name'       => 'required|string|max:200',
            'supervisor_name'       => 'max:200',
            'major'                 => 'required|string|max:200',
            'phase'                 => 'max:200',
            'summary_ar'            => 'required',
            'summary_en'            => 'required',
            'study_file'            => 'required|mimes:jpeg,jpg,png,gif,pdf|max:10000',
            'department_name'       => 'max:200',
            'publisher'             => 'required|string|max:200',
            'publish_place'         => 'required|string|max:200',
            'number_of_pages'       => 'required|numeric|min:1', 
            'search_leave_file'     => 'mimes:jpeg,jpg,png,gif,pdf|max:10000',
            'accept_conditions'     => 'boolean',
            'member_id'             => 'required|numeric',
            'study_state'           => 'required|string',
            'refuse_reason'         => 'string',
            'admin_id'              => 'numeric',
            'study_type'            => 'required|string',
        ];
    }
}

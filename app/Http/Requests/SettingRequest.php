<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
         $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        return [
            'email'         => 'required|email',
            'siteName'      => 'required|string|max:200',
            'siteNameEng'   => 'required|string|max:200',
            'manager'       => 'required|string|max:200',
            'subName1'      => 'required|string|max:200',
            'subName2'      => 'required|string|max:200',
            'subName3'      => 'required|string|max:200',
            'accountNum'    => 'max:200',
            'mobile'        => 'required|string|max:13|min:10',
            'address'       => 'required|string|max:100',
            'facebook'      => 'required|max:100|regex:' . $regex,
            'whatsapp'      => 'required|max:100|regex:' . $regex,
            'twitter'       => 'required|max:100|regex:' . $regex,
            'instegram'     => 'required|max:100|regex:' . $regex,
            'snapchat'      => 'required|max:100|regex:' . $regex,
            'logo'          => 'mimes:jpeg,jpg,png,gif|max:10000',
            'seal'          => 'mimes:jpeg,jpg,png,gif|max:10000',
            'NumOfStudies'  => 'numeric|min:0',
            'color'         => 'max:200',
            'privacy'       => 'required|string',
            
        ];
    }
}

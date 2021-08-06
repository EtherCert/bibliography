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
            'subName1'      => 'max:200',
            'subName2'      => 'max:200',
            'subName3'      => 'max:200',
            'accountNum'    => 'max:200',
            'mobile'        => 'required|string|max:13|min:10',
            'address'       => 'required|string|max:100',
            'facebook'      => 'required|max:100|regex:' . $regex,
            'whatsapp'      => 'required|string|max:13|min:10',
            'twitter'       => 'required|max:100|regex:' . $regex,
            'instegram'     => 'required|max:100|regex:' . $regex,
            'snapchat'      => 'required|max:100|regex:' . $regex,
            'logo'          => 'required|max:200',
            'seal'          => 'required|max:200',
            'num_of_elements'  => 'numeric|min:0',
            'color'         => 'max:200',
            'privacy'       => 'required|string',
            
        ];
    }
}

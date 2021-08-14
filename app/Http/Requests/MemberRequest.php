<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class MemberRequest extends FormRequest
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
     $auth_user = Auth::user();    
        $valid = [
            'f_name' => 'max:50',
            's_name' => 'max:50',
            't_name' => 'max:50',
            'fo_name' => 'max:50',
            'mobile' => 'required|string|min:10|max:14',
            'birthday' => 'required|date',
            'identity' => 'required|string',
            'degree' => 'required|string',
            'workplace' => 'required|string|max:200',
            'job_title' => 'required|string|max:200',
            'country' => 'required|string|max:200',
            'city' => 'required|string|max:200',
            'status'   => '',
            'verify'   => '',
        ];

        if ($this->isMethod('post')) {
            $flag = false;
             if($auth_user){
              $valid['captcha'] = 'captcha';     
                if($auth_user->type != 0)
                $flag = true;
            }else{
                 $valid['captcha'] = 'required|captcha'; 
             }
            $valid['password'] = 'required|string|min:8|confirmed';
            if($flag)
                $valid['email'] = 'required|email|max:80|confirmed';
            else
                $valid['email'] = 'required|email|max:80|confirmed|unique:users';
            $valid['username'] = 'required|max:20|min:2|alpha_dash|unique:users';

        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {

            $id = Auth::user()->id;
            $valid['email'] = 'required|email|max:30' . $id . ',id,deleted_at,NULL';
            $valid['username'] = 'required|max:20|min:2|alpha_dash';
        }
        
        return $valid;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|max:200',
            'mobile' => 'required|string|min:10|max:14',
            'birthday' => 'required|date',
            'identity' => 'required|string',
            'status'   => '',
            'type'     => 'required|numeric|in:1,2,3',
            'verify'   => '',
        ];

        if ($this->isMethod('post')) {

            $valid['password'] = 'required|string|min:8|confirmed';
            $valid['email'] = 'required|email|max:80';
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

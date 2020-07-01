<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'txtUser' => 'required|unique:users,username',
            'txtPass' => 'required',
            'txtRePass' => 'same:txtPass',
            'txtEmail' => 'required|email'
        ];
    }

    public function messages(){
        return [
            'txtUser.required' => 'Please Enter Username',
            'txtUser.unique' => 'This Username Already Exists',
            'txtPass.required' => 'Please Enter Password',
            'txtRePass.same' => 'Re-password Doesn\'t Match',
            'txtEmail.required' => 'Please Enter Email',
            'txtEmail.email' => 'Incorrect Email Format'
        ];
    }
}

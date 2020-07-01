<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'txtFname'=>'required',
            'txtLname'=>'required',
            'txtPhone'=>'digits_between:10,11',
            'txtAddress'=>'required'
        ];
    }

    public function messages(){
        return [
            'txtFname.required'=>'Please Enter Your First Name',
            'txtLname.required'=>'Please Enter Your Last Name',
            'txtPhone.digits_between'=>'Please Enter Your Phone',
            'txtAddress.required'=>'Please Enter Your Address'
        ];
    }
}

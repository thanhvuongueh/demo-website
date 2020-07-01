<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            //
            'txtCateName' => 'required|unique:cates,name',
            'txtOrder' => 'numeric',
            'txtKeywords' => 'required',
            'txtDescription' => 'required'
        ];
    }

    public function messages(){
        return [
            'txtCateName.required' => 'Please enter category name',
            'txtCateName.unique' => 'This category name already exists',
            'txtOrder.numeric' => 'Please enter numeric order',
            'txtKeywords.required' => 'Please enter keywords',
            'txtDescription.required' => 'Please enter description'
        ];
    }
}

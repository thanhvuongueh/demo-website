<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'txtCate'=>'not_in:0',
            'txtName'=>'required|unique:products,name',
            'fImages'=>'required|image',
            'txtPrice'=>'required|numeric|min:1000',
            'txtIntro'=>'required',
            'txtContent'=>'required',
            'txtDescription'=>'required',
            'txtKeyword'=>'required'
        ];
    }

    public function messages(){
        return [
            'txtCate.not_in'=>'Please choose Category',
            'txtName.required' => 'Please enter Product Name',
            'txtName.unique' => 'Product Name Existed',
            'fImages.required' => 'Please choose Image',
            'fImages.image' => 'This file is not Image',
            'txtPrice.required' => 'Please enter price',
            'txtPrice.numeric' => 'Please enter number on price input',
            'txtPrice.min' => 'Please enter right price',
            'txtIntro.required'=>'Please enter intro',
            'txtContent.required'=>'Please enter content',
            'txtDescription.required'=>'Please enter description',
            'txtKeyword.required'=>'Please enter keyword'
        ];
    }
}

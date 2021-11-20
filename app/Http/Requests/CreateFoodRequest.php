<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFoodRequest extends FormRequest
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
            'name' => 'required | min:4 | max: 32',
            'desc' => 'required',
            'status' => 'required',
            'image' => 'required',
            'price' => 'required | numeric |'

        ];
    }

    public function messages(){
        return [
            'name.required' => 'Trường này không được để trống',
            'name.min' => 'Trường này có ít nhất 4 ký tự',
            'name.max' => 'Trường này có nhiều nhất 32 ký tự',
            'desc.required' => 'Trường này không được để trống',
            'status.required' => 'Trường này không được để trống',
            'image.required' => 'Trường này không được để trống',
            'price.required' => 'Trường này không được để trống',
            'price.numeric' => 'Trường này chỉ được nhập số'
        ];
    }
}

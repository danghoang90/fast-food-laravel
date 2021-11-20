<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email' => 'required | email',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên phải có ít nhất 4 ký tự',
            'name.max' => 'Tên phải có nhiều nhất 32 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không đúng định dạng email',
        ];
    }
}

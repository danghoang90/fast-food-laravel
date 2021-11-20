<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginCustomerRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required | numeric',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không đúng định dạng email',
            'phone.required' => 'Điện Thoại không được để trống',
            'phone.numeric' => 'Điện Thoại chỉ được nhập số',
        ];
    }
}

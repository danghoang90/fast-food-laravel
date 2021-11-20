<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required | min:3' ,
            'address' => 'required | min:6' ,
            'phone' => 'required | numeric |'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên có ít nhất 3 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.min' => 'Địa chỉ có ít nhất 6 ký tự',
            'phone.required' => 'Điện thoại không được để trống',
            'phone.numeric' => 'Điện thoại chỉ được nhập số'
        ];
    }

}

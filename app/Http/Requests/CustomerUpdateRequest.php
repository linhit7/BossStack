<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'fullname' => 'required|max:255',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'customertype' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'fullname.required' => "Bạn chưa nhập tên khách hàng.",
            'birthday.required' => "Bạn chưa nhập ngày sinh.",
            'gender.required' => "Bạn chưa chọn giới tính.",
            'address.required' => "Bạn chưa nhập thông tin địa chỉ.",
            'email.required' => "Bạn chưa nhập địa chỉ email.",
            'email.email' => "Địa chỉ email không hợp lệ.",
            'phone.required' => "Bạn chưa nhập số điện thoại.",
            'customertype.required' => "Bạn chưa chọn nhóm khách hàng.",
        ];
    }      
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportStoreRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'title' => 'required',
            'content' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'fullname.required' => "Bạn chưa nhập họ tên.",
            'email.required' => "Bạn chưa nhập địa chỉ email.",
            'email.email' => "Địa chỉ email không hợp lệ.",
            'phone.required' => "Bạn chưa nhập số điện thoại.",
            'phone.numeric' => "Số điện thoại không hợp lệ.",
            'title.required' => "Bạn chưa nhập tiêu đề yêu cầu.",
            'content.required' => "Bạn chưa nhập nội dung yêu cầu.",
        ];
    }      
}

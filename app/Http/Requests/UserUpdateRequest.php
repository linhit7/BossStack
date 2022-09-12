<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'begin_at' => 'required|date_format:d/m/Y|before:finish_at',
            'finish_at' => 'required|date_format:d/m/Y',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Bạn chưa nhập tên khách hàng.",
            'email.required' => "Bạn chưa nhập địa chỉ email.",
            'email.email' => "Địa chỉ email không hợp lệ.",
            'email.unique' => "Địa chỉ email đã tồn tại. Vui lòng nhập email khác.",
            'begin_at.required' => "Bạn chưa nhập ngày bắt đầu.",
            'finish_at.required' => "Bạn chưa nhập ngày kết thúc.",
            'begin_at.before' => "Ngày bắt đầu phải nhỏ hơn ngày kết thúc.",            
        ];
    }  
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyRelationshipStoreRequest extends FormRequest
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
            'address' => 'required',
            'relation' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'fullname.required' => "Bạn chưa nhập tên khách hàng.",
            'birthday.required' => "Bạn chưa nhập ngày sinh.",
            'relation.required' => "Bạn chưa chọn mối quan hệ.",
            'address.required' => "Bạn chưa nhập thông tin địa chỉ.",
        ];
    }      
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractUpdateRequest extends FormRequest
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
            'contractdate' => 'required',
            'contractdate' => 'required|date_format:d/m/Y|before:lastcontractdate',
            'lastcontractdate' => 'required|date_format:d/m/Y',
        ];
    }
    
    public function messages()
    {
        return [
            'contractdate.required' => "Bạn chưa nhập ngày bắt đầu dịch vụ.",
            'contractdate.before' => "Ngày bắt đầu dịch vụ phải nhỏ hơn ngày kết thúc dịch vụ.",
        ];
    }      
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractStoreRequest extends FormRequest
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
            'contractno' => 'required|max:255',
            'contractdate' => 'required|date_format:d/m/Y|before:lastcontractdate',
            'contractstatustype' => 'required',
            'lastcontractdate' => 'required|date_format:d/m/Y',
        ];
    }
    
    public function messages()
    {
        return [
            'contractno.required' => "Bạn chưa nhập mã đơn hàng.",
            'contractdate.required' => "Bạn chưa nhập ngày bắt đầu dịch vụ.",
            'contractstatustype.required' => "Bạn chưa nhập tình trạng dịch vụ.",
            'lastcontractdate.required' => "Bạn chưa nhập ngày đến hạn dịch vụ.",
            'contractdate.before' => "Ngày bắt đầu dịch vụ phải nhỏ hơn ngày kết thúc dịch vụ.",
        ];
    }      
}

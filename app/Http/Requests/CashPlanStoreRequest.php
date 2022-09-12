<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashPlanStoreRequest extends FormRequest
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

    public function rules()
    {
        return [
            'plantype' => 'required',
            'plandate' => 'required',
            'currentage' => 'required',
            'planage' => 'required|gt:currentage',
            'currentamount' => 'required',
            'requireamount' => 'required',
            'description' => 'required',
        ];
    }
      
    public function messages()
    {
        return [
            'description.required' => "Bạn chưa nhập chi tiết mục tiêu.",
            'plantype.required' => "Bạn chưa chọn mục tiêu tài chính.",
            'plandate.required' => "Bạn chưa nhập ngày lập mục tiêu.",
            'currentage.required' => "Bạn chưa nhập số tuổi hiện tại.",
            'planage.required' => "Bạn chưa nhập số tuổi đạt được mục đích tài chính.",
            'currentamount.required' => "Bạn chưa nhập vốn đầu tư hiện tại.",
            'requireamount.required' => "Bạn chưa nhập kế hoạch mục tiêu.",
            'planage.gt' => "Tuổi hoàn thành mục tiêu phải lớn hơn tuổi hiện tại.",
        ];
    }       
}

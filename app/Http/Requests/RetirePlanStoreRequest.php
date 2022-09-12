<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetirePlanStoreRequest extends FormRequest
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
            'currentage' => 'required',
            'retirementage' => 'required',
            'longevity' => 'required',
            'currentincome' => 'required',
            'currentcost' => 'required',
            'retirementsavings' => 'required',
        ];
    }
      
    public function messages()
    {
        return [
            'currentage.required' => "Bạn chưa nhập tuổi hiện tại.",
            'retirementage.required' => "Bạn chưa nhập tuổi nghỉ hưu dự kiến.",
            'longevity.required' => "Bạn chưa nhập tuổi thọ dự kiến.",
            'currentincome.required' => "Bạn chưa nhập thu nhập hiện tại (tháng).",
            'currentcost.required' => "Bạn chưa nhập chi phí hiện tại (tháng).",
            'retirementsavings.required' => "Bạn chưa nhập tiền đóng góp hưu trí (tháng).",
        ];
    }       
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashIncomeStoreRequest extends FormRequest
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
            'incometype' => 'required',
            'incomedate' => 'required',
            'amount' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'incometype.required' => "Bạn chưa chọn phân loại.",
            'incomedate.required' => "Bạn chưa nhập ngày.",
            'amount.required' => "Bạn chưa nhập số tiền.",
        ];
    }       
}

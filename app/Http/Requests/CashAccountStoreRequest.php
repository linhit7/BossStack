<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashAccountStoreRequest extends FormRequest
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
            'accountno' => 'required|max:255',
            'accountdate' => 'required',
            'amount' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'accountno.required' => "Bạn chưa nhập số tài khoản.",
            'accountdate.required' => "Bạn chưa nhập ngày mở tài khoản.",
            'amount.required' => "Bạn chưa nhập số tiền.",
        ];
    }       
}

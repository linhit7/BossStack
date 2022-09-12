<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashTranferStoreRequest extends FormRequest
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
            'cashaccount_id_send' => 'required',
            'cashaccount_id_receive' => 'required',
            'tranferdate' => 'required',
            'amount' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'accouncashaccount_id_sendtno.required' => "Bạn chưa chọn ví tiền chuyển.",
            'cashaccount_id_receive.required' => "Bạn chưa chọn ví tiền nhận.",
            'tranferdate.required' => "Bạn chưa nhập ngày giao dịch.",
            'amount.required' => "Bạn chưa nhập số tiền.",
        ];
    }       
}

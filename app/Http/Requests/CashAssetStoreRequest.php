<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashAssetStoreRequest extends FormRequest
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
            'assettype' => 'required',
            'assetdate' => 'required',
            'amount' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'assettype.required' => "Bạn chưa chọn phân loại.",
            'assetdate.required' => "Bạn chưa nhập ngày tài sản.",
            'amount.required' => "Bạn chưa nhập số tiền.",
        ];
    }       
}

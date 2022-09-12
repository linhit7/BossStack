<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponStoreRequest extends FormRequest
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
            'key' => 'required|max:20',
            'percent' => 'required',
            'quantity' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'key.required' => "Bạn chưa nhập mã giảm giá.",
            'percent.required' => "Bạn chưa nhập % giảm giá.",
            'quantity.required' => "Bạn chưa nhập số mã giảm.",
        ];
    }      
}

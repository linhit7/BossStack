<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestStoreRequest extends FormRequest
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
            'newsdate' => 'required',
            'newstype' => 'required',
            'newstitle' => 'required',
            'shortcontent' => 'required',
            'content' => 'required',
            'author' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'newsdate.required' => "Bạn chưa nhập ngày đăng.",
            'newstype.required' => "Bạn chưa chọn loại tin tức.",
            'newstitle.required' => "Bạn chưa nhập tiêu đề tin tức.",
            'shortcontent.required' => "Bạn chưa nhập mô tả tin tức.",
            'content.required' => "Bạn chưa nhập nội dung tin tức.",
            'author.required' => "Bạn chưa nhập tác giả tin tức.",
        ];
    }       

}

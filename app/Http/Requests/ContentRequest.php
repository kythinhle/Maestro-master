<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            'txtTitle'         => 'required',
            'txtContent'       => 'required',
            'txtDisplayNumber' => 'required|numeric'
        ];
    }
    public function messages(){
        return [
            'txtTitle.required'         => 'Vui lòng nhập tiêu đề',
            'txtTitle.unique'           => 'Oops! Tiêu đề đã có người tạo rồi',
            'txtContent.required'       =>'Vui lòng nhập nội dung',
            'txtDisplayNumber.required' => 'Vui lòng nhập số hiển thị',
            'txtDisplayNumber.numeric' => 'Display number phải là số'
        ];
    }
}

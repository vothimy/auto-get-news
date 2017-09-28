<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name' => 'required',
            'preview' => 'required',
            'detail' => 'required',
        ];
    }
     public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tin tức',
            'preview.required' => 'Vui lòng nhập mô tả',
            'detail.required' => 'Vui lòng nhập chi tiết '
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Products extends FormRequest
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
            'name' => 'required|unique:products|max:255|min:5',
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được phép để trống',
            'name.unique' => 'Tên sản phẩm không được phép trùng',
            'name.max' => 'Vui lòng nhập tên sản phẩm tối đa 255 kí tự',
            'name.min' => 'Vui lòng nhập tên sản phẩm tối thiểu 5 kí tự',
            'price.required' => 'Giá sản phẩm không được phép để trống',
            'category_id.required' => 'Loại sản phẩm không được phép để trống',
            'contents.required' => 'Mô tả sản phẩm không được phép để trống',
        ];
    }
}

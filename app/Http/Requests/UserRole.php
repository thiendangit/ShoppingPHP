<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRole extends FormRequest
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
            'name' => 'required|unique:roles|max:20|min:5',
            'display_name' => 'required|unique:roles|max:50|min:5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên vai trò không được phép để trống',
            'name.unique' => 'Tên vai trò không được phép trùng',
            'name.max' => 'Vui lòng nhập tên vai trò tối đa 20 kí tự',
            'name.min' => 'Vui lòng nhập tên vai trò tối thiểu 5 kí tự',
            'display_name.required' => 'Mô tả không được phép để trống',
            'display_name.unique' => 'Mô tả không được phép trùng',
            'display_name.max' => 'Vui lòng Mô tả tối đa 20 kí tự',
            'display_name.min' => 'Vui lòng nhập Mô tả tối thiểu 5 kí tự',
        ];
    }
}

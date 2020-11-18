<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Settings extends FormRequest
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
            'config_key' => 'required|unique:settings|max:255|min:5',
            'config_value' => 'required|unique:settings|max:255|min:5',
        ];
    }

    public function messages()
    {
        return [
            'config_key.required' => 'Config key không được phép để trống',
            'config_key.unique' => 'Config key không được phép trùng',
            'config_key.max' => 'Vui lòng nhập Config key tối đa 255 kí tự',
            'config_key.min' => 'Vui lòng nhập Config key tối thiểu 5 kí tự',
            'config_value.required' => 'Config value không được phép để trống',
            'config_value.unique' => 'Config value không được phép trùng',
            'config_value.max' => 'Vui lòng nhập Config value tối đa 255 kí tự',
            'config_value.min' => 'Vui lòng nhập Config value tối thiểu 5 kí tự',
        ];
    }
}

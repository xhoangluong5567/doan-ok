<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'name' => 'required|unique:products,name,'.$this->id,
            'price' => 'required|numeric',
            'images' => 'required',
            'desc' => 'required',
            'images_phu' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'images.required' => 'Không được để trống trường này',
            'images_phu.required' => 'Không được để trống trường này',
            'desc.required' => 'Không được để trống trường này',
            'name.unique' => 'Tên sản phẩm đã tổn tại. Vui lòng kiểm tra lại',
            'price.numeric' => 'Trường này bắt buộc phải là số'


        ];
    }
}

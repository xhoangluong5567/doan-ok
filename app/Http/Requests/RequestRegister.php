<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email' => 'required||email|unique:users,email,'.$this->id,
            'phone' => 'required|unique:users,phone,'.$this->id,
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống trường này',
            'email.required' => 'Không được để trống trường này',
            'phone.required' => 'Không được để trống trường này',
            'password.required' => 'Không được để trống trường này',
            'email.unique' => 'Email này đã được đăng kí trên thống',
            'phone.unique' => 'SDT này đã được đăng kí trên thống',
            'email' => 'Vui lòng nhập đúng định dạng email'




        ];
}
}
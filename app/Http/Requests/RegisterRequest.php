<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:users|max:16|min:4',
            'full_name'=>'required',
            'email'=>'required',
            'password'=>'required',

        ];
    }
    public function messages(){
        return [
            'username.required' => 'Tên đăng nhập không được bỏ trống',
            'username.unique' => 'Tên đã được đặt, vui lòng chọn tên khác',
            'username.max' => 'Tên đăng nhập dài tối đa 16 kí tự',
            'username.min' => 'Tên đăng nhập dài ít nhất 4 kí tự',
            'full_name.required' =>'vui lòng điền đầy đủ họ tên',
            'email.required' =>'email không được để trống',
            'password.required' =>'Vui lòng nhập mật khẩu'
        ];
    }
}

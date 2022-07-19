<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TheLoaiRequest extends FormRequest
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
        $formRule= [
            "ten_the_loai" =>[
                "required",
                "max:255",
                Rule::unique('theloai')->ignore($this->id),
            ],

            "mo_ta" => [
                "required"
            ],

            "slug_the_loai" => [
                "required"
            ],

            "trang_thai"=>[
                "required"
            ],
        ];
        return $formRule;
            
        
    }
    public function messages()
    {
        return [
            'ten_the_loai.required' => 'Bạn chưa nhập tên thể loại',
            'ten_the_loai.max'=> 'Tối đa 255 kí tự',
            'mo_ta.required' => 'Bạn chưa nhập mô tả',
            'slug_the_loai.required' => 'Chưa có slug',
            'trang_thai.required' =>'Bạn phải chọn trạng thái',
        ];
    }
}

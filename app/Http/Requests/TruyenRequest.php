<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruyenRequest extends FormRequest
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
            'tieu_de' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'mo_ta_ngan'=>'required',
            'trang_thai'=>'required',
            'tac_gia'=>'required',
            'tinh_trang'=>'required',
            'theloai_id'=>'required',
            'category_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'tieu_de.required'=>'Tiêu đề không được bỏ trống',
            'image.required'=>'Ảnh không được bỏ trống',
            'image.mimes'=>'Ảnh phải có định dạng jpeg,png,jpg,gif,svg',
            'image.image'=>'Bắt buộc phải là ảnh',
            'mo_ta_ngan.required'=>'Mô tả không được bỏ trống',
            'trang_thai.required'=>'Trạng thái không được bỏ trống',
            'tac_gia.required'=>'Tác giả không được bỏ trống',
            'tinh_trang.required'=>'Tình trạng không được bỏ trống',
            'theloai_id.required'=>'Thể loại không được bỏ trống',
            'category_id.required'=>'Chọn ít nhất 1 thể loại',
        ];
    }
}

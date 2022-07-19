<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            'chapter_name' => 'required',
            'status'=>'required',
            'slug_chapter'=>'required',
            // Rule::notIn(['sprinkles', 'cherries']),
        ];
    }
    public function messages()
    {
        return [
            'chapter_name.required'=>'Tiêu đề không được bỏ trống',
            'status.required'=>'Trạng thái không được bỏ trống',
            'slug_chapter.required'=>'Slug không được bỏ trống',
            
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTheloaiRequest extends FormRequest
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
        $formRule = [
            "mo_ta" => ["required"],

            "slug_the_loai" => ["required"],

            "trang_thai" => ["required"],

            "ten_the_loai" => [
                "required",
                "max:255",
                Rule::unique('theloai')->ignore($this->id),
            ]
        ];

        return $formRule;
        // 'ten_the_loai' => ['required',
        // Rule::unique('theloai', 'ten_the_loai')->ignore($request->id),
        // ]        ];
    }
}

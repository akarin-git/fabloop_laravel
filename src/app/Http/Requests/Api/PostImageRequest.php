<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PostImageRequest extends FormRequest
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
            'category' => 'required|string|max:20',
            'title' => 'required|string|max:20',
            'descriptionA' => 'required|string|between:8,190',
            'descriptionB' => 'string|max:250',
            'descriptionC' => 'string|max:250',
            'image_path' => 'required|mimes:jpg,jpeg,png,svg|file|max:250',
        ];
    }
}

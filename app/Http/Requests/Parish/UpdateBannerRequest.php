<?php

namespace App\Http\Requests\Parish;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBannerRequest extends FormRequest
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
            'banner_headline' => 'required|string|max:40',
            'banner_description' => 'required|string|max:255',
            'banner_image' => [
                'nullable',
                'mimes:png,jpeg,jpg',
                Rule::dimensions()->minWidth(1200)->minHeight(600)
            ],
            'banner_button_text' => 'nullable|string|max:25',
            'banner_button_link' => 'nullable|url|required_with:banner_button_text',
        ];
    }
}

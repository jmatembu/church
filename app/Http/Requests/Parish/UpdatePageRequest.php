<?php

namespace App\Http\Requests\Parish;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
        $defaultRules = [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png'
        ];

        if ($this->page->isAboutParish()) {
            unset($defaultRules['title']);
        }

        return $defaultRules;
    }
}

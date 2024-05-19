<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'img.image' => 'The uploaded file must be an image.',
            'img.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'img.max' => 'The image size must not exceed 5MB.',
        ];
    }
}

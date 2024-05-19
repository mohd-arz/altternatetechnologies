<?php

namespace App\Http\Requests\WhyChooseUs\Imagebox;

use Illuminate\Foundation\Http\FormRequest;

class CreateImageBoxRequest extends FormRequest
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
            "title" => "required",
            "description" => "required",
            "image" => "required|image|mimes:png|max:2048",
        ];
    }
    public function messages()
    {
        return [
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only PNG images are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }
}

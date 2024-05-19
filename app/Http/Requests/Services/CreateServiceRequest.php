<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }
    public function messages()
    {
        return [
            'img1.image' => 'The uploaded file must be an image.',
            'img1.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'img1.max' => 'The image size must not exceed 5MB.',
            'img2.image' => 'The uploaded file must be an image.',
            'img2.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'img2.max' => 'The image size must not exceed 5MB.',
            'img3.image' => 'The uploaded file must be an image.',
            'img3.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'img3.max' => 'The image size must not exceed 5MB.',
        ];
    }

}

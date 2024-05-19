<?php

namespace App\Http\Requests\Home\BannerImage;

use Illuminate\Foundation\Http\FormRequest;

class CreateBannerImageRequest extends FormRequest
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
            'title1' => 'required',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title2' => 'required',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }
    public function messages()
    {
        return [
            'image1.image' => 'The uploaded file must be an image.',
            'image1.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'image1.max' => 'The image size must not exceed 5MB.',
            'image2.image' => 'The uploaded file must be an image.',
            'image2.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'image2.max' => 'The image size must not exceed 5MB.',
        ];
    }
}

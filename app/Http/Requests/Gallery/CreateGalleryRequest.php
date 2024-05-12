<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryRequest extends FormRequest
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
            'type' => 'required|in:img,vid', // Ensure 'type' is either 'img' or 'vid'
            'file' => [
                'required_if:type,img,vid', // Require 'file' if 'type' is 'img' or 'vid'
                'mimes:jpeg,png,mp4,mov', // Allow specific MIME types for images and videos
                'max:' . ($this->type === 'img' ? '2097152' : '10485760'), // Set max file size based on 'type'
            ],
            'is_home' => 'nullable',
        ];
    }
}

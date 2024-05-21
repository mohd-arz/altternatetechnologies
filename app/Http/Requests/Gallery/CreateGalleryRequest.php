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
    public function rules()
    {
        $rules = [
            'type' => 'required|in:img,vid',
            'is_home' => 'nullable',
            'file' => ['required', 'file'] // Initialize as an array
        ];

        if ($this->type === 'img') {
            $rules['file'][] = 'mimes:jpeg,png,jpg,gif'; // Add allowed image mime types
            $rules['file'][] = 'max:5120'; // 5 MB = 5120 KB
        } elseif ($this->type === 'vid') {
            $rules['file'][] = 'mimes:mp4,avi,mkv'; // Add allowed video mime types
            $rules['file'][] = 'max:30720'; // 30 MB = 30720 KB
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'type.required' => 'The type field is required.',
            'type.in' => 'The type must be either img or vid.',
            'file.required' => 'The file field is required.',
            'file.mimes' => 'The file must be a valid type.',
            'file.max' => 'The file may not be greater than the maximum allowed size.',
        ];
    }
}

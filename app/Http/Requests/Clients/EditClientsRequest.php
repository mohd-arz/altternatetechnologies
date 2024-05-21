<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class EditClientsRequest extends FormRequest
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
            'type' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }
    public function messages()
    {
        return [
            'file.image' => 'The uploaded file must be an image.',
            'file.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'file.max' => 'The image size must not exceed 5MB.',
        ];
    }
}

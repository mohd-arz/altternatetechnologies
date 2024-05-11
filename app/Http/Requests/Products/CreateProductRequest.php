<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'model' => 'nullable',
            'capacity' => 'nullable',
            'description' => 'nullable',
            'img1' => 'required',
            'img2' => 'required',
            'img3' => 'required',
            'is_home' => 'nullable',
        ];
    }
}

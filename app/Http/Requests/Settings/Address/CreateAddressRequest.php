<?php

namespace App\Http\Requests\Settings\Address;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
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
            'addr1' => 'required',
            'addr2' => 'required',
            'email' => 'required',
            'main_phno' => 'required',
            'alter_phno1' => 'required',
            'alter_phno2' => 'required',
        ];
    }
}

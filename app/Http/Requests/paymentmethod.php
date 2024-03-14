<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class paymentmethod extends FormRequest
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
           'CARD NUMBER'=>'required',
           'NAME ON CARD'=>'required|string',
            'EXPIRY DATE'=>'required|date_format:Y/m/d',
            'CVV'=>'required|string|digits:4',
        ];
    }
}

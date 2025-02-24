<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'type_id' => 'required|integer|exists:products_types,id',
            'quantity' => 'required|integer|min:0',
            'expiration' => 'nullable|date',
            'producer' => 'nullable|string|max:255',
            'storage' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'pairing' => 'nullable|string|max:255'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemoryRequest extends FormRequest
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
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image'],
            'products' => ['required', 'array', 'min:1'],
            'products.*' => ['integer', 'exists:products,id']
        ];
    }


    public function messages(): array
    {
        return [
            'products.required' => 'Você precisa selecionar pelo menos um produto.',
            'reviews.min' => 'Você precisa selecionar pelo menos um item.',
        ];
    }
}

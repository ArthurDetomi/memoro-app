<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductReviewRequest extends FormRequest
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
            'reviews' => ['required', 'array', 'min:1'],
            'reviews.*' => ['integer', 'between:1,5'],

            'reviews_comments' => ['nullable', 'array'],
            'reviews_comments.*' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'reviews.required' => 'Você precisa avaliar pelo menos um item.',
            'reviews.min' => 'Você precisa avaliar pelo menos um item.',
            'reviews.*.required' => 'Selecione uma nota para cada avaliação marcada.',
            'reviews.*.between' => 'As notas devem estar entre 1 e 5.',
        ];
    }
}

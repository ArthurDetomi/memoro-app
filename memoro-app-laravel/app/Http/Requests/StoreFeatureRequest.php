<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class StoreFeatureRequest extends FormRequest
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
            'type_id' => ['nullable', 'exists:products_types,id'],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('features')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                })
            ],
        ];
    }
}

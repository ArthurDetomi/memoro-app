<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'profession' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'short_bio' => 'nullable|string|max:255',
        ];
    }
}

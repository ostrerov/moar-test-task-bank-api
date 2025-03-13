<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:32'],
            'email' => ['required', 'email', 'max:254', 'unique:users'],
            'password' => ['required', Password::default()]
        ];
    }

    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'The name field is required.',
                'string' => 'The name must be a valid string.',
                'min' => 'The name must be at least :min characters.',
                'max' => 'The name may not be greater than :max characters.'
            ],
            'email' => [
                'required' => 'The email field is required.',
                'email' => 'The email must be a valid email address.',
                'max' => 'The email may not be greater than :max characters.',
                'unique' => 'The email has already been taken.'
            ],
            'password' => [
                'required' => 'The password field is required.'
            ]
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}

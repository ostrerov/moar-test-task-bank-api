<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:254', 'exists:users,email'],
            'password' => ['required', Password::default()]
        ];
    }

    public function messages(): array
    {
        return [
            'email' => [
                'required' => 'The email field is required.',
                'email' => 'The email must be a valid email address.',
                'max' => 'The email may not be greater than :max characters.',
                'exists' => 'The provided email does not exist in our records.'
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

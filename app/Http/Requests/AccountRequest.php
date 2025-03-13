<?php

namespace App\Http\Requests;

use App\Rules\CurrencyRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'currency' => [
                'required',
                'string',
                new CurrencyRule(),
                Rule::unique('accounts')->where(fn ($query) => $query->where('user_id', auth()->user()->id))
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'currency' => [
                'required' => 'Please specify the currency.'
            ]
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}

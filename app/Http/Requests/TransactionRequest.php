<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'from' => ['required', 'string', 'exists:accounts,account_number'],
            'to' => ['required', 'string', 'exists:accounts,account_number'],
            'amount' => ['required', 'numeric', 'min:0.01']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Rules;

use App\Enums\Currency;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CurrencyRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Currency::tryFrom($value)) {
            $fail("The selected currency is invalid. Available currencies: " . implode(', ', Currency::all()));
        }
    }
}

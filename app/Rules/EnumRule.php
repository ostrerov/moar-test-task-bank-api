<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EnumRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }
}

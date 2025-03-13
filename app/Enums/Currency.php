<?php

namespace App\Enums;

enum Currency: string
{
    case USD = 'usd';
    case EUR = 'eur';
    case UAH = 'uah';

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}

<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\ExchangeRateService
 */
class ExchangeRateService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\ExchangeRateService::class;
    }
}

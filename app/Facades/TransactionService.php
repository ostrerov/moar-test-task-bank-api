<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\TransactionService
 */
class TransactionService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\TransactionService::class;
    }
}

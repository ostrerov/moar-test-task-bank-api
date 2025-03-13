<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\AccountService
 */
class AccountService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\AccountService::class;
    }
}

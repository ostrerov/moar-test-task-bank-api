<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\AuthService
 */
class AuthService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\AuthService::class;
    }
}

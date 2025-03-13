<?php

namespace App\Services;

use App\Models\Account;
use App\Models\User;
use Random\RandomException;

class AccountService
{
    /**
     * @throws RandomException
     */
    public function createAccount(User $user, string $currency): Account {
        return Account::create([
            'user_id' => $user->id,
            'account_number' => random_int(100000000000000, 999999999999999),
            'currency' => $currency,
            'balance' => 0
        ]);
    }
}

<?php

namespace App\Services;

use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Facades\ExchangeRateService as ExchangeRate;
use RuntimeException;

class TransactionService
{
    /**
     * @throws \Throwable
     */
    public function transferFunds(User $user, string $fromAccount, string $toAccount, float $amount): string
    {
        $from = Account::where('account_number', $fromAccount)->first();
        $to = Account::where('account_number', $toAccount)->first();

        if ($from->account_number === $to->account_number) {
            throw new RuntimeException('Cannot transfer funds to the same account');
        }

        if ($from->user_id !== $user->id || $from->balance < $amount) {
            throw new RuntimeException('Not enough funds or no access');
        }

        $rate = ExchangeRate::getRate($from->currency, $to->currency);
        $convertedAmount = $amount * $rate;

        DB::transaction(static function () use ($from, $to, $amount, $convertedAmount) {
            $from->decrement('balance', $amount);
            $to->increment('balance', $convertedAmount);
        });

        return 'Transaction successful';
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    public function getRate($from, $to)
    {
        $cacheKey = "exchange_rate_{$from}_$to";

        return Cache::remember($cacheKey, now()->addMinutes(60), static function () use ($from, $to) {
            $response = Http::get("https://latest.currency-api.pages.dev/v1/currencies/{$from}.json");

            if ($response->successful()) {
                $data = $response->json();
                return $data[$from][$to] ?? null;
            }

            return null;
        });
    }
}

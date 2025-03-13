<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use RuntimeException;

class AuthService
{
    public function register(array $data): string
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return $user->createToken('jwt-token')->plainTextToken;
    }

    public function login(array $data): ?string
    {
        $key = 'login_attempts:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 1)) {
            throw new RuntimeException('Too many login attempts. Try again later.');
        }

        if (!Auth::attempt($data)) {
            RateLimiter::hit($key);
            throw new RuntimeException('Wrong password');
        }

        RateLimiter::clear($key);

        auth()->user()->tokens()->delete();
        return auth()->user()->createToken('jwt-token')->plainTextToken;
    }
}

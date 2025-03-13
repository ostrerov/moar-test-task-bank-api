<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Facades\AuthService as User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $token = User::register($request->validated());

        return $this->success(['token' => $token]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $token = User::login($request->validated());

        if (!$token) {
            return $this->error('Unauthorized', 401);
        }

        return $this->success(['token' => $token]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();
        return $this->success('Logged out');
    }
}

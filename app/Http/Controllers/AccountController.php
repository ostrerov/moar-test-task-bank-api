<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountResource;
use App\Facades\AccountService as Account;
use Illuminate\Http\JsonResponse;
use Random\RandomException;

class AccountController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->success(AccountResource::collection(auth()->user()->accounts));
    }

    /**
     * @throws RandomException
     */
    public function store(AccountRequest $request): JsonResponse
    {
        $request->validated();

        $account = Account::createAccount(auth()->user(), $request->input('currency'));

        return $this->success(new AccountResource($account));
    }
}

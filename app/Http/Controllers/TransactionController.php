<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Facades\TransactionService as Transaction;
use Illuminate\Http\JsonResponse;
use RuntimeException;
use Throwable;

class TransactionController extends Controller
{
    /**
     * @throws Throwable
     */
    public function transfer(TransactionRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {
            $response = Transaction::transferFunds(auth()->user(), $data['from'], $data['to'], $data['amount']);
        } catch (RuntimeException|Throwable $e ) {
            return $this->error($e->getMessage(), 403);
        }

        return $this->success($response);
    }
}

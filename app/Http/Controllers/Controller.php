<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class Controller
{
    public function success(array|string|AnonymousResourceCollection|JsonResource $response): JsonResponse
    {
        return response()->json(['status' => true, 'data' => $response]);
    }

    public function error(string $message, int $code = 400): JsonResponse
    {
        return response()->json(['status' => false, 'message' => $message], $code);
    }
}

<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InsufficientFundsException extends Exception
{
    protected $message = 'Insufficient funds for this transaction.';

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'error' => $this->message,
        ], 400);
    }

}

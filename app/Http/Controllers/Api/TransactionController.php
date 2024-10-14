<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\TransactionService;
use App\Exceptions\InsufficientFundsException;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\UserTransactionCollection;
use App\Http\TransferRequest;

class TransactionController extends Controller
{

    public function __construct(private readonly TransactionService $transactionService)
    {
    }

    /**
     * @throws InsufficientFundsException
     */
    public function transfer(TransferRequest $request): TransactionResource
    {
        $transaction = $this->transactionService->transfer($request->validated());

        return new TransactionResource($transaction);
    }

    public function topUsers()
    {
        $topUsers = $this->transactionService->getTopUsersWithTransactions();

        return UserTransactionCollection::collection($topUsers);
    }
}
